<?php
/**
 * The template for displaying archive posts
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */

get_header(); ?>


	<div id="content-wrapper" class="boxed-width">

		<div class="row">

			<div id="content" class="col-md-9">

			<?php if ( have_posts() ) : ?>

			<header>
				<h1>
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'liquidblank' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'liquidblank' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'liquidblank' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'liquidblank' ), get_the_date( _x( 'Y', 'yearly archives date format', 'liquidblank' ) ) );

						else :
							_e( 'Archives', 'liquidblank' );

						endif;
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					liquidblank_pagination() ;

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->


<?php get_sidebar(); ?>


	</div><!-- .row -->

</div><!-- #content-wrapper -->

<?php


get_footer();
