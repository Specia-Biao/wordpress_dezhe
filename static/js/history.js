  $(function () {
        var mySwiper = new Swiper('.year-list.swiper-container', {
            slidesPerView: 6,
            resistanceRatio: 0
        })
        var mySwiperC = new Swiper('.remember-box .swiper-container', {
            resistanceRatio: 0,
            onSlideChangeStart: function () {
                $(".year-list li").eq(mySwiperC.activeIndex).addClass("active").siblings().removeClass("active");
                mySwiper.slideTo(mySwiperC.activeIndex, 1000, false)
            }
        })
        var mySwiperA = new Swiper('.remember-banner .swiper-container', {
            resistanceRatio: 0
        })
        mySwiperA.params.control = mySwiperC;
        mySwiperC.params.control = mySwiperA;
        $(".year-list li").click(function () {
            var index = $(this).index();
            mySwiperA.slideTo(index, 300, false)
            $(this).addClass("active").siblings().removeClass("active");
        })
    })
