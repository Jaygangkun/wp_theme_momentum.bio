(function($){    
    $(document).on('click', '.news-tab-link', function() {
        $('.news-tab-link').removeClass('active');
        $(this).addClass('active')
        var type = $(this).attr('data-type');
        $('.tab-content').fadeOut();
        $('.tab-content[data-type="' + type + '"]').fadeIn();
    })
})(jQuery)