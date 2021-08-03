$(document).foundation();

verticalBorderHandler = {
  $vh1 = $('.vb-1'),
  $vh2 = $('.vb-2'),
  $vh3 = $('.vb-3'),
  
  tmpBorder = function($type){
    return '<div class="v-border-'+$type+'"></div>';
  },
//.v-border-1, .v-border-2, .v-border-3 
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
  }
}

navHandler = {
  $mainNavMenu = $('.main-nav-menu'),
  $menuItemContainer = $('.menu-item-container'),
  $subMenuItems = $('.submenu-items'),

  init = function(){
    var self = this;

    $menuItemContainer.on("mouseover", function(e){
      e.preventDefault();
      var subitem = $(this).find('.submenu-items');
      var boderNavMen = $(this).find('.border-nav-menu');
      /* $(subitem).toggleClass('active'); */
      $(subitem).removeClass('hide');
      /* $(subitem).addClass('active'); */
	  $(boderNavMen).removeClass('hide');

    })

    $menuItemContainer.on("mouseleave", function(e){
      e.preventDefault();
      var subitem = $(this).find('.submenu-items');
      var boderNavMen = $(this).find('.border-nav-menu');
      /* $(subitem).toggleClass('active'); */
      $(subitem).addClass('hide');
      /* $(subitem).removeClass('active'); */
	  $(boderNavMen).addClass('hide');
    })
  }
}

jQuery(document).ready(function($) {

  verticalBorderHandler.init();
  navHandler.init();

  $(window).on("load, scroll", function() {
    if($(window).scrollTop() > 50) {
        $("header").addClass("scrolled");
        $(".logo-white").addClass("hide");
        $(".logo-blue").removeClass("hide");
    } else {
        $("header").removeClass("scrolled");
        $(".logo-blue").addClass("hide");
        $(".logo-white").removeClass("hide");
    }
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
