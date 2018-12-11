<?php
/**
 * Implement Custom Header functionality for Shu
 *
 * @package WpOpal
 * @subpackage Shu
 * @since Shu 1.0
 */

/**
 * Set up the WordPress core custom header settings.
 *
 * @since Shu 1.0
 *
 * @uses shu_fnc_header_style()
 * @uses shu_fnc_admin_header_style()
 * @uses shu_fnc_admin_header_image()
 */
function shu_fnc_custom_header_setup() {
	/**
	 * Filter Shu custom-header support arguments.
	 *
	 * @since Shu 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type bool   $header_text            Whether to display custom header text. Default false.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 240.
	 *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
	 *     @type string $admin_head_callback    Callback function used to style the image displayed in
	 *                                          the Appearance > Header screen.
	 *     @type string $admin_preview_callback Callback function used to create the custom header markup in
	 *                                          the Appearance > Header screen.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'shu_fnc_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 1260,
		'height'                 => 240,
		'flex-height'            => true,
		'wp-head-callback'       => 'shu_fnc_header_style',
		'admin-head-callback'    => 'shu_fnc_admin_header_style',
		'admin-preview-callback' => 'shu_fnc_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'shu_fnc_custom_header_setup' );

if ( ! function_exists( 'shu_fnc_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see shu_fnc_custom_header_setup().
 *
 */
function shu_fnc_header_style() {  
    ?>
    <style type="text/css" id="shu-header-css">
        
        <?php
        $topbar_bg = get_option('shu_color_topbar_bg');
        if( !empty($topbar_bg) && preg_match("#\##", $topbar_bg) ) : ?>
            .opal-topbar{
                background-color:<?php echo esc_attr($topbar_bg); ?>;
            }
        <?php endif; ?>

        <?php
        $topbar_color = get_option('shu_color_topbar_color');
        if( !empty($topbar_color) && preg_match("#\##", $topbar_color) ) : ?>
            .opal-topbar, .opal-topbar a{
                color:<?php echo esc_attr($topbar_color); ?>;
            }
        <?php endif; ?>

        <?php
        $menu_color = get_option('shu_color_menu_color');
        if( !empty($menu_color) && preg_match("#\##", $menu_color) ) : ?>
            .navbar-mega .navbar-nav > li > a{
                color:<?php echo esc_attr($menu_color); ?>;
            }
        <?php endif; ?>

        <?php
        $menu_color_hover = get_option('shu_color_menu_color_hover');
        if( !empty($menu_color_hover) && preg_match("#\##", $menu_color_hover) ) : ?>
            .navbar-mega .navbar-nav li.active > a, .navbar-mega .navbar-nav > li > a:hover, .navbar-mega .navbar-nav > li > a:focus, .navbar-mega .navbar-nav > li > a:hover .caret, .navbar-mega .navbar-nav > li > a:focus .caret,.navbar-mega .navbar-nav li.active > a .caret{
                color:<?php echo esc_attr($menu_color_hover); ?>;
            }
        <?php endif; ?>

        <?php
        $category_bg = get_option('shu_color_category_bg');
        if( !empty($category_bg) && preg_match("#\##", $category_bg) ) : ?>
            .widget_product_categories, .widget_product_categories .widget-title, .widget_product_categories .widgettitle, .widget_product_categories .children{
                background-color:<?php echo esc_attr($category_bg); ?>;
            }
        <?php endif; ?>

        <?php
        $category_color = get_option('shu_color_category_color');
        if( !empty($category_color) && preg_match("#\##", $category_color) ) : ?>
            ul.product-categories li a, .widget_product_categories .children li a, .widget_product_categories .count, .widget_product_categories .children, .widget_product_categories .widget-title, .widget_product_categories .widgettitle{
                color:<?php echo esc_attr($category_color); ?>;
            }
        <?php endif; ?>

        <?php
        $footer_bg = get_option('shu_color_footer_bg');
        if( !empty($footer_bg) && preg_match("#\##", $footer_bg) ) : ?>
            .opal-footer{
                background-color:<?php echo esc_attr($footer_bg); ?>;
            }
        <?php endif; ?>

        <?php
        $footer_color = get_option('shu_color_footer_color');
        if( !empty($footer_color) && preg_match("#\##", $footer_color) ) : ?>
            .opal-footer, .opal-footer a, .opal-footer a span, .opal-footer .footer-center .widget .menu li a{
                color:<?php echo esc_attr($footer_color); ?>;
            }
        <?php endif; ?>

        <?php
        $heading_color = get_option('shu_color_heading_color');
        if( !empty($heading_color) && preg_match("#\##", $heading_color) ) : ?>
            .opal-footer .widget .widget-title, .opal-footer .widget .widgettitle, .opal-footer .footer-center .widget.widget_text .textwidget h4{
                color:<?php echo esc_attr($heading_color); ?>;
            }
        <?php endif; ?>

        <?php
        $copyright_bg = get_option('shu_color_copyright_bg');
        if( !empty($copyright_bg) && preg_match("#\##", $copyright_bg) ) : ?>
            .opal-copyright{
                background-color:<?php echo esc_attr($copyright_bg); ?>;
            }
        <?php endif; ?>

        <?php
        $copyright_color = get_option('shu_color_copyright_color');
        if( !empty($copyright_color) && preg_match("#\##", $copyright_color) ) : ?>
            .opal-copyright{
                color:<?php echo esc_attr($copyright_color); ?>;
            }
        <?php endif; ?>

    </style>
    <?php
    /* OpalTool: inject code */
    /* OpalTool: end inject code */
}
endif; // shu_fnc_header_style


if ( ! function_exists( 'shu_fnc_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 *
 * @see shu_fnc_custom_header_setup()
 *
 * @since Shu 1.0
 */
function shu_fnc_admin_header_style() {  
?>
	<style type="text/css" id="shu-admin-header-css">
	.appearance_page_custom-header #headimg {
		background-color: #000;
		border: none;
		max-width: 1260px;
		min-height: 48px;
	}
	#headimg h1 {
		font-family: Lato, sans-serif;
		font-size: 18px;
		line-height: 48px;
		margin: 0 0 0 30px;
	}
	.rtl #headimg h1  {
		margin: 0 30px 0 0;
	}
	#headimg h1 a {
		color: #fff;
		text-decoration: none;
	}
	#headimg img {
		vertical-align: middle;
	}

<?php
}
endif; // shu_fnc_admin_header_style

if ( ! function_exists( 'shu_fnc_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 *
 * @see shu_fnc_custom_header_setup()
 *
 * @since Shu 1.0
 */
function shu_fnc_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name" style="<?php echo esc_attr( sprintf( 'color: #%s;', get_header_textcolor() ) ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>" tabindex="-1"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
<?php
}
endif; // shu_fnc_admin_header_image