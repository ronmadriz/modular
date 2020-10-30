jQuery(function(j){
	j('.misha_loadmore').click(function(){
 		var button = j(this),
		    data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts,
			'page' : misha_loadmore_params.current_page
		};
 		j.ajax({
			url : misha_loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success : function( data ){
				if( data ) {
					button.text( 'More posts' ).before(data);
					misha_loadmore_params.current_page++;

					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page )
						button.remove();
 				} else {
					button.remove();
				}
			}
		});
	});
});
