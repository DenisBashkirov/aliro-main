<?php
/*
Extension Name: Cube Box
Extension Preview: http://extensions.kingcomposer.com/preview/cube-box/
Description: Create a box with a 3D effect when hovering over.
Version: 1.0
Author: King-Theme
Author URI: http://king-theme.com/
*/

if(!defined('ABSPATH')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class kc_extension_cube_box extends kc_extension {

	public function __construct() {

		// This is requried
		$this->init(__FILE__);

		/*
			Available variable
			$this->map(); //Add map
			$this->url; // Extension url
			$this->path; // Extensition path

		*/

		$this->output('kc-cube-box', array(&$this, 'cube_box'));

		$this->map(array(

			'kc-cube-box' => array(

				'name' 			=> __( 'Cube Box', 'kingcomposer' ),
				'category' 		=> __( 'Content', 'kingcomposer' ),
				'title' 		=> __( 'Cube Box Settings', 'kingcomposer' ),
				'icon' 			=> 'fa-cube',
				'pop_width' 	=> 900,
				'live_editor' 	=> $this->path.'/live_editor.php',
				'nested'		=> true,
				'accept_child'	=> 'kc_column_text,kc_title,kc_row_inner,kc_box,kc_tabs,kc_accordion,kc_spacing,kc_raw_code,kc_single_image,kc_icon,kc_title,kc_google_maps,kc_twitter_feed,kc_instagram_feed,kc_fb_recent_post,kc_flip_box,kc_pie_chart,kc_progress_bars,kc_button,kc_video_play,kc_counter_box,kc_post_type_list,kc_carousel_images,kc_carousel_post,kc_image_gallery,kc_coundown_timer,kc_divider,kc_box_alert,kc_feature_box,kc_testimonial,kc_team,kc_pricing,kc_dropcaps,kc_image_fadein,kc_image_hover_effects,kc_creative_button,kc_call_to_action,tooltip,kc_multi_icons,kc_blog_posts',
				'description' 	=> __( 'Create a box with a 3D effect when hovering over.', 'kingcomposer' ),
				'assets' => array(
					'styles' => array(
						'kc-cube-box' => $this->url.'/css/cube-box.css'
					)
				),
				'preview_menu' => array(
					'Active Back Side'  => 'kc-active-back',
				),
				'params' => array(
					'front' => array(
						array(
							'type'			=> 'dropdown',
							'name'			=> 'show_on',
							'label'			=> __( 'Show Image or Icon', 'kingcomposer' ),
							'description'	=> __( 'Display image or icon on top box', 'domain' ),
							'value'     	=> 'Icon',
							'options'		=> array(
								'icon'		=> __('Icon', 'kingcomposer'),
								'image'		=> __('Image', 'kingcomposer'),
								'none'		=> __('None', 'kingcomposer')
							)
						),
						array(
							'type' 			=> 'icon_picker',
							'name'		 	=> 'icon',
							'label' 		=> __( 'Icon', 'kingcomposer' ),
							'value'         => 'fa-leaf',
							'description' 	=> __( 'Select icon display', 'kingcomposer' ),
							'relation'		=> array(
								'parent'	=> 'show_on',
								'show_when'	=> 'icon'
							)
						),
						array(
							'name'			=> 'image',
							'label'			=> 'Image',
							'type'			=> 'attach_image',
							'description'	=> __( '', 'kingcomposer'),
							'relation'		=> array(
								'parent'	=> 'show_on',
								'show_when'	=> 'image'
							)
						),
						array(
							'name'          => 'image_size',
							'label'         => 'Image Size',
							'type'          => 'text',
							'value'         => 'full',
							'relation'      => array(
								'parent'    => 'show_on',
								'show_when' => 'image'
							),
							'description'   => __('Set the image size: "thumbnail", "medium", "large", "full" or "400x200"', 'kingcomposer'),
						),
						array(
							'type'			=> 'text',
							'label'			=> __( 'Cube Box Title', 'kingcomposer' ),
							'name'			=> 'title',
							'description'	=> __( '', 'kingcomposer'),
							'value'			=> __( 'Insert Title', 'kingcomposer' )
						),
						array(
							'type'			=> 'textarea',
							'label'			=> __( 'Description', 'kingcomposer' ),
							'name'			=> 'desc',
							'description'	=> __( '', 'kingcomposer'),
							'value'			=> ''
						),
						array(
							'name' 			=> 'vertical',
							'label' 		=> __( 'Align Middle Vertical Content', 'kingcomposer' ),
							'type' 			=> 'toggle',
							'description' 	=> __( 'Set content on front as middle of box', 'kingcomposer' ),
						),
						array(
							'type'			=> 'dropdown',
							'name'			=> 'effect',
							'label'			=> __( 'Rotate Effect', 'kingcomposer' ),
							'description'	=> __( 'Select overlay hover effect box.', 'kingcomposer' ),
							'value'     	=> 'top',
							'options'		=> array(
								'top'		=> __('Top To Bottom', 'kingcomposer'),
								'right'		=> __('Right To Left', 'kingcomposer'),
								'bottom'	=> __('Bottom To Top', 'kingcomposer'),
								'left'		=> __('Left To Right', 'kingcomposer')
							)
						),
						array(
							'type'			=> 'text',
							'label'			=> __( 'Main Class', 'kingcomposer' ),
							'name'			=> 'extra_class',
							'description'	=> __( '', 'kingcomposer'),
							'value'			=> ''
						),
						array(
							'name'	=> 'front_css',
							'type'	=> 'css',
							'options' => array(
								array(
									"screens" => "any,1024,999,767,479",
									'Title' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.kc-cbx-title'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-cbx-title'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.kc-cbx-title'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-cbx-title'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-cbx-title'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc-cbx-title'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-cbx-title'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-cbx-title'),
									),
									'Desc' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.kc-cbx-desc'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-cbx-desc'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.kc-cbx-desc'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-cbx-desc'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-cbx-desc'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc-cbx-desc'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-cbx-desc'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-cbx-desc'),
									),
									'Icon' => array(
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'color', 'label' => 'Color', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'height', 'label' => 'Height', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'width', 'label' => 'Width', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.kc-cbx-icon'),
										array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.kc-cbx-icon'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-cbx-icon i'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-cbx-icon'),
									),
									'Image' => array(
										array('property' => 'width', 'label' => 'Width', 'selector' => '.kc-cbx-image img'),
										array('property' => 'height', 'label' => 'Height', 'selector' => '.kc-cbx-image img'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.kc-cbx-image'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-cbx-image img'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-cbx-image img'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-cbx-image'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-cbx-image'),
									),
								)
							)
						)
					),
					'styling' => array(
						array(
							'name'	=> 'css_custom',
							'type'	=> 'css',
							'options' => array(
								array(
									"screens" => "any,1024,999,767,479",
									'Front Box' => array(
										array('property' => 'height', 'label' => 'Height', 'selector' => ',.kc-cbx-front,.kc-cbx-back'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-cbx-front-content'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.kc-cbx-front'),
										array('property' => 'background', 'label' => 'Background', 'selector' => '.kc-cbx-front-content'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-cbx-front-content'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-cbx-front-content'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-cbx-front-content .kc-cbx-box-content'),
									),
									'Back Box' => array(
										array('property' => 'background', 'label' => 'Background', 'selector' => '.kc-cbx-back-content'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-cbx-back-content'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-cbx-back-content'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-cbx-back-content'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-cbx-back-content .kc-cbx-box-content'),
									),
								)
							)
						)
					),
					'animate' => array(
						array(
							'name'    => 'animate',
							'type'    => 'animate'
						)
					)
				)
			)

		));

	}

	public function cube_box( $atts = array(), $content ) {

		$output = $show_on = $icon = $image = $image_size = $title = $desc = $effect = $extra_class = $vertical = '';
		$image_size = 'full';

		extract($atts);

		$el_classes = apply_filters( 'kc-el-class', $atts );

		$el_classes[] = 'kc-cbx';
		$el_classes[] = 'kc-cbx-' . $effect;
		if( !empty( $extra_class ) )
			$el_classes[] = $extra_class;

		if( $vertical == 'yes'){
			$el_classes[] = 'kc-cbx-middle';
		}

		ob_start();

		?>

			<div class="<?php echo implode( ' ', $el_classes ); ?>">
				<div class="kc-cbx-front">
					<div class="kc-cbx-front-content">
						<div class="kc-cbx-box-content">
							<?php switch ( $show_on ) {
								case 'icon':
							?>
									<div class="kc-cbx-icon"><?php echo '<i class="'. esc_attr( $icon ).'"></i>'; ?></div>
							<?php
								break;
								case 'image':
									if ( $image > 0 ) {
										$image_full_width	= wp_get_attachment_image_src( $image, 'full' );
										$image_url			= $image_full_width[0];

										if( !empty( $image_size ) ) {
											$image_url	= kc_tools::createImageSize( $image_url, $image_size );
										}

							?>
										<div class="kc-cbx-image"><img src="<?php echo esc_url( $image_url ); ?>" alt=""></div>
							<?php
									}
								break;
								default:

								break;
							} ?>

							<?php if ( $title ): ?>
								<div class="kc-cbx-title"><?php echo $title; ?></div>
							<?php endif ?>

							<?php if ( $desc ): ?>
								<div class="kc-cbx-desc"><?php echo $desc; ?></div>
							<?php endif ?>
						</div>
					</div>
				</div>

				<div class="kc-cbx-back">
					<div class="kc-cbx-back-content">
						<div class="kc-cbx-box-content"><?php echo do_shortcode( str_replace('the_nested_element#', 'the_nested_element', $content ) ); ?></div>
					</div>
				</div>
			</div>

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output .= $result;

		return $output;

	}

}
