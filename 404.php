<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */

get_header(); ?>


<div id="content-wrapper" class="boxed-width">

	<div class="row">

			<div id="content" class="col-md-12">

			<header class="page-header">
				<h1><?php _e( 'Not Found', 'liquidblank' ); ?></h1>
			</header>

			<div id="divNotFound">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'liquidblank' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

		</div><!-- #content -->

	</div><!-- .row -->

</div><!-- #content-wrapper -->


<?php

get_footer();
