var j = jQuery.noConflict();
j(document).ready(function(){
	// toggle nav
	j('.menus__toggle').click(function(){
		j('.menus__list').toggleClass('menus__list--active');
	});
	j(function(){
		var children=j('.menus__list li a').filter(function(){return j(this).nextAll().length>0})
		j('<span class="menus__caret">+</span>').insertAfter(children)
		j('.menus__list .menus__caret').click(function (e) {
			j(this).next().slideToggle(300);
			  return false;
		});
	})
});
