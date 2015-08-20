// ---------------------------------------------------------
// Magnific Popup Init
// ---------------------------------------------------------
function magnific_popup_init(item) {
	item.magnificPopup({
		delegate: 'a[rel^="prettyPhoto"]',
		type: 'image',
		removalDelay: 500,
		mainClass: 'mfp-zoom-in',
		callbacks: {
			beforeOpen: function() {
				// just a hack that adds mfp-anim class to markup 
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
			}
		},
		gallery: {enabled:true}
	});
}
// ---------------------------------------------------------
// !!!!!!!!!!!!!!!!!document ready!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------------------------------------------------------
jQuery(document).ready(function(){
// ---------------------------------------------------------
// Blog masonry
// ---------------------------------------------------------
	if(jQuery('body.blog')[0]){
		var isotope_holder = jQuery('.isotope');
		isotope_holder.isotope({
			itemSelector : '.post_wrapper',
			hiddenClass : 'hidden',
			resizable : true,
			transformsEnabled : false,
			layoutMode: 'masonry'
		}).bind("resize.rainbows", function(){
			isotope_holder.isotope('reLayout');
		}).trigger("resize.rainbows").css({'visibility':'visible'});
	}
// ---------------------------------------------------------
// Call Magnific Popup
// ---------------------------------------------------------
	jQuery(".thumbnail").parent().each(function(){magnific_popup_init(jQuery(this))});
// ---------------------------------------------------------
// Tooltip
// ---------------------------------------------------------
	jQuery("[rel='tooltip']").tooltip();
// ---------------------------------------------------------
// Back to Top
// ---------------------------------------------------------
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#back-top').fadeIn();
		} else {
			jQuery('#back-top').fadeOut();
		}
	});
	jQuery('#back-top a').click(function () {
		jQuery('body,html').stop(false, false).animate({
			scrollTop: 0
		}, 800);
		return false;
	});
// ---------------------------------------------------------
// Add accordion active class
// ---------------------------------------------------------
	jQuery('.accordion').on('show', function (e) {
		jQuery(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
	});
	jQuery('.accordion').on('hide', function (e) {
		jQuery(this).find('.accordion-toggle').not(jQuery(e.target)).removeClass('active');
	});
// ---------------------------------------------------------
// Isotope Init
// ---------------------------------------------------------
	jQuery("#portfolio-grid").css({"visibility" : "visible"});
// ---------------------------------------------------------
// Menu Android
// ---------------------------------------------------------
	if(window.orientation!=undefined){
		var regM = /ipod|ipad|iphone/gi,
			result = navigator.userAgent.match(regM)
		if(!result) {
			jQuery('.sf-menu li').each(function(){
				if(jQuery(">ul", this)[0]){
					jQuery(">a", this).toggle(
						function(){
							return false;
						},
						function(){
							window.location.href = jQuery(this).attr("href");
						}
					);
				} 
			})
		}
	}
// ---------------------------------------------------------
// images loader
// ---------------------------------------------------------
	var MSIE8 = (jQuery.browser.msie) && (jQuery.browser.version == 8);
	jQuery('img[data-src]').bind('load', img_load_complete);
	jQuery(window).bind('resize', img_loader).bind('scroll', img_loader).trigger('scroll');
	
	function img_loader(){
		var get_img = jQuery('img[data-src]').eq(0)
		if(get_img[0]){
			var visible_height = jQuery(window).scrollTop() + jQuery(window).height(),
				img_top_position = get_img.offset().top;

			if(img_top_position<visible_height){
				get_img.attr({'src':get_img.attr('data-src')}).removeAttr('data-src');
				if(!MSIE8){
					get_img.fadeOut(0)
				}
			};
		}else{
			jQuery(window).unbind('resize', img_loader).unbind('scroll', img_loader);
		}
	}
	function img_load_complete(){
		jQuery(this).unbind('load');
		if(!MSIE8){
			jQuery(this).fadeIn(500)
		}
		if(jQuery('body.blog')[0]){
			isotope_holder.isotope('reLayout');
		}
		img_loader();
	}
// ---------------------------------------------------------
// set voting post JS
// ---------------------------------------------------------
	jQuery('.ajax_voting').bind('click', voitng);
	function voitng(){
		var item= jQuery(this),
			item_parent = item.parents('[class*="meta_type"]'),
			type = item.attr('date-type'),
			item_class='user_'+type,
			count = parseInt(jQuery('.voting_count', item).text()),
			top_position = (type==='like') ? -18 : 18 ,
			mark = (type==='like') ? '+' : '-', 
			post_url = item.attr('href');

		jQuery('.post_like>a, .post_dislike>a', item_parent).unbind('click', voitng).removeAttr('href date-type').removeClass('ajax_voting').addClass('user_voting');
		item.removeClass('user_voting').addClass(item_class).find('.voting_count').text(++count).append('<span class="animation_item">'+mark+'1</span>');
		jQuery('.animation_item', item).stop(true).animate({'top':top_position, opacity:'0'}, 500, 'easeOutCubic', function(){jQuery(this).remove()});

		jQuery.post(post_url);
		return false;
	}
// ---------------------------------------------------------
// Contact form loader
// ---------------------------------------------------------
	jQuery('.wpcf7-submit').after('<div class="ajax-loader"></div>');
	jQuery('.wpcf7-submit').click(function(){
		var listener = setInterval(
				function(){
					if(jQuery('img.ajax-loader').css('visibility')=='visible'){
						jQuery('div.ajax-loader').css({'display':'inline-block'});
					}else{
						jQuery('div.ajax-loader').css({'display':'none'});
						clearInterval(listener);
					}
				},100);
	})
// ---------------------------------------------------------
// Contact form notvalid tip fadeOut
// ---------------------------------------------------------
jQuery(function() {
  // clear cf7 error msg on mouseover
	jQuery(".wpcf7-form-control-wrap").on("mouseover", function(){
		jQuery("span.wpcf7-not-valid-tip", this).fadeOut();
	});
});
// ---------------------------------------------------------
// OWL Carousel init
// ---------------------------------------------------------
	jQuery('div[id^="owl-carousel-"]').each(function(){
		var carousel = jQuery(this),
			auto_play = parseInt(carousel.attr('data-auto-play'))<1 ? false : parseInt(carousel.attr('data-auto-play')),
			items_count = parseInt(carousel.attr('data-items')),
			disolay_navs = carousel.attr('data-nav')=='true' ? true : false,
			disolay_pagination = carousel.attr('data-pagination')=='true' ? true : false,
			auto_height = items_count<=1 ? true : false;

		jQuery(carousel).owlCarousel({
			autoPlay: auto_play,
			items: items_count,
			navigation : disolay_navs,
			pagination : disolay_pagination,
			navigationText:false,
			autoHeight:auto_height,
			itemsDesktop:[1170, 5],
			itemsDesktopSmall:[980, 4],
			itemsTablet:[768, 3],
			itemsMobile:[480, 2]
		});
	})
	jQuery('.owl-prev').addClass('icon-chevron-left');
	jQuery('.owl-next').addClass('icon-chevron-right');
});