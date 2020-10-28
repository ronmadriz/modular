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

    j("#more_posts").on("click",function(){ // When btn is pressed.
        j("#more_posts").attr("disabled",true); // Disable the button, temp.
        load_posts();
        j(this).insertAfter('#ajax-posts'); // Move the 'Load More' button to the end of the the newly added posts.
    });
});
