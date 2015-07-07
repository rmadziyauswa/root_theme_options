<?php

/**
 * The template for index page
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */

get_header(); ?>




<div id="content-wrapper" class="boxed-width">

		<?php
			if ( is_front_page() && liquidblank_has_featured_posts() ) {
				// Include the featured content template.
				get_template_part( 'featured-content' );
			}
		?>

		<div class="row">

			<div id="content" class="col-md-9">

			<?php
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();

					
						get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next post navigation.
					liquidblank_pagination();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

			</div><!-- #content -->

			<?php get_sidebar(); ?>

		</div>

</div> <!-- #content-wrapper -->


<?php

get_footer();
