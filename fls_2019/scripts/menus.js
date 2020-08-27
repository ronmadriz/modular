j(document).ready(function(){
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});
	j('.has__children').click(function() {
		j('.has__children ul').toggleClass('show');
	}); 
	if (j(window).width() < 786) {
		j('<em class="menus__caret"></em>').insertBefore('.menus__child');
		j('.menus__parent').siblings('.menus__child').hide();
		j('.menus__parent').click( function(){
			j(this).siblings('.menus__child').toggle();
		} );	
	}	
});