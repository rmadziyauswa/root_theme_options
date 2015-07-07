<?php
/**
 * The template for displaying posts in the Image post format
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php liquidblank_get_featured_image(); ?>

	
	<header class="entry-header">
		<?php
		

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<span class="post-format">
				<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>"><i class="icon-picture"></i>   <?php echo get_post_format_string( 'image' ); ?></a>
			</span>

			<?php liquidblank_posted_on(); ?>

			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link">   <?php comments_popup_link( __( ' <i class="icon-comment"></i>  Leave a comment', 'liquidblank' ), __( ' <i class="icon-comment"></i>  1 Comment', 'liquidblank' ), __( ' <i class="icon-comment"></i>  % Comments', 'liquidblank' ) ); ?></span>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'liquidblank' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'liquidblank' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'liquidblank' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php liquidblank_tags();  ?>
</article><!-- #post-## -->
