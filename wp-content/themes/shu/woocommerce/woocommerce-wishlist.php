<?php if( class_exists( 'YITH_WCWL' ) ) { global $product; ?>
    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo esc_attr( $product->get_id() ); ?>">
        <div class="yith-wcwl-add-button show">
            <a title="<?php esc_html_e('Add to wishlist', 'shu'); ?>" href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', $product->get_id()) )?>" rel="nofollow" data-product-id="<?php echo esc_attr( $product->get_id() ); ?>" data-product-type="<?php echo esc_attr( $product->get_type() ); ?>" class="add_to_wishlist" >
                <em class="fa fa-heart-o"></em>
            </a>
            <img src="<?php echo esc_url( YITH_WCWL_URL . 'assets/images/wpspin_light.gif' ) ?>" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
        </div>
    </div>
<?php }