var j = jQuery.noConflict();

j(document).ready(function(){
	j('a').not('[href*="mailto:"]').each(function () {
		var isInternalLink = new RegExp('/' + window.location.host + '/');
		if ( ! isInternalLink.test(this.href) ) {
		  j(this).attr('target', '_blank');
		};
	});

	j('#myModal').on('shown.bs.modal', function () {
		j('#myInput').trigger('focus')
	})	


	!function(t){t.fn.bcSwipe=function(e){var n={threshold:50};return e&&t.extend(n,e),this.each(function(){function e(t){1==t.touches.length&&(u=t.touches[0].pageX,c=!0,this.addEventListener("touchmove",o,!1))}function o(e){if(c){var o=e.touches[0].pageX,i=u-o;Math.abs(i)>=n.threshold&&(h(),t(this).carousel(i>0?"next":"prev"))}}function h(){this.removeEventListener("touchmove",o),u=null,c=!1}var u,c=!1;"ontouchstart"in document.documentElement&&this.addEventListener("touchstart",e,!1)}),this}}(jQuery);
	 
	// Swipe functions for Bootstrap Carousel
	j('.carousel').bcSwipe({ threshold: 50 });

	j(window).scroll(function(){
	    if (j(this).scrollTop() > 50) {
	       j('section').addClass('focus');
	    } else {
	       j('section').removeClass('focus');
	    }
	});

	// Search 
    j(".fa.fa-search").click(function() {
        j(".toggleSearch").toggle("slide")
    })
    // Gravity form fixes 
    j("form#gform_3 .medium").addClass('form-control');
    j("form#gform_2 .medium").addClass('form-control');
    j("form#gform_2 input").removeClass('medium');
    j("form#gform_2 .gfield").addClass('form-group');
    j("form#gform_2 select").addClass('form-control');
    j("form#gform_2 textarea").addClass('form-control');
    j(".phone").text(function(i, text) {text = text.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3"); return text; });
});

j(document).on('click', '#searchToggle', function(event) {
   j('form#searchform').removeClass('d-none');
   j('form#searchform').addClass('d-block');
});
j(document).on('click', '#searchClose', function(event) {
   j('form#searchform').removeClass('d-block');
   j('form#searchform').addClass('d-none');
});
j(document).on('click', '[data-toggle="lightbox"]', function(event) {
	event.preventDefault();
	j(this).ekkoLightbox();
});
/*
j('.navbar .dropdown > a').click(function() {
		if (!j(this).hasClass("parent-clicked")) {
			j(this).addClass("parent-clicked");
		} else {
			location.href = this.href;
		}
}); */
function normalizeSlideHeights() {
    j('.carousel').each(function(){
      var items = j('.carousel-item img.background', this);
      // reset the height
      items.css('min-height', 0);
      // set the height
      var maxHeight = Math.max.apply(null, 
          items.map(function(){
          return j(this).outerHeight()}).get() 
      );
      items.css('min-height', maxHeight + 'px');
    })
    j('section#home_testimonials .carousel').each(function(){
      var items = j('.carousel-item', this);
      // reset the height
      items.css('min-height', 0);
      // set the height
      var maxHeight = Math.max.apply(null, 
          items.map(function(){
          return j(this).outerHeight()}).get() 
      );
      items.css('min-height', maxHeight + 'px');
    })
}

jQuery(
  function(j) {
  if (j(window).width() > 769) {
    j('.navbar .dropdown > a').click(function() {
      location.href = this.href;
    });
  }
}
);
// j(window).on('load resize orientationchange', normalizeSlideHeights);
// Listens for screen width change to apply bootstrap dropdown menus
// function myFunction(x) {
//   if (x.matches) { // If media query matches
// document.body.style.backgroundColor = "rgb(248,248,248)";
//   } else {
// document.body.style.backgroundColor = "rgb(238,238,238)";
//     j('.navbar .dropdown > a').click(function() {
//       location.href = this.href;
//     });
//   }
// }
//  var x = window.matchMedia("(max-width: 786px)")
// myFunction(x) // Call listener function at run time
// x.addListener(myFunction) // Attach listener function on state changes
// Solutions Filter
// var $btns = j('.btn_filter').click(function() {
// if (this.id == 'all') {
// j('#solutions_results > .item').fadeIn(450);
//   } else {
// var $el = j('.' + this.id).fadeIn(450);
// j('#solutions_results > .item').not($el).hide();
// }
// $btns.removeClass('active');
// j(this).addClass('active');
// })
