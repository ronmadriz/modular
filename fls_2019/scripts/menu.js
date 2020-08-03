var j = jQuery.noConflict();
j(document).ready(function(){
  // toggle nav
  j('.menus__toggle').click(function(){
    j('.menus__list').toggleClass('menus__list--active');
  });
});

j( document ).on( 'click', function( event ) {
  j('.menus__item').closest('.menus__sub').toggleClass( "menus__item--active" );
});