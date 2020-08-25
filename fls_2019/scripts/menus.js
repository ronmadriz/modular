j(document).ready(function(){
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});
	j('.parent').click(function() {
		j('.submenu').toggle('visible');
	}); 
});