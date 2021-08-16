timelineHandler = {
    $timelineCar = $('.timeline-carousel'),
    $expandTimeline = $('[href=#expand-timeline]'),
    $navContainer = $('.nav-container'),
    $timelineCell = $('.timeline-cell'),

    generateNavigation = function(){
        var self = this;
        var temp = '';        
        this.$timelineCell.each(function(){
            var decade = $(this).data('decade');
            if (temp !== decade) {
                var $addon = '';
                if (decade == 1960) {
                    $addon = 'last';
                }

                self.$navContainer.append(
                    '<div class="cell-nav item '+$addon+'"><p><strong>'+decade+'</strong></p></div>'
                );
            } else {
                self.$navContainer.append(
                    '<div class="cell-nav"></div>'
                );
            }
            temp = decade;
            console.log(decade);
        })
    },

    init = function(){
        var self = this;

        self.generateNavigation();

        var $carousel = self.$timelineCar.flickity({
            cellSelector: '.timeline-cell',
            cellAlign: 'left',
            draggable: true,
            contain: true,
            pageDots: false,
            prevNextButtons: false,
            freeScroll: true,
        });

        $navContainer.flickity({
            asNavFor: '.timeline-carousel',
            contain: true,
            prevNextButtons: false,            
            pageDots: false,
        });

        $carousel.on( 'change.flickity', function( event, index ) {
            if (index > 0) {
                self.$navContainer.removeClass('first-load'); 
            } else {
                self.$navContainer.addClass('first-load');
            }
        });

        self.$expandTimeline.on('click', function(e){
            e.preventDefault();
            $carousel.flickity( 'select', 1 );
            self.$navContainer.removeClass('first-load');
        })
    
    }
}

jQuery(document).ready(function($) {

    timelineHandler.init();

})
