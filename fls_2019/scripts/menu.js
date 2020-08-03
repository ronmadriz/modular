var j = jQuery.noConflict();
j(document).ready(function(){
  // toggle nav
  j('.menus__toggle').click(function(){
    j('.menus__list').toggleClass('menus__list--active');
  });
});

j('.menus__item--parent').children().click(function(){
    event.preventDefault();
    // j(this).children('.menus__sub').toggleClass('menus__sub--active');     
});