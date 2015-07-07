/**
 * Theme functions file
 *
 *
 */
( function( $ ) {

RectContainer();
secondaryHeight();

$(window).resize(secondaryHeight);


// responsive menu functionality
$('button.menu-toggle').click(function(){


	if( $('.main-navigation div').not('#small-menu').is(':visible') )
	{
			$('.main-navigation div').not('#small-menu').hide();
	}
	else
	{
			$('.main-navigation div').not('#small-menu').show();
	}

});


/**
 * Toggle search box and icon on click
 *
 */
$('#top_nav_search_button').click(function(){

	$('#search-container').show();
	$('i.icon-search').hide();
	$('#searchbutton').hide();

});



function secondaryHeight(){

		var screen_width = $(window).width();

		if ( screen_width > 960 && $('div#secondary').height() < $('div#content').height()) {
			var secondary_height = $('div#content').height();
			$('div#secondary').height(secondary_height);
		}
		else{
			$('div#secondary').css("height",'auto');
		}

}



function RectContainer(){

	if($('div#container').length > 0)
	{
		$('div#container').addClass('col-md-9');

		var detachees = $('div#main').children().detach();

		//create content-wrapper and .row div
		var contentWrapper = $("<div id='content-wrapper' class='boxed-width'>");
		var rowDiv = $("<div class='row'>");

		$(rowDiv).append($(detachees));
		$(contentWrapper).append($(rowDiv));
		$('div#main').append($(contentWrapper));

		


	}
}	

} )( jQuery );
