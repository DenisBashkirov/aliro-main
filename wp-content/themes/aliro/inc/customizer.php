<?php
/**
 * mode Customizer support
 *
 * @package WpOpal
 * @subpackage shu
 * @since shu 1.0
 */
//Update logo wordpress 4.5
if (version_compare($GLOBALS['wp_version'], '4.5', '>=')) {
    function shu_fnc_setup_logo()
    {
        add_theme_support('custom-logo');
    }

    add_action('after_setup_theme', 'shu_fnc_setup_logo');
}
if ( ! function_exists( 'shu_fnc_customize_register' ) ) :
function shu_fnc_customize_register($wp_customize){
    $wp_customize->remove_section('colors');

    // Add Panel Colors
    $wp_customize->add_panel('colors', array(
        'priority' => 15,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Colors', 'shu'),
    ));
    /* OpalTool: inject code */
    /* OpalTool: end inject code */
        // Add Section header
    $wp_customize->add_section('shu_color_header', array(
        'title'      => esc_html__('Header', 'shu'),
        'transport'  => 'postMessage',
        'priority'   => 10,
        'panel'      => 'colors'
    ));    // Add setting topbar_bg
    $wp_customize->add_setting('shu_color_topbar_bg', array(
        'default'    => get_option('shu_color_topbar_bg'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control topbar_bg
    $wp_customize->add_control('shu_color_topbar_bg', array(
        'label'    => esc_html__('Topbar Background', 'shu'),
        'section'  => 'shu_color_header',
        'type'      => 'color',
    ) );
    // Add setting topbar_color
    $wp_customize->add_setting('shu_color_topbar_color', array(
        'default'    => get_option('shu_color_topbar_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control topbar_color
    $wp_customize->add_control('shu_color_topbar_color', array(
        'label'    => esc_html__('Topbar color', 'shu'),
        'section'  => 'shu_color_header',
        'type'      => 'color',
    ) );
    // Add setting menu_color
    $wp_customize->add_setting('shu_color_menu_color', array(
        'default'    => get_option('shu_color_menu_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control menu_color
    $wp_customize->add_control('shu_color_menu_color', array(
        'label'    => esc_html__('Megamenu color', 'shu'),
        'section'  => 'shu_color_header',
        'type'      => 'color',
    ) );
    // Add setting menu_color_hover
    $wp_customize->add_setting('shu_color_menu_color_hover', array(
        'default'    => get_option('shu_color_menu_color_hover'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control menu_color_hover
    $wp_customize->add_control('shu_color_menu_color_hover', array(
        'label'    => esc_html__('Megamenu Hover color', 'shu'),
        'section'  => 'shu_color_header',
        'type'      => 'color',
    ) );
    // Add Section block_highlight
    $wp_customize->add_section('shu_color_block_highlight', array(
        'title'      => esc_html__('Block Highlight', 'shu'),
        'transport'  => 'postMessage',
        'priority'   => 10,
        'panel'      => 'colors'
    ));    // Add setting category_bg
    $wp_customize->add_setting('shu_color_category_bg', array(
        'default'    => get_option('shu_color_category_bg'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control category_bg
    $wp_customize->add_control('shu_color_category_bg', array(
        'label'    => esc_html__('Category Bg', 'shu'),
        'section'  => 'shu_color_block_highlight',
        'type'      => 'color',
    ) );
    // Add setting category_color
    $wp_customize->add_setting('shu_color_category_color', array(
        'default'    => get_option('shu_color_category_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control category_color
    $wp_customize->add_control('shu_color_category_color', array(
        'label'    => esc_html__('Category Color', 'shu'),
        'section'  => 'shu_color_block_highlight',
        'type'      => 'color',
    ) );
    // Add Section footer
    $wp_customize->add_section('shu_color_footer', array(
        'title'      => esc_html__('Footer', 'shu'),
        'transport'  => 'postMessage',
        'priority'   => 10,
        'panel'      => 'colors'
    ));    // Add setting footer_bg
    $wp_customize->add_setting('shu_color_footer_bg', array(
        'default'    => get_option('shu_color_footer_bg'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control footer_bg
    $wp_customize->add_control('shu_color_footer_bg', array(
        'label'    => esc_html__('Footer BG', 'shu'),
        'section'  => 'shu_color_footer',
        'type'      => 'color',
    ) );
    // Add setting footer_color
    $wp_customize->add_setting('shu_color_footer_color', array(
        'default'    => get_option('shu_color_footer_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control footer_color
    $wp_customize->add_control('shu_color_footer_color', array(
        'label'    => esc_html__('Footer Color', 'shu'),
        'section'  => 'shu_color_footer',
        'type'      => 'color',
    ) );
    // Add setting heading_color
    $wp_customize->add_setting('shu_color_heading_color', array(
        'default'    => get_option('shu_color_heading_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control heading_color
    $wp_customize->add_control('shu_color_heading_color', array(
        'label'    => esc_html__('Heading Color', 'shu'),
        'section'  => 'shu_color_footer',
        'type'      => 'color',
    ) );
    // Add setting copyright_bg
    $wp_customize->add_setting('shu_color_copyright_bg', array(
        'default'    => get_option('shu_color_copyright_bg'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control copyright_bg
    $wp_customize->add_control('shu_color_copyright_bg', array(
        'label'    => esc_html__('Footer Copyright Background', 'shu'),
        'section'  => 'shu_color_footer',
        'type'      => 'color',
    ) );
    // Add setting copyright_color
    $wp_customize->add_setting('shu_color_copyright_color', array(
        'default'    => get_option('shu_color_copyright_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    // Add Control copyright_color
    $wp_customize->add_control('shu_color_copyright_color', array(
        'label'    => esc_html__('Copyright Color', 'shu'),
        'section'  => 'shu_color_footer',
        'type'      => 'color',
    ) );

}
endif;
add_action('customize_register', 'shu_fnc_customize_register', 99);