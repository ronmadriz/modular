var j = jQuery.noConflict();
j(document).ready(function(){


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

var j = jQuery.noConflict();
j(document).ready(function(){
   var ppp = 3; // Post per page
    var pageNumber = 1;


    function load_posts(){
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        j.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            success: function(data){
                var $data = $(data);
                if($data.length){
                    j("#ajax-posts").append($data);
                    j("#more_posts").attr("disabled",false);
                } else{
                    j("#more_posts").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }

});

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
  j("a[target!='_blank'][href$='.pdf']").attr("target", "_blank");
	j(window).scroll(function(){
	    if (j(this).scrollTop() > 50) {
	       j('section').addClass('focus');
	    } else {
	       j('section').removeClass('focus');
	    }
	});
    j(".phone").text(function(i, text) {text = text.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3"); return text; });

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
	j('.menus__toggle').click(function(){
		j(this).toggleClass('menus__toggle--open');
		j('.menus__list').toggleClass('menus__list--active');
	});
		j('<em class="menus__caret"></em>').insertBefore('.menus__child');
	if (j(window).width() < 992) {
		j('.menus__caret').click( function(){
			j(this).toggleClass('menus__caret--open');
			j(this).parent('.menus__parent').toggleClass('menus__active');
			j(this).siblings('.menus__child').toggleClass('menus__open');
		} );
	}
	// j('#menus__item--1').hover(function(){ j('.menus__solutions').toggleClass('show') }, );
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

j(document).ready(function(){
    //Show dropdown on mouse
    j('#menus__item--1').mouseenter(function() {
       j('.menus__solutions').addClass('show');
    });
    //Remove dropdown when mouse leaves dropdown box
    j('.menus__solutions').mouseleave(function() {
        j('.menus__solutions').removeClass('show');
    });
    // Also remove dropdown when mouse leaves navbar, but not when it goes into dropdown
    j('#menus__item--1').mouseleave(function() {
        if(j('.menus__solutions:hover').length == 0){
            j('.menus__solutions').removeClass('show');
        }
    });
});

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
