$(document).foundation();

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

    $('[href="#open-small-menu-nav"').on('click', function(e) {
      e.preventDefault();
      if ($($smallMenuNavigation).hasClass('active')) {
        $($smallMenuNavigation).removeClass('active');
      } else {				
        $($smallMenuNavigation).addClass('active');
      }
    })
  }
}

jQuery(document).ready(function($) {

  var header = document.querySelector("header");
  var options = {
    // vertical offset in px before element is first unpinned
    offset : 800,
  };
  var headroom  = new Headroom(header, options);
  
  headroom.init();
  verticalBorderHandler.init();
  navHandler.init();

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
