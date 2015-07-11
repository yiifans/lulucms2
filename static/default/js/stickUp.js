$(document).ready(function () {
    var $window = $(window);
    var $document = $(document);
    var $menu = null;
    var $menuItems = [];
    var contentButton = [];
    var content = [];
    var scrollDirection = '';
    var itemClass = '';
    var itemHover = '';
    var stopClass = '';
    var stopMargin = 0;
    var menuSize = null;
    var stickyHeight = 0;
    var stickyMarginB = 0;
    var currentMarginT = 0;
    var topMargin = 0;
    var stopTop = 0;
    var menuOffsetTop = 0;
    var scrollTop = 0;

    var lastScrollTop = 0;
    $window.scroll(function (event) {
        var st = $window.scrollTop();
        if (st > lastScrollTop) {
            scrollDirection = 'down';
        } else {
            scrollDirection = 'up';
        }
        lastScrollTop = st;
    });

    $.fn.stickUp = function (options) {
        // adding a class to users div
        $menu = $(this);
        $menu.addClass('stuckMenu');

        //getting options
        var objn = 0;
        if (options != null) {
            for (var o in options.parts) {
                if (options.parts.hasOwnProperty(o)) {
                    content[objn] = options.parts[objn];
                    objn++;
                }
            }
            if (objn == 0) {
                console.log('error:needs arguments');
            }

            itemClass = options.itemClass;
            itemHover = options.itemHover;
            stopClass = options.stopClass;
            stopMargin = options.stopMargin || stopMargin;

            $menuItems = $('.' + itemClass);
            menuSize = $menuItems.size();

            if (options.topMargin != null) {
                if (options.topMargin == 'auto') {
                    topMargin = parseInt($('.stuckMenu').css('margin-top'));
                } else {
                    if (isNaN(options.topMargin) && options.topMargin.search("px") > 0) {
                        topMargin = parseInt(options.topMargin.replace("px", ""));
                    } else if (!isNaN(parseInt(options.topMargin))) {
                        topMargin = parseInt(options.topMargin);
                    } else {
                        console.log("incorrect argument, ignored.");
                        topMargin = 0;
                    }
                }
            } else {
                topMargin = 0;
            }
        }
        stickyHeight = parseInt($menu.height());
        stickyMarginB = parseInt($menu.css('margin-bottom'));
        currentMarginT = parseInt($menu.next().closest('div').css('margin-top'));
        menuOffsetTop = parseInt($menu.offset().top);
    };

    $document.on('scroll', function () {
        scrollTop = parseInt($document.scrollTop());

        var contentTops = [];
        var contentBottoms = [];
        var contentHeights = [];
        var i = 0;

        if (menuSize != null) {
            for (i = 0; i < menuSize; i++) {
                var $content = $('#' + content[i] + '');
                contentTops[i] = $content.offset().top;
                contentBottoms[i] = $content.offset().top;
                contentHeights[i] = $content.height();

                //if (scrollDirection == 'down' && scrollTop > contentTops[i] - 50 && scrollTop < contentTops[i] + 50) {
                //    $menuItems.removeClass(itemHover).eq(i).addClass(itemHover);
                //}
                //
                //if (scrollDirection == 'up') {
                //    var contentView = $content.height() * .4;
                //    var testView = contentTops[i] - contentView;
                //    //console.log(scrollTop);
                //    if (scrollTop > testView) {
                //        $menuItems.removeClass(itemHover).eq(i).addClass(itemHover);
                //    } else if (scrollTop < contentTops[0]) {
                //        $menuItems.removeClass(itemHover).eq(0).addClass(itemHover);
                //    }
                //}
            }

            var activeIndex = 0;

            if (scrollTop > contentTops[menuSize - 1]) {
                activeIndex = menuSize - 1;

            } else if (scrollTop < contentTops[0]) {
                activeIndex = 0;

            } else if (scrollDirection == 'down') {
                for (i = menuSize - 1; i >= 0; i--) {
                    if (scrollTop > contentTops[i] - 50) {
                        activeIndex = i;
                        break;
                    }
                }

            } else {
                for (i = 0; i < menuSize; i++) {
                    if (scrollTop < contentTops[i] + contentHeights[i] / 2) {
                        activeIndex = i;
                        break;
                    }
                }
            }
            $menuItems.removeClass(itemHover).eq(activeIndex).addClass(itemHover);
        }


        if (menuOffsetTop < scrollTop + topMargin) {
            $menu.addClass('isStuck');
            $menu.next().closest('div').css({
                'margin-top': stickyHeight + stickyMarginB + currentMarginT + 'px'
            }, 10);
            $menu.css("position", "fixed");
            $('.isStuck').css({
                top: '0px'
            }, 10, function () {

            });
        }

        if (stopClass) {
            stopTop = $('.' + stopClass + '').offset().top
        }

        if (scrollTop + topMargin < menuOffsetTop ||
            (stopTop && scrollTop + topMargin > stopTop - stickyHeight - stopMargin)) {
            $menu.removeClass('isStuck');
            $menu.next().closest('div').css({
                'margin-top': currentMarginT + 'px'
            }, 10);
            $menu.css("position", "relative");
        }
        ;

    });
});

