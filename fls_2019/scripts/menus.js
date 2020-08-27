var j = jQuery.noConflict();
j(document).ready(function(){
	if (j(window).width() < 786) {
		j('.menus__parent').siblings('.menus__child').hide();
		j('.menus__parent').click( function(){
			j(this).siblings('.menus__child').toggle();
		} );	
	}
});
