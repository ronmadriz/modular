var j = jQuery.noConflict();
j(document).ready(function(){
  // toggle nav
  j('.menus__toggle').click(function(){
    j('.menus__list').toggleClass('menus__list--active');
  });
});

j('.menus__list li:has(ul)').append('<span class="toChild">+</span>');
    j('.menus__list .toChild').click(function (e) {
		j(this).next().slideToggle(300);
		return false;
    });