contactUsHandler = {
    $linksInnerContainer = $('.links-inner-container'),
  
    resizeImage = function(){
        var self = this;
        $(window).on('resize', function() {
          self.$linksInnerContainer.find('.links-image').each(function(){
            $linksImage = $(this);
            var imgWidth = parseFloat($linksImage.width());
            var imgHeight = (imgWidth / 4) * 3;
  
            $linksImage.css({
                'height': imgHeight+"px"
            });
          })
        }).trigger('resize')
    },
  
    init = function(){
        var self = this;
        
        self.resizeImage();
    }
  }

jQuery(document).ready(function($) {

    contactUsHandler.init();

});