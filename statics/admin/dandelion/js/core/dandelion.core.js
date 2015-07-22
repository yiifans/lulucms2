/*
 * Dandelion Admin v1.0 - Core JS
 *
 * This file is part of Dandelion Admin, an Admin template build for sale at ThemeForest.
 * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
 *
 * Development Started:
 * March 25, 2012
 */

(function($) {
	$(document).ready(function(e) {
	
		/* Panel Toggler */
		$(".da-panel.collapsible .da-panel-header").each(function() {
			if($(this).find('.da-panel-toggler').size() === 0) {
				$('<span></span>').addClass("da-panel-toggler").appendTo($(this));
			}
		});
		
		/* Collapsible Panels */
		$("div.da-panel.collapsible .da-panel-header .da-panel-toggler").live("click", function(e) {
			parentToggled = false;
			$(this).closest(".da-panel").children(":not(.da-panel-header)").slideToggle("normal", function() {
				if(!parentToggled) {
					$(this).closest(".da-panel").toggleClass("collapsed");
					parentToggled = true;
				}
			});
			e.preventDefault();
		});
		
		/* Message & Notifications Dropdown */
		$(".da-header-dropdown").each(function() {
			var self = $(this).bind('click', function(e) { e.stopPropagation(); });
			self.parent().bind('click', function(e) {
				self.toggle();
			});
		});
		
		$('body').bind('click', function(e) {
			$(".da-header-dropdown:visible").each(function() {
				if(!$(e.target).closest($(this).parent()).length) {
					$(this).hide();
				}
			});
		});
		
		/* Notification Messages */
		$(".da-message").live('click', function(e) {
			$(this).animate({opacity: 0}, function() {
				$(this).slideUp('normal', function() {
					$(this).css("opacity", '');
				});
			});
			e.preventDefault();
		});
		
		/* Main navigation on mobile */
		$("div#da-content #da-sidebar #da-main-nav").bind('click', function(e) {
			e.stopPropagation();
		});
		
		$("div#da-content #da-sidebar").bind('click', function (e) {
			$('#da-main-nav', $(this)).slideToggle('normal', function() { $(this).removeAttr("style").toggleClass('open'); });
			e.preventDefault();
		});
		
		/* IE active styles */
		$(".da-header-button").bind('mousedown', function(e) {
			$(this).addClass('active');
		}).bind('mouseup', function(e) {
			$(this).removeClass('active');
		}).children('.da-header-dropdown').bind('mousedown', function(e) { e.stopPropagation(); } );
		
		/* Placeholder */
		if($.fn.placeholder) {
			$('[placeholder]').placeholder();
		}
		
		/* Table Rows */
		$("table.da-table tbody tr:nth-child(2n)").addClass("even");
		$("table.da-table tbody tr:nth-child(2n+1)").addClass("odd");
		
		/* Dropdown Navigation */
		$("div#da-content #da-main-nav ul li a, div#da-content #da-main-nav ul li span").bind("click", function(e) {
			if($(this).next("ul").size() !== 0) {
				$(this).next("ul").slideToggle("normal", function() {
					$(this).toggleClass("closed");
				});
				e.preventDefault();
			}
		});
		
		/* Scrollable Panels */
		if($.fn.tinyscrollbar) {
			$(".da-panel.scrollable .da-panel-content").each(function() {
				var height = $(this).height(), 
					o = 
					$(this)
						.children().wrapAll('<div class="overview"></div>')
					.end()
						.children().wrapAll('<div class="viewport"></div>')
					.end()
						.find('.viewport').css('height', height)
					.end()
						.append('<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>')
					.tinyscrollbar({axis: 'x'});
				
				$(window).resize(function() {
					o.tinyscrollbar_update();
				});
			});
		}
		
		/* Tooltips */
		
		if($.fn.tipsy) {
			var gravity = ['n', 'ne', 'e', 'se', 's', 'sw', 'w', 'nw'];
			for(var i in gravity)
				$(".da-tooltip-"+gravity[i]).tipsy({gravity: gravity[i]});
				
			$('input[title], select[title], textarea[title]').tipsy({trigger: 'focus', gravity: 'w'});
		}
		
		/* File Input */
		if ($.fn.customFileInput) {
		    console.log("begin da-custom-file");
		    $("input[type='file'].da-custom-file").customFileInput();
		}
	});
}) (jQuery);