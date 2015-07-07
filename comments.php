<?php
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */


if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

	<?php if ( have_comments() ) : ?>

	<h4>
		<?php
			printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;<strong>%2$s</strong>&rdquo;', get_comments_number(), 'liquidblank' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h4>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'liquidblank' ); ?></h1>
		<div><?php previous_comments_link( __( '&larr; Older Comments', 'liquidblank' ) ); ?></div>
		<div><?php next_comments_link( __( 'Newer Comments &rarr;', 'liquidblank' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol>
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 34,
			) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'liquidblank' ); ?></h1>
		<div ><?php previous_comments_link( __( '&larr; Older Comments', 'liquidblank' ) ); ?></div>
		<div ><?php next_comments_link( __( 'Newer Comments &rarr;', 'liquidblank' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p ><?php _e( 'Comments are closed.', 'liquidblank' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
