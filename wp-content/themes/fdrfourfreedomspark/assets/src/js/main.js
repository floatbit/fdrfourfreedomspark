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

jQuery(document).ready(function($) {

  verticalBorderHandler.init();

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
