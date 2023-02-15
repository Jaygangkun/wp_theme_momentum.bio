(function($){
    function search() {
        $.ajax({
            url: adminAjax,
            type: 'post',
            data: {
                'action': 'news_search',
                'keyword': $('#search_keyword').val(),
                'filter': $('#search_filter').val(),
                'type': 'blogs'
            },
            dataType: 'json',
            success: function(resp) {
                $('#blogs_list').html(resp.html);
            }
        })
    }

    jQuery('#search_keyword').donetyping(function(){
        search();
    });

    $(document).on('change', '#search_filter', function() {
        search();
    })
})(jQuery)