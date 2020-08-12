/*! responsiveCarousel.JS - v1.2.2                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
 * https://basilio.github.com/responsiveCarousel
 *
 * Copyright (c) 2018 Basilio Cáceres <basilio.caceres@gmail.com>;
 * Licensed under the MIT license */

;(function($){
  "use strict";
  $.fn.carousel = function(args){
    var defaults, obj;
    defaults = {
      infinite : true,
      visible : 1,
      speed : 'fast',
      overflow : false,
      autoRotate : false,
      navigation : $(this).data('navigation'),
      itemMinWidth : 0,
      itemEqualHeight : false,
      itemMargin : 0,
      itemClassActive : 'crsl-active',
      imageWideClass : 'wide-image',
      // Use to build grid system - carousel : false
      carousel : true
    };
    return $(this).each( function(){
      // Set Object
      obj = $(this);

      // Extend
      if( $.isEmptyObject(args) === false )
        $.extend( defaults, args );
      if( $.isEmptyObject( $(obj).data('crsl') ) === false )
        $.extend( defaults, $(obj).data('crsl') );


      // Touch detection
      defaults.isTouch = 'ontouchstart' in document.documentElement || navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i) ? true : false ;

      obj.init = function(){
        // Set some default vars
        defaults.total = $(obj).find('.crsl-item').length;
        defaults.itemWidth = $(obj).outerWidth();
        defaults.visibleDefault = defaults.visible;

        // Touch Defaults
        defaults.swipeDistance = null;
        defaults.swipeMinDistance = 100;
        defaults.startCoords = {};
        defaults.endCoords = {};

        // .crsl-items
        $(obj).css({ width: '100%' });
        // .crls-item
        $(obj).find('.crsl-item').css({ position: 'relative', float: 'left', overflow: 'hidden', height: 'auto' });
        // .crsl-item > images with full width
        $(obj).find('.'+defaults.imageWideClass).each( function(){
          $(this).css({ display: 'block', width: '100%', height: 'auto' });
        });
        // .crsl-item > iframes (videos)
        $(obj).find('.crsl-item iframe').attr({ width: '100%' });


        // Declare the item ative
        if( defaults.carousel )
          $(obj).find('.crsl-item:first-child').addClass(defaults.itemClassActive);

        // Move last element to begin for infinite carousel
        if( defaults.carousel && defaults.infinite && ( defaults.visible < defaults.total ) )
          $(obj).find('.crsl-item:first-child').before( $('.crsl-item:last-child', obj) );

        // if defaults.overflow
        if( defaults.overflow === false ){
          $(obj).css({ overflow: 'hidden' });
        } else {
          $('html, body').css({ 'overflow-x': 'hidden' });
        }

        $(obj).trigger('initCarousel', [defaults, obj]);

        // Preload if it`s neccesary
        obj.testPreload();

        // This configure and margins and variables when document is ready,
        // loaded and window is resized
        obj.config();

        // Init AutoRotate
        obj.initRotate();

        // Trigger Clicks
        obj.triggerNavs();

      };

      obj.testPreload= function(){
        if( $(obj).find('img').length > 0 ){
          var totalImages = $(obj).find('img').length, i = 1;
          $(obj).find('img').each( function(){
            obj.preloadImage(this, i , totalImages);
            i++;
          });
        } else {
          $(obj).trigger('loadedCarousel', [defaults, obj]);
        }
      };

      obj.preloadImage = function(image, i, totalImages){
        var new_image = new Image(), attributes = {};
        attributes.src = ( $(image).attr('src') !== undefined ? image.src : '' );
        attributes.alt = ( $(image).attr('alt') !== undefined ? image.alt : '' );
        $(new_image).attr( attributes );
        $(new_image).on('load', function(){
          // Trigger first image loaded as init Loading action
          if( i === 1 )
            $(obj).trigger('loadingImagesCarousel', [defaults, obj]);
          // Trigger last image loaded as loaded complete action
          if( i === totalImages )
            $(obj).trigger('loadedImagesCarousel', [defaults, obj]);
        });
      };

      // Base Configuration:
      obj.config = function(){
        // Width Item
        defaults.itemWidth = Math.floor( ( $(obj).outerWidth() - ( defaults.itemMargin * ( defaults.visibleDefault - 1 ) ) ) / defaults.visibleDefault );
        if( defaults.itemWidth <= defaults.itemMinWidth ){
          defaults.visible = Math.floor( ( $(obj).outerWidth() - ( defaults.itemMargin * ( defaults.visible - 1 ) ) ) / defaults.itemMinWidth ) === 1 ?
            Math.floor( $(obj).outerWidth() / defaults.itemMinWidth ) :
            Math.floor( ( $(obj).outerWidth() - defaults.itemMargin ) / defaults.itemMinWidth );
          defaults.visible = defaults.visible < 1 ? 1 : defaults.visible;
          defaults.itemWidth = defaults.visible === 1 ? Math.floor( $(obj).outerWidth() ) : Math.floor( ( $(obj).outerWidth() - ( defaults.itemMargin * ( defaults.visible - 1 ) ) ) / defaults.visible );
        } else {
          defaults.visible = defaults.visibleDefault;
        }

        if( defaults.carousel ){
          // Normal use - Global carousel variables
          // Set Variables
          obj.wrapWidth = Math.floor( ( defaults.itemWidth + defaults.itemMargin ) * defaults.total );
          obj.wrapMargin = obj.wrapMarginDefault = defaults.infinite && defaults.visible < defaults.total ? parseInt( ( defaults.itemWidth + defaults.itemMargin ) * -1, 10 ) : 0 ;
          // Move last element to begin for infinite carousel
          if( defaults.infinite && ( defaults.visible < defaults.total ) && ( $(obj).find('.crsl-item.'+defaults.itemClassActive).index() === 0 ) ){
            $(obj).find('.crsl-item:first-child').before( $('.crsl-item:last-child', obj) );
            obj.wrapMargin = obj.wrapMarginDefault = parseInt( ( defaults.itemWidth + defaults.itemMargin ) * -1, 10 );
          }
          // Modify width & margin to .crsl-wrap
          $(obj).find('.crsl-wrap').css({ width: obj.wrapWidth+'px', marginLeft: obj.wrapMargin });
        } else {
          // Excepcional use
          // responsiveCarousel might be use to create grids!
          obj.wrapWidth = $(obj).outerWidth();
          $(obj).find('.crsl-wrap').css({ width: obj.wrapWidth+defaults.itemMargin+'px' });
          $('#'+defaults.navigation).hide();
        }

        $(obj).find('.crsl-item').css({ width: defaults.itemWidth+'px', marginRight : defaults.itemMargin+'px' });

        // Equal Height Configuration
        obj.equalHeights();

        // Condition if total <= visible
        if( defaults.carousel ){
          if( defaults.visible >= defaults.total ){
            defaults.autoRotate = false;
            $('#'+defaults.navigation).hide();
          } else {
            $('#'+defaults.navigation).show();
          }
        }
      };

      // Equal Heights
      obj.equalHeights = function(){
        if( defaults.itemEqualHeight !== false ){
          var tallest = 0;
          $(obj).find('.crsl-item').each( function(){
            $(this).css({ 'height': 'auto' });
            if ( $(this).outerHeight() > tallest ){ tallest = $(this).outerHeight(); }
          });
          $(obj).find('.crsl-item').css({ height: tallest+'px' });
        }
        return true;
      };

      obj.initRotate = function(){
        // Set AutoRotate Interval
        if( defaults.autoRotate !== false ){
          obj.rotateTime = window.setInterval( function(){
            obj.rotate();
          }, defaults.autoRotate);
        }
      };

      obj.triggerNavs = function(){
        // Previous / Next Navigation
        $('#'+defaults.navigation).delegate('.previous, .next', 'click', function(event){
          // Prevent default
          event.preventDefault();
          // Prepare execute
          obj.prepareExecute();
          // Previous & next action
          if( $(this).hasClass('previous') && obj.testPrevious(obj.itemActive) ){
            obj.previous();
          } else if( $(this).hasClass('next') && obj.testNext() ){
            obj.next();
          } else {
            return;
          }
        });
      };

      // Prepare Execute
      obj.prepareExecute = function(){
        // Stop rotate
        if( defaults.autoRotate ){
          clearInterval(obj.rotateTime);
        }
        // Prevent Animate Event
        obj.preventAnimateEvent();
        // Active
        obj.itemActive = $(obj).find('.crsl-item.'+defaults.itemClassActive);
        return true;
      };

      obj.preventAnimateEvent = function(){
        if( $(obj).find('.crsl-wrap:animated').length > 0 ){
          return false;
        }
      };

      // Rotate Action
      obj.rotate = function(){
        // Prevent Animate Event
        obj.preventAnimateEvent();
        // Active
        obj.itemActive = $(obj).find('.crsl-item.'+defaults.itemClassActive);
        obj.next();
        return true;
      };

      obj.testPrevious = function(active){
        return $('.crsl-wrap', obj).find('.crsl-item').index(active) > 0;
      };
      obj.testNext = function(){
        return ( !defaults.infinite &&
          obj.wrapWidth >= (
            ( ( defaults.itemWidth + defaults.itemMargin ) * ( defaults.visible + 1 ) ) - obj.wrapMargin
          )
        ) || defaults.infinite;
      };

      // Previous Animate
      obj.previous = function(){
        obj.wrapMargin = defaults.infinite ? obj.wrapMarginDefault + $(obj.itemActive).outerWidth(true) : obj.wrapMargin + $(obj.itemActive).outerWidth(true);
        var prevItemIndex = $(obj.itemActive).index();
        var newItemActive = $(obj.itemActive).prev('.crsl-item');
        var action = 'previous';
        // Trigger Begin Carousel Move
        $(obj).trigger('beginCarousel', [defaults, obj, action]);
        // Animate
        $(obj).
          find('.crsl-wrap').
          animate({ marginLeft: obj.wrapMargin+'px' }, defaults.speed, function(){
            // Active
            $(obj.itemActive).removeClass(defaults.itemClassActive);
            $(newItemActive).addClass(defaults.itemClassActive);
            if( defaults.infinite ){
              $(this).css({ marginLeft: obj.wrapMarginDefault }).find('.crsl-item:first-child').before( $('.crsl-item:last-child', obj) );
            } else {
              if( obj.testPrevious(newItemActive) === false )
                $( '#'+defaults.navigation ).find('.previous').addClass('previous-inactive');
              if( obj.testNext() )
                $( '#'+defaults.navigation ).find('.next').removeClass('next-inactive');
            }
            // Trigger Carousel Exec
            $(this).trigger('endCarousel', [defaults, obj, action]);
          });
      };

      // Next Animate
      obj.next = function(){
        obj.wrapMargin = defaults.infinite ? obj.wrapMarginDefault - $(obj.itemActive).outerWidth(true) : obj.wrapMargin - $(obj.itemActive).outerWidth(true);
        var nextItemIndex = $(obj.itemActive).index();
        var newItemActive = $(obj.itemActive).next('.crsl-item');
        var action = 'next';
        // Trigger Begin Carousel Move
        $(obj).trigger('beginCarousel', [defaults, obj, action]);
        // Animate
        $(obj).
          find('.crsl-wrap').
          animate({ marginLeft: obj.wrapMargin+'px' }, defaults.speed, function(){
            // Active
            $(obj.itemActive).removeClass(defaults.itemClassActive);
            $(newItemActive).addClass(defaults.itemClassActive);
            if( defaults.infinite ){
              $(this).css({ marginLeft: obj.wrapMarginDefault }).find('.crsl-item:last-child').after( $('.crsl-item:first-child', obj) );
            } else {
              if( obj.testPrevious(newItemActive) )
                $( '#'+defaults.navigation ).find('.previous').removeClass('previous-inactive');
              if( obj.testNext() === false )
                $( '#'+defaults.navigation ).find('.next').addClass('next-inactive');
            }
            // Trigger Carousel Exec
            $(this).trigger('endCarousel', [defaults, obj, action]);
          });
      };

      var mouseHover = false, current;
      $(window).on('mouseleave', function(event){
        // Detect current
        if (event.target) current = event.target;
        else if (event.srcElement) current = event.srcElement;
        // Detect mouseover
        if( ( $(obj).attr('id') && $(current).parents('.crsl-items').attr('id') === $(obj).attr('id') ) || ( $(current).parents('.crsl-items').data('navigation') === $(obj).data('navigation') ) ){
          mouseHover = true;
        } else {
          mouseHover = false;
        }
        // False
        return false;
      });

      $(window).on('keydown', function(event){
        if( mouseHover === true ){
          // Previous & next action
          if( event.keyCode === 37 ){
            // Prepare execute
            obj.prepareExecute();
            // Previous
            obj.previous();
          } else if( event.keyCode === 39 ){
            // Prepare execute
            obj.prepareExecute();
            // Next
            obj.next();
          }
        }
        return;
      });

      if( defaults.isTouch ){
        $(obj).on('touchstart', function(e){
          $(obj).addClass('touching');
          defaults.startCoords.pageX = defaults.endCoords.pageX = e.originalEvent.targetTouches[0].pageX;
          defaults.startCoords.pageY = defaults.endCoords.pageY = e.originalEvent.targetTouches[0].pageY;
          $('.touching').on('touchmove',function(e){
            defaults.endCoords.pageX = e.originalEvent.targetTouches[0].pageX;
            defaults.endCoords.pageY = e.originalEvent.targetTouches[0].pageY;
            if( Math.abs( parseInt( defaults.endCoords.pageX-defaults.startCoords.pageX, 10 ) ) > Math.abs( parseInt( defaults.endCoords.pageY-defaults.startCoords.pageY, 10 ) ) ){
              e.preventDefault();
              e.stopPropagation();
            }
          });
        }).on('touchend', function(e){          
          defaults.swipeDistance = defaults.endCoords.pageX - defaults.startCoords.pageX;
          if( defaults.swipeDistance >= defaults.swipeMinDistance ){
            obj.prepareExecute();
            // swipeLeft
            obj.previous();
            e.preventDefault();
            e.stopPropagation();
          } else if( defaults.swipeDistance <= - defaults.swipeMinDistance ){
            obj.prepareExecute();
            // swipeRight
            obj.next();
            e.preventDefault();
            e.stopPropagation();
          }
          $('.touching').off('touchmove').removeClass('touching');
        });
      }

      $(obj).on('loadedCarousel loadedImagesCarousel', function(){
        // Trigger window onload EqualHeights
        obj.equalHeights();
      });

      // Create method to resize element
      $(window).on('carouselResizeEnd', function(){
        // This configure and margins and variables when document is ready,
        // loaded and window is resized
        if( defaults.itemWidth !== $(obj).outerWidth() )
          obj.config();

      });

      // Carousel General Detection
      $(window).ready( function(){
        // Trigger Prepare Event Carousel
        $(obj).trigger('prepareCarousel', [defaults, obj]);
        // Init some defaults styles
        obj.init();
        // ResizeEnd event
        $(window).on('resize', function(){
          if( this.carouselResizeTo ) clearTimeout(this.carouselResizeTo);
          this.carouselResizeTo = setTimeout(function(){
            $(this).trigger('carouselResizeEnd');
          }, 10);
        });
      });

      $(window).load( function(){
        // Preload if it`s neccesary
        obj.testPreload();
        // This configure and margins and variables when document is ready,
        // loaded and window is resized
        obj.config();
      });
    });
  };
})(jQuery);
jQuery(function(j){ // use jQuery code inside this to avoid "j is not defined" error
	j('.load__more').click(function(){
 
		var button = j(this),
		    data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : misha_loadmore_params.current_page
		};
 
		j.ajax({ // you can also use j.post here
			url : misha_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'More posts' ).prev().before(data); // insert new posts
					misha_loadmore_params.current_page++;
 
					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
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