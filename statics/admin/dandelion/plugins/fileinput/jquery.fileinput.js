/**
 * --------------------------------------------------------------------
 * jQuery customfileinput plugin
 * Author: Scott Jehl, scott@filamentgroup.com
 * Copyright (c) 2009 Filament Group 
 * licensed under MIT (filamentgroup.com/examples/mit-license.txt)
 * --------------------------------------------------------------------
 * Modified by maimairel (maimairel@yahoo.com) for use in a ThemeForest theme
 * --------------------------------------------------------------------
 */
 
$.fn.customFileInput = function(){
	//apply events and styles for file input element
	return $(this).each(function() {
		var fileInput = $(this)
			.addClass('customfile-input') //add class for CSS
			.mouseover(function(){ upload.addClass('customfile-hover'); })
			.mouseout(function(){ upload.removeClass('customfile-hover'); })
			.focus(function(){
				upload.addClass('customfile-focus'); 
				fileInput.data('val', fileInput.val());
			})
			.blur(function(){ 
				upload.removeClass('customfile-focus');
				$(this).trigger('checkChange');
			 })
			 .bind('disable',function(){
				fileInput.attr('disabled',true);
				upload.addClass('customfile-disabled');
			})
			.bind('enable',function(){
				fileInput.removeAttr('disabled');
				upload.removeClass('customfile-disabled');
			})
			.bind('checkChange', function () {
			    if (fileInput.attr("value") && fileInput.attr("value") != fileInput.data('val')) {
			        //fileInput.trigger('change');
				}
			    fileInput.trigger('change');
			})
			.bind('change',function(){
				debugger;
				var inputName = $(this).attr("name");
				
				//get file name
			    var fileName = $(this).val().split(/\\/).pop();
			    if(fileName=="")
			    {
			    	fileName = $("input:hidden[name='"+inputName+"']").val();
			    }
				//get file extension
				var fileExt = 'customfile-ext-' + fileName.split('.').pop().toLowerCase();
				//update the feedback
				uploadFeedback
					.attr("value",fileName) //set feedback text to filename
					.removeClass(uploadFeedback.data('fileExt') || '') //remove any existing file extension class
					.addClass(fileExt) //add file extension class
					.data('fileExt', fileExt) //store file extension for class removal on next change
					.addClass('customfile-feedback-populated'); //add class to show populated state
				//change text of button	
				uploadButton.text('Change');	
			})
			.click(function(){ //for IE and Opera, make sure change fires after choosing a file, using an async callback
				var fileName = $(this).val().split(/\\/).pop();
			    fileInput.data('val', fileName);
				setTimeout(function(){
					fileInput.trigger('checkChange');
				},100);
			});
			
		console.log(fileInput.attr("value"));
		//create custom control container
		var upload = $('<div class="customfile"></div>');
		//create custom control button
		var uploadButton = $('<span class="customfile-button" aria-hidden="true">Browse</span>').appendTo(upload);
		//create custom control feedback
		var uploadFeedback = $('<input type="text" class="customfile-feedback" aria-hidden="true" name="'+fileInput.attr("name")+'" value="'+fileInput.attr("value")+'"/>').appendTo(upload);
		//var uploadFeedback = $('<span class="customfile-feedback" aria-hidden="true" >No file selected...</span>').appendTo(upload);
		
		//match disabled state
		if(fileInput.is('[disabled]')){
			fileInput.trigger('disable');
		}
		
		fileInput.trigger('checkChange');
		
		//on mousemove, keep file input under the cursor to steal click
		upload
//			.mousemove(function(e){
//				fileInput.css({
//					'right': 0, //position right side 20px right of cursor X)
//					'top': 0
//				});
//			})
			.insertAfter(fileInput); //insert after the input
		
		fileInput.insertAfter(uploadButton);
	});
};