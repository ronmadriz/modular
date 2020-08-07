var j = jQuery.noConflict();
j(document).ready(function(){
	// toggle nav
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});

	$('.menus__sub').parent().addClass('menus__dropdown');
	$('.menus__sub').addClass('dropdown-menu');
	$('.menus__list li.menus__dropdown a').addClass('menus__dropdown--toggle');
	$('.menus__sub li a').removeClass('menus__dropdown--toggle'); 
	$('.menus__list .dropdown-toggle').append('<b class="caret"></b>');
	$('a.dropdown-toggle').attr('data-toggle', 'dropdown');	
});