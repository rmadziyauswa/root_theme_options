<?php

/**
 * The default page template 
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */


get_header(); ?>


<div id="content-wrapper" class="boxed-width">

		<div class="row">

			<div id="content" class="col-md-12">

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


	</div><!-- .row -->

</div><!-- #content-wrapper -->


<?php
get_footer();
