j(document).ready(function(){
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});
	if (j(window).width() < 786) {
		j('<em class="menus__caret"></em>').insertBefore('.menus__child');
		j('.menus__caret').click( function(){
			j(this).toggleClass('menus__caret--open');
			j(this).parent('.menus__parent').toggleClass('menus__active');
			j(this).siblings('.menus__child').toggleClass('menus__open');
		} );	
	}	
});