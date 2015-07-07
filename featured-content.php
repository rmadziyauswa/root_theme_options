<?php
/**
 * The template for displaying featured content
*
 */
?>

<div id="featured-content" class="featured-content">
	<div class="featured-content-inner">
	<?php
	
		do_action( 'liquidblank_featured_posts_before' );

		$featured_posts = liquidblank_get_featured_posts();
		foreach ( (array) $featured_posts as $order => $post ) :
			setup_postdata( $post );

			 // Include the featured content template.
			get_template_part( 'content', 'featured-post' );
		endforeach;

		/**
		 * Fires after the Liquid Blank featured content.
		 *
		 * @since Liquid Blank 1.0
		 */
		do_action( 'liquidblank_featured_posts_after' );

		wp_reset_postdata();
	?>
	</div><!-- .featured-content-inner -->
</div><!-- #featured-content .featured-content -->
