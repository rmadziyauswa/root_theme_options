<?php


/*
* Custom function for pagination controls
*
*
*
*/
function liquidblank_pagination() 
{

	echo "<div class='pagination'>";
	
			posts_nav_link();
				
	echo "</div>";					
						

}

/*
* Custom function for post tags
*
*
*
*/
function liquidblank_tags() 
{
	the_tags( '<footer><span class="tags-span"><i class="icon-tags"></i> ', '-', '</span></footer>' );		

}

/*
* Custom function for skipping to pervious or nect post
*
*/
function liquidblank_prevnext() 
{

// Previous/next post navigation.
	echo "<div class='PreviousNext'>";

		echo "<div class='prev-link'>";
		 	previous_post_link() ; 
		 echo "</div>";

		 echo "<div class='next-link'>";
		 	next_post_link(); 
		 echo "</div>";

	 echo "</div>";
					
						

}

/*
* Custom function for attached images
*
*
*
*/
function liquidblank_the_attached_image()
{
	wp_get_attachement_image(0);
}

/*
* Custom function for featured images
*
*
*
*/
function liquidblank_get_featured_image()
{
	if( has_post_thumbnail() )
	{
		$link = get_the_permalink();
		
		echo "<a href='$link'>";

		the_post_thumbnail();

		echo "</a>";
	}
}

/*
* Custom function for post categories
*
*
*
*/
function liquidblank_the_category()
{
	$categories = get_the_category();
	$num_cats = count($categories);

	if($num_cats > 0)	//the post belongs to one or more categories
	{	
		echo "<div>";

			if($num_cats==1)
			{
				_e('Category : ','liquidblank');
			}
			else
			{
				_e('Categories : ','liquidblank');
			}

			the_category(',');
		
		echo "</div>";


	}
}

/*
* Custom function to determine whether or not
* To use full width layout
*
*
*/
function liquidblank_use_full_width()
{
	$options = get_option('liquidblank_theme_options_group');

		if ( isset($options['liquidblank_use_full_width']) )
		{
			return true;


		}
		else
		{
			return false;
		}

}

/*
* Function to determine whether or not to use the topmost navigational menu
*
*/
function liquidblank_use_top_nav()
{
	$options = get_option('liquidblank_theme_options_group');

		if ( isset($options['liquidblank_use_top_nav_menu']) )
		{
			return true;


		}
		else
		{
			return false;
		}

}

/*
* Custom function to determine body classes when in boxed layout mode
*
*
*/
function liquidblank_boxed_width_classes()
{

	//if in full width mode, give the topmost-nav container a width and center it else use auto width
	if ( liquidblank_use_full_width() )
	{
		echo "class='boxed-width'";
		
	}
	else
	{
		
		return;
	}
}


/*
* Custom function to set content classes in the presence
* Or absence of sidebars
*
*
*/
function liquidblank_no_sidebar_classes()
{

	//if right sidebar is not set use 100% width of parent div
	if ( !is_active_sidebar( 'sidebar-2' ) )
	{
		echo "class='no-sidebar-width'";
		
	}
	else
	{
		
		echo "class='with-sidebar-width'";
	}
}



if ( ! function_exists( 'liquidblank_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
*
 */
function liquidblank_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'liquidblank' ) . '</span>';
	}

	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"> <i class="icon-calendar"></i>    <time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author"> <i class="icon-user"></i>    %5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;



/**
 * Find out if blog has more than one category.
 *
*
 */
function liquidblank_categorized_blog() {
	if ( false === ( $cats_attached_to = get_transient( 'liquidblank_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$cats_attached_to = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$cats_attached_to = count( $cats_attached_to );

		set_transient( 'liquidblank_category_count', $cats_attached_to );
	}

	if ( 1 !== (int) $cats_attached_to ) {
		// This blog has more than 1 category so liquidblank_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so liquidblank_categorized_blog should return false
		return false;
	}
}


/**
 * Getter function for Featured Content Plugin.
 *
 *
 * return array An array of WP_Post objects.
 */
function liquidblank_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Liquid Blank.
	 *
	 * @since Liquid Blank 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'liquidblank_get_featured_posts', array() );
}


/**
 * A helper conditional function that returns a boolean value.
*
 *
 *  Whether there are featured posts.
 */
function liquidblank_has_featured_posts() {
	return ! is_paged() && (bool) liquidblank_get_featured_posts();
}

?>