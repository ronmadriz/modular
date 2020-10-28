j(document).ready(function(){
    //Show dropdown on mouse enter solutions tab
    j('#menus__item--1').mouseenter(function() {
       j('.menus__solutions').addClass('show');
    });

    //Remove dropdown when mouse leaves dropdown box
    j('.menus__solutions').mouseleave(function() {
        j('.menus__solutions').removeClass('show');
    });

    // Also remove dropdown when mouse leaves solutions tab, but not when it goes into dropdown
    j('#menus__item--1').mouseleave(function(e) {
        if(j('.menus__solutions:hover').length == 0){
            var solutionsTab = j('#menus__item--1').getBoundingClientRect();
            var mouseX = e.pageX;
            var mouseY = e.pageY;
            //If mouse is in gap (FireFox only) don't remove
            if (!inGapArea(mouseX,mouseY,solutionsTab)){
                j('.menus__solutions').removeClass('show');
            }
        }
    });
});


function inGapArea(mouseX, mouseY, solutionsTab){
    if (mouseX < solutionsTab.left){
        // Left
        return false;
    };
    if (mouseX > solutionsTab.right){
        // Right
        return false;
    };
    if (solutionsTab.bottom +9 < mouseY){
        // Below assuming a max 9 px gap
        return false;
    };
    if (solutionsTab.bottom > mouseY){
        // Above
        return false;
    };

    return true;
}
