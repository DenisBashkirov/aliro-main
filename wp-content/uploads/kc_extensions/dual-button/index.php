<?php
/*
Extension Name: Dual Button
Extension Preview: http://extensions.kingcomposer.com/preview/dual-button/
Description: Create two button side by side on your content.
Version: 1.0
Author: King-Theme
Author URI: http://king-theme.com/
*/

if(!defined('ABSPATH')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}

class kc_extension_dual_button extends kc_extension {

	public function __construct() {

		// This is requried
		$this->init(__FILE__);

		/*
			Available variable
			$this->map(); //Add map
			$this->url; // Extension url
			$this->path; // Extensition path

		*/

		$this->output('kc-dual-button', array(&$this, 'dual_button'));

		$this->map(array(

			'kc-dual-button' => array(

				'name'			=> __( 'Dual Button', 'kingcomposer' ),
				'category'		=> __( 'Content', 'kingcomposer' ),
				'title'			=> __( 'Dual Button Settings', 'kingcomposer' ),
				'icon'			=> 'fa-clone',
				'pop_width'		=> 900,
				'live_editor' 	=> $this->path.'/live_editor.php',
				'description'	=> __( 'The dual button side by side', 'kingcomposer' ),
				'assets'		=> array(
					'styles' => array(
						'kc-dual-button' => $this->url.'/css/dual-button.css'
					)
				),
				'params' => array(
					'left' => array(
						array(
							'type'			=> 'text',
							'label'			=> __( 'Label Button Left', 'kingcomposer' ),
							'name'			=> 'text1',
							'description'	=> __( 'Add the text that appears on the left button.', 'kingcomposer' ),
							'value' 		=> __( 'Left Button', 'kingcomposer' ),
							'admin_label'	=> true
						),
						array(
							'type'			=> 'link',
							'label'			=> __( 'URL Button Left', 'kingcomposer' ),
							'name'			=> 'link1',
							'description'	=> __( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'kingcomposer' ),
						),
						array(
							'type' 			=> 'toggle',
							'name' 			=> 'show_icon1',
							'label' 		=> __( 'Show Icon Button Left?', 'kingcomposer' ),
							'description'	=> __( 'Display icon button left.', 'kingcomposer' ),
							'description' 	=> '',
						),
						array(
							'type' 			=> 'icon_picker',
							'name'		 	=> 'icon1',
							'label' 		=> __( 'Icon Button Left', 'kingcomposer' ),
							'value'         => 'fa-leaf',
							'description' 	=> __( 'Select icon for left button', 'kingcomposer' ),
							'relation'		=> array(
								'parent'	=> 'show_icon1',
								'show_when'	=> 'yes'
							)
						),
						array(
							'type'			=> 'dropdown',
							'name'			=> 'icon_position1',
							'label'			=> __( 'Icon Position Button Left', 'kingcomposer' ),
							'description'	=> __( '', 'kingcomposer'),
							'value'     	=> 'left',
							'options'		=> array(
								'left'	=> __('Left', 'kingcomposer'),
								'right'	=> __('Right', 'kingcomposer'),
							),
							'relation'		=> array(
								'parent'	=> 'show_icon1',
								'show_when'	=> 'yes'
							)
						),
						array(
							'type'			=> 'text',
							'label'			=> __( 'Extra Class', 'kingcomposer' ),
							'name'			=> 'extra_class',
							'description'	=> __( '', 'kingcomposer'),
							'value'			=> ''
						),
						array(
							'name' 		=> 'left_css',
							'label' 	=> __( 'Style Left Button', 'kingcomposer' ),
							'type' 		=> 'css',
							'options' 	=> array(
								array(
									'screens' => "any,1024,999,767,479",
									'Button' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'background', 'label' => 'Background', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-dual-button-one a'),
										array('property' => 'margin', 'label' => 'Icon Spacing', 'selector' => '.kc-dual-button-one a i')
									),
									'Button Hover' => array(
										array('property' => 'color', 'label' => 'Color Hover', 'selector' => '.kc-dual-button-one a:hover'),
										array('property' => 'background', 'label' => 'BG Hover', 'selector' => '.kc-dual-button-one a:hover'),
										array('property' => 'border-color', 'label' => 'Border Color Hover', 'selector' => '.kc-dual-button-one a:hover'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-dual-button-one a:hover'),
										array('property' => 'margin', 'label' => 'Icon Spacing Hover', 'selector' => '.kc-dual-button-one a:hover i')
									)
								)
							)
						)
					),
					'right' => array(
						array(
							'type'			=> 'text',
							'label'			=> __( 'Label Button Right', 'kingcomposer' ),
							'name'			=> 'text2',
							'description'	=> __( 'Add the text that appears on the button.', 'kingcomposer' ),
							'value' 		=> __( 'Right Button', 'kingcomposer' ),
							'admin_label'	=> true
						),
						array(
							'type'			=> 'link',
							'label'			=> __( 'URL Button Right', 'kingcomposer' ),
							'name'			=> 'link2',
							'description'	=> __( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'kingcomposer' ),
						),
						array(
							'type' 			=> 'toggle',
							'name' 			=> 'show_icon2',
							'label' 		=> __( 'Show Icon Button Right?', 'kingcomposer' ),
							'description'	=> __( 'Display icon right button.', 'kingcomposer' ),
							'description' 	=> '',
						),
						array(
							'type' 			=> 'icon_picker',
							'name'		 	=> 'icon2',
							'label' 		=> __( 'Icon Button Right', 'kingcomposer' ),
							'value'         => 'fa-leaf',
							'description' 	=> __( 'Select icon for button right', 'kingcomposer' ),
							'relation'		=> array(
								'parent'	=> 'show_icon2',
								'show_when'	=> 'yes'
							)
						),
						array(
							'type'			=> 'dropdown',
							'name'			=> 'icon_position2',
							'label'			=> __( 'Icon Position Button Right', 'kingcomposer' ),
							'description'	=> __( '', 'kingcomposer'),
							'value'     	=> 'left',
							'options'		=> array(
								'left'	=> __('Left', 'kingcomposer'),
								'right'	=> __('Right', 'kingcomposer'),
							),
							'relation'		=> array(
								'parent'	=> 'show_icon2',
								'show_when'	=> 'yes'
							)
						),
						array(
							'name' => 'right_css',
							'label' => 'Style Right Button',
							'type' => 'css',
							'options' => array(
								array(
									'screens' => "any,1024,999,767,479",
									'Button' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'background', 'label' => 'Background', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-dual-button-two a'),
										array('property' => 'margin', 'label' => 'Icon Spacing', 'selector' => '.kc-dual-button-two a i')
									),
									'Button Hover' => array(
										array('property' => 'color', 'label' => 'Color Hover', 'selector' => '.kc-dual-button-two a:hover'),
										array('property' => 'background', 'label' => 'BG Hover', 'selector' => '.kc-dual-button-two a:hover'),
										array('property' => 'border-color', 'label' => 'Border Color Hover', 'selector' => '.kc-dual-button-two a:hover'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-dual-button-two a:hover'),
										array('property' => 'margin', 'label' => 'Icon Spacing Hover', 'selector' => '.kc-dual-button-two a:hover i')
									)
								)
							)
						)
					),
					'separator' => array(
						array(
							'type'			=> 'dropdown',
							'name'			=> 'middle_text',
							'label'			=> __( 'Separator', 'kingcomposer' ),
							'description'	=> __( '', 'kingcomposer'),
							'value'     	=> 'icon',
							'options'		=> array(
								'none'	=> __('None', 'kingcomposer'),
								'text'	=> __('Text', 'kingcomposer'),
								'icon'	=> __('Icon', 'kingcomposer')
							)
						),
						array(
							'type' 			=> 'icon_picker',
							'name'		 	=> 'icon3',
							'label' 		=> __( 'Icon', 'kingcomposer' ),
							'value'         => 'fa-star',
							'description' 	=> __( 'Select icon for middle 2 button', 'kingcomposer' ),
							'relation'		=> array(
								'parent'	=> 'middle_text',
								'show_when'	=> 'icon'
							)
						),
						array(
							'type'			=> 'text',
							'label'			=> __( 'Text', 'kingcomposer' ),
							'name'			=> 'text_middle',
							'description' 	=> __( 'Insert text middle', 'kingcomposer' ),
							'value'			=> __( 'text', 'kingcomposer' ),
							'relation'		=> array(
								'parent'	=> 'middle_text',
								'show_when'	=> 'text'
							)
						),
						array(
							'name' => 'separator_css',
							'label' => 'Style Separator',
							'type' => 'css',
							'options' => array(
								array(
									'screens' => "any,1024,999,767,479",
									'Style' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.kc-middle-text span, .kc-middle-text i'),
										array('property' => 'background', 'label' => 'Background', 'selector' => '.kc-middle-text'),
										array('property' => 'height', 'label' => 'Height', 'selector' => '.kc-middle-text'),
										array('property' => 'width', 'label' => 'Width', 'selector' => '.kc-middle-text'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.kc-middle-text span, .kc-middle-text i'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-middle-text span, .kc-middle-text i'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-middle-text span, .kc-middle-text i'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-middle-text'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-middle-text'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-middle-text'),
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
					)
				)
			)

		));

	}

	public function dual_button( $atts = array(), $content ) {

		$output = $text1 = $link1 = $show_icon1 = $icon1 = $icon_position1 = $text2 = $link2 = $show_icon2 = $icon2 = $icon_position2 = $middle_text = $icon3 = $text_middle = $extra_class = '';

		extract($atts);

		$el_classes = apply_filters( 'kc-el-class', $atts );
		$el_classes[] = 'kc-dual-button';
		if( !empty( $extra_class ) )
			$el_classes[] = $extra_class;

		// Link button 1
		$link1	= ( '||' === $link1 ) ? '' : $link1;
		$link1	= kc_parse_link($link1);
		if ( strlen( $link1['url'] ) > 0 ) {
			$a_href1 	= $link1['url'];
			$a_title1 	= $link1['title'];
			$a_target1 	= strlen( $link1['target'] ) > 0 ? $link1['target'] : '_self';
		}

		if( !isset( $a_href1 ) )
			$a_href1 = "#";

		$button_attr1 	= array();
		if( isset( $a_href1 ) )
			$button_attr1[] = 'href="'. esc_attr($a_href1) .'"';

		if( isset( $a_target1 ) )
			$button_attr1[] = 'target="'. esc_attr($a_target1) .'"';

		if( isset( $a_title1 ) )
			$button_attr1[] = 'title="'. esc_attr($a_title1) .'"';

		// Link button 2
		$link2	= ( '||' === $link2 ) ? '' : $link2;
		$link2	= kc_parse_link($link2);
		if ( strlen( $link2['url'] ) > 0 ) {
			$a_href2 	= $link2['url'];
			$a_title2 	= $link2['title'];
			$a_target2 	= strlen( $link2['target'] ) > 0 ? $link2['target'] : '_self';
		}

		if( !isset( $a_href2 ) )
			$a_href2 = "#";

		$button_attr2 	= array();
		if( isset( $a_href2 ) )
			$button_attr2[] = 'href="'. esc_attr($a_href2) .'"';

		if( isset( $a_target2 ) )
			$button_attr2[] = 'target="'. esc_attr($a_target2) .'"';

		if( isset( $a_title2 ) )
			$button_attr2[] = 'title="'. esc_attr($a_title2) .'"';

		ob_start();

		?>

			<div class="<?php echo implode( ' ', $el_classes ); ?>">
				<div class="kc-dual-button-wrap">
					<div class="kc-dual-button-one">
						<a <?php echo implode(' ', $button_attr1); ?>>
							<?php
								if ( $show_icon1 == 'yes' ) {
									if ( $icon_position1 == 'left' ) {
										echo '<i class="'. esc_attr( $icon1 ).'"></i> '. esc_html( $text1 ) ;
									} else {
										echo esc_html( $text1 ) . ' <i class="'. esc_attr( $icon1 ) .'"></i>';
									}
								} else {
									echo esc_html( $text1 );
								}
							?>
						</a>
						<?php if ( $middle_text != 'none' ): ?>
							<div class="kc-middle-text">
								<?php if ( $middle_text == 'text' ): ?>
									<span><?php echo $text_middle; ?></span>
								<?php else: ?>
									<i class="<?php echo esc_attr( $icon3 ); ?>"></i>
								<?php endif ?>
							</div>
						<?php endif ?>
					</div>
					<div class="kc-dual-button-two">
						<a <?php echo implode(' ', $button_attr2); ?>>
							<?php
								if ( $show_icon2 == 'yes' ) {
									if ( $icon_position2 == 'left' ) {
										echo '<i class="'. esc_attr( $icon2 ).'"></i> '. esc_html( $text2 ) ;
									} else {
										echo esc_html( $text2 ) . ' <i class="'. esc_attr( $icon2 ) .'"></i>';
									}
								} else {
									echo esc_html( $text2 );
								}
							?>
						</a>
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
