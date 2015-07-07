<?php
/**
 * The template for displaying Tag pages
 *
 */


get_header(); ?>



	<div id="content-wrapper" class="boxed-width">

		<div class="row">

			<div id="content" class="col-md-9">

			<?php if ( have_posts() ) : ?>

			<header >
				<h1><?php printf( __( 'Tag Archives: %s', 'liquidblank' ), single_tag_title( '', false ) ); ?></h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div>%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->

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
