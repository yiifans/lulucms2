/*
 * Dandelion Admin v1.0 - Wizard Form JS
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
	var daWizard = function( elem, options ) {
		this.$elem = $(elem);
		this.options = options;
    };
	
	// the plugin prototype
	daWizard.prototype = {
		defaults: {
			element: 'fieldset', 
			labelElement: 'legend', 
			buttonContainerClass: 'da-button-row', 
			nextButtonClass: 'da-button red', 
			prevButtonClass: 'da-button gray left', 
			submitButtonClass: 'da-button green', 
			nextButtonLabel: 'Next', 
			prevButtonLabel: 'Prev', 
			submitButtonLabel: 'Submit', 
			forwardOnly: true, 
			onLeaveStep: null, 
			onShowStep: null, 
			onBeforeSubmit: null
		}, 
		
		init: function() {				
			// Introduce defaults that can be extended either
			// globally or using an object literal.
			this.config = $.extend({}, this.defaults, this.options);
			
			this.steps = this.$elem.children(this.config.element);
			
			this.$elem.addClass('da-wizard-form');
			
			this.data = $.extend({}, this._buildNavigation(), this._buildButtons());
			
			this.initSteps();
			
			return this;
		}, 
		
		// Public methods
		
		initSteps: function() {
			this.steps.hide().first().show();
			
			this.wizardNav.find('.da-wizard-progress')
				.animate({
					width: Math.floor(100 / this.steps.size()).toString() + "%"
				}, 'slow')
			.end()
				.find('ul').children('li').first().addClass('active');
					
			this.data.activeStep = 0;
			this._processSteps();
		}, 
		
		goTo: function(stepNumber) {
			if(stepNumber !== this.data.activeStep) {
				if(this.config.forwardOnly && stepNumber < this.data.activeStep)
					return;
					
				var self = this;
				
				if(this.config.onLeaveStep && $.isFunction(this.config.onLeaveStep)) {
					if(false === this.config.onLeaveStep.apply(this, [this.data.activeStep, this.steps.eq(this.data.activeStep)]))
						return;
				}
				
				this.steps.eq(this.data.activeStep).data('done', true).fadeOut('fast', function() {
					self.steps.eq(stepNumber).fadeIn('fast');
					self.wizardNav.find('.da-wizard-progress')
						.animate({
							width: Math.floor((100 / self.steps.size()) * (stepNumber + 1)).toString() + "%"
						}, 'slow')
					.end()
						.find('ul')
					.children('li').removeClass('active')
						.eq(self.data.activeStep).addClass('done')
					.end()
						.eq(stepNumber).addClass('active');
							
					self.data.activeStep = stepNumber;
					self._processSteps();
					
					if(self.config.onShowStep && $.isFunction(self.config.onShowStep)) {
						self.config.onShowStep.apply(self, [stepNumber, self.steps.eq(stepNumber)]);
					}
				});
			}
		}, 
		
		goBackward: function() {
			if(this.data.activeStep > 0) {
				this.goTo(this.data.activeStep - 1);
			}
		}, 
		
		goForward: function() {
			if(this.data.activeStep < this.steps.size() - 1) {
				this.goTo(this.data.activeStep + 1);
			}
		}, 
		
		submitForm: function() {
			var shouldSubmit = true;
			if(this.config.onBeforeSubmit && $.isFunction(this.config.onBeforeSubmit)) {
				shouldSubmit = this.config.onBeforeSubmit.apply(this, []);
			}
			
			if(false !== shouldSubmit) this.$elem.submit();
		}, 
		
		// Private methods
		
		_navigate: function(stepNumber) {
			if(this._isStepDone(stepNumber))
				this.goTo(stepNumber);
		}, 
		
		_isStepDone: function(stepNumber) {
			return (typeof(this.steps.eq(stepNumber).data('done')) !== 'undefined');
		}, 
		
		_buildNavigation: function() {
			var
				self = this, 
				$ul = $('<ul></ul>'), 
				$li = $('<li></li>').css({
					width: Math.floor(100 / this.steps.size()).toString() + "%"
				}), 
				$span = $('<span></span>'), 
				$a = $('<a href="#"></a>');
				
			this.steps.each(function(index, el) {
				val = $(self.config.labelElement, el);
				val.hide();
				
				$ul.append(
					$li.clone()
					.append(
						$a.clone().text(index + 1).bind('click', function(event) {
							self._navigate(index);
							event.preventDefault();
						})
					)
					.append(
						$span.clone().addClass('da-wizard-label').text(val.length != 0? val.text() : ('Step ' + (index + 1).toString()))
					)
				);
			});
			
			this.wizardNav = $('<div></div>')
				.addClass('da-wizard-nav')
				.append($ul)
				.append($span.clone().addClass('da-wizard-progress'))
				.insertBefore(this.$elem);
				
			return { activeStep: -1 };
		}, 
		
		_buildButtons: function() {
			var btnContainer = $(this.config.buttonContainer, this.$elem), 
				self = this, 
				$button = $('<input />').attr('type', 'button'), 
				$prevButton = $button.clone().val(this.config.prevButtonLabel).addClass(this.config.prevButtonClass).bind('click', function(event) {
					if(!self.config.forwardOnly)
						self.goBackward();
					event.preventDefault();
				}), 
				$nextButton = $button.clone().val(this.config.nextButtonLabel).addClass(this.config.nextButtonClass).bind('click', function(event) {
					self.goForward();
					event.preventDefault();
				}), 
				$submitButton = $button.clone().val(this.config.submitButtonLabel).addClass(this.config.submitButtonClass).bind('click', function(event) {
					self.submitForm();
					event.preventDefault();
				});
			
			if(!btnContainer.get(0)) {
				btnContainer = $('<div></div>').addClass(this.config.buttonContainerClass).appendTo(this.$elem);
			}
			
			if(!self.config.forwardOnly)
				btnContainer.append($prevButton);
			btnContainer.append($nextButton).append($submitButton);
			
			return { nextButton: $nextButton, prevButton: $prevButton, submitButton: $submitButton };
		}, 
		
		_processSteps: function() {
			this.data.prevButton.toggle((this.data.activeStep > 0) && !this.data.forwardOnly);
			this.data.nextButton.toggle((this.data.activeStep < this.steps.size() - 1));
			this.data.submitButton.toggle((this.data.activeStep >= this.steps.size() - 1));
		}
	}
	
	daWizard.defaults = daWizard.prototype.defaults;
	
	$.fn.daWizard = function(options) {
		return this.each(function() {
			new daWizard(this, options).init();
		});
	};

})( jQuery, window , document );
