/*
Theme Name: Liquid Blank
Theme URI: http://www.kozmikinc.com
Author: Ransome Madziyauswa
Author URI: http://www.rennie.kozmikinc.com
Description: Very Simple Theme For blogs, ecommerce shops. Quick and easy to set up and use.
Version: 1.8
License: GNU General Public License v2 or later




Resources
------------------------------------------------------------

Underscores
------------
Resource URI: http://underscores.me/
Copyright: Automattic, automattic.com
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Twenty Fourteen Theme
------------
Resource URI: http://wordpress.org/themes/twentyfourteen
Copyright: the WordPress team, http://wordpress.org/
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Bootstrap
---------
Resource URI: http://getbootstrap.com/
Copyright: 2011-2014 Twitter, Inc
License: MIT
License URI: http://opensource.org/licenses/MIT


JQuery UI
-----------
Resource URI: http://jqueryui.com/
Copyright: 2015, The jQuery Foundation
License: MIT
License URI: http://opensource.org/licenses/MIT

FontAwesome
-----------
Resource URI: http://fortawesome.github.io/Font-Awesome/3.2.1/
Font License: SIL Open Font License, Version 1.1
Font License URI: https://scripts.sil.org/OFL?
Code License: MIT License
Code License URI:  http://opensource.org/licenses/mit-license.html


html5shiv
-----------
Copyright: Alexander Farkas, Jonathan Neal, Paul Irish
Resource URI: https://code.google.com/p/html5shiv/
License: MIT/GPLv2
License URI: http://opensource.org/licenses/MIT
License URI: http://www.gnu.org/licenses/gpl-2.0.html


RetinaJs
----------
Copyright: Imulus, http://imulus.com/
Resource URI: http://imulus.github.io/retinajs/
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Screenshot
------------

Copyright: Aleksi Tappura
Resource URI: https://unsplash.imgix.net/45/QDSMoAMTYaZoXpcwBjsL__DSC0104-1.jpg?q=75&fm=jpg&s=a23211f4c321462b631e8bc8978ca4af
License: CC0 1.0
License URI: http://creativecommons.org/publicdomain/zero/1.0/deed.en




*/


Liquid blank documentation



Installing liquid blank theme

In your wordpress dashboard go to Appearance -> Themes -> Add New -> Upload
Theme
Click the browse button and locate the liquid blank zip file where you have downloaded
it onto your machine. Select the zip file and click Install Now.
After the theme is installed click on Activate.



If you preview your site it should look blank with no custom colors or options as in the demo. To Set Up Your own colors and options Go To your dashboard
Appearance-> Theme ptions ans set up your own options.


Setting up custom options

To customize your theme colors and options go to Appearance -> Theme Options
The options page will load up with the default options, if these are the ones you require
just click Save Changes and your site is good to go with the default options.
If you click Save Changes you can run the site preview.


Setting up Navigational Menus

In your wordpress dashboard. Go to Appearance -> Menu. Create and select your
menu items that you would want to appear. There are two places which are menu
capable in Liquid Blank theme.
 The Topmost Menu which will be above the site header is meant for small
menus that do not contain many items. Under Menu Settings select the
checkbox that says Secondary Menu In Topmost Location Above Site Title.
This will output the menu on top of your site above the site header:
 The main navigational menu is made by selecting the checkbox that says Main
Menu (Primary Menu) in the Menu Settings. This is the main menu area
below the site header.



The custom favicon

In your wordpress dashboard. Go to Appearance -> Theme Options -> Navigation Options.
The favicon is the little image that is shown in your browsers tabs to identify your site.
It can be any image or as it is usually your logo. Make a 16x16px image of your logo
and upload it via Media->Add New. After uploading the image, get the url to that
image including the http:// e.g.
http://www.kozmikinc.com/demos/lqblankdemo/wp-content/uploads/2014/10/logo.jpg





Footer caption

In your wordpress dashboard. Go to Appearance -> Theme Options -> Copyright
Text.
This is the caption that is shown at the bottom of your website e.g. Copyright 2014. All
Rights Reserved.




Widget areas

In your wordpress dashboard. Go to Appearance -> Widgets.
Liquid Blank has three widget areas that you can use to put all your widgets. The Right
Sidebar which happens to be the main widget area, the Left Sidebar which is only
visible in pages using the Left Sidebar Page template and the Footer Area which is at
the very bottom of your site before your footer caption.




Page templates

Right Sidebar
When you create your page and have added content and you wish for it to have a
right sidebar. Go under Page Attributes and select Right Sidebar Page in the
templates section.Your page will come out with a sidebar on the right hand side.

Left Sidebar
Same as right sidebar page. Just select Left Sidebar Page on the page templates section.

Full Width Page
When you create your page and have added content and you wish for it to have no
sidebars. Go under Page Attributes and select Full Width Page in the templates
section. The Page will fill the whole page section with no sidebars on either side.



To have a site without a border box around it and that fills the whole width of the
screen go to Appearance -> Theme Options -> Navigation Options and tick the
checkbox that says Use Full Width Layout.




Retina readiness

The liquid blank theme is retina ready. Just make sure when you upload your images
you make two copies of the same image. The second copy should be twice the size of
the original image. The theme will determine which image to use if being viewed from
a retina capable display.
E.g. To upload an image called retina_sample.jpg, us your image editor to make a
second one twice as big as the first with the name retina_sample-2x.jpg.




Font awesome icons

To embed font awesome icons you would need to know the icon name that you want to
embed. Go to http://fortawesome.github.io/Font-Awesome/3.2.1/icons/ for a list of all
the font awesome icons that are available for your use.
In your page or posts type in this shortcode <i class="icon-name"></i> where
icon-name is the name of the icon you want to embed e.g. if you want to embed the
apple icon type in <i class="icon-apple"></i>.




Sliders & Carousels

Liquidblank is made on bootstrap and supports all the bootstrap classes and functions including the bootstrap carousel for Sliders as in the preview page:
http://www.kozmikinc.com/demos/lqblankdemo. To implement the home slider on the preview demo you can use the boostrap code as detailed in the bootstrap documentaion (http://getbootstrap.com/javascript/#carousel)





Columns

Liquidblank is made on bootstrap and supports all the bootstrap classes and functions including the bootstrap carousel for Sliders as in the preview page:
http://www.kozmikinc.com/demos/lqblankdemo. To implement columns in your posts/pages use any of bootstraps grid calsses as detailed here
(http://getbootstrap.com/css/#grid). E.g. to have three columns you can use this code
<div class="col-md-4"> Content Goes Here For Column 1 </div>
<div class="col-md-4"> Content Goes Here For Column 2 </div>
<div class="col-md-4"> Content Goes Here For Column 3 </div>

