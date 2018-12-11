<?php

function shu_fnc_import_remote_demos() { 
	return array(
		'shu' => array( 
			'name' 		=> 'shu', 
		 	'source'	=> 'http://wpsampledemo.com/shu/shu.zip',
		 	'preview1'   => 'http://wpsampledemo.com/shu/screenshot.png'
		),
	);
}

add_filter( 'wpopal_themer_import_remote_demos', 'shu_fnc_import_remote_demos' );



function shu_fnc_import_theme() {
	return 'shu';
}
add_filter( 'wpopal_themer_import_theme', 'shu_fnc_import_theme' );

function shu_fnc_import_demos() {
	$folderes = glob( get_template_directory() .'/inc/import/*', GLOB_ONLYDIR ); 

	$output = array(); 

	foreach( $folderes as $folder ){
		$output[basename( $folder )] = basename( $folder );
	}
 	
 	return $output;
}
add_filter( 'wpopal_themer_import_demos', 'shu_fnc_import_demos' );

function shu_fnc_import_types() {
	return array(
			'all' => 'All',
			'content' => 'Content',
			'widgets' => 'Widgets',
			'page_options' => 'Theme + Page Options',
			'menus' => 'Menus',
			'rev_slider' => 'Revolution Slider',
			'vc_templates' => 'VC Templates'
		);
}
add_filter( 'wpopal_themer_import_types', 'shu_fnc_import_types' );
/**
 * Matching and resizing images with url.
 *
 *  $ouput = array(
 *        'allowed' => 1, // allow resize images via using GD Lib php to generate image
 *        'height'  => 900,
 *        'width'   => 800,
 *        'file_name' => 'blog_demo.jpg'
 *   ); 
 */
function shu_import_attachment_image_size( $url ){  

   $name = basename( $url );   
 
   $ouput = array(
         'allowed' => 0
   );     
   
   if( preg_match("#product#", $name) ) {
      $ouput = array(
         'allowed' => 1,
         'height'  => 600,
         'width'   => 600,
         'file_name' => 'product_demo.jpg'
      ); 
   }
   elseif( preg_match("#blog#", $name) ){
      $ouput = array(
         'allowed' => 1,
         'height'  => 593,
         'width'   => 890,
         'file_name' => 'blog_demo.jpg'
      ); 
   }
   return $ouput;
}

add_filter( 'pbrthemer_import_attachment_image_size', 'shu_import_attachment_image_size' , 1 , 999 );