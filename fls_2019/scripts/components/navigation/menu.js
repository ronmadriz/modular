var j = jQuery.noConflict();
j(document).ready(function(){
	// toggle nav
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});
});