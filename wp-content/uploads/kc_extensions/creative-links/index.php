<?php
/*
Extension Name: Creative Links
Extension Preview: http://extensions.kingcomposer.com/preview/creative-links/
Description: Create button links with available effects.
Version: 1.0
Author: King-Theme
Author URI: http://king-theme.com/
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!defined('ABSPATH')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class kc_extension_creative_links extends kc_extension{

	public function __construct() {

		// This is requried to setup this extension
		$this->init(__FILE__);

		/*
			Available mothod
			$this->map(); //Add map
			$this->url; // Extension url
			$this->path; // Extensition path

		*/

		// Register output for the first element
		$this->output('kc-creative-links', array(&$this, 'creative_links'));

		// Register output for the second element
		//$this->output('second-element', array(&$this, 'second_element'));

		$this->map(array(

			'kc-creative-links' => array(

				'name' 		=> __( 'Creative Links', 'kingcomposer' ),
				'category' 	=> __( 'Content', 'kingcomposer' ),
				'title' 	=> __( 'Creative Links Settings', 'kingcomposer' ),
				'icon' 		=> 'fa-link',
				'pop_width' => 900,
				'live_editor' => $this->path.'/live_editor.php',
				'description' => __( 'Create button links with available effects.', 'kingcomposer' ),
				'assets' => array(
					'styles' => array(
						'kc-creative-links' => $this->url.'/css/creative-links.css',
					)
				),
				'params' => array(
					'general' => array(
						array(
							'name'			=> 'name',
							'type'			=> 'text',
							'label'			=> __('Text','kingcomposer'),
							'admin_label'	=> true,
							'value'			=> __('Button Text','kingcomposer')
						),
						array(
							'name'			=> 'effect',
							'label'			=> __('Select Effect','kingcomposer'),
							'admin_label'	=> true,
							'type'			=> 'select',
							'options'		=> array(
								'cl-effect-1' => __( 'Bracket Fly', 'kingcomposer' ),
								'cl-effect-2' => __( 'Cube Vertical Swap', 'kingcomposer' ),
								'cl-effect-3' => __( 'Bottom Border Fly Up', 'kingcomposer' ),
								'cl-effect-4' => __( 'Bottom Border Slide Down', 'kingcomposer' ),
								'cl-effect-5' => __( 'Fly Text', 'kingcomposer' ),
								'cl-effect-6' => __( 'Trapdoor', 'kingcomposer' ),
								'cl-effect-7' => __( 'Fancy Border', 'kingcomposer' ),
								'cl-effect-8' => __( 'Hand Shake', 'kingcomposer' ),
								'cl-effect-10' => __( 'Dual Text Slide', 'kingcomposer' ),
								'cl-effect-11' => __( 'Swap Color', 'kingcomposer' ),
								'cl-effect-15' => __( 'Blurry Text', 'kingcomposer' ),
								'cl-effect-16' => __( 'Flip Diagonal', 'kingcomposer' ),
								'cl-effect-18' => __( 'Cross Multiplication', 'kingcomposer' ),
								'cl-effect-20' => __( 'Flip Panel', 'kingcomposer' ),
								'cl-effect-21' => __( 'Border Clamp', 'kingcomposer' )
							),
							'value'			=> 'cl-effect-1',
						),
						array(
							'type' 			=> 'toggle',
							'name' 			=> 'show_icon',
							'label' 		=> __( 'Show Icon?', 'kingcomposer' ),
							'description' 	=> '',
						),
						array(
							'type' 			=> 'icon_picker',
							'name'		 	=> 'icon',
							'label' 		=> __( 'Icon', 'kingcomposer' ),
							'value'         => 'fa-leaf',
							'admin_label' 	=> true,
							'description' 	=> __( 'Select icon on link', 'kingcomposer' ),
							'relation'		=> array(
								'parent'	=> 'show_icon',
								'show_when'	=> 'yes'
							)
						),
						array(
							'type'			=> 'dropdown',
							'name'			=> 'icon_position',
							'label'			=> __( 'Icon position', 'kingcomposer' ),
							'description'	=> '',
							'value'     	=> 'left',
							'options'		=> array(
								'left'	=> __('Left', 'kingcomposer'),
								'right'	=> __('Right', 'kingcomposer'),
							),
							'relation'		=> array(
								'parent'	=> 'show_icon',
								'show_when'	=> 'yes'
							)
						),
						array(
							'name'	=> 'link',
							'label'	=> __('Link','kingcomposer'),
							'type'	=> 'link',
						),
						array(
							'type'	=> 'text',
							'label'	=> __( 'Extra Class', 'kingcomposer' ),
							'name'	=> 'extra_class',
							'value'	=> ''
						)
					),

					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options' => array(
								array(
									"screens" => "any,1024,999,767,479",
									'Button' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.cl-effect-1 .cl-text,.cl-effect-2 .cl-text span,.cl-effect-3 a,.cl-effect-4 a,.cl-effect-5 a,.cl-effect-6 a,.cl-effect-7 a,.cl-effect-8 a,.cl-effect-10 a,.cl-effect-11 a,.cl-effect-13 a,.cl-effect-14 a,.cl-effect-15 a::before,.cl-effect-16 a,.cl-effect-17 a,.cl-effect-18 a,.cl-effect-19 a,.cl-effect-20 a,.cl-effect-21 a'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.cl-effect-1 .cl-text,.cl-effect-2 .cl-text span,.cl-effect-2 a span::before,.cl-effect-3 a,.cl-effect-4 a,.cl-effect-5 a,.cl-effect-6 a,.cl-effect-7 a,.cl-effect-8 a,.cl-effect-10 a span,.cl-effect-11 a,.cl-effect-13 a,.cl-effect-14 a,.cl-effect-15 a,.cl-effect-16 a,.cl-effect-18 a,.cl-effect-20 a span,.cl-effect-21 a'),
										array('property' => 'background-color', 'label' => 'Line Color', 'des' => 'Line color for effect: Bottom Border Fly Up,Bottom Border Slide Down,Trapdoor,Fancy Border,Cross Multiplication,Border Clamp', 'selector' => '.cl-effect-3 a::after,.cl-effect-4 a::after,.cl-effect-6 a::before,.cl-effect-7 a::before,.cl-effect-18 a::before,.cl-effect-18 a::after,.cl-effect-21 a::before, .cl-effect-21 a::after'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.cl-text'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.cl-text'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.cl-text'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.cl-text'),
										array('property' => 'text-align', 'label' => 'Text Align'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.cl-text'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.cl-text'),
										array('property' => 'border', 'label' => 'border', 'selector' => '.cl-effect-1 .cl-text,.cl-effect-2 .cl-text span,.cl-effect-3 a,.cl-effect-4 a,.cl-effect-5 a,.cl-effect-6 a,.cl-effect-7 a,.cl-effect-8 a::before,.cl-effect-8 a::after,.cl-effect-10 a span,.cl-effect-11 a,.cl-effect-13 a,.cl-effect-14 a,.cl-effect-15 a,.cl-effect-16 a,.cl-effect-17 a,.cl-effect-18 a,.cl-effect-20 a span,.cl-effect-21 a'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.cl-effect-1 .cl-text,.cl-effect-2 .cl-text span,.cl-effect-3 a,.cl-effect-4 a,.cl-effect-5 a,.cl-effect-6 a,.cl-effect-7 a,.cl-effect-8 a::before,.cl-effect-8 a::after,.cl-effect-10 a span,.cl-effect-11 a,.cl-effect-13 a,.cl-effect-14 a,.cl-effect-15 a,.cl-effect-16 a,.cl-effect-17 a,.cl-effect-18 a,.cl-effect-20 a span,.cl-effect-21 a'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.cl-effect-1 .cl-text,.cl-effect-2 a span,.cl-effect-2 a span::before,.cl-effect-3 a,.cl-effect-4 a,.cl-effect-5 a span,.cl-effect-5 a span::before,.cl-effect-6 a,.cl-effect-7 a,.cl-effect-8 a,.cl-effect-10 a span,.cl-effect-10 a::before,.cl-effect-11 a,.cl-effect-13 a,.cl-effect-15 a,.cl-effect-16 a,.cl-effect-17 a,.cl-effect-17 a,.cl-effect-18 a,.cl-effect-19 a span::before,.cl-effect-20 a span,.cl-effect-20 a span::before,.cl-effect-21 a,.cl-effect-11 a::before'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.cl-effect-1 .cl-text,.cl-effect-2 a span,.cl-effect-2 a span::before,.cl-effect-3 a,.cl-effect-4 a,.cl-effect-5 a span,.cl-effect-5 a span::before,.cl-effect-6 a,.cl-effect-7 a,.cl-effect-8 a,.cl-effect-9 a,.cl-effect-10 a span,.cl-effect-10 a::before,.cl-effect-11 a,.cl-effect-11 a:hover::before,.cl-effect-13 a,.cl-effect-15 a,.cl-effect-16 a,.cl-effect-17 a,.cl-effect-17 a,.cl-effect-19 a span::before,.cl-effect-20 a span,.cl-effect-20 a span::before,.cl-effect-21 a,.cl-effect-11 a::before'),
									),
									'Button Hover' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.cl-effect-1 .cl-text:hover,.cl-effect-2 a:hover span::before,.cl-effect-3 a:hover,.cl-effect-4 a:hover,.cl-effect-5 a:hover,.cl-effect-6 a:hover,.cl-effect-7 a:hover,.cl-effect-8 a:hover,.cl-effect-10 a::before,.cl-effect-11 a:hover::before,.cl-effect-13 a:hover,.cl-effect-14 a:hover,.cl-effect-15 a,.cl-effect-16 a::before,.cl-effect-17 a:hover,.cl-effect-17 a:hover,.cl-effect-18 a:hover,.cl-effect-19 a:hover,.cl-effect-20 a span::before,.cl-effect-21 a:hover'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.cl-effect-1 .cl-text.cl-text:hover,.cl-effect-2 a:hover span::before, .cl-effect-2 a:focus span::before,.cl-effect-3 a::after,.cl-effect-4 a:hover,.cl-effect-5 a:hover,.cl-effect-6 a:hover,.cl-effect-7 a:hover,.cl-effect-8 a:hover,.cl-effect-10 a::before,.cl-effect-11 a:hover::before,.cl-effect-13 a:hover,.cl-effect-14 a:hover::before,.cl-effect-14 a:hover::after,.cl-effect-15 a:hover,.cl-effect-16 a:hover,.cl-effect-17 a:hover::after,.cl-effect-17 a:hover::after,.cl-effect-18 a:hover,.cl-effect-19 a span::before,.cl-effect-20 a span::before,.cl-effect-21 a:hover'),
										array('property' => 'border-color', 'label' => 'Border Hover Color', 'selector' => '.cl-effect-1 .cl-text.cl-text:hover,.cl-effect-2 a:hover span::before, .cl-effect-2 a:focus span::before,.cl-effect-3 a::after,.cl-effect-4 a::after,.cl-effect-5 a:hover,.cl-effect-6 a:hover,.cl-effect-7 a:hover,.cl-effect-8 a:hover::after,.cl-effect-10 a:hover::before,.cl-effect-11 a:hover::before,.cl-effect-13 a:hover,.cl-effect-14 a:hover,.cl-effect-15 a:hover,.cl-effect-16 a:hover,.cl-effect-17 a:hover,.cl-effect-18 a:hover,.cl-effect-19 a:hover span::before,.cl-effect-20 a:hover span,.cl-effect-21 a:hover'),
										array('property' => 'background-color', 'label' => 'Line Hover Color', 'des' => 'Line hover color for effect: Trapdoor,Fancy Border,Cross Multiplication', 'selector' => '.cl-effect-6 a:hover::before,.cl-effect-6 a:hover::after,.cl-effect-7 a::after,.cl-effect-18 a:hover::before,.cl-effect-18 a:hover::after'),
									    array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.cl-effect-1 .cl-text:hover,.cl-effect-2 a span::before,.cl-effect-5 a:hover,.cl-effect-15 a:hover,.cl-effect-16 a:hover,.cl-effect-20 a:hover span::before'),
									)
								)
							)
						)
					),
					'animate' => array(
						array(
							'name'    => 'animate',
							'type'    => 'animate'
						)

					),
				)
			)

		));

	}

	public function creative_links($atts = array(), $content) {

		$output = $name = $show_icon = $icon = $icon_position = $link = $effect = $extra_class = $data_icon = $data_text = '';

		extract($atts);

		$master_class = apply_filters( 'kc-el-class', $atts );
		$master_class[] = 'kc-creative-links';
		if( !empty( $extra_class ) )
			$master_class[] = $extra_class;

		$link	= ( '||' === $link ) ? '' : $link;
		$link	= kc_parse_link($link);
		if ( strlen( $link['url'] ) > 0 ) {
			$a_href 	= $link['url'];
			$a_title 	= $link['title'];
			$a_target 	= strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
		}

		if( !isset( $a_href ) )
			$a_href = "#";

		$text_attr 	= array();
		if( isset( $a_href ) )
			$text_attr[] = 'href="'. esc_attr($a_href) .'"';

		if( isset( $a_target ) )
			$text_attr[] = 'target="'. esc_attr($a_target) .'"';

		if( isset( $a_title ) )
			$text_attr[] = 'title="'. esc_attr($a_title) .'"';

		$cl_class= array();
		$cl_class[] = 'kc-cl';
		$cl_class[] = $effect;

		if ( $show_icon == 'yes' ) {
			$data_icon .= ' <i class="'. $icon .'"></i> ';
			if ( $icon_position == 'left' )
				$data_text = $data_icon . $name;

			if ( $icon_position == 'right' )
				$data_text = $name . $data_icon;
		} else {
			$data_text = $name;
		}

		ob_start();
		?>

			<div class="<?php echo implode( ' ',$master_class ); ?>">
				<div class="<?php echo implode( ' ',$cl_class ); ?>">
					<?php if ( !empty( $name ) ): ?>

						<a class="cl-text" <?php echo implode( ' ', $text_attr ); ?> data-hover="<?php echo $name;?>">
							<span data-hover="<?php echo $name;?>"><?php echo $data_text; ?></span>
						</a>

					<?php endif ?>
				</div>
			</div>

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output .= $result;

		return $output;
	}

}
