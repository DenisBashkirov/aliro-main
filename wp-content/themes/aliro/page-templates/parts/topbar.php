<section id="opal-topbar" class="opal-topbar hidden-xs hidden-sm">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <ul class="header-info text-left">
                <li class="hidden">
                    <?php 
                         // WPML - Custom Languages Menu
                        shu_fnc_wpml_language_buttons();
                    ?>
                </li>

                <?php if( !is_user_logged_in() ){ ?>
                    
                <?php }else{ ?>
                    <?php $current_user = wp_get_current_user(); ?>
                    <li><span class="hidden-xs">
                        <?php esc_html_e('Welcome ','shu'); ?>
                        <?php echo esc_html( $current_user->display_name); ?> !</span>
                    </li>
                <?php } ?>

                <li class="box-user hidden-xs hidden-sm">
                    <div class="btn-group dropdown">
                        <span><i class="fa fa-user"></i></span>
                        <ul class="dropdown-menu">
                            <?php do_action('opal-account-buttons'); ?> 
                        </ul>      
                    </div>
                </li>

                <li id="search-container" class="search-box-wrapper">
                    <div class="opal-dropdow-search dropdown">
                        <a data-target=".bs-search-modal-lg" data-toggle="modal" class="search-focus btn dropdown-toggle dropdown-toggle-overlay"> 
                            <i class="fa fa-search"></i>     
                        </a>
                        <div class="modal fade bs-search-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button aria-label="Close" data-dismiss="modal" class="close btn btn-sm btn-primary pull-right" type="button"><span aria-hidden="true">x</span></button>
                                  <h4 id="gridSystemModalLabel" class="modal-title"><?php esc_html_e( 'Search', 'shu' ); ?></h4>
                                </div>
                                <div class="modal-body">
                                  <?php get_template_part( 'page-templates/parts/search-overlay' ); ?>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </li>
            </ul>

                
        </div>  
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <ul class="list-style pull-right">
                <li><?php do_action( "shu_template_header_right" ); ?></li>
            </ul>
        </div>                                 
    </div>   
</section>