$(function(){
    var activeWidth = $(".special-nav-ul .active").offset().left;
    var navWidth = $(".special-nav-ul").offset().left;
    var liWidth = ($(".special-nav-ul li").width() - $(".special-nav-ul .icon").width())/2;
    var  wid = activeWidth-navWidth;
    $('.special-nav-ul .icon').css({
        "left":wid+liWidth+"px"
    })
    $(".special-nav-ul li").hover(function(){
        activeWidth = $(this).offset().left;
        wid = activeWidth-navWidth;
        $('.special-nav-ul .icon').css({
            "left":wid+liWidth+"px"
        })
    },function(){
        activeWidth = $(".special-nav-ul .active").offset().left;
        wid = activeWidth - navWidth;
        $('.special-nav-ul .icon').css({
            "left":wid+liWidth+"px"
        })
    })
    function animateds(nm,h,time){
        var nm =$(nm);
        var b = nm.offset().top;
        if (b >= $(window).scrollTop() && b < ($(window).scrollTop()+$(window).height())) {
            nm.addClass("animated "+h);
            nm.css({
                "animation-delay":time+"s",
                "-webkit-animation-delay":time+"s"
            })
        }
    }
    animateds(".special-banner .p","fadeIn-s")
    animateds(".special-nav .logo img","fadeIn-z");
    var index_1 = $(".sp-cook .sp-cook-two li").length;
    var index_2 = $(".sp-tips .sp-cook-one").length;
    var index_3 = $(".sp-practice .sp-practice-list li").length;
    $(window).scroll(function () {
        var y = $(document).scrollTop();
        var yy = $(window).height();
        if (y > yy) {
            $(".go-back-to").css({
                "display": "block"
            })
        } else {
            $(".go-back-to").css({
                "display": "none"
            })
        }
        animateds(".special-nav .logo img","fadeIn-z");
        animateds(".special-banner .p","fadeIn-s");
        animateds("#sp-cook .sp-cook-one","fadeIn-f");
        for(var i=0;i<index_1;i++){
            animateds(".sp-cook .sp-cook-two li:eq("+i+")","fadeIn-ss",i*0.5);
        }
        for(var i=0;i<index_2;i++){
            animateds(".sp-tips .sp-cook-one:eq("+i+")","fadeIn-ss",i*0.5);
        }
        for(var i=0;i<index_3;i++){
            animateds(".sp-practice .sp-practice-list li:eq("+i+")","fadeIn-ss",i*0.5);
        }
        animateds(".sp-truth .title","fadeIn-sss");
    });
    // 点击回到顶部
    $(".go-back-to a").click(function() {
        var speed = 200;
        $('body,html').animate({
            "scrollTop": 0
        }, speed);
    })
})