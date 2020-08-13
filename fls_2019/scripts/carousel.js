var j = jQuery.noConflict();
(function() {
  var sliderWidth = j('.featured__list').width();
  var Carousel = {
    init: function() {
      Carousel.bindEvents();    
      // You're missign the initial insertion
      // and the negative margin (like in the codepen)
      // This helps to go prev without nuisances. 
      j('.featured__list').css({marginLeft: -sliderWidth});
      j('.featured__item:last-child').prependTo('.featured__list');
    },
    bindEvents: function() {
      j(".featured__nav--next").on("click", Carousel.next);
      j(".featured__nav--prev").on("click", Carousel.previous);
      j(document).on("keydown", function(e) { // you need only one listener
        var key = e.which; // Use Event.which instead of keyCode
        if (key===37) Carousel.previous();
        if (key===39) Carousel.next();
      });
    },
    next: function() {
      j('.featured__list').animate({
        left: -sliderWidth
      }, 500, function() {
        j('.featured__item:first-child').appendTo('.featured__list');
        // you don't want to reset left of "article" but ".featured__list"
        j('.featured__list').css('left', 0);
      });
    },
    previous: function() {
      j('.featured__list').animate({
        left: +sliderWidth
      }, 500, function() {
        j('.featured__item:last-child').prependTo('.featured__list');
        // you don't want to reset left of "article" but ".featured__list"
        j('.featured__list').css('left', 0);
      });
    }
    // TODO: update, props
  }  
  j( Carousel.init );
})(window);