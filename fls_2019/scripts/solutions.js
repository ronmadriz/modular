j(document).ready(function(){
    // j('#menus__item--1').hover(function(){j('.menus__solutions').toggleClass('show') }, );
    j('#menus__item--1').mouseenter(function() {
       j('.menus__solutions').addClass('show');
    });
    j('.menus__solutions').mouseleave(function() {
        j('.menus__solutions').removeClass('show');
    });
});
