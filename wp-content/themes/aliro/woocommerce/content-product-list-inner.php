<?php 
global $product;
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($product->get_id() ), 'blog-thumbnails' );

?>
<div class="product-block" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<figure class="image">

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
		<div class="col-lg-6 col-md-6">
		   <div class="caption-list">
		        
				<div class="meta">
					<?php do_action( 'shu_woocommerce_before_shop_loop_item_title'); ?>
					<h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					
					<?php
					/**
					* woocommerce_after_shop_loop_item_title hook
					*
					* @hooked woocommerce_template_loop_rating - 5
					* @hooked woocommerce_template_loop_price - 10
					*/
					do_action( 'woocommerce_after_shop_loop_item_title');

					?>
				</div>

				<div class="button-action clearfix">
					<div class="button-groups">	            

						<?php wc_get_template_part( 'woocommerce', 'wishlist' ); ?>
            			<?php wc_get_template_part( 'woocommerce', 'compare' ); ?>
						<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
						<?php } ?>
					</div>
				</div>
		   </div>
		</div>    
	</div>	    
</div>
