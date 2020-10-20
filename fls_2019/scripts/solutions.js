j(document).ready(function(){
    // j('#menus__item--1').hover(function(){j('.menus__solutions').toggleClass('show') }, );
    console.log("test");
    // j('#menus__item--1').mouseover(function() {
    //     j('.menus__solutions').addClass('show');
    // });
    j('.menu__parent').not('#menus__item--1').mouseover(function() {
        j('.menus__solutions').removeClass('show');
    });
});
