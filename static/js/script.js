function forms() {
    $(".deaSearch .inp").focus(function () {
        $(this).val() == this.defaultValue && $(this).val("")
    }).blur(function () {
        "" == $(this).val() && $(this).val(this.defaultValue)
    })
}

function tabs(i, e) {
    var o, n = $(i).children(), s = $(e).children();
    s.hide(), n.each(function () {
        $(this).hasClass("on") && (o = $(this).index())
    }), s.eq(o).show(), n.click(function () {
        $(this).addClass("on").siblings().removeClass("on");
        var i = n.index(this);
        s.eq(i).fadeIn("linear").siblings().hide()
    })
}

$(function () {
    function i(i) {
        i.preventDefault()
    }

    var e = new Swiper(".nav-two.swiper-container", {
        resistanceRatio: 0,
        paginationClickable: !0,
        freeMode: !0,
        spaceBetween: 10,
        slidesPerView: "auto"
    });
    $(".nav-two li").each(function (i, o) {
        $(".nav-two li").eq(i).is(".active") && e.slideTo(i, 0, !1)
    }), $(".footer .link .wx").click(function () {
        $(".bg-1").show(), $(".wx-box").stop(!0, !0).fadeIn()
    }), $(".index-produits-nav li").click(function () {
        var i = $(this).index();
        $(this).addClass("active").siblings().removeClass("active"), $(".index-produits-box ul").eq(i).show().siblings().hide(), $(".product-carousel-box .product-carousel").eq(i).css({visibility: "visible"}).siblings().css({visibility: "hidden"})
    });
    var o;
    $(".search").click(function (i) {
        i.stopPropagation(), $(".bg-1").show(), $(".search-box-show").show()
    }), $(".search-box-show").click(function (i) {
        i.stopPropagation()
    }), $(".bg-1").click(function () {
        $(".bg-1").hide(), $(".search-box-show").hide(), $(".wx-box").stop(!0, !0).fadeOut()
    }), $(".join-us .radio li").click(function () {
        $(this).addClass("active").siblings().removeClass("active")
    }), $(".product-details-title li").click(function () {
        $(this).parents("ul").siblings().stop(!0, !0).slideToggle(), $(this).find(".icon").toggleClass("on")
    }), $(".talent-details-nr .btn a").click(function () {
        $(".talent-form").show(), document.addEventListener("touchmove", i, !1), o = new IScroll(".talent-form", {
            click: !1,
            tap: !0,
            preventDefault: !1,
            scrollY: !0
        })
    }), $(".talent-form .back").click(function () {
        $(".talent-form").hide(), document.removeEventListener("touchmove", i, !1), o.destroy()
    }), $(".nav-btn").click(function () {
        document.addEventListener("touchmove", i, !1), o = new IScroll("#wrapper1", {
            click: !1,
            tap: !0,
            preventDefault: !1,
            scrollY: !0
        }), $(".bg-1").show(), $(".iphone-nav").addClass("iphone-nav-active")
    }), $(".bg-1").click(function () {
        $(".iphone-nav").removeClass("iphone-nav-active"), $(".bg-1").hide(), document.removeEventListener("touchmove", i, !1), o.destroy()
    }), $(".iphone-nav .li").click(function () {
        $(this).find(".two").stop(!0, !0).slideToggle(function () {
            o.refresh()
        })
    }), checkBrowser()
});
var checkBrowser = function () {
    var i = navigator.userAgent.toLowerCase(), e = (/msie 9\.0/i.test(i), /msie 8\.0/i.test(i)),
        o = /msie 7\.0/i.test(i), n = /msie 6\.0/i.test(i), s = "";
    e ? (s = '<div class="checkBrowser"><span>您现在使用的是IE8内核，版本过低！建议您升级到IE9+或者使用极速模式浏览，以体验最佳效果!</span><a title="关闭" onclick="checkBrowser.close();">×</a></div>', $("body").append(s)) : o ? (s = '<div class="checkBrowser"><span>您现在使用的是IE7内核，版本过低！建议您升级到IE9+或者使用极速模式浏览，以体验最佳效果!</span><a title="关闭" onclick="checkBrowser.close();">×</a></div>', $("body").append(s)) : n && (s = '<div class="checkBrowser"><span>您现在使用的是IE6内核，版本过低！建议您升级到IE9+或者使用极速模式浏览，以体验最佳效果!</span><a title="关闭" onclick="checkBrowser.close();">×</a></div>', $("body").append(s)), checkBrowser.close = function () {
        $(".checkBrowser").remove()
    }
}, isMobile = function () {
    var i = navigator.userAgent.toLowerCase(), e = "ipad" == i.match(/ipad/i), o = "iphone os" == i.match(/iphone os/i),
        n = "midp" == i.match(/midp/i), s = "rv:1.2.3.4" == i.match(/rv:1.2.3.4/i), t = "ucweb" == i.match(/ucweb/i),
        c = "android" == i.match(/android/i), a = "windows ce" == i.match(/windows ce/i),
        l = "windows mobile" == i.match(/windows mobile/i);
    return !!(e || o || n || s || t || c || a || l)
};