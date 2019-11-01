(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $el (jQuery element)
*  @return  n/a
*/

function new_map( $el ) {
  
  // var
  var $markers = $el.find('.marker');
  
  
  // vars
  var args = {
    zoom    : 16,
    center    : new google.maps.LatLng(0, 0),
    mapTypeId : google.maps.MapTypeId.ROADMAP
  };
  
  
  // create map           
  var map = new google.maps.Map( $el[0], args);
  
  
  // add a markers reference
  map.markers = [];
  
  
  // add markers
  $markers.each(function(){
    
      add_marker( $(this), map );
    
  });
  
  
  // center map
  center_map( map );
  
  
  // return
  return map;
  
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param $marker (jQuery element)
*  @param map (Google Map object)
*  @return  n/a
*/

function add_marker( $marker, map ) {

  // var
  var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

  // create marker
  var marker = new google.maps.Marker({
    position  : latlng,
    map     : map
  });

  // add to array
  map.markers.push( marker );

  // if marker contains HTML, add it to an infoWindow
  if( $marker.html() )
  {
    // create info window
    var infowindow = new google.maps.InfoWindow({
      content   : $marker.html()
    });

    // show info window when marker is clicked
    google.maps.event.addListener(marker, 'click', function() {

      infowindow.open( map, marker );

    });
  }

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type  function
*  @date  8/11/2013
*  @since 4.3.0
*
*  @param map (Google Map object)
*  @return  n/a
*/

function center_map( map ) {

  // vars
  var bounds = new google.maps.LatLngBounds();

  // loop through all markers and create bounds
  $.each( map.markers, function( i, marker ){

    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

    bounds.extend( latlng );

  });

  // only 1 marker?
  if( map.markers.length == 1 )
  {
    // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 16 );
  }
  else
  {
    // fit to bounds
    map.fitBounds( bounds );
  }

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type  function
*  @date  8/11/2013
*  @since 5.0.0
*
*  @param n/a
*  @return  n/a
*/
// global var
var map = null;
$(document).ready(function(){

  $('.acf-map').each(function(){

    // create map
    map = new_map( $(this) );

  });

});

})(jQuery);

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
  j("a[target!='_blank'][href$='.pdf']").attr("target", "_blank");
	j(window).scroll(function(){
	    if (j(this).scrollTop() > 50) {
	       j('section').addClass('focus');
	    } else {
	       j('section').removeClass('focus');
	    }
	});
    j("form#gform_3 .medium").addClass('form-control');
    j("form#gform_2 .medium").addClass('form-control');
    j("form#gform_2 input").removeClass('medium');
    j("form#gform_2 .gfield").addClass('form-group');
    j("form#gform_2 select").addClass('form-control');
    j("form#gform_2 textarea").addClass('form-control');
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
        var currentPosition = parseInt(view.css("left"));
        if (currentPosition >= sliderLimit) view.stop(false,true).animate({left:"-="+move},{ duration: 100})
    });
    j("#thumb_left").click(function(){
        var currentPosition = parseInt(view.css("left"));
        if (currentPosition < 0) view.stop(false,true).animate({left:"+="+move},{ duration: 100});
    });
   j(".mCustomScrollbar").mCustomScrollbar({axis:"x"});

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

