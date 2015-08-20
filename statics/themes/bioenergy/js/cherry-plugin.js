jQuery(document).ready(function(){
// ---------------------------------------------------------
// OWL Carousel init
// ---------------------------------------------------------
	jQuery('div[id^="owl-carousel-"]').each(function(){
		var carousel = jQuery(this),
			auto_play = parseInt(carousel.attr('data-auto-play'))<1 ? false : parseInt(carousel.attr('data-auto-play')),
			items_count = parseInt(carousel.attr('data-items')),
			display_navs = carousel.attr('data-nav')=='true' ? true : false,
			display_pagination = carousel.attr('data-pagination')=='true' ? true : false,
			auto_height = items_count<=1 ? true : false;

		jQuery(carousel).owlCarousel({
			autoPlay: auto_play,
			items: items_count,
			navigation: display_navs,
			pagination: display_pagination,
			navigationText: false,
			autoHeight: auto_height,
			itemsDesktop: [1170, 5],
			itemsDesktopSmall: [980, 4],
			itemsTablet: [768, 3],
			itemsMobile: [480, 2]
		});
	})
	jQuery('.owl-prev').addClass('icon-chevron-left');
	jQuery('.owl-next').addClass('icon-chevron-right');
});