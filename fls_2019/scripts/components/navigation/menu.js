var j = jQuery.noConflict();
j(document).ready(function(){
	// toggle nav
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});

	j('.menus__sub').parent().addClass('menus__dropdown');
	j('.menus__sub').addClass('dropdown-menu');
	j('.menus__list li.menus__dropdown a').addClass('menus__dropdown--toggle');
	j('.menus__sub li a').removeClass('menus__dropdown--toggle'); 
	j('.menus__list .dropdown-toggle').append('<b class="caret"></b>');
	j('a.dropdown-toggle').attr('data-toggle', 'dropdown');	
});