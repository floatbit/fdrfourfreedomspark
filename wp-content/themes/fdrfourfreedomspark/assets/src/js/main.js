$(document).foundation();

var fdrTimelineWindow;

verticalBorderHandler = {
  $vh1 = $('.vb-1'),
  $vh2 = $('.vb-2'),
  $vh3 = $('.vb-3'),
  $vh2sm = $('.vb-2-small'),
    
  tmpBorder = function($type){
    return '<div class="v-border-'+$type+'"></div>';
  },

  init = function(){
    var self = this;

    this.$vh1.each(function(){
      $(this).append(tmpBorder(1));
    });
    this.$vh2.each(function(){
      $(this).append(tmpBorder(2));
    })
    this.$vh3.each(function(){
      $(this).append(tmpBorder(3));
    })
    this.$vh2sm.each(function(){
      $(this).append(tmpBorder('2-small'));
    })
  }
}

navHandler = {
  $mainNavMenu = $('.main-nav-menu'),
  $menuItemContainer = $('.menu-item-container'),
  $subMenuItems = $('.submenu-items'),
  $smallMenuNavigation = $('.small-menu-navigation'),
  $smallMenuItemContainer = $('.small-menu-item-container'),
  $backToTop = $('[href="#back-to-top"]'),

  init = function(){
    var self = this;

    $menuItemContainer.on("mouseover", function(e){
      e.preventDefault();
      var subitem = $(this).find('.submenu-items');
      var boderNavMen = $(this).find('.border-nav-menu');
      /* $(subitem).toggleClass('active'); */
      $(subitem).removeClass('hide');
      /* $(subitem).addClass('active'); */
	    $(boderNavMen).addClass('active');
    })

    $menuItemContainer.on("mouseleave", function(e){
      e.preventDefault();
      var subitem = $(this).find('.submenu-items');
      var boderNavMen = $(this).find('.border-nav-menu');
      /* $(subitem).toggleClass('active'); */
      $(subitem).addClass('hide');
      /* $(subitem).removeClass('active'); */
	    $(boderNavMen).removeClass('active');
    })

    this.$backToTop.on('click', function(e) {
      e.preventDefault();
      $('html,body').animate({scrollTop: 0}, 'slow');
    }),

    $('.open-small-menu-nav').on('click', function(e) {
      e.preventDefault();
      if ($($smallMenuNavigation).hasClass('active')) {
        $($smallMenuNavigation).removeClass('active');
        $('html').removeClass('disable-scroll');
      } else {				
        $($smallMenuNavigation).addClass('active');
        $('html').addClass('disable-scroll');
      }
    })
  }
}

dataFilterHandler = {
  $panelHeaderFilter = $('.panel-header-filter'),
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
  itemsPerPage = parseInt($panelHeaderFilter.data('items-perpage')),
  pageShowCount = 8, 
  selectedFilter = $panelHeaderFilter.data('selected'),
  
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
          pageCount = parseInt(Math.floor(counter / itemsPerPage)+$addon);
          
          self.$pagingContainer.append(templatePaging(pageCount));
          self.$pagingContainer.find('.item-paging').on("click", function(){
              self.pageChanging(this);
          });

          //handle on click next page button
          self.$pagingContainer.find('.next-page').on("click", function(e){
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

      if (pageCount == 0) {
        $pagingContainer.parent().addClass('hide');
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
             html += '<a href="#" class="btn-with-arrow item-paging-button next-page" alt="Button of Next Page">NEXT</a>';
          }
      }
      return html;
  },

  init = function(){
      var self = this;        
      self.applyFilter(self.selectedFilter);

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

  var header = document.querySelector("header");
  var headerOffset = 300;
  
  if ($('header').hasClass('front-page')) {
    headerOffset = 800;
  }
  var options = {
    // vertical offset in px before element is first unpinned
    offset : headerOffset,
  };
  var headroom  = new Headroom(header, options);
  
  headroom.init();
  verticalBorderHandler.init();
  navHandler.init();
  dataFilterHandler.init();

  // select styles
  $('.address_country select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;

    $this.addClass('select-hidden');
		$this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());

    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
      if ($this.children('option').eq(i).is(':selected')) {
        $styledSelect.text($this.children('option').eq(i).text());
      }
    }

    $styledSelect.on("click", function(e) {
			e.stopPropagation();
			$('div.select-styled.active').not(this).each(function(){
				$(this).removeClass('active').next('ul.select-options').hide();
			});
			var $selectOptions = $(this).closest('.select').find('.select-options').empty();
			for (var i = 0; i < numberOfOptions; i++) {
				var liProps = {
					text: $this.children('option').eq(i).text(),
					rel: $this.children('option').eq(i).val(),
					class: ($this.children('option').eq(i).attr('disabled') ? 'disabled' : ''),
				};
				$('<li />', liProps).appendTo($selectOptions);
			}			
			$selectOptions.find('li').on("click", function(e) {
				e.stopPropagation();
				if (!$(e.target).is('.disabled')) {
					$styledSelect.removeClass('active');
					$this.val($(this).attr('rel')).trigger("change");
					$selectOptions.hide();		
				}
			});	
      $(this).toggleClass('active').next('ul.select-options').toggle();
    })

		$this.on("change", function() {
		// sync select's value with front label
			var currentValue = $this.val();
			$styledSelect.removeClass('selected');
			for (var i = 0; i < numberOfOptions; i++) {
				if ($this.children('option').eq(i).attr('value') == currentValue) {
					$styledSelect.text($this.children('option').eq(i).text());
					if ($this.children('option').eq(i).val()) {
						$styledSelect.addClass('selected');
					}
				}
			}	
		});

    $(document).on("click", function() {
      $styledSelect.removeClass('active');
      $list.hide();
    })
	});

  $('a[href="#open-timeline"]').on("click", function(e) {
    e.preventDefault();
    fdrTimelineWindow = window.open('/learn/timeline', 'fdrTimeline');
  });

	// Adds Flex Video to YouTube and Vimeo Embeds
  $('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
    $(this).parent().addClass('responsive-embed widescreen')
  })

  // debugger
  $(window).on('resize', function() {
    $('.debugger .column-width').html($('.debugger .cell').eq(0).width())
    $('.debugger .gutter-width').html(parseInt($('.debugger .cell').eq(0).css('margin-left')) * 2)
    $('.debugger .container-padding').html(parseInt($('.debugger .grid-container').eq(0).css('padding-left')) * 2)
  }).trigger('resize')

  $('.debugger').on('click', function(e) {
    $(this).remove()
  })

})
