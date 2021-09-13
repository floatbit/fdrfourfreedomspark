timelineHandler = {
    $timelineCar = $('.timeline-carousel'),
    $expandTimeline = $('[href=#expand-timeline]'),
    $navContainer = $('.nav-container'),
    $timelineCell = $('.timeline-cell'),
    $timelineMain = $('.timeline-main'),
    $navDecadeContainer = $('.navigation-decade-container'),

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
                    '<div class="cell-nav item '+$addon+'" data-decade="'+decade+'"><p><strong>'+decade+'</strong></p></div>'
                );
            } else {
                self.$navContainer.append(
                    '<div class="cell-nav"></div>'
                );
            }
            temp = decade;
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
            adaptiveHeight: true
        });

        self.$navContainer.flickity({
            asNavFor: '.timeline-carousel',
            contain: true,
            prevNextButtons: false,            
            pageDots: false,
        });

        if (Foundation.MediaQuery.is('small only')) {
            self.$navContainer.removeClass('first-load'); 
        }

        $carousel.on( 'change.flickity', function( event, index ) {
            if (index > 0) {
                self.$navContainer.removeClass('first-load'); 
            } else {
                self.$navContainer.addClass('first-load');
            }
        });

        $('.cell-nav').on('click', function(e){
            e.preventDefault();
            var decade = $(this).data('decade');
            var offsetLeft = 0;
            $('.timeline-cell').each(function(){
                var timelineDecade = $(this).data('decade');
                if (timelineDecade < decade) {
                    var cellPadTop = parseFloat($(this).css('padding-top'));
                    var cellPadBot = parseFloat($(this).css('padding-bottom'));
                    var cellWidth = parseFloat($(this).width());
                    var leftCalc = cellPadTop + cellPadBot + cellWidth;
                    offsetLeft += leftCalc;
                }
            });
            self.$timelineCar.find('.flickity-slider').animate({scrollLeft: offsetLeft}, 'slow');
        });

        self.$timelineCar.find('.flickity-slider').on('wheel', function(e) {
            e.preventDefault();
            this.scrollLeft += e.originalEvent.wheelDelta;
            if (this.scrollLeft > 0) {
                self.$navContainer.removeClass('first-load'); 
            } else {
                self.$navContainer.addClass('first-load');
            }
            var decade = '';
            self.$timelineCell.each(function() {
                if ($(this).offset().left > this.scrollLeft) {
                    decade = $(this).data('decade');
                    return false;
                }
            });
            if (decade != '') {
                var navIndex = 0;
                self.$navDecadeContainer.find('.cell-nav').each(function() {
                    if ($(this).data('decade') == decade) {
                        return false;
                    }
                    navIndex++;
                });
                if (navIndex >= 0) {
                    self.$navContainer.flickity('select', navIndex);
                }
            }
        });
    
        $(window).on('resize', function(e){
            e.preventDefault();
            var selfWindow = $(this);
            var windowHeight = parseFloat(selfWindow.height());
            var timelineHeight = 0;
            var timelineNavHeight = 0;
            self.$timelineCar.each(function(e){
                timelineHeight = parseFloat($(this).height());
            });
            self.$navDecadeContainer.each(function(e){
                timelineNavHeight = parseFloat($(this).height());
            });
            var contentHeight = timelineHeight + timelineNavHeight;
            var scale = windowHeight / contentHeight;
            var width = (1 / scale) * 100;

            self.$timelineMain.css({
                'transform' : 'scale('+scale.toFixed(2)+')',
                'width' : width.toFixed(2)+'%'
            });

            $carousel.flickity('resize');
            self.$navContainer.flickity('resize');
        }).trigger(("resize"));

        $('a[href="#close-window"]').on("click", function(e) {
            e.preventDefault();
            window.close();
            if (!window.closed) {
                window.location.href = '/';
            }
        });
    }
}

jQuery(document).ready(function($) {

    timelineHandler.init();

})
