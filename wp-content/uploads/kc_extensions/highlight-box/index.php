<?php
/*
Extension Name: Highlight Box
Extension Preview: http://extensions.kingcomposer.com/preview/highlight-box/
Description: Create blocks with special effects when hovering over.
Version: 1.0
Author: King-Theme
Author URI: http://king-theme.com/
*/

if(!defined('ABSPATH')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class kc_extension_highlight_box extends kc_extension {

	public function __construct() {

		// This is requried
		$this->init(__FILE__);

		/*
			Available variable
			$this->map(); //Add map
			$this->url; // Extension url
			$this->path; // Extensition path

		*/

		$this->output('kc-highlight-box', array(&$this, 'highlight_box'));

		$this->map(array(

			'kc-highlight-box' => array(

				'name' 		=> __( 'Highlight Box', 'kingcomposer' ),
				'category' 	=> __( 'Content', 'kingcomposer' ),
				'title' 	=> __( 'Highlight Box Settings', 'kingcomposer' ),
				'icon' 		=> 'fa-star',
				'pop_width' => 900,
				'live_editor' => $this->path.'/live_editor.php',
				'nested'		=> true,
				'accept_child'	=> 'kc_column_text,kc_title,kc_row_inner,kc_box,kc_tabs,kc_accordion,kc_spacing,kc_raw_code,kc_single_image,kc_icon,kc_title,kc_google_maps,kc_twitter_feed,kc_instagram_feed,kc_fb_recent_post,kc_flip_box,kc_pie_chart,kc_progress_bars,kc_button,kc_video_play,kc_counter_box,kc_post_type_list,kc_carousel_images,kc_carousel_post,kc_image_gallery,kc_coundown_timer,kc_divider,kc_box_alert,kc_feature_box,kc_testimonial,kc_team,kc_pricing,kc_dropcaps,kc_image_fadein,kc_image_hover_effects,kc_creative_button,kc_call_to_action,tooltip,kc_multi_icons,kc_blog_posts',
				'description' => __( 'Create blocks with special effects when hovering over.', 'kingcomposer' ),
				'assets' => array(
					'scripts' => array(
						'kc-highlight-box' => $this->url.'/js/kc-highlight-box.js',
					),
					'styles' => array(
						'kc-highlight-box' => $this->url.'/css/highlight-box.css'
					)
				),
				'active_status' => array(
					'selector'  => '+.kc-highlight-box',
				),
				'preview_menu' => array(
					'Active Front Side'  => 'kc-active-front',
					'Active Back Side'  => 'kc-active-back',
				),
				'params' => array(
					'general' => array(
						array(
							'name' 			=> 'icon',
							'label'			=> __( 'Icon When Hover Box', 'kingcomposer' ),
							'description'	=> __( 'Icon display when hover box.', 'kingcomposer' ),
							'type' 			=> 'icon_picker',
							'value' 		=> 'fa-star',
						),
						array(
							'name'			=> 'link',
							'label'			=> __('Link URL', 'kingcomposer'),
							'type'			=> 'link',
							'value'			=> '#',
							'description' 	=> __('The URL which box assigned to. You can select page/post or other post type', 'kingcomposer')
						),
						array(
							'name' 			=> 'effect',
							'label' 		=> __( 'Hover Effect', 'kingcomposer' ),
							'type' 			=> 'select',
							'options' 		=> array(
								'slide-up' 		=> __( 'Slide Up', 'kingcomposer' ),
								'slide-down' 	=> __( 'Slide Down', 'kingcomposer' ),
								'slide-left' 	=> __( 'Slide Left', 'kingcomposer' ),
								'slide-right' 	=> __( 'Slide Right', 'kingcomposer' ),
								'fade' 	        => __( 'Fade', 'kingcomposer' ),
								'scale' 	    => __( 'Scale', 'kingcomposer' ),
								'rotate' 	    => __( 'Rotate', 'kingcomposer' ),
							),
							'description' 	=> __( 'Select style layout display.', 'kingcomposer' ),
							'value'			=> 'slide-up'
						),
						array(
							'name' 			=> 'animates',
							'label' 		=> __( 'Animate', 'kingcomposer' ),
							'type' 			=> 'select',
							'options' 		=> array(
								'none' 		    => __( 'None', 'kingcomposer' ),
								'bounce' 		=> __( 'Bounce', 'kingcomposer' ),
								'bounce-in' 	=> __( 'Bounce In', 'kingcomposer' ),
								'pulse' 		=> __( 'Pulse', 'kingcomposer' ),
								'rubber-band' 	=> __( 'Rubber Band', 'kingcomposer' ),
								'swing' 		=> __( 'Swing', 'kingcomposer' ),
								'tada' 	        => __( 'Tada', 'kingcomposer' ),
								'jello' 	    => __( 'Jello', 'kingcomposer' ),
								'flash' 	    => __( 'Flash', 'kingcomposer' ),
							),
							'description' 	=> __( 'Select animate display.', 'kingcomposer' ),
							'value'			=> 'none'
						),
						array(
							'type'			=> 'number_slider',
							'name'			=> 'delay',
							'label'			=> __('Swing Delay','kingcomposer'),
							'value'			=> '3',
							'description'	=> __( 'The delay time for moving effect to next sentence.', 'kingcomposer'),
							'options' 		=> array(
								'min' => 3,
								'max' => 10
							),
						),
						array(
							'type'			=> 'text',
							'label'			=> __( 'Extra Class', 'kingcomposer' ),
							'name'			=> 'extra_class',
							'description'	=> __( '', 'kingcomposer'),
							'value'			=> ''
						)
					),
					'styling' => array(
						array(
							'name'	=> 'css_custom',
							'type'	=> 'css',
							'options' => array(
								array(
									"screens" => "any,1024,999,767,479",
									'Icon Hover' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.kc-hb-icon i'),
										array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => '.kc-hb-icon i'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-hb-icon i')
									),
									'Box' => array(
										array('property' => 'background', 'label' => 'Background'),
										array('property' => 'border', 'label' => 'Border'),
										array('property' => 'box-shadow', 'label' => 'Box Shadow'),
										array('property' => 'border-radius', 'label' => 'Border Radius'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'margin', 'label' => 'Margin'),
									),
									'Box Hover' => array(
										array('property' => 'background', 'label' => 'Background', 'selector' => '+:hover'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '+:hover'),
										array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '+:hover'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+:hover'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '+:hover'),
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

	public function highlight_box( $atts = array(), $content ) {

		$output = $icon = $effect = $animates = $link = $extra_class = $data_icon = $delay = '';

		extract($atts);

		$el_classes = apply_filters( 'kc-el-class', $atts );
		$new_class  = $el_classes;
		$el_classes[] = 'kc-highlight-box';
		$el_classes[] = 'kc-hb-' . $effect;

		$data_animate   = 'kc-hb-' . $animates;

		if( !empty( $extra_class ) )
			$el_classes[] = $extra_class;

		// Link button
		$link	= ( '||' === $link ) ? '' : $link;
		$link	= kc_parse_link($link);
		if ( strlen( $link['url'] ) > 0 ) {
			$a_href 	= $link['url'];
			$a_title 	= $link['title'];
			$a_target 	= strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
		}

		if( !isset( $a_href ) )
			$a_href = "#";

		$button_attr 	= array();
		if( isset( $a_href ) )
			$button_attr[] = 'href="'. esc_attr($a_href) .'"';

		if( isset( $a_target ) )
			$button_attr[] = 'target="'. esc_attr($a_target) .'"';

		if( isset( $a_title ) )
			$button_attr[] = 'title="'. esc_attr($a_title) .'"';

		$button_attr[] = 'class="kc-hb-overlay"';

		$data_icon  = '<i class="'. $icon .'"></i>';

		ob_start();

		?>

			<div class="<?php echo implode( ' ', $el_classes ); ?>" data-delay="<?php echo $delay;?>" data-animate="<?php echo $data_animate;?>">

				<div class="kc-hb-content">
					<?php echo do_shortcode( str_replace('the_nested_element#', 'the_nested_element', $content ) ); ?>
				</div>
				<div class="kc-hb-icon">
					<?php echo $data_icon; ?>
				</div>
				<a <?php echo implode(' ', $button_attr); ?> >&nbsp;</a>

			</div>

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output .= $result;

		return $output;

	}

}
