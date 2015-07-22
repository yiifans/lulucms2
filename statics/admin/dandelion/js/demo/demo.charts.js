/*
 * Dandelion Admin v1.0 - Charts Demo JS
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
		google.setOnLoadCallback(drawCharts);
		
		function drawCharts() {
			drawAreaChart();
			drawBarChart();
			drawBubbleChart();
			drawCandlestickChart();
			drawColumnChart();
			drawComboChart();
			drawLineChart();
			drawPieChart();
			drawScatterChart();
			drawSteppedChart();
		}
		
		function drawAreaChart()
		{
			var data = google.visualization.arrayToDataTable([
				['Year', 'Sales', 'Expenses'],
				['2004',  1000,      400],
				['2005',  1170,      460],
				['2006',  660,       1120],
				['2007',  1030,      540]
			]);
			
			var options = {
				title: 'Company Performance',
				hAxis: {
					title: 'Year',  
					titleTextStyle: {
						color: 'red'
					}
				}
			};
			
			var chart = new google.visualization.AreaChart($('#da-ex-gchart-area').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawBarChart()
		{
			var data = google.visualization.arrayToDataTable([
				['Year', 'Sales', 'Expenses'],
				['2004',  1000,      400],
				['2005',  1170,      460],
				['2006',  660,       1120],
				['2007',  1030,      540]
			]);
			
			var options = {
				title: 'Company Performance',
				vAxis: {
					title: 'Year', 
					titleTextStyle: {
						color: 'red'
					}
				}
			};
			
			var chart = new google.visualization.BarChart($('#da-ex-gchart-bar').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawBubbleChart()
		{
			var data = google.visualization.arrayToDataTable([
				['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
				['CAN',    80.66,              1.67,      'North America',  33739900],
				['DEU',    79.84,              1.36,      'Europe',         81902307],
				['DNK',    78.6,               1.84,      'Europe',         5523095],
				['EGY',    72.73,              2.78,      'Middle East',    79716203],
				['GBR',    80.05,              2,         'Europe',         61801570],
				['IRN',    72.49,              1.7,       'Middle East',    73137148],
				['IRQ',    68.09,              4.77,      'Middle East',    31090763],
				['ISR',    81.55,              2.96,      'Middle East',    7485600],
				['RUS',    68.6,               1.54,      'Europe',         141850000],
				['USA',    78.09,              2.05,      'North America',  307007000]
			]);
			
			var options = {
				title: 'Correlation between life expectancy, fertility rate and population of some world countries (2010)',
				hAxis: {title: 'Life Expectancy'},
				vAxis: {title: 'Fertility Rate'},
				bubble: {textStyle: {fontSize: 11}}
			};
			
			var chart = new google.visualization.BubbleChart($('#da-ex-gchart-bubble').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawCandlestickChart()
		{
			var data = google.visualization.arrayToDataTable([
				['Mon', 20, 28, 38, 45],
				['Tue', 31, 38, 55, 66],
				['Wed', 50, 55, 77, 80],
				['Thu', 77, 77, 66, 50],
				['Fri', 68, 66, 22, 15]
			// Treat first row as data as well.
			], true);
			
			var options = {
				legend:'none'
			};
			
			var chart = new google.visualization.CandlestickChart($('#da-ex-gchart-candle').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawColumnChart()
		{
			var data = google.visualization.arrayToDataTable([
				['Year', 'Sales', 'Expenses'],
				['2004',  1000,      400],
				['2005',  1170,      460],
				['2006',  660,       1120],
				['2007',  1030,      540]
			]);
			
			var options = {
				title: 'Company Performance',
				hAxis: {title: 'Year', titleTextStyle: {color: 'red'}}
			};
			
			var chart = new google.visualization.ColumnChart($('#da-ex-gchart-column').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawComboChart()
		{
			var data = google.visualization.arrayToDataTable([
				['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
				['2004/05',  165,      938,         522,             998,           450,      614.6],
				['2005/06',  135,      1120,        599,             1268,          288,      682],
				['2006/07',  157,      1167,        587,             807,           397,      623],
				['2007/08',  139,      1110,        615,             968,           215,      609.4],
				['2008/09',  136,      691,         629,             1026,          366,      569.6]
			]);
			
			var options = {
				title : 'Monthly Coffee Production by Country',
				vAxis: {title: "Cups"},
				hAxis: {title: "Month"},
				seriesType: "bars",
				series: {5: {type: "line"}}
			};
			
			var chart = new google.visualization.ComboChart($('#da-ex-gchart-combo').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawLineChart() {
			var data = google.visualization.arrayToDataTable([
				['Year', 'Sales', 'Expenses'],
				['2004',  1000,      400],
				['2005',  1170,      460],
				['2006',  660,       1120],
				['2007',  1030,      540]
			]);
			
			var options = {
				title: 'Company Performance'
			};
			
			var chart = new google.visualization.LineChart($('#da-ex-gchart-line').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawPieChart() {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Topping');
			data.addColumn('number', 'Slices');
			data.addRows([
				['Mushrooms', 3],
				['Onions', 1],
				['Olives', 1],
				['Zucchini', 1],
				['Pepperoni', 2]
			]);
			
			var options = {
				title: 'How Much Pizza I Ate Last Night', 
				is3D: true
			};
			
			var chart = new google.visualization.PieChart($('#da-ex-gchart-pie').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawScatterChart() {
			var data = google.visualization.arrayToDataTable([
				['Age', 'Weight'],
				[ 8,      12],
				[ 4,      5.5],
				[ 11,     14],
				[ 4,      5],
				[ 3,      3.5],
				[ 6.5,    7]
			]);
			
			var options = {
				title: 'Age vs. Weight comparison',
				hAxis: {title: 'Age', minValue: 0, maxValue: 15},
				vAxis: {title: 'Weight', minValue: 0, maxValue: 15},
				legend: 'none'
			};
			
			var chart = new google.visualization.ScatterChart($('#da-ex-gchart-scatter').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
		
		function drawSteppedChart()
		{
			var data = google.visualization.arrayToDataTable([
				['Director (Year)',  'Rotten Tomatoes', 'IMDB'],
				['Alfred Hitchcock (1935)', 8.4,         7.9],
				['Ralph Thomas (1959)',     6.9,         6.5],
				['Don Sharp (1978)',        6.5,         6.4],
				['James Hawes (2008)',      4.4,         6.2]
			]);
			
			var options = {
				title: 'The decline of \'The 39 Steps\'',
				vAxis: {title: 'Accumulated Rating'},
				isStacked: true
			};
			
			var chart = new google.visualization.SteppedAreaChart($('#da-ex-gchart-stepped').get(0));
			$(window).on('debouncedresize', function() { chart.draw(data, options); });
			chart.draw(data, options);
		}
	});
	
})(jQuery);
