var j = jQuery.noConflict();
j(document).ready(function(){
  // toggle nav
  j('.menus__toggle').click(function(){
    j('.menus__list').toggleClass('menus__list--active');
  });
});

j('.menus .menus__item--parent:has(ul.sub-navigation)').click(function(e){
	j(this).children('a').click(function (e) {
        return false;
    });     
});