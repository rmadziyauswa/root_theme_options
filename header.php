<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php wp_title('|',true,'right'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>	
		<?php 
			if( !liquidblank_use_full_width() )		
				{

		?>
			<div id="boxed-page" class="container-fluid">
		<?php
			}
			else
			{

		?>
			<div id="fullwidth-page" class="container-fluid">

		<?php

			}

		?>

		<?php 
			
			if( liquidblank_use_top_nav() )		
				{


		?>
			<div id="topmost-nav">
				<div id="topmost-nav-container" class="row">
					
					<div class="col-md-8">
						<div class="menu-topmostnav" id="topmost-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'menu' ) ); ?>
						</div>

						<div class="clear-fix"></div>
					</div>


					<div class="col-md-4">
						<div id="search-container">
						
								<?php get_search_form(); ?>
						
						</div>

						<div id="searchbutton">
								<i class="icon-search"></i>
								<a href="#" id="top_nav_search_button"><?php _e('Search','liquidblank') ?></a>
							
						</div>
					</div>

					

				</div>
			</div>

		<?php

			}

		?>

		<div id="site-title-row" <?php liquidblank_boxed_width_classes(); ?>>
			<?php if ( get_header_image() ) : ?>
				<div id="site-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>">
					</a>
				</div>
				<?php endif; ?>
			<div class="site-title">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<span id="site-description"><?php echo get_bloginfo('description'); ?></span>
			</div>

		
		</div> <!-- #site-title-row -->

		<div id="primarymenu-locator">
			<nav id="site-navigation" role="navigation" class="main-navigation
				<?php
						if ( liquidblank_use_full_width() )
						{
							echo " boxed-width";
							
						}
				?>
				"
			>
				<div id="small-menu">
					<button class="menu-toggle">
						<img src="<?php echo get_stylesheet_directory_uri().'/images/menualt.png'; ?>" /> MENU
					</button>
				</div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>	<!-- #primarymenu-locator -->	

		
	

	<div id="main" class="row">