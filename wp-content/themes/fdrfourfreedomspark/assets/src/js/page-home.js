jQuery(document).ready(function($) {
    $('.home-upcoming-event').on('click', function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        if (url.includes('#')) {
            e.preventDefault();
            if ($(url).length !== 0) {
                $([document.documentElement, document.body]).animate({
                scrollTop: $(url).offset().top
                }, 1000);
            }
        }
    })
})
