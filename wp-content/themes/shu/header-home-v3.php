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
    <meta name="description" content="">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
	<!--[if lt IE 10]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/all-ie.css" />
	<![endif]-->
	<!-- Facebook Pixel Code -->

<!-- CALLTRACKING - "ALLOKA.RU" start -->
<script type="text/javascript">


    var _alloka = {
        objects: {
            'b7ec67373e59aa3d': {
                block_class: 'phone_alloka',
                format: '8 (#{XXX}) #{XXX}-#{XX}-#{XX}',
                jivosite: false,
                email: false
            }
        },
        trackable_source_types:  ["type_in", "referrer", "utm"],
        last_source: false,
        use_geo: true
    };
</script>
<script src="https://analytics.alloka.ru/v4/alloka.js" type="text/javascript"></script>
    <!-- CALLTRACKING - "ALLOKA.RU" end -->

<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 
fbq('init', '164357561175569');
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1"
src="https://www.facebook.com/tr?id=164357561175569&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
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
	<header id="opal-masthead" class="site-header header-home-v3" role="banner">
	<div class="header-main">
		<div class="container">
			<?php get_template_part( 'page-templates/parts/topbar-v2'); ?>			
		</div>
		<div class="header-inner hidden-xs hidden-sm">
			<div class="container">
				<div class="row">
					<section id="opal-mainmenu" class="opal-mainmenu">		
						<div class="col-xs-12">
							<div class="inner navbar-mega-simple">
								<?php get_template_part( 'page-templates/parts/nav' ); ?>
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
