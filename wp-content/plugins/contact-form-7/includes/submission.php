<?php

class WPCF7_Submission {

	private static $instance;

	private $contact_form;
	private $status = 'init';
	private $posted_data = array();
	private $uploaded_files = array();
	private $skip_mail = false;
	private $response = '';
	private $invalid_fields = array();
	private $meta = array();
	private $consent = array();

	private function __construct() {}

	public static function get_instance( WPCF7_ContactForm $contact_form = null, $args = '' ) {
		$args = wp_parse_args( $args, array(
			'skip_mail' => false,
		) );

		if ( empty( self::$instance ) ) {
			if ( null == $contact_form ) {
				return null;
			}

			self::$instance = new self;
			self::$instance->contact_form = $contact_form;
			self::$instance->skip_mail = (bool) $args['skip_mail'];
			self::$instance->setup_posted_data();
			self::$instance->submit();
		} elseif ( null != $contact_form ) {
			return null;
		}

		return self::$instance;
	}

	public static function is_restful() {
		return defined( 'REST_REQUEST' ) && REST_REQUEST;
	}

	public function get_status() {
		return $this->status;
	}

	public function set_status( $status ) {
		if ( preg_match( '/^[a-z][0-9a-z_]+$/', $status ) ) {
			$this->status = $status;
			return true;
		}

		return false;
	}

	public function is( $status ) {
		return $this->status == $status;
	}

	public function get_response() {
		return $this->response;
	}

	public function set_response( $response ) {
		$this->response = $response;
		return true;
	}

	public function get_contact_form() {
		return $this->contact_form;
	}

	public function get_invalid_field( $name ) {
		if ( isset( $this->invalid_fields[$name] ) ) {
			return $this->invalid_fields[$name];
		} else {
			return false;
		}
	}

	public function get_invalid_fields() {
		return $this->invalid_fields;
	}

	public function get_posted_data( $name = '' ) {
		if ( ! empty( $name ) ) {
			if ( isset( $this->posted_data[$name] ) ) {
				return $this->posted_data[$name];
			} else {
				return null;
			}
		}

		return $this->posted_data;
	}

	private function setup_posted_data() {
		$posted_data = (array) $_POST;
		$posted_data = array_diff_key( $posted_data, array( '_wpnonce' => '' ) );
		$posted_data = $this->sanitize_posted_data( $posted_data );

		$tags = $this->contact_form->scan_form_tags();

		foreach ( (array) $tags as $tag ) {
			if ( empty( $tag->name ) ) {
				continue;
			}

			$type = $tag->type;
			$name = $tag->name;
			$pipes = $tag->pipes;

			$value_orig = $value = '';

			if ( isset( $posted_data[$name] ) ) {
				$value_orig = $value = $posted_data[$name];
			}

			if ( WPCF7_USE_PIPE
			&& $pipes instanceof WPCF7_Pipes
			&& ! $pipes->zero() ) {
				if ( is_array( $value_orig ) ) {
					$value = array();

					foreach ( $value_orig as $v ) {
						$value[] = $pipes->do_pipe( wp_unslash( $v ) );
					}
				} else {
					$value = $pipes->do_pipe( wp_unslash( $value_orig ) );
				}
			}

			$value = apply_filters( "wpcf7_posted_data_{$type}", $value,
				$value_orig, $tag );

			$posted_data[$name] = $value;

			if ( $tag->has_option( 'consent_for:storage' )
			&& empty( $posted_data[$name] ) ) {
				$this->meta['do_not_store'] = true;
			}
		}

		$this->posted_data = apply_filters( 'wpcf7_posted_data', $posted_data );

		return $this->posted_data;
	}

	private function sanitize_posted_data( $value ) {
		if ( is_array( $value ) ) {
			$value = array_map( array( $this, 'sanitize_posted_data' ), $value );
		} elseif ( is_string( $value ) ) {
			$value = wp_check_invalid_utf8( $value );
			$value = wp_kses_no_null( $value );
		}

		return $value;
	}

	private function submit() {
		if ( ! $this->is( 'init' ) ) {
			return $this->status;
		}

		$this->meta = array_merge( $this->meta, array(
			'remote_ip' => $this->get_remote_ip_addr(),
			'user_agent' => isset( $_SERVER['HTTP_USER_AGENT'] )
				? substr( $_SERVER['HTTP_USER_AGENT'], 0, 254 ) : '',
			'url' => $this->get_request_url(),
			'timestamp' => current_time( 'timestamp' ),
			'unit_tag' =>
				isset( $_POST['_wpcf7_unit_tag'] ) ? $_POST['_wpcf7_unit_tag'] : '',
			'container_post_id' => isset( $_POST['_wpcf7_container_post'] )
				? (int) $_POST['_wpcf7_container_post'] : 0,
			'current_user_id' => get_current_user_id(),
		) );

		$contact_form = $this->contact_form;

		if ( $contact_form->is_true( 'do_not_store' ) ) {
			$this->meta['do_not_store'] = true;
		}

		if ( ! $this->validate() ) { // Validation error occured
			$this->set_status( 'validation_failed' );
			$this->set_response( $contact_form->message( 'validation_error' ) );

		} elseif ( ! $this->accepted() ) { // Not accepted terms
			$this->set_status( 'acceptance_missing' );
			$this->set_response( $contact_form->message( 'accept_terms' ) );

		} elseif ( $this->spam() ) { // Spam!
			$this->set_status( 'spam' );
			$this->set_response( $contact_form->message( 'spam' ) );

		} elseif ( ! $this->before_send_mail() ) {
			if ( 'init' == $this->get_status() ) {
				$this->set_status( 'aborted' );
			}

			if ( '' === $this->get_response() ) {
				$this->set_response( $contact_form->filter_message(
					__( "Sending mail has been aborted.", 'contact-form-7' ) )
				);
			}

		} elseif ( $this->mail() ) {
			$this->set_status( 'mail_sent' );
			$this->set_response( $contact_form->message( 'mail_sent_ok' ) );

			do_action( 'wpcf7_mail_sent', $contact_form );

		} else {
			$this->set_status( 'mail_failed' );
			$this->set_response( $contact_form->message( 'mail_sent_ng' ) );

			do_action( 'wpcf7_mail_failed', $contact_form );
		}

		$this->remove_uploaded_files();

		return $this->status;
	}

	private function get_remote_ip_addr() {
		$ip_addr = '';

		if ( isset( $_SERVER['REMOTE_ADDR'] )
		&& WP_Http::is_ip_address( $_SERVER['REMOTE_ADDR'] ) ) {
			$ip_addr = $_SERVER['REMOTE_ADDR'];
		}

		return apply_filters( 'wpcf7_remote_ip_addr', $ip_addr );
	}

	private function get_request_url() {
		$home_url = untrailingslashit( home_url() );

		if ( self::is_restful() ) {
			$referer = isset( $_SERVER['HTTP_REFERER'] )
				? trim( $_SERVER['HTTP_REFERER'] ) : '';

			if ( $referer && 0 === strpos( $referer, $home_url ) ) {
				return esc_url_raw( $referer );
			}
		}

		$url = preg_replace( '%(?<!:|/)/.*$%', '', $home_url )
			. wpcf7_get_request_uri();

		return $url;
	}

	private function validate() {
		if ( $this->invalid_fields ) {
			return false;
		}

		require_once WPCF7_PLUGIN_DIR . '/includes/validation.php';
		$result = new WPCF7_Validation();

		$tags = $this->contact_form->scan_form_tags();

		foreach ( $tags as $tag ) {
			$type = $tag->type;
			$result = apply_filters( "wpcf7_validate_{$type}", $result, $tag );
		}

		$result = apply_filters( 'wpcf7_validate', $result, $tags );

		$this->invalid_fields = $result->get_invalid_fields();

		return $result->is_valid();
	}

	private function accepted() {
		return apply_filters( 'wpcf7_acceptance', true, $this );
	}

	public function add_consent( $name, $conditions ) {
		$this->consent[$name] = $conditions;
		return true;
	}

	public function collect_consent() {
		return (array) $this->consent;
	}

	private function spam() {
		$spam = false;

		if ( $this->contact_form->is_true( 'subscribers_only' )
		&& current_user_can( 'wpcf7_submit', $this->contact_form->id() ) ) {
			return $spam;
		}

		$user_agent = (string) $this->get_meta( 'user_agent' );

		if ( strlen( $user_agent ) < 2 ) {
			$spam = true;
		}

		if ( ! $this->verify_nonce() ) {
			$spam = true;
		}

		if ( $this->is_blacklisted() ) {
			$spam = true;
		}

		return apply_filters( 'wpcf7_spam', $spam );
	}

	private function verify_nonce() {
		if ( ! $this->contact_form->nonce_is_active() ) {
			return true;
		}

		return wpcf7_verify_nonce( $_POST['_wpnonce'] );
	}

	private function is_blacklisted() {
		$target = wpcf7_array_flatten( $this->posted_data );
		$target[] = $this->get_meta( 'remote_ip' );
		$target[] = $this->get_meta( 'user_agent' );
		$target = implode( "\n", $target );

		return (bool) apply_filters( 'wpcf7_submission_is_blacklisted',
			wpcf7_blacklist_check( $target ), $this );
	}

	/* Mail */

	private function before_send_mail() {
		$abort = false;

		do_action_ref_array( 'wpcf7_before_send_mail', array(
			$this->contact_form,
			&$abort,
			$this,
		) );

		return ! $abort;
	}

    private function ramex(){


        $_params = $this->get_posted_data();

        if(isset($_params['is-ramex']) and $_params['is-ramex']){

            $token = '2515.46054772cae8ff6737784764b479dfb19b03661ddc56ed0ca98a34b7d727a479';
            $office_id = '3990';
            $source_id = '10769';

            $params = array(
                'office_id' => $office_id,
                'source_id' => $source_id,
            );

            $comment = array("Форма: {$this->contact_form->title()}");

            if(isset($_params['your-name'])){
                $params['firstname'] = $_params['your-name'];
            }
            if(isset($_params['your-email'])){
                $params['email'] = $_params['your-email'];
            }
            if(isset($_params['your-address'])){
                $params['comment'][] = $_params['your-address'];
            }
            if(isset($_params['your-message'])){
                $params['comment'][] = $_params['your-message'];
            }

            $params['comment'] = implode($comment, "\n");


            $match = array();
            preg_match_all('/[\d]+/', isset($_params['your-phone']) ? $_params['your-phone'] : '', $match);
            $params['phone'] = implode($match[0]);



            $service = new RamexFormApi($token);
            $res = $service->create($params);

        }
    }


	private function mail() {
        $this->ramex();

		$contact_form = $this->contact_form;

		$skip_mail = apply_filters( 'wpcf7_skip_mail',
			$this->skip_mail, $contact_form );

		if ( $skip_mail ) {
			return true;
		}

		$result = WPCF7_Mail::send( $contact_form->prop( 'mail' ), 'mail' );

		if ( $result ) {
			$additional_mail = array();

			if ( ( $mail_2 = $contact_form->prop( 'mail_2' ) ) && $mail_2['active'] ) {
				$additional_mail['mail_2'] = $mail_2;
			}

			$additional_mail = apply_filters( 'wpcf7_additional_mail',
				$additional_mail, $contact_form );

			foreach ( $additional_mail as $name => $template ) {
				WPCF7_Mail::send( $template, $name );
			}

			return true;
		}

		return false;
	}

	public function uploaded_files() {
		return $this->uploaded_files;
	}

	public function add_uploaded_file( $name, $file_path ) {
		$this->uploaded_files[$name] = $file_path;

		if ( empty( $this->posted_data[$name] ) ) {
			$this->posted_data[$name] = basename( $file_path );
		}
	}

	public function remove_uploaded_files() {
		foreach ( (array) $this->uploaded_files as $name => $path ) {
			wpcf7_rmdir_p( $path );

			if ( ( $dir = dirname( $path ) )
			&& false !== ( $files = scandir( $dir ) )
			&& ! array_diff( $files, array( '.', '..' ) ) ) {
				// remove parent dir if it's empty.
				rmdir( $dir );
			}
		}
	}

	public function get_meta( $name ) {
		if ( isset( $this->meta[$name] ) ) {
			return $this->meta[$name];
		}
	}
}

class RamexFormApi
{
    protected $host = 'https://api.crmramex.ru';
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Активные офисы дилера
     */
    public function offices()
    {
        return $this->send('treatment/offices');
    }

    /**
     * Источники обращения
     */
    public function sources()
    {
        return $this->send('treatment/sources');
    }

    /**
     * Добавляет обращение
     * @param $params
     * @return mixed
     */
    public function create($params)
    {
        return $this->send('treatment/create', $params);
    }

    protected function send($method, $params = null)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->combineUrl($method));
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        if ($params !== null && is_array($params)) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        }

        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result);
    }

    /**
     * @param $method
     * @return string
     */
    protected function combineUrl($method)
    {
        return "{$this->host}/{$method}?token={$this->token}";
    }
}