eventCalendarHandler = {
    $btnFilter = $('.btn-filter'),
    $selectedText = $('.selected-text'),
    $filterItemCont = $('.filter-item-container'),
    $itemFilter = $('.item-filter'),
    $dataItem = $('.data-item'),
    $eventsSection = $('.events-section'),
    $pagingContainer = $('.paging-container'),
    $paging = $('.paging-container').children(),
    $itemPagingButton = $pagingContainer.find('.item-paging-button'),
    $dataCounter = $('.data-counter'),
    itemsPerPage = 2,
    pageShowCount = 2, 
    
    applyFilter = function($tax){
        if ($tax) {
            var counter = 0;
            this.$dataItem.addClass('hide');
            this.$dataItem.each(function(){
                if ($(this).data('tax').includes($tax)) {
                    $(this).removeClass('hide');
                    counter += 1;
                }
            })
            this.$dataCounter.html(counter);
        } else {
            this.$dataItem.removeClass('hide');
            this.$dataCounter.html(this.$dataItem.length);
        }        
        this.applyPaging();
    },

    applyPaging = function(){
        var counter = 0;
        this.$dataItem.each(function(){
            // apply paging to each of data
            $(this).data('show-on-page', 0);    
            if (!$(this).hasClass('hide')) {
                counter += 1;
                var pg = 0;
                var $addon = ((counter % itemsPerPage) > 0) ? 1 : 0;
                var pg = Math.floor(counter / itemsPerPage) + $addon;

                $(this).data('show-on-page', pg);
                if (pg > 1) {
                    $(this).addClass('hide');
                }
            }
        })

        var pageCount = 0;
        self.$pagingContainer.html('');
        if (counter > itemsPerPage ) {
            var $addon = ((counter % itemsPerPage) > 0) ? 1 : 0;
            pageCount = Math.floor(counter / itemsPerPage)+$addon;
            
            self.$pagingContainer.append(templatePaging(pageCount));
            self.$pagingContainer.find('.item-paging').on("click", function(){
                self.pageChanging(this);
            });

            //handle on click next page button
            self.$pagingContainer.find('[href="#next-page"]').on("click", function(e){
                e.preventDefault();
                var firstData = true;
                var lastData = false;
                
                self.$pagingContainer.find('.item-paging').each(function(){    
                    if ( (firstData) && (!$(this).hasClass('hide')) ) {
                        $(this).addClass('hide');
                        firstData = false;
                        var curPage = parseInt($(this).data('page') + 1);
                        var nextSelected = self.$pagingContainer.find('.item-paging[data-page='+curPage+']');
                        self.pageChanging(nextSelected);
                    } else if ((!lastData) && (!firstData) && ($(this).hasClass('hide'))) {
                        lastData = true;
                        $(this).removeClass('hide');
                    }
                });
                
                //check to hide next pagination button
                var $obj = $('[data-page='+pageCount+']:not(.hide)');
                if ( $obj.length > 0 ) {
                    $pagingContainer.find('.item-paging-button').addClass('hide');
                }
            });
        }

    },

    pageChanging = function($obj){
        $obj = $($obj);
        var self = this
        var pageActive = $obj.data('page'); 
    
        self.$pagingContainer.children().removeClass('active');
        $obj.addClass('active');
            
        self.$dataItem.each(function(){
            $(this).addClass('hide');

            var itempage = $(this).data('show-on-page');
            if (itempage == pageActive) {
                $(this).removeClass('hide');
            }
        })
    },

    templatePaging = function($pageCount) {
        var html = '';
        if ($pageCount > 1) { 
            for (var i = 0; i < $pageCount; ++i) {
                html += '<span class="item-paging p-style '+((i == 0) ? 'active' : '')+' '+( (i+1 > pageShowCount) ? 'hide' : '' )+
                        ' " data-page="'+parseInt(i+1)+'">'+parseInt(i+1)+'</span>';
            }

            if ($pageCount > pageShowCount) {
               html += '<a href="#next-page" class="btn-with-arrow item-paging-button">NEXT</a>';
            }
        }
        return html;
    },

    init = function(){
        var self = this;
        self.applyFilter('');

        this.$btnFilter.on('click', function(){
            $(this).toggleClass('active');
            self.$filterItemCont.toggleClass('active');
        })

        this.$itemFilter.on('click', function(){
            var val = $(this).data('value');
            var selectedText = $(this).html();
            
            self.applyFilter(val);
            self.$selectedText.html(selectedText);
            
            self.$itemFilter.removeClass('selected');
            $(this).addClass('selected');
            self.$btnFilter.removeClass('active');
            self.$filterItemCont.removeClass('active');
        })

    }
}
jQuery(document).ready(function($) {

    eventCalendarHandler.init();

})
