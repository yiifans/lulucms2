/*
 * Dandelion Admin v1.0 - Gallery Demo JS
 *
 * This file is part of Dandelion Admin, an Admin template build for sale at ThemeForest.
 * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
 *
 * Development Started:
 * March 25, 2012
 *
 */

(function($) {
	$(document).ready(function(e) {
		if($.fn.photoSwipe)
			$(".da-gallery.photoSwipe ul li a.touchTouch").photoSwipe();
		
		if($.fn.prettyPhoto)
			$(".da-gallery.prettyPhoto ul li a[rel^='prettyPhoto']").prettyPhoto();
	});
}) (jQuery);