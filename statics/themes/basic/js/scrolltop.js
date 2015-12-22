$(function () {
    if ($(".fixed_side").length > 0) {
        var offset = $(".fixed_side").offset();
        $(window).scroll(function () {
            var scrollTop = $(window).scrollTop();
            //如果距离顶部的距离小于浏览器滚动的距离，则添加fixed属性。
            if (offset.top < scrollTop) $(".fixed_side").addClass("fixed");
            //否则清除fixed的css属性
            else $(".fixed_side").removeClass("fixed");
        });
    }
});