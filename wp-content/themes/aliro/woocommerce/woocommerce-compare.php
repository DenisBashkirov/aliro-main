<?php if( class_exists( 'YITH_Woocompare' ) ) { global $product; ?>
    <div class="woocommerce product compare-button yith-compare">
        <a title="<?php esc_html_e( 'Add to compare', 'shu' ); ?>" href="<?php echo wp_nonce_url( add_query_arg( 'yith_woocompare' , $product->get_id()) ); ?>" class="compare" data-product_id="<?php echo esc_attr($product->get_id()); ?>">
            <em class="fa fa-exchange"></em>
        </a>
    </div>
<?php }