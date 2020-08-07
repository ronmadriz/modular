var j = jQuery.noConflict();
j(document).ready(function(){
	// toggle nav
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});
});

j(function() {
  j('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('menus__current');
});