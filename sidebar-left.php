<?php
/**
 * Main sidebar that appears on the Right.
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
<div id="secondary" class="col-md-3">

		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	
	
</div><!-- #secondary -->

<?php endif; ?>
