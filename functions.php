<?php

/**
 * The functions and definitions file
 *
 * @package WordPress
 * @subpackage Liquid_Blank
 * @since Liquid Blank 1.0
 */

function liquidblank_setup() {

	/**
	 * Set up the content width value.
	 *
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 672;
	}


	load_theme_textdomain( 'liquidblank', get_template_directory() . '/languages' );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'liquidblank-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Main Menu (Primary Menu)', 'liquidblank' ),
		'secondary' => __( 'Secondary Menu In Topmost Location Above Site Title', 'liquidblank' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * 
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'liquidblank_get_featured_posts',
		'max_posts' => 6,
	) );

	//add theme support for title-tag
	add_theme_support( 'title-tag' );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	//add support for custom backgrounds
	$cb_args = array(
		'default-image' => '',
		'default-color' => 'eff2e3',
		'flex-width' => true,
		'width' => 960,
		'flex-height' => true,
		'height' => 150,
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' =>'',
		'admin-preview-callback' => ''
		);

	add_theme_support('custom-background',$cb_args);



}

add_action( 'after_setup_theme', 'liquidblank_setup' );

/*
* Register 3 Sidebars
* Main sidebar (Right)
* Footer Sidebar
* Left Sidebar
*/
function liquidblank_widgets_init() {

	require get_template_directory() . '/inc/widgets.php';



		register_sidebar( array(
		'name'          => __( 'Main Sidebar (Right)', 'liquidblank' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the right.', 'liquidblank' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );


				register_sidebar( array(
		'name'          => __( 'Left Sidebar','sidebar-2', 'liquidblank' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Sidebar that appears on the left.', 'liquidblank' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );


					register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'liquidblank' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Footer Widget Area just above copyright text', 'liquidblank' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}


add_action( 'widgets_init', 'liquidblank_widgets_init' );


/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Liquid Blank 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function liquidblank_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'liquidblank_wp_title', 10, 2 );


/*
* enque the scripts and style sheets to be used
*
*/
function liquidblank_scripts() {
	
	wp_enqueue_style( 'liquidblank-style', get_stylesheet_uri());
	wp_enqueue_style( 'liquidblank-bootstrap', get_template_directory_uri().'/css/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style( 'liquidblank-font-awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css');


	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ){
	  wp_enqueue_script( 'comment-reply' );
	  }

	//get the body and menu fonts from theme options if not set default to Oswald
	$options = get_option('liquidblank_theme_options_group');

	//get the menu font
	if( isset($options['liquidblank_menu_font']) )
	{
			wp_enqueue_style( 'liquidblank-menu-font-style', '//fonts.googleapis.com/css?family=' . $options['liquidblank_menu_font']);

	}
	else
	{
			wp_enqueue_style( 'liquidblank-menu-font-style', '//fonts.googleapis.com/css?family=Oswald');

	}


	//get the body font
	if( isset($options['liquidblank_body_font']) )
	{
			wp_enqueue_style( 'liquidblank-body-font-style', '//fonts.googleapis.com/css?family=' . $options['liquidblank_body_font']);

	}
	else
	{
			wp_enqueue_style( 'liquidblank-body-font-style', '//fonts.googleapis.com/css?family=Oswald');

	}



	wp_enqueue_script( 'liquidblank-scriptX', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'liquidblank-bootstrap-js', get_template_directory_uri() . '/css/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'liquidblank-retina-js', get_template_directory_uri() . '/js/retina.min.js','', '', true );

}

add_action( 'wp_enqueue_scripts', 'liquidblank_scripts' );


/**
 * Load html5shiv
 */
function liquidblank_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'liquidblank_html5shiv' ); 


/*
* Add the custom editor styls for TinyMCE
*
*
*
*/
function liquidblank_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'liquidblank_add_editor_styles' );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';


// Implement Theme Options Page
require get_template_directory() . '/theme_frame/theme_options.php';

// Implement Miscellanous functions
require get_template_directory() . '/inc/liquidblank_misc_functions.php';