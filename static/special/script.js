// JavaScript Document

//按需写入所需的函数名
$(function () {

    $(".special-nav .special-nav-ul li:eq(0)").click(function() {
        var speed = 500;
        $('body,html').animate({
            "scrollTop":$("#sp-cook").offset().top
        }, speed);
    })
    $(".special-nav .special-nav-ul li:eq(1)").click(function() {
        var speed = 500;
        $('body,html').animate({
            "scrollTop":$(".sp-practice").offset().top
        }, speed);
    })
    $(".special-nav .special-nav-ul li:eq(2)").click(function() {
        var speed = 500;
        $('body,html').animate({
            "scrollTop":$(".sp-tips").offset().top
        }, speed);
    })
    $(".special-nav .special-nav-ul li:eq(3)").click(function() {
        var speed = 500;
        $('body,html').animate({
            "scrollTop":$(".sp-truth").offset().top
        }, speed);
    })
    checkBrowser();
    slideHistory();

    $('#recrutmentApplyBtn').click(function () {
        var wh = $(window).height(),
            dh = $(document).height();
        if (wh < 764) {
            $('#dialogApply').css({
                'position': 'absolute',
                'height': dh
            })
        }
        $('#dialogApply').css('visibility', 'visible');
        $('#dialogApplyBox').addClass('anim');
    });

    $('#fileBtn').click(function () {
        $('#fileApply').trigger('click');
    });

    $('#fileApply').change(function () {
        var val = $(this).val();
        $('#fileResult').text(val);
    });

    $('#dialogApplyClose').click(function () {
        $('#dialogApplyBox').removeClass('anim');
        setTimeout(function () {
            $('#dialogApply').css('visibility', 'hidden');
            $('#fileApply').val('');
            $('#fileResult').text('');
        }, 500);
    });

    $('.nav > li').hover(function () {
        var self = $(this),
            sub = self.find('.nav-sub');
        sub.stop(true, true).slideDown().css('z-index', 2);
    }, function () {
        var self = $(this),
            sub = self.find('.nav-sub');
        sub.stop(true, true).slideUp().css('z-index', 1);
    })
});

//简单标签切换
function tabs(tit, box) {
    /*html结构
     <div class="tabs">

     <div class="tabhd">
     <ul>
     <li class="on">标题一</li>
     <li>标题二</li>
     </ul>
     </div>

     <div class="tabbd">
     <div>内容一</div>
     <div>内容二</div>
     </div>

     </div>
     */
    var $div_li = $(tit).children();
    var $box_li = $(box).children();
    var i;
    $box_li.hide();
    $div_li.each(function () {
        if ($(this).hasClass('on'))
            i = $(this).index();
    });
    $box_li.eq(i).show();
    $div_li.click(function () {
        $(this).addClass("on").siblings().removeClass("on");
        var index = $div_li.index(this);
        $box_li.eq(index).fadeIn("linear").siblings().hide();
    });
}

// 判断浏览器
var checkBrowser = function () {
    var userAgent = navigator.userAgent.toLowerCase();
    var msie9 = /msie 9\.0/i.test(userAgent);
    var msie8 = /msie 8\.0/i.test(userAgent);
    var msie7 = /msie 7\.0/i.test(userAgent);
    var msie6 = /msie 6\.0/i.test(userAgent);
    var checkHtml = '';

    // if (msie9 || msie8 || msie7 || msie6) {
    //     $('body').append(checkHtml);
    // };

    if (msie8) {
        checkHtml = '<div class="checkBrowser"><span>您现在使用的是IE8内核，版本过低！建议您升级到IE9+或者使用极速模式浏览，以体验最佳效果!</span><a title="关闭" onclick="checkBrowser.close();">×</a></div>';
        $('body').append(checkHtml);
    } else if (msie7) {
        checkHtml = '<div class="checkBrowser"><span>您现在使用的是IE7内核，版本过低！建议您升级到IE9+或者使用极速模式浏览，以体验最佳效果!</span><a title="关闭" onclick="checkBrowser.close();">×</a></div>';
        $('body').append(checkHtml);
    } else if (msie6) {
        checkHtml = '<div class="checkBrowser"><span>您现在使用的是IE6内核，版本过低！建议您升级到IE9+或者使用极速模式浏览，以体验最佳效果!</span><a title="关闭" onclick="checkBrowser.close();">×</a></div>';
        $('body').append(checkHtml);
    }

    checkBrowser.close = function () {
        $('.checkBrowser').remove();
    }
}

// 判断是否移动设备
var isMobile = function () {
    var sUserAgent = navigator.userAgent.toLowerCase();
    var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
    var bIsMidp = sUserAgent.match(/midp/i) == "midp";
    var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
    var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
    var bIsAndroid = sUserAgent.match(/android/i) == "android";
    var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
    var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";

    if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
        return true;
    } else {
        return false;
    }
};

var slideHistory = function () {
    var SLIDE = $('#historySlide'),
        TITLE = $('#histroyIntroTitle'),
        DETAIL = $('#histroyIntroDetail');

    $('.history-slide-slide').each(function (i) {
        var self = $(this);
        setTimeout(function () {
            self.addClass('anim');
        }, i * 300);
    });

    var historyImgSwiper = new Swiper('#historySlideImg', {
        simulateTouch: false,
        preloadImages: false,
        lazyLoading: true,
        nextButton: '#historySlideNext',
        prevButton: '#historySlidePrev',
        effect: 'fade',
        onInit: function (swiper) {
            var activeIndex = swiper.activeIndex;

            SLIDE.find('.history-slide-slide').eq(activeIndex).addClass('history-slide-active');
            refreshInfo(TITLE, DETAIL, activeIndex);
        },
        onSlideChangeStart: function (swiper) {
            var activeIndex = swiper.activeIndex;

            SLIDE.find('.history-slide-slide').eq(activeIndex).addClass('history-slide-active').siblings().removeClass('history-slide-active');
            resizeSlideSize('#historySlide', activeIndex);
            refreshInfo(TITLE, DETAIL, activeIndex);
        }
    });

    SLIDE.find('.history-slide-slide').click(function (e) {
        e.stopPropagation();
        var self = $(this),
            i = $(this).index();

        historyImgSwiper.slideTo(i);
        self.addClass('history-slide-active').siblings().removeClass('history-slide-active');
    });
};

var resizeSlideSize = function (container, index) {
    var conHeight = $(container).outerHeight(),
        wrapperEle = $(container).children(),
        slide = $('#historySlide .history-slide-slide'),
        slideTop = slide.eq(index).position().top;

    if (slideTop >= conHeight) {
        wrapperEle.dequeue().animate({
            "top": (conHeight - slideTop - 60)
        }, 300);
    } else {
        wrapperEle.dequeue().animate({
            "top": 0
        }, 300);
    }
};

var refreshInfo = function (titleEle, detailEle, index) {
    var slide = $('#historySlide .history-slide-slide').eq(index),
        title = slide.find('span').html(),
        detail = slide.find('.p').html();

    $(titleEle).css({
        top: 20,
        opacity: 0
    }).stop().animate({
        top: 0,
        opacity: 1
    }, 600).html(title);
    $(detailEle).css({
        top: 20,
        opacity: 0
    }).stop().delay(300).animate({
        top: 0,
        opacity: 1
    }, 600).html(detail);
};

/**
 * [openCaseDialog] 打开项目列表内容弹框
 * @param index 列表引索值
 * @param data 内容json数据
 */
var openIndustryDialog = function (index, data) {
    var wh = $(window).height();
    var boxW = 1106,
        boxH = 783,
        radio = boxW / boxH;
    if (wh < 783) {
        boxH = wh;
        boxW = boxH * radio;
    }
    var html = '<div class="industry-dialog" id="industryDialog">' +
        '<div class="box" style="width:' + boxW + 'px;height:' + boxH + 'px;margin:' + (-boxH / 2) + 'px 0 0 ' + (-boxW / 2) + 'px;">' +
        '<div class="close">×</div>' +
        '<div class="scroll" id="scroll">' +
        '<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>' +
        '<div class="viewport">' +
        '<div class="overview">' +
        '<div class="title">' + data.title + '</div>' +
        '<div class="p">' + data.info + '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    $('body').append(html);
    var scroll = $('#scroll');
    var timer = setTimeout(function () {
        scroll.tinyscrollbar();
    }, 100);

    $('#industryDialog .close').click(function () {
        $('#industryDialog').remove();
        clearTimeout(timer);
    });
};