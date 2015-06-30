/*
 * Dandelion Admin v1.0 - UI Demo JS
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
		$("#da-ex-accordion, #da-ex-accordion-plain").accordion();
		
		$("#da-ex-tabs, #da-ex-tabs-plain").tabs();
		
		$("#da-ex-datepicker, #da-ex-datepicker-inline").datepicker({showOtherMonths:true});
		
		$("#da-ex-datepicker-week").datepicker({showOtherMonths:true, showWeek: true});
		
		$("#da-ex-datepicker-months").datepicker({showOtherMonths:true, numberOfMonths: 3});
		
		$("#da-ex-datetimepicker").datetimepicker();
		
		$("#da-ex-timepicker").timepicker({});
		
		$(".da-ex-buttons").button();
		
		$("#da-ex-buttons-radio, #da-ex-buttons-checkbox").buttonset();
		
		$( "#da-ex-buttons-icon button:first" ).button({
			icons: {
				primary: "ui-icon-locked"
			},
			text: false
		}).next().button({
			icons: {
				primary: "ui-icon-locked"
			}
		}).next().button({
			icons: {
				primary: "ui-icon-gear",
				secondary: "ui-icon-triangle-1-s"
			}
		}).next().button({
			icons: {
				primary: "ui-icon-gear",
				secondary: "ui-icon-triangle-1-s"
			},
			text: false
		});
		
		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		
		$( "#da-ex-autocomplete" ).autocomplete({
			source: availableTags
		});
		
		$("#da-ex-slider").slider();
		
		$("#da-ex-slider-range").slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 75, 300 ], 
			slide: function( event, ui ) {
				$( "#da-ex-slider-range-info .da-highlight" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		
		$(".da-ex-color-slider").slider({
			range: "min",
			value: 45,
			min: 1,
			max: 100
		});
		
		$("#da-ex-slider-range-fixed").slider({
			range: "min",
			value: 37,
			min: 1,
			max: 700, 
			slide: function( event, ui ) {
				$( "#da-ex-slider-range-fixed-info .da-highlight" ).html( "$" + ui.value );
			}
		});
	
		$( "#da-slider-equalizer > span" ).each(function() {
			var value = parseInt( $( this ).text(), 10 );
			
			$( this ).empty().slider({
				value: value,
				range: "min",
				animate: true,
				orientation: "vertical"
			});
		});
		
		$(".da-ex-color-pb, #da-ex-pb, #da-ex-pba").each(function() {
			$(this).progressbar({
				value: 25 + Math.floor(Math.random() * 50)
			});
		});
		
		$("#da-ex-pba-trigger").bind('click', function(e) {
			$(this).parent().next("#da-ex-pba").progressbar('value', 20 + Math.floor(Math.random() * 80));
			e.preventDefault();
		});
		
		$("#da-ex-dialog-div").dialog({
			autoOpen: false, 
			title: "Default UI Dialog", 
			modal: true, 
			width: "640", 
			buttons: [{
					text: "Close Dialog", 
					click: function() {
						$( this ).dialog( "close" );
					}}]
		});
		
		
		$("#da-ex-dialog-form-div").dialog({
			autoOpen: false, 
			title: "UI Dialog Modal Form", 
			modal: true, 
			width: "640", 
			buttons: [{
					text: "Submit", 
					click: function() {
						$( this ).find('form#da-ex-dialog-form-val').submit();
					}}]
		}).find('#da-ex-dialog-dp').datepicker({
			dateFormat: 'yy-mm-dd'
		}).end()
		.find('form').validate({
			rules: {
				reqField: {
					required: true
				}, 
				picture: {
					required: true, 
					accept: ['jpeg', 'jpg', 'png', 'gif']
				}, 
				dateField: {
					required: true, 
					date: true
				}, 
				gender: {
					required: true
				}
			}, 
			invalidHandler: function(form, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1
					? 'You missed 1 field. It has been highlighted'
					: 'You missed ' + errors + ' fields. They have been highlighted';
					$("#da-validate-error").html(message).show();
				} else {
					$("#da-validate-error").hide();
				}
			}
		});
		
		$("#da-ex-dialog").bind("click", function(event) {
			$("#da-ex-dialog-div").dialog("option", {modal: false}).dialog("open");
			event.preventDefault();
		});
		$("#da-ex-dialog-modal").bind("click", function(event) {
			$("#da-ex-dialog-div").dialog("option", {modal: true}).dialog("open");
			event.preventDefault();
		});
		$("#da-ex-dialog-form").bind("click", function(event) {
			$("#da-ex-dialog-form-div").dialog("option", {modal: true}).dialog("open");
			event.preventDefault();
		});
		
		
		/* Growl Notifications */
		if($.jGrowl) {
			$("#da-ex-growl").bind("click", function(event) {
				$.jGrowl("Hello World!", {position: "bottom-right"});
			});
			
			$("#da-ex-growl-1").bind("click", function(event) {
				$.jGrowl("A sticky message", {sticky: true, position: "bottom-right"});
			});
			
			$("#da-ex-growl-2").bind("click", function(event) {
				$.jGrowl("Message with Header", {header: "Important!", position: "bottom-right"});
			});
		}		
	});
}) (jQuery);