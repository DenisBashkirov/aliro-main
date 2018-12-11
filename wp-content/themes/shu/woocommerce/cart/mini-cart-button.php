<?php   global $woocommerce; ?>
<div class="opal-topcart">
    <div id="cart" class="dropdown version-1 box-top">
        <a class="dropdown-toggle mini-cart box-wrap" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#" title="<?php esc_html_e('View your shopping cart', 'shu'); ?>">
            <span class="cart-icon box-icon"></span>
            <span class="cart-title">My cart</span>
            <span class="box-title hidden">
                <span class="title-cart">
            	   <?php esc_html_e('Cart: ','shu'); ?>
                </span>
                <span class="mini-cart-items">
            	   <?php echo sprintf( '%d', $woocommerce->cart->cart_contents_count );?>
                </span>
            </span>
            <?php echo trim( $woocommerce->cart->get_cart_total() ); ?>
            <b class="caret"></b>
        </a>            
        <div class="dropdown-menu">
            <div class="widget_shopping_cart_content">
                <?php woocommerce_mini_cart(); ?>
            </div>
        </div>
    </div>
</div> 
