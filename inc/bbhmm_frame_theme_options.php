<?php
/*
* Add the theme options page under the appearance menu
*
*
*
*/
function bbhmm_frame_add_appearance_menu()
{
		add_theme_page(__("Theme Options For : Liquid Blank","bbhmm_frame"),__("Theme Options","bbhmm_frame"),"edit_theme_options","my-theme-page","bbhmm_frame_theme_options_page");
}
add_action('admin_menu','bbhmm_frame_add_appearance_menu');
/*
* Create the page elements for the theme options page
*
*
*
*/
function bbhmm_frame_theme_options_page()
{
	?>

	<div class="wrap">
		<div id="icon-tools" class="icon32"></div>
		<h3><?php _e('Customise Your Theme Options','bbhmm_frame') ?></h3>


		<div id="bbhmm_frame_tabs">
			<form action='options.php' method='post'>

			<ul>
				<li><a href="#top_nav_div"><?php _e('Navigation Options','bbhmm_frame') ?></a></li>
				<li><a href="#copyright_div"><?php _e('Copyright Text','bbhmm_frame') ?></a></li>
			</ul>


			<div id="top_nav_div">


					<?php settings_fields('bbhmm_frame_theme_options_group'); ?>
					<?php do_settings_sections(__FILE__); ?>

			</div>

			<div id="copyright_div">

					<?php settings_fields('bbhmm_frame_theme_options_group'); ?>
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
	"bbhmm_frame_hyperlink_color" => "#b82c1f",
	"bbhmm_frame_hyperlink_visited_color" => "#b82c1f",
	 "bbhmm_frame_top_nav_color" => "#ba2e1f",
	 "bbhmm_frame_top_nav_text_color" => "#fff",
	 "bbhmm_frame_menu_color" => "#333333",
	 "bbhmm_frame_submenu_color" => "#333333",
	 "bbhmm_frame_menu_text_color" => "#e9e8e3",
	 "bbhmm_frame_hyperlink_visited_color" => "#ba2e1f",
	 "bbhmm_frame_hyperlink_color" => "#ba2e1f",
	 "bbhmm_frame_menu_hover_color" => "#C99F9B"
);

/*
*
* Function to register the theme settings
*
*/
function bbhmm_frame_register_bbhmm_frame_theme_settings()
{
	register_setting('bbhmm_frame_theme_options_group','bbhmm_frame_theme_options_group','bbhmm_frame_validate_setting');
	
	//Colors Navigational Settings
	add_settings_section('bbhmm_frame_style_colors',__('Customize Theme Colors','bbhmm_frame'),'bbhmm_frame_customise_theme_colors',__FILE__);
	add_settings_field('bbhmm_frame_custom_favicon',__('Path to your custom favicon (Include http://)','bbhmm_frame'),'bbhmm_frame_bbhmm_frame_fn_custom_favicon',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_use_top_nav_menu',__('Do you want to use the top most navigational menu','bbhmm_frame'),'bbhmm_frame_bbhmm_frame_fn_use_top_nav_menu',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_use_full_width',__('Use Full Width Layout','bbhmm_frame'),'bbhmm_frame_bbhmm_frame_fn_use_full_width',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_top_nav_color',__('Topmost Navigational Menu Background Color','bbhmm_frame'),'bbhmm_frame_top_nav_color_setting',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_top_nav_text_color',__('Topmost Navigational Menu Text Color','bbhmm_frame'),'bbhmm_frame_top_nav_text_color_setting',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_menu_color',__('Main Navigational Menu Background Color','bbhmm_frame'),'bbhmm_frame_main_nav_color_setting',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_submenu_color',__('Sub Menu Background Color','bbhmm_frame'),'bbhmm_frame_submenu_color_setting',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_menu_text_color',__('Main Navigational Menu Text Color','bbhmm_frame'),'bbhmm_frame_main_nav_text_color_setting',__FILE__,'bbhmm_frame_style_colors');
	
	add_settings_field('bbhmm_frame_menu_hover_color',__('Main Menu Hover Color','bbhmm_frame'),'bbhmm_frame_bbhmm_frame_fn_menu_hover_color_setting',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_hyperlink_color',__('Link Color','bbhmm_frame'),'bbhmm_frame_fn_link_color_setting',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_hyperlink_visited_color',__('Visited Links Color','bbhmm_frame'),'bbhmm_frame_fn_visited_link_color_setting',__FILE__,'bbhmm_frame_style_colors');
	


	//custom fonts
	add_settings_field('bbhmm_frame_menu_font',__('The font to use on navigational menus','bbhmm_frame'),'bbhmm_frame_bbhmm_frame_fn_menu_font',__FILE__,'bbhmm_frame_style_colors');
	add_settings_field('bbhmm_frame_body_font',__('The font to use for your content','bbhmm_frame'),'bbhmm_frame_bbhmm_frame_fn_body_font',__FILE__,'bbhmm_frame_style_colors');


	//footer options
	add_settings_section('bbhmm_frame_footer_options',__('Options for your footer area','bbhmm_frame'),'bbhmm_frame_customise_footer_area','my-theme-page#copyright_div');
	add_settings_field('bbhmm_frame_footer_text',__('Footer text for the copyright area','bbhmm_frame'),'bbhmm_frame_bbhmm_frame_fn_footer_text','my-theme-page#copyright_div','bbhmm_frame_footer_options');


}

add_action('admin_init','bbhmm_frame_register_bbhmm_frame_theme_settings');

/*
*
* Settings section callback functions
*
*/
function bbhmm_frame_customise_theme_colors() 
{
	
}


function bbhmm_frame_customise_footer_area() 
{
	
}


/*
*
* Settings fields validation function
*
*/
function bbhmm_frame_validate_setting($input)
{
	$valid_input = array();

	$valid_input['bbhmm_frame_custom_favicon'] = esc_url_raw($input['bbhmm_frame_custom_favicon']);
	$valid_input['bbhmm_frame_top_nav_color'] = sanitize_text_field($input['bbhmm_frame_top_nav_color']);
	$valid_input['bbhmm_frame_use_top_nav_menu'] = (bool)$input['bbhmm_frame_use_top_nav_menu'];
	$valid_input['bbhmm_frame_use_full_width'] = (bool)$input['bbhmm_frame_use_full_width'];
	$valid_input['bbhmm_frame_top_nav_text_color'] = sanitize_text_field($input['bbhmm_frame_top_nav_text_color']);
	$valid_input['bbhmm_frame_menu_color'] = sanitize_text_field($input['bbhmm_frame_menu_color']);
	$valid_input['bbhmm_frame_submenu_color'] = sanitize_text_field($input['bbhmm_frame_submenu_color']);
	$valid_input['bbhmm_frame_menu_text_color'] = sanitize_text_field($input['bbhmm_frame_menu_text_color']);
	
	$valid_input['bbhmm_frame_menu_hover_color'] = sanitize_text_field($input['bbhmm_frame_menu_hover_color']);
	$valid_input['bbhmm_frame_hyperlink_color'] = sanitize_text_field($input['bbhmm_frame_hyperlink_color']);
	$valid_input['bbhmm_frame_hyperlink_visited_color'] = sanitize_text_field($input['bbhmm_frame_hyperlink_visited_color']);

	$valid_input['bbhmm_frame_footer_text'] = strip_tags($input['bbhmm_frame_footer_text']);
	$valid_input['bbhmm_frame_menu_font'] = strip_tags($input['bbhmm_frame_menu_font']);
	$valid_input['bbhmm_frame_body_font'] = strip_tags($input['bbhmm_frame_body_font']);


	return $valid_input;
}






/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_bbhmm_frame_fn_body_font()
{

	global $google_fonts;


	$options = get_option('bbhmm_frame_theme_options_group');

	
	if(isset($options['bbhmm_frame_body_font']))
	{
		
		echo "			
		<select id='cbobbhmm_frame_body_font' name='bbhmm_frame_theme_options_group[bbhmm_frame_body_font]'>

		";

		foreach ($google_fonts as $key => $value) {

			$selected = ($options['bbhmm_frame_body_font']==$value ? "selected='selected'" : "");
			
			echo "<option value='$key' $selected>". esc_html($value) ."</option>";
		}


		echo "</select>";
	
		
	}
	else
	{

			echo "			
		<select id='cbobbhmm_frame_body_font' name='bbhmm_frame_theme_options_group[bbhmm_frame_body_font]'>

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
* For the list of theme options in bbhmm_frame_theme_options_group
*/

function bbhmm_frame_bbhmm_frame_fn_menu_font()
{

	global $google_fonts;


	$options = get_option('bbhmm_frame_theme_options_group');

	
	if(isset($options['bbhmm_frame_menu_font']))
	{
		
		echo "			
		<select id='cbobbhmm_frame_menu_font' name='bbhmm_frame_theme_options_group[bbhmm_frame_menu_font]'>

		";

		foreach ($google_fonts as $key => $value) {

			$selected = ($options['bbhmm_frame_menu_font']==$value ? "selected='selected'" : "");
			
			echo "<option value='$key' $selected>". esc_html($value) ."</option>";
		}


		echo "</select>";
	
		
	}
	else
	{

			echo "			
		<select id='cbobbhmm_frame_menu_font' name='bbhmm_frame_theme_options_group[bbhmm_frame_menu_font]'>

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
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_bbhmm_frame_fn_use_top_nav_menu()
{
	$options = get_option('bbhmm_frame_theme_options_group');

	$checked = $options['bbhmm_frame_use_top_nav_menu'] ? "checked='checked'" : "";


	if(isset($options['bbhmm_frame_use_top_nav_menu']))
	{
		
		echo "			
		<input type='checkbox' id='chkbbhmm_frame_use_top_nav_menu' name='bbhmm_frame_theme_options_group[bbhmm_frame_use_top_nav_menu]' $checked />
		";
	
		
	}
	else
	{

			echo "			
		<input type='checkbox' id='chkbbhmm_frame_use_top_nav_menu' name='bbhmm_frame_theme_options_group[bbhmm_frame_use_top_nav_menu]' $checked />
		";
	}



	
}



/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_bbhmm_frame_fn_use_full_width()
{
	$options = get_option('bbhmm_frame_theme_options_group');

	$checked = $options['bbhmm_frame_use_full_width'] ? "checked='checked'" : "";


	if(isset($options['bbhmm_frame_use_full_width']))
	{
		
		echo "			
		<input type='checkbox' id='chkbbhmm_frame_use_full_width' name='bbhmm_frame_theme_options_group[bbhmm_frame_use_full_width]' $checked />
		";
	
		
	}
	else
	{

			echo "			
		<input type='checkbox' id='chkbbhmm_frame_use_full_width' name='bbhmm_frame_theme_options_group[bbhmm_frame_use_full_width]' $checked />
		";
	}



	
}

/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_bbhmm_frame_fn_custom_favicon()
{
	$options = get_option('bbhmm_frame_theme_options_group');

	if(isset($options['bbhmm_frame_custom_favicon']))
	{
		echo "			
		<input type='text' id='txtbbhmm_frame_custom_favicon' name='bbhmm_frame_theme_options_group[bbhmm_frame_custom_favicon]' value='". esc_url($options['bbhmm_frame_custom_favicon']) ."' />
	
		";
	
		
	}
	else
	{
		echo "			
		<input type='text' id='txtbbhmm_frame_custom_favicon' name='bbhmm_frame_theme_options_group[bbhmm_frame_custom_favicon]' value='' />
	
		";


	}



	
}



/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_top_nav_color_setting()
{
	global $default_options;

	$options = get_option('bbhmm_frame_theme_options_group');

	if(isset($options['bbhmm_frame_top_nav_color']))
	{
		echo "			
		<input type='text' id='txtbbhmm_frame_top_nav_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_top_nav_color]' value='". esc_attr($options['bbhmm_frame_top_nav_color']) ."' />
		<div id='topnav_color_picker'></div>
		";
	
		
	}
	else
	{
		echo "			
		<input type='text' id='txtbbhmm_frame_top_nav_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_top_nav_color]' value='". esc_attr($default_options['bbhmm_frame_top_nav_color']) ."' />
		<div id='topnav_color_picker'></div>
		";		

	}



	
}



/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_bbhmm_frame_fn_menu_hover_color_setting()
{
	global $default_options;

	$options = get_option('bbhmm_frame_theme_options_group');

	if(isset($options['bbhmm_frame_menu_hover_color']))
	{
		echo "			
		<input type='text' id='txtbbhmm_frame_menu_hover_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_menu_hover_color]' value='". esc_attr($options['bbhmm_frame_menu_hover_color']) ."' />
		<div id='bbhmm_frame_menu_hover_color_picker'></div>
		";
		
	}
	else
	{
		echo "			
		<input type='text' id='txtbbhmm_frame_menu_hover_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_menu_hover_color]' value='". esc_attr($default_options['bbhmm_frame_menu_hover_color']) ."' />
		<div id='bbhmm_frame_menu_hover_color_picker'></div>
		";		

	}



	
}

/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_top_nav_text_color_setting()
{
	global $default_options;

	$options = get_option('bbhmm_frame_theme_options_group');

	if(isset($options['bbhmm_frame_top_nav_text_color']))
	{

		echo "
		<input type='text' id='txtbbhmm_frame_top_nav_text_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_top_nav_text_color]' value='". esc_attr($options['bbhmm_frame_top_nav_text_color'] ) ."' />
		<div id='top_nav_text_color_picker'></div>
		";
	
	}
	else
	{
		echo "
		<input type='text' id='txtbbhmm_frame_top_nav_text_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_top_nav_text_color]' value='". esc_attr($default_options['bbhmm_frame_top_nav_text_color']) ."' />
		<div id='top_nav_text_color_picker'></div>
		";		}

}

/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_main_nav_color_setting()
{
	global $default_options;

	$options = get_option('bbhmm_frame_theme_options_group');


	if(isset($options['bbhmm_frame_menu_color']))
	{

		echo "
			<input type='text' id='txtbbhmm_frame_menu_nav_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_menu_color]' value='". esc_attr($options['bbhmm_frame_menu_color']) ."' />
			<div id='bbhmm_frame_menu_color_picker'></div>
		";
	}
	else
	{
		echo "
			<input type='text' id='txtbbhmm_frame_menu_nav_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_menu_color]' value='". esc_attr($default_options['bbhmm_frame_menu_color']) ."' />
			<div id='bbhmm_frame_menu_color_picker'></div>
		";

	}
}

/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_submenu_color_setting()
{
	global $default_options;

	$options = get_option('bbhmm_frame_theme_options_group');


	if(isset($options['bbhmm_frame_submenu_color']))
	{

		echo "
			<input type='text' id='txtbbhmm_frame_submenu_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_submenu_color]' value='". esc_attr($options['bbhmm_frame_submenu_color']) ."' />
			<div id='bbhmm_frame_submenu_color_color_picker'></div>
		";
	}
	else
	{
		echo "
			<input type='text' id='txtbbhmm_frame_submenu_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_submenu_color]' value='". esc_attr($default_options['bbhmm_frame_submenu_color']) ."' />
			<div id='bbhmm_frame_submenu_color_color_picker'></div>
		";

	}
}

/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_main_nav_text_color_setting()
{
	global $default_options;

	$options = get_option('bbhmm_frame_theme_options_group');

	if(isset($options['bbhmm_frame_menu_text_color']))
	{

		echo "
			<input type='text' id='txtbbhmm_frame_menu_nav_text_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_menu_text_color]' value='". esc_attr($options['bbhmm_frame_menu_text_color']) ."' />
			<div id='bbhmm_frame_menu_text_color_picker'></div>
		";


	}
	else
	{

		echo "
			<input type='text' id='txtbbhmm_frame_menu_nav_text_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_menu_text_color]' value='". esc_attr($default_options['bbhmm_frame_menu_text_color']) ."' />
			<div id='bbhmm_frame_menu_text_color_picker'></div>
		";
	}
}


/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_bbhmm_frame_fn_footer_text()
{
	$options = get_option('bbhmm_frame_theme_options_group');

	if(isset($options['bbhmm_frame_footer_text']))
	{

		echo "
			<textarea id='txtbbhmm_frame_footer_text' name='bbhmm_frame_theme_options_group[bbhmm_frame_footer_text]' rows='3'>". esc_textarea($options['bbhmm_frame_footer_text']) ." </textarea>
		";


	}
	else
	{

			echo "
			<textarea id='txtbbhmm_frame_footer_text' name='bbhmm_frame_theme_options_group[bbhmm_frame_footer_text]' rows='3'></textarea>
		";
	}
}

/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_fn_link_color_setting()
{
	global $default_options;

	$options = get_option('bbhmm_frame_theme_options_group');

	if(isset($options['bbhmm_frame_hyperlink_color']))
	{

		echo "
		<input type='text' id='txtbbhmm_frame_hyperlink_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_hyperlink_color]' value='". esc_attr($options['bbhmm_frame_hyperlink_color'] ) ."' />
		<div id='bbhmm_frame_hyperlink_color_color_picker'></div>
		";
	
	}
	else
	{
		echo "
		<input type='text' id='txtbbhmm_frame_hyperlink_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_hyperlink_color]' value='". esc_attr($default_options['bbhmm_frame_hyperlink_color'] ) ."' />
		<div id='bbhmm_frame_hyperlink_color_color_picker'></div>
		";		
	}

}

/*
*
* Settings fields output functions
* For the list of theme options in bbhmm_frame_theme_options_group
*/
function bbhmm_frame_fn_visited_link_color_setting()
{
	global $default_options;

	$options = get_option('bbhmm_frame_theme_options_group');

	if(isset($options['bbhmm_frame_hyperlink_visited_color']))
	{

		echo "
		<input type='text' id='txtbbhmm_frame_hyperlink_visited_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_hyperlink_visited_color]' value='". esc_attr($options['bbhmm_frame_hyperlink_visited_color'] ) ."' />
		<div id='bbhmm_frame_hyperlink_visited_color_color_picker'></div>
		";
	
	}
	else
	{
		echo "
		<input type='text' id='txtbbhmm_frame_hyperlink_visited_color' name='bbhmm_frame_theme_options_group[bbhmm_frame_hyperlink_visited_color]' value='". esc_attr($default_options['bbhmm_frame_hyperlink_visited_color'] ) ."' />
		<div id='bbhmm_frame_hyperlink_visited_color_color_picker'></div>
		";		
	}

}


add_action('admin_enqueue_scripts','bbhmm_frame_farbtastic_script');

/*
*
* Enqueue necessary scripts for farbtatsic and jquery ui
*
*/
function bbhmm_frame_farbtastic_script()
{
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script( 'bbhmm_frame-script', get_template_directory_uri() . '/js/fantasticjs.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'jquery-ui-core','',array('jquery'),'',true);
		wp_enqueue_script( 'jquery-ui-widget');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_style('bbhmm_frame-jquery-ui-stylesheet',get_template_directory_uri() . '/css/jquery-ui/jquery-ui.css');
		wp_enqueue_style('bbhmm_frameAdminStylesheet',  get_template_directory_uri() . '/css/bbhmm_frameadminstylesheet.css');
		
}

/*
*
* retrieve the custom css from the theme options and output it for use in the site
*
*/
function bbhmm_frame_custom_style_head()
{
	$options = get_option('bbhmm_frame_theme_options_group');


		echo "<style type='text/css'>";



			//set the body font family
			if(isset($options['bbhmm_frame_body_font']))
		{

			echo "
				
					html , body ,h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6
					 {
							font-family: '".  esc_html($options['bbhmm_frame_body_font']) ."' , sans-serif ;
						}
				

			";

		}


	if(isset($options['bbhmm_frame_top_nav_text_color']))
		{

			echo "
				
					#topmost-nav {
							background-color:".  esc_html($options['bbhmm_frame_top_nav_color']) ." ;
							color: ". esc_html($options['bbhmm_frame_top_nav_text_color']) ." ;
							font-family: '".  esc_html($options['bbhmm_frame_menu_font']) ."' , sans-serif ;
						}

					#topmost-nav a, #topmost-nav a:visited{
							color: ". esc_html($options['bbhmm_frame_top_nav_text_color']) ." ;
						}
				

			";

		}


	if(isset($options['bbhmm_frame_hyperlink_color']))
		{

			echo "
				
					a , a:hover
					{
						color : ". esc_html($options['bbhmm_frame_hyperlink_color']) ." ;
						text-decoration : none;
					}
				

			";

		}



	if(isset($options['bbhmm_frame_hyperlink_visited_color']))
		{

			echo "
				
					a:visited
					{
						color : ". esc_html($options['bbhmm_frame_hyperlink_visited_color']) ." ;
						text-decoration : none;
					}
				

			";

		}

		if(isset($options['bbhmm_frame_menu_color']))
		{

			echo "
				
					#primarymenu-locator
					{
						
						background-color : ". esc_html($options['bbhmm_frame_menu_color']) ." ;
						font-size: 20px;
						font-family: '".  esc_html($options['bbhmm_frame_menu_font']) ."' , sans-serif ;
						padding: 5px;
						
					}

					.main-navigation a, .main-navigation a:visited
					{
						color : ". esc_html($options['bbhmm_frame_menu_text_color']) ." ;
					}

					.main-navigation a:hover
					{
						color:  ". esc_html($options['bbhmm_frame_menu_hover_color']) ." ;
					}

					div#footer-container , #secondary h1 , #secondary-left h1 
					{
						background-color : ". esc_html($options['bbhmm_frame_menu_color']) ." ;
						color : ". esc_html($options['bbhmm_frame_menu_text_color']) ." ;
					}


					#site-info 
					{
						color : ". esc_html($options['bbhmm_frame_menu_color']) ." ;
					}

					.tags-span
					{
						color : ". esc_html($options['bbhmm_frame_menu_text_color']) ." ;
					}

					.tags-span>a
					{
						background-color : ". esc_html($options['bbhmm_frame_menu_color']) ." ;
						padding-left: 5px;
						padding-right: 5px;
						border-radius: 10px;

					}

					.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price
					{
						color : ". esc_html($options['bbhmm_frame_menu_color']) ." ;
					}
								

			";

		}


			if(isset($options['bbhmm_frame_submenu_color']))
		{

			echo "
				
					.main-navigation ul ul , .main-navigation ul ul ul
					{
						background-color : ". esc_html($options['bbhmm_frame_submenu_color']) ." ;
						
					}			

			";

		}


			echo "</style>";


			//echo out the custom favicon
		if(isset($options['bbhmm_frame_custom_favicon']))
		{

			echo "<link id='favicon' rel='icon' type='image/png' href='" . esc_url($options['bbhmm_frame_custom_favicon']) . "'>" ;

		}



}

add_action('wp_head','bbhmm_frame_custom_style_head');


/*
*
* retrieve the footer signature from theme options
* 
*/
function bbhmm_frame_get_footer_signature()
{

	$options = get_option('bbhmm_frame_theme_options_group');

	$footer_text = __("Liquid Blank Theme By <a href='http://www.kozmikinc.com'>Kozmik</a>. Proudly powered by <a href='http://www.wordpress.org'>WordPress</a>","bbhmm_frame");

	if(isset($options['bbhmm_frame_footer_text']))
	{
		$footer_text = esc_html($options['bbhmm_frame_footer_text']);
		
	}

	echo $footer_text;

}



?>
