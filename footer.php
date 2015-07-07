<?php
/**
 * The footer template 
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */
?>
		 	
		</div><!-- #main -->

		<div id="footer-container">


				<div id="footer" <?php liquidblank_boxed_width_classes(); ?>>

					<?php get_sidebar('footer'); ?>

				
				</div><!-- #footer -->

		</div><!-- #footer-container -->

		<div id="site-info-container">
			<div id="site-info" <?php liquidblank_boxed_width_classes(); ?>>		

						<?php
							liquidblank_get_footer_signature();
						?>
			</div><!-- .site-info -->
		</div>
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>