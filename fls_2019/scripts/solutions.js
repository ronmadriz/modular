j(document).ready(function(){
    //Show dropdown on mouseenter
    j('#menus__item--1').mouseenter(function() {
       j('.menus__solutions').addClass('show');
    });
    //Remove dropdown when mouse leaves dropdown box
    j('.menus__solutions').mouseleave(function() {
        j('.menus__solutions').removeClass('show');
    });
    // Also remove dropdown when mouse leaves navbar, but not when it goes into dropdown
    j('#menus__item--1').mouseleave(function() {
        if(!j('.menus__solutions:hover').length != 0){
            j('.menus__solutions').removeClass('show');
        }
    });
});
