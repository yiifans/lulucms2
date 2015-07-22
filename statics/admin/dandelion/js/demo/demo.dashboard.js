/*
 * Dandelion Admin v1.0 - Dashboard Demo JS
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
		$(".da-circular-stat").daCircularStat();
		
		var v = $("#da-ex-wizard-form").validate({ onsubmit: false });
		$("#da-ex-wizard-form").daWizard({
			forwardOnly: false, 
			onLeaveStep: function(index, elem) {
				return v.form();
			}, 
			onBeforeSubmit: function() {
				return v.form();
			}
		});
		
		$("#da-ex-calendar-gcal").fullCalendar({
			events: 'http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic',
				
			eventClick: function(event) {
				// opens events in a popup window
				window.open(event.url, 'gcalevent', 'width=700,height=600');
				return false;
			}
		});
		
		google.setOnLoadCallback(drawCharts);
		function drawCharts() {
			drawLineChart();
		}
					
		function drawLineChart() {
			var data = google.visualization.arrayToDataTable([
				['Month', 'Seeds', 'Plants'],
				['Jan',  1000,      400],
				['Feb',  1170,      460],
				['Mar',  660,       1120],
				['Apr',  1030,      540]
			]);
			
			var options = {};
			
			var chart = new google.visualization.LineChart($('#da-ex-gchart-line').get(0));
			
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
	});
}) (jQuery);