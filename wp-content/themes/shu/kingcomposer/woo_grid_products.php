<?php 
	$atts  = array_merge( array(
		'per_page'  => 8,
		'columns'	=> 4,
		'type'		=> 'recent_products',
		'category'	=> '',
		'woocategory' => '',
	), $atts); 
	extract( $atts );	
	if( empty($type) ){
		return ;
	}

	$_count = 0;
	$class= array();


	if ( isset($woocategory) && !empty($woocategory) ){
		$categories = wpopal_themer_autocomplete_options_helper( $woocategory );
	}else {
		$categories = '';
	}

	$loop = wpopal_themer_woocommerce_query( $type, $per_page , $categories  );

	switch ($columns) {
        case '5':
        case '4':
            $class_column='col-sm-6 col-md-3';
            $columns = 4; 
            break;
        case '3':
            $class_column='col-xs-12 col-sm-6 col-md-4 col-lg-4';
            break;
        case '2':
            $class_column='col-sm-6';
            break;
        default:
            $class_column='col-sm-12 list';
            break;
    }
    $_style = ($style =='grid')? 'inner': $style;

 
?>
<?php if( $loop->have_posts()): ?>
<ul class="products-collection <?php echo ($style == 'list') ? 'list-products-collection' : ''; ?> woocommerce row">
	<?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
		<?php if($_count%$columns==0):
			$_class = 'first';
		else:
			$_class = '';
		endif; 
		$_count++; 
		?>
			<div class="<?php echo esc_attr($class_column). ' '.esc_attr( $_class ); ?>"><?php wc_get_template_part( 'content-product', $_style ); ?></div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>
</ul>
