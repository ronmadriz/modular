j(document).ready(function(){
    // j('#menus__item--1').hover(function(){j('.menus__solutions').toggleClass('show') }, );
    j('#menus__item--1').mouseover(function() {
        j('.menus__solutions').addClass('show');
    });
    j('#page-all').not('#menus__item--1', '.menus__solutions').mouseover(function() {
        j('.menus__solutions').removeClass('show');
    });
});
