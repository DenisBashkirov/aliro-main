<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package WpOpal
 * @subpackage Shu
 * @since Shu 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
 	<div class="post-preview">
		<?php shu_fnc_post_thumbnail(); ?>
		<span class="post-format">
			<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>"><i class="fa fa-picture-o"></i></a>
		</span>
	</div>
			
	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && shu_fnc_categorized_blog() ) : ?>
 
		<?php
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;
		?>

		<div class="entry-meta">
			
			<div class="entry-date pull-left">
                <span><?php the_time( 'd' ); ?></span>&nbsp;<?php the_time( 'M' ); ?>
            </div>
            <div class="author pull-left"><?php esc_html_e('by', 'shu'); the_author_posts_link(); ?></div>
            <div class="entry-category pull-left">
                <?php esc_html_e('in', 'shu'); the_category(); ?>
            </div>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<div class="comments-link pull-left"><?php comments_popup_link( esc_html__( 'Leave a comment', 'shu' ), esc_html__( '1 Comment', 'shu' ), esc_html__( '% Comments', 'shu' ) ); ?></div>
			<?php endif; ?>

			<?php edit_post_link( esc_html__( 'Edit', 'shu' ), '<div class="edit-link">', '</div>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			if(is_single()){
				the_content( sprintf(
					esc_html__( 'Continue reading %s', 'shu').'<span class="meta-nav">&rarr;</span>',
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
			}else{
				the_excerpt();
			}

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'shu' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
