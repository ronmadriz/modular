j(document).ready(function(){
    //Show dropdown on mouse enter solutions tab
    j('.menus').mousemove(function(e) {
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
    j('.menus').mousemove(function(e) {
        console.log('move detected');
        if(j('.menus__solutions:hover').length == 0){
            console.log('not hovering');
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
        return false;
    };
    if (mouseX > solutionsTab.right){
        // Right
        return false;
    };
    if (menuBar.bottom + 5 < mouseY){
        // Below
        return false;
    };
    if (solutionsTab.top > mouseY){
        // Above
        return false;
    };
    
    return true;
}
