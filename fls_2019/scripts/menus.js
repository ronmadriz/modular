j(document).ready(function(){
	j('.menus__toggle').click(function(){
		j(this).toggleClass('menus__toggle--open');
		j('.menus__list').toggleClass('menus__list--active');
	});
		j('<em class="menus__caret"></em>').insertBefore('.menus__child');
	if (j(window).width() < 992) {
		j('.menus__caret').click( function(){
			j(this).toggleClass('menus__caret--open');
			j(this).parent('.menus__parent').toggleClass('menus__active');
			j(this).siblings('.menus__child').toggleClass('menus__open');
		} );	
	}	
	j('#menus__item--1').hover(
	       function(){ j('.menus__solutions').toggleClass('show') },
	);
});
