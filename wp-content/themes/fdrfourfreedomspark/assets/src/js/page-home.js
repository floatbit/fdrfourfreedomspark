jQuery(document).ready(function($) {
	var $mainCarousel = $('.carousel-main');
	if ($mainCarousel.find('.carousel-cell').length > 1) {
		$('.carousel-main').flickity({
			cellSelector: '.carousel-cell',
			cellAlign: 'left',
			draggable: true,
			pageDots: false,
			wrapAround: true,
			prevNextButtons: true,
		});	
	}
})
