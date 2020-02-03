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
	j('.carousel').bcSwipe({ threshold: 50 });
  j('#flsCarousel').carousel('pause');
  j("a[target!='_blank'][href$='.pdf']").attr("target", "_blank");
	j(window).scroll(function(){
	    if (j(this).scrollTop() > 50) {
	       j('section').addClass('focus');
	    } else {
	       j('section').removeClass('focus');
	    }
	});
    j(".phone").text(function(i, text) {text = text.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3"); return text; });
    // change SVG Target to TOP
    j('svg a').click(function(event){
      j('a').attr("target", "_top");
    });
    // carousel Nav
    var view = j("#thumb_list");
    var move = "250px";
    var sliderLimit = -1900;
    j("#thumb_right").click(function(){
        var currentPosition = parseInt(view.css("right"));
        if (currentPosition >= sliderLimit) view.stop(false,true).animate({left:"-="+move},{ duration: 100})
    });
    j("#thumb_left").click(function(){
        var currentPosition = parseInt(view.css("left"));
        if (currentPosition < 0) view.stop(false,true).animate({left:"+="+move},{ duration: 100});
    });
    j("#lightSlider").lightSlider({
      gallery:true,
      item:1,
      loop:true,
      thumbItem:6,
      slideMargin:0,
      enableDrag:true,
      enableTouch:true,
      currentPagerPosition:'left',
      onSliderLoad: function(el) {
        el.lightGallery({
            selector: '#lightSlider .lslide'
        });
      }
    });
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
function normalizeSlideHeights() {
    j('.carousel').each(function(){
      var items = j('.carousel-item img.background', this);
      items.css('min-height', 0);
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
function offsetAnchor() {
    if(location.hash.length !== 0) {
        window.scrollTo(window.scrollX, window.scrollY - 250);
    }
}
window.addEventListener("hashchange", offsetAnchor);
window.setTimeout(offsetAnchor, 1)

// Solutions Filter
var $btns = j('.btn_filter').click(function() {
  if (this.id == 'all') {
    j('#solutions_results > .item').fadeIn(450);
  } else {
    var $el = j('.' + this.id).fadeIn(450);
    j('#solutions_results > .item').not($el).hide();
  }
  $btns.removeClass('active');
  j(this).addClass('active');
})
j(document).scroll(function() {
  if (screen.width > 786) {
    j('.navbar-brand img').css({width: j(this).scrollTop() > 100? "280px":"457.5px"});  
  }
});