<?php
/**
 * Template Name: Right Sidebar Page
 *
 */

get_header(); ?>


	<div id="content-wrapper" class="boxed-width">

		<div class="row">

			<div id="content" class="col-md-9">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>

		</div><!-- #content -->


<?php get_sidebar(); ?>

	</div><!-- .row -->

</div><!-- #content-wrapper -->

<?php

get_footer();
