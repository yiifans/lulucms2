/*
 * Dandelion Admin v1.0 - Circular Stat Widget JS
 *
 * This file is part of Dandelion Admin, an Admin template build for sale at ThemeForest.
 * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
 *
 * Development Started:
 * March 25, 2012
 *
 * 'Highly configurable' mutable plugin boilerplate
 * Author: @markdalgleish
 * Further changes, comments: @addyosmani
 * Licensed under the MIT license
 *
 */

;(function( $, window, document, undefined ) {
	// our plugin constructor
	var daCircularStat = function( elem, options ) {
		this.$elem = $(elem);
		this.options = options;
		this.metadata = $.fn.metadata? this.$elem.metadata() : {};
    };
	
	// the plugin prototype
	daCircularStat.prototype = {
		defaults: {
			percent: false, 
			value: 0, 
			maxValue: 100, 
			duration: 1000, 
			label: '', 
			fillColor: '#e15656'
		}, 
		
		init: function() {
			// Introduce defaults that can be extended either
			// globally or using an object literal.
			this.config = $.extend({}, this.defaults, this.options, this.metadata);
			
			if(this._build()) {
				var canvas = $('.da-circular-progress canvas', this.$elem).get(0);
				canvas.width = $('.da-circular-progress', this.$elem).width();
				canvas.height = $('.da-circular-progress', this.$elem).height();

				this.data = {
					startAngle: -(Math.PI / 2), 
					endAngle: ((this.config.value / this.config.maxValue) * 2 * Math.PI) - (Math.PI / 2), 
					startValue: 0, 
					endValue: this.config.value, 
					centerX: canvas.width / 2, 
					centerY: canvas.height / 2, 
					radius: $('.da-circular-progress', this.$elem).width() / 2
				};
				
				this.canvas = canvas;
				this.context = canvas.getContext('2d');
				this.valueEl = $('.da-circular-front .da-circular-digit', this.$elem).get(0);
				
				this.start();
			}
			
			return this;
		}, 
		
		// public methods
		
		start: function() {
			var radius = this.data.radius;
			this.context.fillStyle = this.config.fillColor;
			this._update(10, true);
		}, 
		
		// private methods
		
		_build: function() {
			var span = $('<span></span>'), 
				canvas = document.createElement('canvas');
			
			this.$elem
				.append(span.clone().addClass('da-circular-front')
					.append(span.clone().addClass('da-circular-digit'))
					.append(span.clone().addClass('da-circular-label').text(this.config.label))
				)
				.append(span.clone().addClass('da-circular-progress').append($(canvas)))
				.addClass('da-circular-stat');
				
			if (!canvas.getContext) {
				if(typeof(window.G_vmlCanvasManager) !== 'undefined') {
					canvas = window.G_vmlCanvasManager.initElement(canvas);
				} else {
					console.log('Your browser does not support HTML5 Canvas, or excanvas is missing on IE');
					this.$elem.hide();
					return false;
				}
			}
			
			return true;
		}, 
		
		_getVal: function(progress) {
			if(this.config.percent)
				return Math.ceil(Math.min(progress, 1.0) * (this.config.value / this.config.maxValue) * 100);
			else
				return progress > 1.0? this.data.endValue : Math.ceil(progress * (this.data.endValue - this.data.startValue));
		}, 
		
		_update: function(timeout, init) {
			var d = this.data;
			
			if(init) {
				var self = this;
				d.startTime = new Date().getTime();
				d.timer = window.setInterval(function() { self._update(timeout, false); }, timeout);
			} else {
				var progress = Math.min((new Date().getTime() - d.startTime) / this.config.duration, 1.0), 
					val = this._getVal(progress), 
					d = this.data;
					
				if(progress >= 1.0) {
					val = this._getVal(progress);
					window.clearInterval(d.timer);
				}
				
				this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
				this.context.beginPath();
					this.context.moveTo(d.centerX, d.centerY);
					this.context.lineTo(d.centerX, 0);
					this.context.arc(
						d.centerX, d.centerY, 
						d.radius, 
						d.startAngle, 
						d.startAngle + ((d.endAngle - d.startAngle) * progress), 
						false
					);
				this.context.closePath();
				this.context.fill();
				
				this.valueEl.innerHTML = 
					this.config.percent? ('<span>' + val + '%</span>') : ('<span>' + val + '</span>' + '/' + this.config.maxValue);
			}
		}
	}
	
	daCircularStat.defaults = daCircularStat.prototype.defaults;
	
	$.fn.daCircularStat = function(options) {
		return this.each(function() {
			new daCircularStat(this, options).init();
		});
	};

})( jQuery, window , document );
