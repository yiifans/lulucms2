/*
 * Dandelion Admin v1.0 - PickList JS
 *
 * This file is part of Dandelion Admin, an Admin template build for sale at ThemeForest.
 * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
 *
 * Development Started:
 * March 25, 2012
 *
 * This file is a modified and simplified version of jquery-ui-picklist (http://code.google.com/p/jquery-ui-picklist/)
 * Changes:
 * - Changed the logic to refer option items from the list
 * - Removed the option to add rich items
 * - Removed the jquery.ui.widget dependency
 * - Removed all jquery ui class names
 * - Several code optimizations
 *
 * 'Highly configurable' mutable plugin boilerplate
 * Author: @markdalgleish
 * Further changes, comments: @addyosmani
 * Licensed under the MIT license
 *
 */

;(function( $, window, document, undefined ) {
	// our plugin constructor
	var daPickList = function( elem, options ) {
		this.element = $(elem);
		this.options = options;
    };
	
	// the plugin prototype
	daPickList.prototype = {
		defaults: {
			// Container classes
			mainClass:                  "pickList",
			listContainerClass:         "pickList_listContainer",
			sourceListContainerClass:   "pickList_sourceListContainer",
			controlsContainerClass:     "pickList_controlsContainer",
			targetListContainerClass:   "pickList_targetListContainer",
			listClass:                  "pickList_list",
			sourceListClass:            "pickList_sourceList",
			targetListClass:            "pickList_targetList",

			// List item classes
			listItemClass:              "pickList_listItem",
			selectedListItemClass:      "pickList_selectedListItem",

			// Control classes
			addAllClass:                "pickList_addAll",
			addClass:                   "pickList_add",
			removeAllClass:             "pickList_removeAll",
			removeClass:                "pickList_remove",

			// Control labels
			addAllLabel:                "&gt;&gt;",
			addLabel:                   "&gt;",
			removeAllLabel:             "&lt;&lt;",
			removeLabel:                "&lt;",

			// List labels
			sourceListLabel:            "Available Options", 
			targetListLabel:            "Selected Options", 
			listLabelClass:             "pickList_listLabel", 
			sourceListLabelClass:       "pickList_sourceListLabel", 
			targetListLabelClass:       "pickList_targetListLabel"
		}, 
		
		init: function() {				
			// Introduce defaults that can be extended either
			// globally or using an object literal.
			this.config = $.extend({}, this.defaults, this.options);
			
			var self = this;

			self._buildPickList();
			self._refresh();
		}, 

		_buildPickList: function()
		{
			var self = this;

			self.pickList = $("<div></div>")
					.hide()
					.addClass(self.config.mainClass)
					.insertAfter(self.element)
					.append(self._buildSourceList())
					.append(self._buildControls())
					.append(self._buildTargetList());

			self._populateLists();

			self.element.hide();
			self.pickList.show();
		}, 
		
		_buildSourceList: function()
		{
			var self = this;

			var container = $("<div></div>")
					.addClass(self.config.listContainerClass)
					.addClass(self.config.sourceListContainerClass)
					.css({
						"-moz-user-select": "none",
						"-webkit-user-select": "none",
						"user-select": "none",
						"-ms-user-select": "none"
					})
					.each(function()
					{
						this.onselectstart = function() { return false; };
					});

			var label = $("<div></div>")
					.text(self.config.sourceListLabel)
					.addClass(self.config.listLabelClass)
					.addClass(self.config.sourceListLabelClass);

			self.sourceList = $("<ul></ul>")
					.addClass(self.config.listClass)
					.addClass(self.config.sourceListClass)
					.delegate("li", "click", {pickList: self}, self._changeHandler);

			container
					.append(label)
					.append(self.sourceList);

			return container;
		},

		_buildTargetList: function()
		{
			var self = this;

			var container = $("<div></div>")
					.addClass(self.config.listContainerClass)
					.addClass(self.config.targetListContainerClass)
					.css({
						"-moz-user-select": "none",
						"-webkit-user-select": "none",
						"user-select": "none",
						"-ms-user-select": "none"
					})
					.each(function()
					{
						this.onselectstart = function() { return false; };
					});

			var label = $("<div></div>")
					.text(self.config.targetListLabel)
					.addClass(self.config.listLabelClass)
					.addClass(self.config.targetListLabelClass);

			self.targetList = $("<ul></ul>")
					.addClass(self.config.listClass)
					.addClass(self.config.targetListClass)
					.delegate("li", "click", {pickList: self}, self._changeHandler);

			container
					.append(label)
					.append(self.targetList);

			return container;
		},

		_buildControls: function()
		{
			var self = this;

			self.controls = $("<div></div>").addClass(self.config.controlsContainerClass);

			self.addAllButton = $("<button></button>").click({pickList: self}, self._addAllHandler).html(self.config.addAllLabel).addClass(self.config.addAllClass);
			self.addButton = $("<button></button>").click({pickList: self}, self._addHandler).html(self.config.addLabel).addClass(self.config.addClass);
			self.removeButton = $("<button></button>").click({pickList: self}, self._removeHandler).html(self.config.removeLabel).addClass(self.config.removeClass);
			self.removeAllButton = $("<button></button>").click({pickList: self}, self._removeAllHandler).html(self.config.removeAllLabel).addClass(self.config.removeAllClass);

			self.controls
					.append(self.addAllButton)
					.append(self.addButton)
					.append(self.removeButton)
					.append(self.removeAllButton);

			return self.controls;
		},
		
		_populateLists: function()
		{
			var 
				self = this, 
				nothingSelected = (self.element.get(0).selectedIndex <= 0), 
				randomId = self._generateRandomId();

			self.element.children().each(function()
			{
				var text = $(this).text();
				var copy = $("<li/>")
						.text(text)
						.attr('id', randomId + '_' + $(this).index())
						.addClass(self.config.listItemClass);
						
				if(nothingSelected || $(this).not(":selected"))
				{
					self.sourceList.append( copy );
				}
				else
				{
					self.targetList.append( copy );
				}
			});
		}, 
		
		_addItem: function(items)
		{
			var self = this;
			
			items.each(function(k, v) {
				self.targetList.append( self._removeSelection( $(v) ) );
				
				itemId = $(v).attr("id");
				optionIndex = itemId.substr(itemId.lastIndexOf("_") + 1);
				self.element.children('option').eq(optionIndex).attr("selected", true);
			});
		},

		_removeItem: function(items)
		{
			var self = this;
			
			items.each(function(k, v) {
				self.sourceList.append( self._removeSelection( $(v) ) );
				
				itemId = $(v).attr("id");
				optionIndex = itemId.substr(itemId.lastIndexOf("_") + 1);
				self.element.children('option').eq(optionIndex).removeAttr("selected");
			});
		},

		_addAllHandler: function(e)
		{
			var self = e.data.pickList;

			self._addItem( self.sourceList.children() );
			self._refresh();
		},

		_addHandler: function(e)
		{
			var self = e.data.pickList;

			self._addItem( self.sourceList.children(".pickList_selected") );
			self._refresh();
		},

		_removeHandler: function(e)
		{
			var self = e.data.pickList;

			self._removeItem( self.targetList.children(".pickList_selected") );
			self._refresh();
		},

		_removeAllHandler: function(e)
		{
			var self = e.data.pickList;

			self._removeItem( self.targetList.children() );
			self._refresh();
		},  
		
		_refresh: function()
		{
			var self = this;

			// Enable/disable the Add All button state.
			if(self.sourceList.children().length)
			{
				self.addAllButton.removeAttr("disabled");
			}
			else
			{
				self.addAllButton.attr("disabled", "disabled");
			}

			// Enable/disable the Remove All button state.
			if(self.targetList.children().length)
			{
				self.removeAllButton.removeAttr("disabled");
			}
			else
			{
				self.removeAllButton.attr("disabled", "disabled");
			}

			// Enable/disable the Add button state.
			if(self.sourceList.children(".pickList_selected").length)
			{
				self.addButton.removeAttr("disabled");
			}
			else
			{
				self.addButton.attr("disabled", "disabled");
			}

			// Enable/disable the Remove button state.
			if(self.targetList.children(".pickList_selected").length)
			{
				self.removeButton.removeAttr("disabled");
			}
			else
			{
				self.removeButton.attr("disabled", "disabled");
			}

			// Sort the selection lists.
			self._sortItems(self.sourceList);
			self._sortItems(self.targetList);
		},

		_sortItems: function(list)
		{
			list.children().sort(function(a, b) {
				return ( a.innerHTML > b.innerHTML? 1 : (a.innerHTML == b.innerHTML? 0 : -1) );  
			}).appendTo(list);
		},

		_changeHandler: function(e)
		{
			var self = e.data.pickList;

			if(e.ctrlKey)
			{
				if(self._isSelected( $(this) ))
				{
					self._removeSelection( $(this) );
				}
				else
				{
					self.lastSelectedItem = $(this);
					self._addSelection( $(this) );
				}
			}
			else if(e.shiftKey)
			{
				var current = $(this).get(0);
				var last = self.lastSelectedItem.get(0);

				if($(this).index() < $(self.lastSelectedItem).index())
				{
					var temp = current;
					current = last;
					last = temp;
				}

				var pastStart = false;
				var beforeEnd = true;

				self._clearSelections( $(this).parent() );

				$(this).parent().children().each(function()
				{
					if($(this).get(0) == last)
					{
						pastStart = true;
					}

					if(pastStart && beforeEnd)
					{
						self._addSelection( $(this) );
					}

					if($(this).get(0) == current)
					{
						beforeEnd = false;
					}
				});
			}
			else
			{
				self.lastSelectedItem = $(this);
				self._clearSelections( $(this).parent() );
				self._addSelection( $(this) );
			}

			self._refresh();
		},

		_isSelected: function(listItem)
		{
			return listItem.hasClass("pickList_selected");
		},

		_addSelection: function(listItem)
		{
			var self = this;

			return listItem
					.addClass("pickList_selected")
					.addClass(self.config.selectedListItemClass);
		},

		_removeSelection: function(listItem)
		{
			var self = this;

			return listItem
					.removeClass("pickList_selected")
					.removeClass(self.config.selectedListItemClass);
		},

		_clearSelections: function(list)
		{
			var self = this;

			list.children().each(function()
			{
				self._removeSelection( $(this) );
			});
		},
		
		_generateRandomId: function() {
			var randomId = 'pickList_' + this._randomChar() + this._randomChar() + this._randomChar();
			while ($("#" + randomId).length > 0) {
				randomId += this._randomChar();
			}
			return randomId;
		}, 
		
		_randomChar: function() {
			var chars, newchar, rand;
			chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			rand = Math.floor(Math.random() * chars.length);
			return chars.substring(rand, rand + 1);
		}, 

		destroy: function()
		{
			var self = this;

			self.pickList.remove();
			self.element.show();
		},
	}
	
	daPickList.defaults = daPickList.prototype.defaults;
	
	$.fn.daPickList = function(options) {
		return this.each(function() {
			new daPickList(this, options).init();
		});
	};

})( jQuery, window , document );
