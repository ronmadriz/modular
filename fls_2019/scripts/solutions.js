j(document).ready(function(){
    // j('#menus__item--1').hover(function(){j('.menus__solutions').toggleClass('show') }, );
    console.log("test");
    j('#menus__item--1').mouseover(function() {
       j('.menus__solutions').addClass('show');
    });
    j('#menus__item--1, #menu-mega_solution').mouseleave(function() {
        j('.menus__solutions').removeClass('show');
    });
});
