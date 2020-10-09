j(document).ready(function(){
    // j('#menus__item--1').hover(function(){j('.menus__solutions').toggleClass('show') }, ); 
    j('#menus__item--1').on("mouseover", function() {
        clearTimeout(timer);
        openSubmenu();
    }).on("mouseleave", function() {
        timer = setTimeout(
        closeSubmenu
        , 1000);
    });

    function openSubmenu() {
      j(".menus__solutions").addClass("open");
    }
    function closeSubmenu() {
      j(".menus__solutions").removeClass("open");
    }

});
