
(function($){

$(document).ready(function(){
	// This function says when the menu icon is clicked
	// Add the 'shift' class that animates the drawer open
	// then show the mask (overlay) element
	$('.navOpen').click(function(){
		$('main, nav').addClass('shift');
		$('.mask').show();
	});

	//This function Closes the navigation
	// and hides the overlay
	$('.mask, .closeNav').click(function(e){
		e.preventDefault;
		$('.mask').hide();
		$('nav, main').removeClass('shift');
	});

	// This uses hypher.js to hyphenate our paragraphs
	$('p, article, main, em, strong').hyphenate('en-us');

})

})(jQuery)

