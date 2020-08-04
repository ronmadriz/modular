var j = jQuery.noConflict();
j(document).ready(function(){
  // toggle nav
  j('.menus__toggle').click(function(){
    j('.menus__list').toggleClass('menus__list--active');
  });
});

j('.menus__item--parent a').click(function(e){
    event.preventDefault();
});
j('.menus__item--parent').click(function(e){
	j(this).next().slideToggle(300);
	return false;
    // j(this).children('.menus__sub').toggleClass('menus__sub--active');     
});