<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WpOpal
 * @subpackage Shu
 * @since Shu 1.0
 */

$shu_page_layouts = apply_filters( 'shu_fnc_sidebars_others_configs', null );

if( isset($shu_page_layouts['sidebars']) ): $sidebars = $shu_page_layouts['sidebars']; 
?> 
	<?php if ( $sidebars['left']['active'] ) : ?>
	<div class="<?php echo esc_attr($sidebars['left']['class']) ;?> pull-left col-xs-12">
	  <aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	   	<?php dynamic_sidebar( $sidebars['left']['sidebar'] ); ?>
	  </aside>
	</div>
	<?php endif; ?>
 	
 	<?php if ( $sidebars['right']['active'] ) : ?>
	<div class="<?php echo esc_attr($sidebars['right']['class']) ;?> pull-right col-xs-12">
	  <aside class="sidebar sidebar-right" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	   	<?php dynamic_sidebar( $sidebars['right']['sidebar'] ); ?>
	  </aside>
	</div>
	<?php endif; ?>
<?php endif; ?> 

