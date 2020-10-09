j(document).ready(function(){
    // j('#menus__item--1').hover(function(){j('.menus__solutions').toggleClass('show') }, );
    j('#menus__item--1').mouseover(function() {
        clearTimeout(this.timer)
        j('.menus__solutions').addClass('show');
    })
    .mouseleave(function() {
        this.timer = setTimeout(function() {
          j('.menus__solutions').removeClass('show');
        }.bind(this), 500);
    });    
});