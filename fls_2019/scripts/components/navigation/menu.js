var j = jQuery.noConflict();
j(document).ready(function(){
	// toggle nav
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});

});
j(document).on('click', '.menus__link', function(event) {
	console.log('clicked');
}