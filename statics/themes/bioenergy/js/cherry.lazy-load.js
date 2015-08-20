function getWindowHeight() {
    var myWidth = 0, myHeight = 0;
    if( typeof( window.innerWidth ) == 'number' ) {
        //Non-IE
        myHeight = window.innerHeight;
    } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
        //IE 6+ in 'standards compliant mode'
        myHeight = document.documentElement.clientHeight;
    } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
        //IE 4 compatible
        myHeight = document.body.clientHeight;
    }

    return myHeight
}

function appearBox(element, element_top, bottom_of_window) {
    /* If the object is completely visible in the window, fade it it */
    var buffer = element.outerHeight()/2;
    if( bottom_of_window > element_top + buffer) {
        setTimeout(function(){
            if ( jQuery('.cssanimations').length ) {
                element.removeClass('trigger');
            } else {
                element.removeClass('trigger').animate({'opacity':'1'}, element.data('speed'));
            }
        }, element.data('delay'));            
    }
}


(function($) {
    $(window).load(function() {
        if(!device.mobile() && !device.tablet()){
            $('.lazy-load-box.trigger').each( function(i){
                var element_offset = $(this).offset();
                var element_top = element_offset.top;
                var bottom_of_window = $(window).scrollTop() + getWindowHeight();
                
                appearBox($(this), element_top, bottom_of_window);
            });

            /* Every time the window is scrolled ... */
            $(window).scroll( function() {
                /* Check the location of each desired element */
                $('.lazy-load-box.trigger').each( function(i){
                    
                    var element_offset = $(this).offset(),
                        element_top = element_offset.top,
                        bottom_of_window = $(window).scrollTop() + getWindowHeight();
                    
                    appearBox($(this), element_top, bottom_of_window);
                    
                }); 
            
            });
        } else {
            $('.lazy-load-box').each( function(i) {
                $(this).removeClass('trigger').css('opacity', '1');
            });
        }
    });
})(jQuery);
