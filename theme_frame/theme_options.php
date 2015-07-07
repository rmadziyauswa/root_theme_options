<?php


//get the theme object
$the_theme = wp_get_theme();

//get the default text domain
$text_domain = $the_theme->get('TextDomain');



/*
* Add the theme options page under the appearance menu
*
*
*
*/
function theme_frame_add_appearance_menu()
{
	global $text_domain;
		add_theme_page(__("Theme Options For : Liquid Blank",$text_domain),__("Theme Options",$text_domain),"edit_theme_options","my-theme-page","theme_frame_theme_options_page");
}
add_action('admin_menu','theme_frame_add_appearance_menu');
/*
* Create the page elements for the theme options page
*
*
*
*/
function theme_frame_theme_options_page()
{

	global $text_domain;

	?>

	<div class="wrap">
		<div id="icon-tools" class="icon32"></div>
		<h3><?php _e('Customise Your Theme Options',$text_domain) ?></h3>


		<div id="theme_frame_tabs">
			<form action='options.php' method='post'>

			<ul>
				<li><a href="#top_nav_div"><?php _e('Navigation Options',$text_domain) ?></a></li>
				<li><a href="#copyright_div"><?php _e('Copyright Text',$text_domain) ?></a></li>
			</ul>


			<div id="top_nav_div">


					<?php settings_fields('theme_frame_theme_options_group'); ?>
					<?php do_settings_sections(__FILE__); ?>

			</div>

			<div id="copyright_div">

					<?php settings_fields('theme_frame_theme_options_group'); ?>
					<?php do_settings_sections('my-theme-page#copyright_div'); ?>



			</div>

		</div>

		<?php submit_button(); ?>
</form>

	</div>	

	<?php
}
	


/*
*
* Default Google Fonts specifically picked to suit the design
*
*/
$google_fonts = array(
	"Roboto" => "Roboto",
	 "Merriweather" => "Merriweather",
	 "Play" => "Play",
	"Ubuntu"=>"Ubuntu",
	"Lobster"=>"Lobster",
	"Arimo"=>"Arimo",
	"Bitter"=>"Bitter",
	"Oxygen"=>"Oxygen"
);


/*
*
* Default Theme Colors 
*
*/
$default_options = array(
	"theme_frame_hyperlink_color" => "#b82c1f",
	"theme_frame_hyperlink_visited_color" => "#b82c1f",
	 "theme_frame_top_nav_color" => "#ba2e1f",
	 "theme_frame_top_nav_text_color" => "#fff",
	 "theme_frame_menu_color" => "#333333",
	 "theme_frame_submenu_color" => "#333333",
	 "theme_frame_menu_text_color" => "#e9e8e3",
	 "theme_frame_hyperlink_visited_color" => "#ba2e1f",
	 "theme_frame_hyperlink_color" => "#ba2e1f",
	 "theme_frame_menu_hover_color" => "#C99F9B"
);

/*
*
* Function to register the theme settings
*
*/
function theme_frame_register_theme_frame_theme_settings()
{

	global $text_domain;

	register_setting('theme_frame_theme_options_group','theme_frame_theme_options_group','theme_frame_validate_setting');
	
	//Colors Navigational Settings
	add_settings_section('theme_frame_style_colors',__('Customize Theme Colors',$text_domain),'theme_frame_customise_theme_colors',__FILE__);
	add_settings_field('theme_frame_custom_favicon',__('Path to your custom favicon (Include http://)',$text_domain),'theme_frame_theme_frame_fn_custom_favicon',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_use_top_nav_menu',__('Do you want to use the top most navigational menu',$text_domain),'theme_frame_theme_frame_fn_use_top_nav_menu',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_use_full_width',__('Use Full Width Layout',$text_domain),'theme_frame_theme_frame_fn_use_full_width',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_top_nav_color',__('Topmost Navigational Menu Background Color',$text_domain),'theme_frame_top_nav_color_setting',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_top_nav_text_color',__('Topmost Navigational Menu Text Color',$text_domain),'theme_frame_top_nav_text_color_setting',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_menu_color',__('Main Navigational Menu Background Color',$text_domain),'theme_frame_main_nav_color_setting',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_submenu_color',__('Sub Menu Background Color',$text_domain),'theme_frame_submenu_color_setting',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_menu_text_color',__('Main Navigational Menu Text Color',$text_domain),'theme_frame_main_nav_text_color_setting',__FILE__,'theme_frame_style_colors');
	
	add_settings_field('theme_frame_menu_hover_color',__('Main Menu Hover Color',$text_domain),'theme_frame_theme_frame_fn_menu_hover_color_setting',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_hyperlink_color',__('Link Color',$text_domain),'theme_frame_fn_link_color_setting',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_hyperlink_visited_color',__('Visited Links Color',$text_domain),'theme_frame_fn_visited_link_color_setting',__FILE__,'theme_frame_style_colors');
	


	//custom fonts
	add_settings_field('theme_frame_menu_font',__('The font to use on navigational menus',$text_domain),'theme_frame_theme_frame_fn_menu_font',__FILE__,'theme_frame_style_colors');
	add_settings_field('theme_frame_body_font',__('The font to use for your content',$text_domain),'theme_frame_theme_frame_fn_body_font',__FILE__,'theme_frame_style_colors');


	//footer options
	add_settings_section('theme_frame_footer_options',__('Options for your footer area',$text_domain),'theme_frame_customise_footer_area','my-theme-page#copyright_div');
	add_settings_field('theme_frame_footer_text',__('Footer text for the copyright area',$text_domain),'theme_frame_theme_frame_fn_footer_text','my-theme-page#copyright_div','theme_frame_footer_options');


}

add_action('admin_init','theme_frame_register_theme_frame_theme_settings');

/*
*
* Settings section callback functions
*
*/
function theme_frame_customise_theme_colors() 
{
	
}


function theme_frame_customise_footer_area() 
{
	
}


/*
*
* Settings fields validation function
*
*/
function theme_frame_validate_setting($input)
{
	$valid_input = array();

	$valid_input['theme_frame_custom_favicon'] = esc_url_raw($input['theme_frame_custom_favicon']);
	$valid_input['theme_frame_top_nav_color'] = sanitize_text_field($input['theme_frame_top_nav_color']);
	$valid_input['theme_frame_use_top_nav_menu'] = (bool)$input['theme_frame_use_top_nav_menu'];
	$valid_input['theme_frame_use_full_width'] = (bool)$input['theme_frame_use_full_width'];
	$valid_input['theme_frame_top_nav_text_color'] = sanitize_text_field($input['theme_frame_top_nav_text_color']);
	$valid_input['theme_frame_menu_color'] = sanitize_text_field($input['theme_frame_menu_color']);
	$valid_input['theme_frame_submenu_color'] = sanitize_text_field($input['theme_frame_submenu_color']);
	$valid_input['theme_frame_menu_text_color'] = sanitize_text_field($input['theme_frame_menu_text_color']);
	
	$valid_input['theme_frame_menu_hover_color'] = sanitize_text_field($input['theme_frame_menu_hover_color']);
	$valid_input['theme_frame_hyperlink_color'] = sanitize_text_field($input['theme_frame_hyperlink_color']);
	$valid_input['theme_frame_hyperlink_visited_color'] = sanitize_text_field($input['theme_frame_hyperlink_visited_color']);

	$valid_input['theme_frame_footer_text'] = strip_tags($input['theme_frame_footer_text']);
	$valid_input['theme_frame_menu_font'] = strip_tags($input['theme_frame_menu_font']);
	$valid_input['theme_frame_body_font'] = strip_tags($input['theme_frame_body_font']);


	return $valid_input;
}






/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_theme_frame_fn_body_font()
{

	global $google_fonts;


	$options = get_option('theme_frame_theme_options_group');

	
	if(isset($options['theme_frame_body_font']))
	{
		
		echo "			
		<select id='cbotheme_frame_body_font' name='theme_frame_theme_options_group[theme_frame_body_font]'>

		";

		foreach ($google_fonts as $key => $value) {

			$selected = ($options['theme_frame_body_font']==$value ? "selected='selected'" : "");
			
			echo "<option value='$key' $selected>". esc_html($value) ."</option>";
		}


		echo "</select>";
	
		
	}
	else
	{

			echo "			
		<select id='cbotheme_frame_body_font' name='theme_frame_theme_options_group[theme_frame_body_font]'>

		";

		foreach ($google_fonts as $key => $value) {

			
			echo "<option value='$key'>". esc_html($value) ."</option>";
		}


		echo "</select>";

	}



	
}



/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/

function theme_frame_theme_frame_fn_menu_font()
{

	global $google_fonts;


	$options = get_option('theme_frame_theme_options_group');

	
	if(isset($options['theme_frame_menu_font']))
	{
		
		echo "			
		<select id='cbotheme_frame_menu_font' name='theme_frame_theme_options_group[theme_frame_menu_font]'>

		";

		foreach ($google_fonts as $key => $value) {

			$selected = ($options['theme_frame_menu_font']==$value ? "selected='selected'" : "");
			
			echo "<option value='$key' $selected>". esc_html($value) ."</option>";
		}


		echo "</select>";
	
		
	}
	else
	{

			echo "			
		<select id='cbotheme_frame_menu_font' name='theme_frame_theme_options_group[theme_frame_menu_font]'>

		";

		foreach ($google_fonts as $key => $value) {

			
			echo "<option value='$key'>". esc_html($value) ."</option>";
		}


		echo "</select>";

	}



	
}


/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_theme_frame_fn_use_top_nav_menu()
{
	$options = get_option('theme_frame_theme_options_group');

	$checked = $options['theme_frame_use_top_nav_menu'] ? "checked='checked'" : "";


	if(isset($options['theme_frame_use_top_nav_menu']))
	{
		
		echo "			
		<input type='checkbox' id='chktheme_frame_use_top_nav_menu' name='theme_frame_theme_options_group[theme_frame_use_top_nav_menu]' $checked />
		";
	
		
	}
	else
	{

			echo "			
		<input type='checkbox' id='chktheme_frame_use_top_nav_menu' name='theme_frame_theme_options_group[theme_frame_use_top_nav_menu]' $checked />
		";
	}



	
}



/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_theme_frame_fn_use_full_width()
{
	$options = get_option('theme_frame_theme_options_group');

	$checked = $options['theme_frame_use_full_width'] ? "checked='checked'" : "";


	if(isset($options['theme_frame_use_full_width']))
	{
		
		echo "			
		<input type='checkbox' id='chktheme_frame_use_full_width' name='theme_frame_theme_options_group[theme_frame_use_full_width]' $checked />
		";
	
		
	}
	else
	{

			echo "			
		<input type='checkbox' id='chktheme_frame_use_full_width' name='theme_frame_theme_options_group[theme_frame_use_full_width]' $checked />
		";
	}



	
}

/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_theme_frame_fn_custom_favicon()
{
	$options = get_option('theme_frame_theme_options_group');

	if(isset($options['theme_frame_custom_favicon']))
	{
		echo "			
		<input type='text' id='txttheme_frame_custom_favicon' name='theme_frame_theme_options_group[theme_frame_custom_favicon]' value='". esc_url($options['theme_frame_custom_favicon']) ."' />
	
		";
	
		
	}
	else
	{
		echo "			
		<input type='text' id='txttheme_frame_custom_favicon' name='theme_frame_theme_options_group[theme_frame_custom_favicon]' value='' />
	
		";


	}



	
}



/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_top_nav_color_setting()
{
	global $default_options;

	$options = get_option('theme_frame_theme_options_group');

	if(isset($options['theme_frame_top_nav_color']))
	{
		echo "			
		<input type='text' id='txttheme_frame_top_nav_color' name='theme_frame_theme_options_group[theme_frame_top_nav_color]' value='". esc_attr($options['theme_frame_top_nav_color']) ."' />
		<div id='topnav_color_picker'></div>
		";
	
		
	}
	else
	{
		echo "			
		<input type='text' id='txttheme_frame_top_nav_color' name='theme_frame_theme_options_group[theme_frame_top_nav_color]' value='". esc_attr($default_options['theme_frame_top_nav_color']) ."' />
		<div id='topnav_color_picker'></div>
		";		

	}



	
}



/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_theme_frame_fn_menu_hover_color_setting()
{
	global $default_options;

	$options = get_option('theme_frame_theme_options_group');

	if(isset($options['theme_frame_menu_hover_color']))
	{
		echo "			
		<input type='text' id='txttheme_frame_menu_hover_color' name='theme_frame_theme_options_group[theme_frame_menu_hover_color]' value='". esc_attr($options['theme_frame_menu_hover_color']) ."' />
		<div id='theme_frame_menu_hover_color_picker'></div>
		";
		
	}
	else
	{
		echo "			
		<input type='text' id='txttheme_frame_menu_hover_color' name='theme_frame_theme_options_group[theme_frame_menu_hover_color]' value='". esc_attr($default_options['theme_frame_menu_hover_color']) ."' />
		<div id='theme_frame_menu_hover_color_picker'></div>
		";		

	}



	
}

/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_top_nav_text_color_setting()
{
	global $default_options;

	$options = get_option('theme_frame_theme_options_group');

	if(isset($options['theme_frame_top_nav_text_color']))
	{

		echo "
		<input type='text' id='txttheme_frame_top_nav_text_color' name='theme_frame_theme_options_group[theme_frame_top_nav_text_color]' value='". esc_attr($options['theme_frame_top_nav_text_color'] ) ."' />
		<div id='top_nav_text_color_picker'></div>
		";
	
	}
	else
	{
		echo "
		<input type='text' id='txttheme_frame_top_nav_text_color' name='theme_frame_theme_options_group[theme_frame_top_nav_text_color]' value='". esc_attr($default_options['theme_frame_top_nav_text_color']) ."' />
		<div id='top_nav_text_color_picker'></div>
		";		}

}

/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_main_nav_color_setting()
{
	global $default_options;

	$options = get_option('theme_frame_theme_options_group');


	if(isset($options['theme_frame_menu_color']))
	{

		echo "
			<input type='text' id='txttheme_frame_menu_nav_color' name='theme_frame_theme_options_group[theme_frame_menu_color]' value='". esc_attr($options['theme_frame_menu_color']) ."' />
			<div id='theme_frame_menu_color_picker'></div>
		";
	}
	else
	{
		echo "
			<input type='text' id='txttheme_frame_menu_nav_color' name='theme_frame_theme_options_group[theme_frame_menu_color]' value='". esc_attr($default_options['theme_frame_menu_color']) ."' />
			<div id='theme_frame_menu_color_picker'></div>
		";

	}
}

/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_submenu_color_setting()
{
	global $default_options;

	$options = get_option('theme_frame_theme_options_group');


	if(isset($options['theme_frame_submenu_color']))
	{

		echo "
			<input type='text' id='txttheme_frame_submenu_color' name='theme_frame_theme_options_group[theme_frame_submenu_color]' value='". esc_attr($options['theme_frame_submenu_color']) ."' />
			<div id='theme_frame_submenu_color_color_picker'></div>
		";
	}
	else
	{
		echo "
			<input type='text' id='txttheme_frame_submenu_color' name='theme_frame_theme_options_group[theme_frame_submenu_color]' value='". esc_attr($default_options['theme_frame_submenu_color']) ."' />
			<div id='theme_frame_submenu_color_color_picker'></div>
		";

	}
}

/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_main_nav_text_color_setting()
{
	global $default_options;

	$options = get_option('theme_frame_theme_options_group');

	if(isset($options['theme_frame_menu_text_color']))
	{

		echo "
			<input type='text' id='txttheme_frame_menu_nav_text_color' name='theme_frame_theme_options_group[theme_frame_menu_text_color]' value='". esc_attr($options['theme_frame_menu_text_color']) ."' />
			<div id='theme_frame_menu_text_color_picker'></div>
		";


	}
	else
	{

		echo "
			<input type='text' id='txttheme_frame_menu_nav_text_color' name='theme_frame_theme_options_group[theme_frame_menu_text_color]' value='". esc_attr($default_options['theme_frame_menu_text_color']) ."' />
			<div id='theme_frame_menu_text_color_picker'></div>
		";
	}
}


/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_theme_frame_fn_footer_text()
{
	$options = get_option('theme_frame_theme_options_group');

	if(isset($options['theme_frame_footer_text']))
	{

		echo "
			<textarea id='txttheme_frame_footer_text' name='theme_frame_theme_options_group[theme_frame_footer_text]' rows='3'>". esc_textarea($options['theme_frame_footer_text']) ." </textarea>
		";


	}
	else
	{

			echo "
			<textarea id='txttheme_frame_footer_text' name='theme_frame_theme_options_group[theme_frame_footer_text]' rows='3'></textarea>
		";
	}
}

/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_fn_link_color_setting()
{
	global $default_options;

	$options = get_option('theme_frame_theme_options_group');

	if(isset($options['theme_frame_hyperlink_color']))
	{

		echo "
		<input type='text' id='txttheme_frame_hyperlink_color' name='theme_frame_theme_options_group[theme_frame_hyperlink_color]' value='". esc_attr($options['theme_frame_hyperlink_color'] ) ."' />
		<div id='theme_frame_hyperlink_color_color_picker'></div>
		";
	
	}
	else
	{
		echo "
		<input type='text' id='txttheme_frame_hyperlink_color' name='theme_frame_theme_options_group[theme_frame_hyperlink_color]' value='". esc_attr($default_options['theme_frame_hyperlink_color'] ) ."' />
		<div id='theme_frame_hyperlink_color_color_picker'></div>
		";		
	}

}

/*
*
* Settings fields output functions
* For the list of theme options in theme_frame_theme_options_group
*/
function theme_frame_fn_visited_link_color_setting()
{
	global $default_options;

	$options = get_option('theme_frame_theme_options_group');

	if(isset($options['theme_frame_hyperlink_visited_color']))
	{

		echo "
		<input type='text' id='txttheme_frame_hyperlink_visited_color' name='theme_frame_theme_options_group[theme_frame_hyperlink_visited_color]' value='". esc_attr($options['theme_frame_hyperlink_visited_color'] ) ."' />
		<div id='theme_frame_hyperlink_visited_color_color_picker'></div>
		";
	
	}
	else
	{
		echo "
		<input type='text' id='txttheme_frame_hyperlink_visited_color' name='theme_frame_theme_options_group[theme_frame_hyperlink_visited_color]' value='". esc_attr($default_options['theme_frame_hyperlink_visited_color'] ) ."' />
		<div id='theme_frame_hyperlink_visited_color_color_picker'></div>
		";		
	}

}


add_action('admin_enqueue_scripts','theme_frame_farbtastic_script');

/*
*
* Enqueue necessary scripts for farbtatsic and jquery ui
*
*/
function theme_frame_farbtastic_script()
{
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script( 'theme_frame-script', get_template_directory_uri() . '/theme_frame/js/theme_frame.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-ui-core','',array('jquery'),'',true);
		wp_enqueue_script( 'jquery-ui-widget');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_style('theme_frame-jquery-ui-stylesheet',get_template_directory_uri() . '/theme_frame/css/jquery-ui.css');
		wp_enqueue_style('theme_frameAdminStylesheet',  get_template_directory_uri() . '/theme_frame/css/admin-stylesheet.css');
		
}

/*
*
* retrieve the custom css from the theme options and output it for use in the site
*
*/
function theme_frame_custom_style_head()
{
	$options = get_option('theme_frame_theme_options_group');


		echo "<style type='text/css'>";



			//set the body font family
			if(isset($options['theme_frame_body_font']))
		{

			echo "
				
					html , body ,h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6
					 {
							font-family: '".  esc_html($options['theme_frame_body_font']) ."' , sans-serif ;
						}
				

			";

		}


	if(isset($options['theme_frame_top_nav_text_color']))
		{

			echo "
				
					#topmost-nav {
							background-color:".  esc_html($options['theme_frame_top_nav_color']) ." ;
							color: ". esc_html($options['theme_frame_top_nav_text_color']) ." ;
							font-family: '".  esc_html($options['theme_frame_menu_font']) ."' , sans-serif ;
						}

					#topmost-nav a, #topmost-nav a:visited{
							color: ". esc_html($options['theme_frame_top_nav_text_color']) ." ;
						}
				

			";

		}


	if(isset($options['theme_frame_hyperlink_color']))
		{

			echo "
				
					a , a:hover
					{
						color : ". esc_html($options['theme_frame_hyperlink_color']) ." ;
						text-decoration : none;
					}
				

			";

		}



	if(isset($options['theme_frame_hyperlink_visited_color']))
		{

			echo "
				
					a:visited
					{
						color : ". esc_html($options['theme_frame_hyperlink_visited_color']) ." ;
						text-decoration : none;
					}
				

			";

		}

		if(isset($options['theme_frame_menu_color']))
		{

			echo "
				
					#primarymenu-locator
					{
						
						background-color : ". esc_html($options['theme_frame_menu_color']) ." ;
						font-size: 20px;
						font-family: '".  esc_html($options['theme_frame_menu_font']) ."' , sans-serif ;
						padding: 5px;
						
					}

					.main-navigation a, .main-navigation a:visited
					{
						color : ". esc_html($options['theme_frame_menu_text_color']) ." ;
					}

					.main-navigation a:hover
					{
						color:  ". esc_html($options['theme_frame_menu_hover_color']) ." ;
					}

					div#footer-container , #secondary h1 , #secondary-left h1 
					{
						background-color : ". esc_html($options['theme_frame_menu_color']) ." ;
						color : ". esc_html($options['theme_frame_menu_text_color']) ." ;
					}


					#site-info 
					{
						color : ". esc_html($options['theme_frame_menu_color']) ." ;
					}

					.tags-span
					{
						color : ". esc_html($options['theme_frame_menu_text_color']) ." ;
					}

					.tags-span>a
					{
						background-color : ". esc_html($options['theme_frame_menu_color']) ." ;
						padding-left: 5px;
						padding-right: 5px;
						border-radius: 10px;

					}

					.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price
					{
						color : ". esc_html($options['theme_frame_menu_color']) ." ;
					}
								

			";

		}


			if(isset($options['theme_frame_submenu_color']))
		{

			echo "
				
					.main-navigation ul ul , .main-navigation ul ul ul
					{
						background-color : ". esc_html($options['theme_frame_submenu_color']) ." ;
						
					}			

			";

		}


			echo "</style>";


			//echo out the custom favicon
		if(isset($options['theme_frame_custom_favicon']))
		{

			echo "<link id='favicon' rel='icon' type='image/png' href='" . esc_url($options['theme_frame_custom_favicon']) . "'>" ;

		}



}

add_action('wp_head','theme_frame_custom_style_head');


/*
*
* retrieve the footer signature from theme options
* 
*/
function theme_frame_get_footer_signature()
{

	global $text_domain;
	
	$options = get_option('theme_frame_theme_options_group');

	$footer_text = __("Liquid Blank Theme By <a href='http://www.kozmikinc.com'>Kozmik</a>. Proudly powered by <a href='http://www.wordpress.org'>WordPress</a>",$text_domain);

	if(isset($options['theme_frame_footer_text']))
	{
		$footer_text = esc_html($options['theme_frame_footer_text']);
		
	}

	echo $footer_text;

}



?>
