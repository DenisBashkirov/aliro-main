<?php 
global $product;
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($product->get_id() ), 'blog-thumbnails' );

?>
<div class="product-block" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
	<div class="row">
		<div class="col-md-3 col-lg-3 col-sm-3">
		    <figure class="image">
		        <?php woocommerce_show_product_loop_sale_flash(); ?>
		        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="product-image zoom">
		            <?php
		                /**
		                * woocommerce_before_shop_loop_item_title hook
		                *
		                * @hooked woocommerce_show_product_loop_sale_flash - 10
		                * @hooked woocommerce_template_loop_product_thumbnail - 10
		                */
		                remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
		                do_action( 'woocommerce_before_shop_loop_item_title' );
		            ?>
		        </a>		        
		    </figure>
		</div>    
	    <div class="col-md-6 col-lg-6 col-sm-6">
		    <div class="caption-list">
		        <div class="meta">

		         <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		            <?php the_excerpt();  ?>
		        </div>   		        
		    </div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3">
			<div class="product-assets">
				
				<?php
	                /**
	                * woocommerce_after_shop_loop_item_title hook
	                *
	                * @hooked woocommerce_template_loop_rating - 5
	                * @hooked woocommerce_template_loop_price - 10
	                */
	                do_action( 'woocommerce_after_shop_loop_item_title');

	            ?>
	            <div class="action-bottom clearfix">                
	            	<?php wc_get_template_part( 'woocommerce', 'wishlist' ); ?>
            		<?php wc_get_template_part( 'woocommerce', 'compare' ); ?>

		            <?php if(shu_fnc_theme_options('is-quickview', true)){ ?>
		                <div class="quick-view hidden-xs">
		                    <a title="<?php esc_html_e( 'Quick view', 'shu' ); ?>" href="#" class="quickview" data-productslug="<?php echo trim($product->get_slug()); ?>" data-toggle="modal" data-target="#opal-quickview-modal">
		                       <i class="fa fa-eye"> </i>
				       <span><?php esc_html_e( 'Quick view', 'shu' ); ?></span>
		                    </a>
		                </div>
		            <?php } ?> 
		        </div>
			</div>
		</div>    
	</div>	    
</div>
