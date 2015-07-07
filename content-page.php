<?php
/**
 * The template for displaying posts in the Page format
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		liquidblank_get_featured_image(); 
		the_title( '<header><h1>', '</h1></header><!-- .entry-header -->' );
	?>

	<div>
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div><span>' . __( 'Pages:', 'liquidblank' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'liquidblank' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
