<?php
/**
 * The Header for our theme: Main Darker Background. Logo left + Main menu and Right sidebar. Below Category Search + Mini Shopping basket.
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WpOpal
 * @subpackage Shu
 * @since Shu 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
	<!--[if lt IE 10]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/all-ie.css" />
	<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site"><div class="opal-page-inner row-offcanvas row-offcanvas-left">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header" class="hidden-xs hidden-sm">
		<a href="<?php echo esc_url( get_option('header_image_link','#') ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</a>
	</div>
	<?php endif; ?>
	<?php get_template_part( 'page-templates/parts/topbar', 'mobile' ); ?>
	<header id="opal-masthead" class="site-header header-home-v2 header-home-v5" role="banner">
	
		
	<div class="header-main">
		<div class="container">
			<div class="header-inner">
				
				<div class="row">
					<div class="logo-wrapper col-md-2 col-lg-2">
			 			<?php get_template_part( 'page-templates/parts/logo' ); ?>
					</div>
					<section id="opal-mainmenu" class="opal-mainmenu">		
						<div class="col-lg-6 col-md-6 col-xs-12">
							<div class="inner navbar-mega-light">
								<?php get_template_part( 'page-templates/parts/nav' ); ?>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 pull-right">
							<div class="opal-header-right pull-right hidden-xs hidden-sm">
								<div class="opal-header-inner">
									<div class="pull-right">
										<?php do_action( "shu_template_header_right" ); ?>
									</div>
									<div class="header-info pull-right">
										<?php if( !is_user_logged_in() ){ ?>
				                 
										<?php }else{ ?>
										<?php $current_user = wp_get_current_user(); ?>
										<?php } ?>
										<div class="box-user hidden-xs hidden-sm">
											<div class="btn-group dropdown">
												<span><i class="fa fa-user"></i></span>
												<ul class="dropdown-menu">
													<?php do_action('opal-account-buttons'); ?> 
												</ul>      
											</div>
										</div>
									</div>
									<div id="search-container" class="search-box-wrapper pull-right">
										<div class="opal-dropdow-search dropdown">
										  	<a data-target=".bs-search-modal-lg" data-toggle="modal" class="text-light search-focus btn dropdown-toggle dropdown-toggle-overlay"> 
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
									</div>

								</div>
							</div>
						</div>	
										
					</section>
				</div>
		</div>				
		</div>
	</div>	
	</header><!-- #masthead -->	

	<?php do_action( 'shu_template_header_after' ); ?>
	
	<section id="main" class="site-main">
