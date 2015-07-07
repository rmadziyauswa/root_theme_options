<?php
/**
 * Main sidebar that appears on the left.
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

<div id="secondary" class="col-md-3">

		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
	
</div><!-- #secondary-left -->

<?php endif; ?>
