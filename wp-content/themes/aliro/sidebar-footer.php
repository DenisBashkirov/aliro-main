<?php
/**
 * The Footer Sidebar
 *
 * @package WpOpal
 * @subpackage Shu
 * @since Shu 1.0
 */

?>
 		<section class="footer-top">
 			<div class="row">
 				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
 					<?php if ( is_active_sidebar( 'newsletter' ) ) : ?>
						<div class="wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="200ms" >
							<?php dynamic_sidebar('newsletter'); ?>
						</div>
					<?php endif; ?>
 				</div>
 			</div>
 		</section>
		<section class="footer-center">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="200ms" >
						<?php dynamic_sidebar('footer-1'); ?>
					</div>
					<?php endif; ?>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="400ms" >
						<?php dynamic_sidebar('footer-2'); ?>
					</div>
					<?php endif; ?>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="600ms" >
						<?php dynamic_sidebar('footer-3'); ?>
					</div>
					<?php endif; ?>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<div class="wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="800ms" >
						<?php dynamic_sidebar('footer-4'); ?>
					</div>
					<?php endif; ?>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
					<?php if ( is_active_sidebar( 'footer-5' ) ) : ?>
					<div class="wow fadeInUp" data-wow-duration='0.8s' data-wow-delay="800ms" >
						<?php dynamic_sidebar('footer-5'); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
 