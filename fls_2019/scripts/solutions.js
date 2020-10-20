j(document).ready(function(){
    // j('#menus__item--1').hover(function(){j('.menus__solutions').toggleClass('show') }, );
    j('#menus__item--1').mouseover(function() {
       j('.menus__solutions').addClass('show');
    });
    j('#menu-mega').not('#menus__item--1').mouseover(function() {
        j('.menus__solutions').removeClass('show');
    });
    j('div').not('.menus__solutions').mouseover(function() {
        j('.menus__solutions').removeClass('show');
    });


});
