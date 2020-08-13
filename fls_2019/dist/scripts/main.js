const FlexSlider = {
  // total no of items
  num_items: document.querySelectorAll('.featured__item').length,
  
  // position of current item in view
  current: 1,

  init: function() {
    // set CSS order of each item initially
    document.querySelectorAll('.featured__item').forEach(function(element, index) {
      element.style.order = index+1;
    });

    this.addEvents();
  },

  addEvents: function() {
    const that = this;

    // click on move item button
    document.querySelector('.featured__nav').addEventListener('click', () => {
      this.gotoNext();
    });

    // after each item slides in, slider container fires transitionend event
    document.querySelector('.featured__list').addEventListener('transitionend', () => {
      this.changeOrder();
    });
  },

  changeOrder: function() {
    // change current position
    if(this.current == this.num_items)
      this.current = 1;
    else 
      this.current++;

    let order = 1;

    // change order from current position till last
    for(let i=this.current; i<=this.num_items; i++) {
      document.querySelector('.featured__item[data-position="' + i + '"]').style.order = order;
      order++;
    }

    // change order from first position till current
    for(let i=1; i<this.current; i++) {
      document.querySelector('.featured__item[data-position="' + i + '"]').style.order = order;
      order++;
    }

    // translate back to 0 from -100%
    // we don't need transitionend to fire for this translation, so remove transition CSS
    document.querySelector('.featured__list').classList.remove('featured__list--transition');
    document.querySelector('.featured__list').style.transform = 'translateX(0)';
  },

  gotoNext: function() {
    // translate from 0 to -100% 
    // we need transitionend to fire for this translation, so add transition CSS
    document.querySelector('.featured__list').classList.add('featured__list--transition');
    document.querySelector('.featured__list').style.transform = 'translateX(-100%)';
  }
};

FlexSlider.init();
jQuery(function(j){ // use jQuery code inside this to avoid "j is not defined" error
	j('.load__more').click(function(){
 
		var button = j(this),
		    data = {
			'action': 'loadmore',
			'query': fc_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : fc_loadmore_params.current_page
		};
 
		j.ajax({ // you can also use j.post here
			url : fc_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'More posts' ).prev().before(data); // insert new posts
					fc_loadmore_params.current_page++;
 
					if ( fc_loadmore_params.current_page == fc_loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// j( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});
var j = jQuery.noConflict();
j(document).ready(function(){
	j('a').not('[href*="mailto:"]').each(function () {
		var isInternalLink = new RegExp('/' + window.location.host + '/');
		if ( ! isInternalLink.test(this.href) ) {
		  j(this).attr('target', '_blank');
		};
	});
  j('.crsl-items').carousel();
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
      slideMargin:5,
      verticalHeight:675,
      enableDrag:true,
      enableTouch:true,
      currentPagerPosition:'left',
      speed:600,
      vThumbWidth:300,
      onSliderLoad: function(el) {
        el.lightGallery({
            selector: '#lightSlider .lslide'
        });
      },
      responsive : [
          {
              breakpoint:800,
              settings: {
                  item:1,
                  slideMove:1,
                  slideMargin:6,
                  gallery:false,
                }
          },
      ]          
    });
    j('#update').firstVisitPopup({
      cookieName : 'flsUpdate'
    });
});

// Case Studies
j(function() {
    j('#solution_filter, #industry_filter').change(function(){
        j('.all-solutions').hide();
        j('.' + j(this).val()).show();
    });
}); 
// Search Toggle 
j(document).on('click', '#searchToggle', function(event) {
   j('form#searchform').removeClass('d-none');
   j('form#searchform').addClass('d-block');
});

j(document).on('click', '#searchClose', function(event) {
   j('form#searchform').removeClass('d-block');
   j('form#searchform').addClass('d-none');
});

// Gallery Lightbox
j(document).on('click', '[data-toggle="lightbox"]', function(event) {
	event.preventDefault();
	j(this).ekkoLightbox();
});

j(document).ready(function(){
  // toggle nav
  j('.menus__toggle').click(function(){
    j('.menus__list').toggleClass('menus__list--active');
  });

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
// Solutions Filter
var $btns = j('.btn_filter').click(function() {
  if (this.id == 'all') {
    j('.studies__results > .item').fadeIn(450);
  } else {
    var $el = j('.' + this.id).fadeIn(450);
    j('.studies__results > .item').not($el).hide();
  }
  $btns.removeClass('active');
  j(this).addClass('active');
})
j(document).scroll(function() {
  if (screen.width > 786) {
    j('.navbar-brand img').css({width: j(this).scrollTop() > 100? "280px":"457.5px"});  
  }
});