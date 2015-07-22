/*
 * Dandelion Admin v1.0 - Widgets Demo JS
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
		var v = $("#da-ex-wizard-form").validate({ onsubmit: false });
		$("#da-ex-wizard-form").daWizard({
			onLeaveStep: function(index, elem) {
				return v.form();
			}, 
			onBeforeSubmit: function() {
				return v.form();
			}
		});
	});
}) (jQuery);