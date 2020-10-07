var j = jQuery.noConflict();
j(document).ready(function(){

 /* j('.multi__carousel').on('slide.bs.carousel', function (e) {
    // CC 2.0 License Iatek LLC 2018
    // Attribution required
    var je = j(e.relatedTarget);
    var idx = je.index();
    console.log("IDX :  " + idx);
    var itemsPerSlide = 3;
    var totalItems = j('.carousel-item').length;
    if (idx >= totalItems-(itemsPerSlide-1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i=0; i<it; i++) {
        // append slides to end
        if (e.direction=="left") {
            j('.carousel-item').eq(i).appendTo('.carousel-inner');
        }
        else {
            j('.carousel-item').eq(0).appendTo('.carousel-inner');
        }
      }
    }
  }); */ 
  j('.multi__carousel .item').each(function(){
    var next = j(this).next();
    if (!next.length) {
      next = j(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    if (next.next().length>0) {
      next.next().children(':first-child').clone().appendTo($(this));
    } else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
  }); 
  j('.crsl-items').carousel();
  // !function(t){t.fn.bcSwipe=function(e){var n={threshold:50};return e&&t.extend(n,e),this.each(function(){function e(t){1==t.touches.length&&(u=t.touches[0].pageX,c=!0,this.addEventListener("touchmove",o,!1))}function o(e){if(c){var o=e.touches[0].pageX,i=u-o;Math.abs(i)>=n.threshold&&(h(),t(this).carousel(i>0?"next":"prev"))}}function h(){this.removeEventListener("touchmove",o),u=null,c=!1}var u,c=!1;"ontouchstart"in document.documentElement&&this.addEventListener("touchstart",e,!1)}),this}}(jQuery);
  // j('.carousel').bcSwipe({ threshold: 50 });
  j('#flsCarousel').carousel('pause');  


  j('.featured__slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: j('.carousel__nav--prev'),
    nextArrow: j('.carousel__nav--next'),
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });  
});