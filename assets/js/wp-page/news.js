(function($){    
    $(document).on('click', '.news-tab-link', function() {
        $('.news-tab-link').removeClass('active');
        $(this).addClass('active')
        var type = $(this).attr('data-type');
        $('.tab-content').fadeOut();
        $('.tab-content[data-type="' + type + '"]').fadeIn();
        search();
    })

    function search() {
        $.ajax({
            url: adminAjax,
            type: 'post',
            data: {
                'action': 'news_search',
                'keyword': $('#search_keyword').val(),
                'filter': $('#search_filter').val(),
                'type': $('.news-tab-link.active').attr('data-type')
            },
            dataType: 'json',
            success: function(resp) {
                if($('.news-tab-link.active').attr('data-type') == 'news') {
                    $('#news_list').html(resp.html);
                }

                if($('.news-tab-link.active').attr('data-type') == 'upcoming_events') {
                    $('#upcoming_events_list').html(resp.html);
                }

                if($('.news-tab-link.active').attr('data-type') == 'past_events') {
                    $('#past_events_list').html(resp.html);
                }
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