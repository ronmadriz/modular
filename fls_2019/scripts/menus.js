var j = jQuery.noConflict();
j(document).ready(function(){
  j('.menus__caret').siblings('.menus__child').hide();
  j('.menus__caret').click( function(){
    j(this).siblings('.menus__child').toggle();
  } );
});
