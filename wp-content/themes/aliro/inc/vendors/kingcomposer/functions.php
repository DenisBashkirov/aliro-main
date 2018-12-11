<?php

/**
 * Load woocommerce styles follow theme skin actived
 *
 * @static
 * @access public
 * @since Wpopal_Themer 1.0
 */

/// put your code here 

//add element Products
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
 add_action('init', 'shu_kc_woo_carousel_products_add_map_param', 99 );
}
function shu_kc_woo_carousel_products_add_map_param(){
 global $kc;

 $product_layouts = array(
  	'list' 	=> esc_html__('List', 'shu') ,
  	 'grid' => esc_html__('Grid', 'shu') 
	);

 $kc->add_map_param(
  'woo_grid_products',
   array(
		"type" => "select",
		"label" => esc_html__("Style",'shu'),
		"name" => "style",
		"options" => $product_layouts
	)
 , 3);

 $kc->add_map_param(
  'woo_category_subs',
   array(
		"type" => "textarea",
		"label" => esc_html__("Description",'shu'),
		"name" => "description",
		'description'   => esc_html__('Enter description for Category product', 'shu'),
	)
 , 4);

 
}