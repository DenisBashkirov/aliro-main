<?php   global $woocommerce; ?>
<div class="opal-topcart">
    <div id="cart" class="dropdown version-1 box-top">
        <span class="cart-icon box-icon">
            <i class="fa fa-shopping-basket"></i>
        </span>
        <a class="dropdown-toggle mini-cart box-wrap" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#" title="<?php esc_html_e('View your shopping cart', 'shu'); ?>">
            <span class="box-title">
                <span class="title-cart">
            	   <?php esc_html_e('Cart: ','shu'); ?>
                </span>
                <span class="mini-cart-total"> 
                    <?php echo trim( $woocommerce->cart->get_cart_total() ); ?> 
                </span>
            </span>
            </a>            
        <div class="dropdown-menu">
            <div class="widget_shopping_cart_content">
            <?php woocommerce_mini_cart(); ?>
        </div></div>
    </div>
</div>