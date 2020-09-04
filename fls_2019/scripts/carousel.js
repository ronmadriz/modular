var j = jQuery.noConflict();
j(document).ready(function(){
  j('.multi__carousel').carousel({
    interval: 6000
  });
  j('.multi__carousel').on('slide.bs.carousel', function (e) {
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
  });
});