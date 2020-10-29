j(document).ready(function(){
    //Show dropdown on mouse enter solutions tab
    j('#menus__item--1').mousemove(function(e) {
        if (inSolutionsTab(e)){
            j('.menus__solutions').addClass('show');
        }
    });

    //Remove dropdown when mouse leaves dropdown box
    j('.menus__solutions').mouseleave(function() {
        console.log('leaving dropdown')
        j('.menus__solutions').removeClass('show');
    });

    // Also remove dropdown when outside solutions tab, but not when it goes into dropdown
    j('#menus__item--1').mousemove(function(e) {
        if(j('.menus__solutions:hover').length == 0){
            if (!inSolutionsTab(e)){
                j('.menus__solutions').removeClass('show');
            };
        };
    });
});


function inSolutionsTab(e){
    var solutionsTab = j('#menus__item--1')[0].getBoundingClientRect();
    var menuBar = j('.menus')[0].getBoundingClientRect();
    var mouseX = e.pageX;
    var mouseY = e.pageY;

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
    if (menuBar.bottom + 5 < mouseY){
        // Below
        console.log('bottom');
        return false;
    };
    if (solutionsTab.top > mouseY){
        // Above
        console.log('top');
        return false;
    };
    console.log('inside');
    return true;
}
