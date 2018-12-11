<?php
/**
 * Shu functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WpOpal
 * @subpackage Shu
 * @since Shu 1.0
 */
define( 'SHU_THEME_VERSION', '1.0' );

/**
 * Set up the content width value based on the theme's design.
 *
 * @see shu_fnc_content_width()
 *
 * @since Shu 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

function shu_fnc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shu_fnc_content_width', 810 );
}
add_action( 'after_setup_theme', 'shu_fnc_content_width', 0 );



if ( ! function_exists( 'shu_fnc_setup' ) ) :
/**
 * Shu setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Shu 1.0
 */
function shu_fnc_setup() {

	/*
	 * Make Shu available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Shu, use a find and
	 * replace to change 'shu' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'shu', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
 
	add_editor_style();
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Main menu', 'shu' ),
		'topmenu'	=> esc_html__( 'Topbar Menu', 'shu' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'shu_fnc_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// add support for display browser title
	add_theme_support( 'title-tag' );
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	shu_fnc_get_load_plugins();

}
endif; // shu_fnc_setup
add_action( 'after_setup_theme', 'shu_fnc_setup' );

/**
 * get theme prefix which will use for own theme setting as page config, customizer
 *
 * @return string text_domain
 */
function shu_themer_get_theme_prefix(){
	return 'shu_';
}

add_filter( 'wpopal_themer_get_theme_prefix', 'shu_themer_get_theme_prefix' );

/**
 * Get Theme Option Value.
 * @param String $name : name of prameters 
 */
function shu_fnc_theme_options($name, $default = false) {
  
    // get the meta from the database
    $options = ( get_option( 'wpopal_theme_options' ) ) ? get_option( 'wpopal_theme_options' ) : null;
  
    // return the option if it exists
    if ( isset( $options[$name] ) ) {
        return apply_filters( 'wpopal_theme_options_$name', $options[ $name ] );
    }
    if( get_option( $name ) ){
        return get_option( $name );
    }
    // return default if nothing else
    return apply_filters( 'wpopal_theme_options_$name', $default );
}


/**
 * Function for remove srcset (WP4.4)
 *
 */
function shu_fnc_disable_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'shu_fnc_disable_srcset' );

/**
 * Require function for including 3rd plugins
 *
 */
load_template(get_template_directory() . '/inc/plugins/class-tgm-plugin-activation.php');

function shu_fnc_get_load_plugins(){

	$plugins[] =(array(
		'name'                     => esc_html__('MetaBox', 'shu'),// The plugin name
	    'slug'                     => 'meta-box', // The plugin slug (typically the folder name)
	    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
	));

	$plugins[] =(array(
		'name'                     => esc_html__('WooCommerce','shu'), // The plugin name
	    'slug'                     => 'woocommerce', // The plugin slug (typically the folder name)
	    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
	));


	$plugins[] =(array(
		'name'                     => esc_html__('MailChimp', 'shu'),// The plugin name
	    'slug'                     => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
	    'required'                 =>  true
	));

	$plugins[] =(array(
		'name'                     => esc_html__('Contact Form 7','shu'), // The plugin name
	    'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
	    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
	));

	$plugins[] =(array(
		'name'                     => esc_html__('King Composer - Page Builder', 'shu'),// The plugin name
	    'slug'                     => 'kingcomposer', // The plugin slug (typically the folder name)
	    'required'                 => true,
	
	));

	$plugins[] =(array(
		'name'                     => esc_html__('Revolution Slider', 'shu'),// The plugin name
        'slug'                     => 'revslider', // The plugin slug (typically the folder name)
        'required'                 => true ,
        'source'                   => esc_url( 'http://www.wpopal.com/thememods/revslider.zip' ), // The plugin source
	));

	$plugins[] =(array(
		'name'                     => esc_html__('Wpopal Themer For Themes', 'shu'),// The plugin name
        'slug'                     => 'wpopal-themer', // The plugin slug (typically the folder name)
        'required'                 => true ,
        'source'				   => esc_url( 'http://www.wpopal.com/_opalfw_/wpopal-themer.zip')
	));

	$plugins[] =(array(
		'name'                     => esc_html__('YITH WooCommerce Wishlist', 'shu'),// The plugin name
	    'slug'                     => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
	    'required'                 =>  true
	));

	tgmpa( $plugins );
}

/**
 * Register three Shu widget areas.
 *
 * @since Shu 1.0
 */
function shu_fnc_registart_widgets_sidebars() {
	 
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Sidebar Default', 'shu' ),
		'id'            => 'sidebar-default',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));

	register_sidebar( 
	array(
		'name'          => esc_html__( 'Newsletter' , 'shu'),
		'id'            => 'newsletter',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));
	
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Vertical Menu' , 'shu'),
		'id'            => 'vertical-menu',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));	

	register_sidebar( 
	array(
		'name'          => esc_html__( 'Left Sidebar' , 'shu'),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget widget-style  clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));
	register_sidebar(
	array(
		'name'          => esc_html__( 'Right Sidebar' , 'shu'),
		'id'            => 'sidebar-right',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget widget-style clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));

	register_sidebar( 
	array(
		'name'          => esc_html__( 'Blog Left Sidebar' , 'shu'),
		'id'            => 'blog-sidebar-left',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget widget-style clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));

	register_sidebar( 
	array(
		'name'          => esc_html__( 'Blog Right Sidebar', 'shu'),
		'id'            => 'blog-sidebar-right',
		'description'   => esc_html__( 'Appears on posts and pages in the sidebar.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget widget-style clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span><span>',
		'after_title'   => '</span></span></h3>',
	));

	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 1' , 'shu'),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 2' , 'shu'),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 3' , 'shu'),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 4' , 'shu'),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( 
	array(
		'name'          => esc_html__( 'Footer 5' , 'shu'),
		'id'            => 'footer-5',
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'shu'),
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(
	array(
		'name'          => esc_html__( 'Custom Service', 'shu'),
		'id'            => 'custom-service',
		'description'   => esc_html__( 'Appears in the header right section of the site.', 'shu'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(
	array(
		'name'          => esc_html__( 'Header support', 'shu'),
		'id'            => 'header-support',
		'description'   => esc_html__( 'Appears in the header right section of the site.', 'shu'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(
	array(
		'name'          => esc_html__( 'Payment', 'shu'),
		'id'            => 'payment',
		'description'   => esc_html__( 'Appears in the header right section of the site.', 'shu'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
}
add_action( 'widgets_init', 'shu_fnc_registart_widgets_sidebars' );

/**
 * Register Lato Google font for Shu.
 *
 * @since Shu 1.0
 *
 * @return string
 */
function shu_fnc_font_url() {
	 
	$fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lora = _x( 'on', 'Hind font: on or off', 'shu' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'shu' );
 
 	$playfair = _x( 'on', 'Pay fair font: on or off', 'shu' );

    if ( 'off' !== $lora || 'off' !== $open_sans || 'off' !==$playfair ) {
        $font_families = array();
 
        if ( 'off' !== $lora ) {
            $font_families[] = 'Montserrat:400,700';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Work Sans:300,400,500,600,700,800';
        }
 		if ( 'off' !== $playfair ) {
            $font_families[] = 'Playfair+Display:700,400italic';
        }
        $query_args = array(
            'family' => ( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 		
 		 
 		$protocol = is_ssl() ? 'https:' : 'http:';
        $fonts_url = add_query_arg( $query_args, $protocol .'//fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Shu 1.0
 */
function shu_fnc_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'shu-open-sans', shu_fnc_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'shu-fa', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '3.0.4' );

	if(isset($_GET['opal-skin']) && $_GET['opal-skin']) {
		$currentSkin = $_GET['opal-skin'];
	}else{
		$currentSkin = str_replace( '.css','', shu_fnc_theme_options('skin','default') );
	}
	if( is_rtl() ){
		if( !empty($currentSkin) && $currentSkin != 'default' ){ 
			wp_enqueue_style( 'shu-'.$currentSkin.'-style', get_template_directory_uri() . '/css/skins/rtl-'.$currentSkin.'/style.css' );
		}else {
			// Load our main stylesheet.
			wp_enqueue_style( 'shu-style', get_template_directory_uri() . '/css/rtl-style.css' );
		}
	}
	else {
		if( !empty($currentSkin) && $currentSkin != 'default' ){ 
			wp_enqueue_style( 'shu-'.$currentSkin.'-style', get_template_directory_uri() . '/css/skins/'.$currentSkin.'/style.css' );
		}else {
			// Load our main stylesheet.
			wp_enqueue_style( 'shu-style', get_template_directory_uri() . '/css/style.css', array(), '46' );
		}	
	}	

	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20130402' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.js', array( 'jquery' ), '20150315', true );
	wp_enqueue_script( 'prettyphoto-js',	get_template_directory_uri().'/js/jquery.prettyPhoto.js');
	wp_enqueue_style ( 'prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css');
	
	wp_enqueue_script ( 'shu-functions-js', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );
	wp_localize_script( 'shu-functions-js', 'shuAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}
add_action( 'wp_enqueue_scripts', 'shu_fnc_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Shu 1.0
 */
function shu_fnc_admin_fonts() {
	wp_enqueue_style( 'shu-lato', shu_fnc_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'shu_fnc_admin_fonts' );

load_template(  get_template_directory() . '/inc/custom-header.php' );
load_template(  get_template_directory() . '/inc/customizer.php' );
load_template(  get_template_directory() . '/inc/function-post.php' );
load_template(  get_template_directory() . '/inc/functions-import.php' );
load_template(  get_template_directory() . '/inc/template-tags.php' );
load_template(  get_template_directory() . '/inc/template.php' );


/**
 * Check and load to support visual composer
 */
if(  in_array( 'kingcomposer/kingcomposer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  ){ 
	load_template(  get_template_directory() . '/inc/vendors/kingcomposer/functions.php' );
}

/**
 * Check to support woocommerce
 */
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
	add_theme_support( 'woocommerce');
	load_template(  get_template_directory() . '/inc/vendors/woocommerce/functions.php' );
}


if(  in_array( 'wpopal-themer/wpopal-themer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  ){ 
 	
 	if(class_exists('Wpopal_User_Account')){
 		new Wpopal_User_Account();
 	}
}



add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
	console.log(event.detail.contactFormId);
    if ( '20' == event.detail.contactFormId ) {
		fbq('track', 'Lead');
         location = '/succes-catalog';
    }
    if ( '368' == event.detail.contactFormId ) {
		fbq('track', 'Lead');
         location = '/succes';
    }
    if ( '103' == event.detail.contactFormId ) {
		fbq('track', 'Lead');
         location = '/succes-zakaz';
    }
    if ( '754' == event.detail.contactFormId ) {
		fbq('track', 'Lead');
         location = '/succes-zakaz';
    }
//   location = '/succes';
}, false );
jQuery('#clickcert').on('click', function(){
  jQuery('.cert-img').trigger('click');
	return false;
});	 
</script>
<?php
}

/*
add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ( '123' == event.detail.contactFormId ) {
        ga( 'send', 'event', 'Contact Form', 'submit' );
    }
}, false );
</script>
<?php
}*/