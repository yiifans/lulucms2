/*
 * Dandelion Admin v1.0 - Form Demo JS
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
		if($.fn.autocomplete) {
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
		}
		
		if($.fn.chosen)
			$(".chzn-select").chosen();
	
		if($.fn.ColorPicker) {
			$("#da-ex-colorpicker").ColorPicker({
				onSubmit: function(hsb, hex, rgb, el) {
					$(el).val(hex);
					$(el).ColorPickerHide();
				}, 
				onBeforeShow: function () {
					$(this).ColorPickerSetColor(this.value);
				}
			});
		}
		
		if($.fn.daPickList) {
			$("#da-ex-picklist").daPickList();
		}
	
		if($.fn.spinner) {
			var opts = {
				s1: {},
				s2: {places: 2, step : 0.25},
				s3: {prefix : '$', places: 2, step: 0.1}
			};
		
			for (var n in opts)
				$("#da-ex-" + n).spinner(opts[n]);
		}
		
		if($.fn.elastic)
			$("#da-ex-elastic").elastic();
			
		if($.fn.elrte) {
			var opts = {
				cssClass : 'el-rte',
				height   : 300,
				toolbar  : 'normal',
				cssfiles : ['plugins/elrte/css/elrte-inner.css'], 
				fmAllow: true, 
				fmOpen : function(callback) {
					$('<div id="myelfinder"></div>').elfinder({
						url : 'plugins/elfinder/connectors/php/connector.php', 
						lang : 'en', 
						height: 300, 
						dialog : { width : 640, modal : true, title : 'Select Image' }, 
						closeOnEditorCallback : true,
						editorCallback : callback
					});
				}
			}
			$('#da-ex-wysiwyg').elrte(opts);
		}
	});
}) (jQuery);