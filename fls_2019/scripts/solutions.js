j(document).ready(function(){
    //Show dropdown on mouse
    j('#menus__item--1').mouseenter(function() {
       j('.menus__solutions').addClass('show');
    });
    //Remove dropdown when mouse leaves dropdown box
    j('.menus__solutions').mouseleave(function() {
        j('.menus__solutions').removeClass('show');
    });

});
