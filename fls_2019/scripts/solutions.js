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
    j('#menus__item--1').mousemove(function(e) {
        if(j('.menus__solutions:hover').length == 0){
            var solutionsTab = j('#menus__item--1')[0].getBoundingClientRect();
            var menuBar = j('.menus');
            var mouseX = e.pageX;
            var mouseY = e.pageY;
            //If mouse is in gap (FireFox only) don't remove
            if (!inSolutionsTab(mouseX,mouseY,solutionsTab, menuBar)){
                j('.menus__solutions').removeClass('show');
            }
        }
    });
});


function inSolutionsTab(mouseX, mouseY, solutionsTab, menuBar){
    if (mouseX < solutionsTab.left){
        // Left
        console.log('left');
        return false;
    };
    if (mouseX > solutionsTab.right){
        // Right
        console.log('right');
        return false;
    };
    if (menuBar.bottom < mouseY){
        // Below
        console.log('bottom');
        return false;
    };
    if (solutionsTab.top > mouseY){
        // Above
        console.log('top');
        return false;
    };

    return true;
}
