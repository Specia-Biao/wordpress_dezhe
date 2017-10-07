<?php



	get_header("world");

	$id=get_the_ID();

?>
<!--banner-->


<?php
$post_thumbnail_id = get_post_thumbnail_id($id);
$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
?>


<div class="special-banner" style="background-image:url(<?php echo $post_thumbnail_src[0];?>)">
	<div class="special-wp">
		<div class="p">
		</div>
	</div>
</div>


<!--导航-->
<div class="special-nav">
	<div class="special-wp clearfloat">
		<h1 class="logo">
			<a href="/"> <img src="<?php echo get_stylesheet_directory_uri();?>/static/images/special/logo.jpg" alt=""></a>
		</h1>
		<ul class="special-nav-ul clearfloat">
			<li class="active">
				<a href="javascript:;">
					<span>欧杯来袭</span>
					<i></i>
				</a>
			</li>
			<li class="active">
				<a href="javascript:;">
					<span>返璞归真</span>
					<i></i>
				</a>
			</li>
			<li class="active">
				<a href="javascript:;">
					<span>新品解密</span>
					<i></i>
				</a>
			</li>
			<li class="active">
				<a href="javascript:;">
					<span>惊喜花絮</span>
					<i></i>
				</a>
			</li>
			<li class="icon"></li>
		</ul>
		<div class="home">
			<a href="/">
				<img src="<?php echo get_stylesheet_directory_uri();?>/static/images/special/icon-1.png" alt="">
			</a>
		</div>
	</div>
</div>




<!--达人厨师-->
<div class="sp-cook" id="sp-cook">
	<h1 class="title">欧杯来袭</h1>
	<div class="sp-cook-box">
		<div class="special-wp">
			<div class="sp-cook-one">
				<div title="不可“司”议欧洲杯元素" class="nr">
					<h1>不可“司”议欧洲杯元素</h1>
					<div class="p">建博会期间，正值在法国举行的欧洲杯正火热，特邀热情的法国足球宝贝们，异国风情吸睛无数。现场玩摇一摇游戏，更有惊喜礼品等你拿。</div>
					<i></i>
				</div>
				<div class="img">
					<div style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519111525_124.jpg)"></div>
				</div>
			</div>
		</div>
		<div class="special-wp-1140">
			<ul class="sp-cook-two clearfloat">
				<li>
					<div class="top">
						<div style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519111103_245.jpg)"></div>
					</div>
					<div title="火辣宝贝" class="bottom">
						<h1>火辣宝贝</h1>
						<div class="p">
							足球宝贝作为足球文化的重要组成，司米也把这个足球文化带到中国，零距离给现场观众带来最纯粹的法国足球文化。                    </div>
					</div>
				</li>
				<li>
					<div class="top">
						<div style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519114438_482.png)"></div>
					</div>
					<div title="精彩进球" class="bottom">
						<h1>精彩进球</h1>
						<div class="p">
							一场足球比赛，过程很享受，进球很精彩。司米将欧洲杯进球做成一个精彩的集锦，让大家不会错过这次在法国举行的欧洲杯每一个精彩瞬间。                    </div>
					</div>
				</li>
				<li>
					<div class="top">
						<div style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519111601_494.jpg)"></div>
					</div>
					<div title="快乐摇一摇" class="bottom">
						<h1>快乐摇一摇</h1>
						<div class="p">
							关注司米官方微信，参加欧洲杯摇一摇有奖活动，手机摇动频率越高，排名越靠前，司米为勇夺前列的选手奉上惊喜礼品。                    </div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!--做法详解-->
<div class="sp-practice">
	<h1 class="title">返璞归真</h1>
	<div class="special-wp-1150">
		<ul class="sp-practice-list clearfloat">
			<li>
				<div>
					<div class="nr">
						<h1>法式展厅</h1>
						<div class="p">
							穿过门口比肩接踵的人群，来到司米橱柜的法式展厅，时尚、优雅、自然、质朴等代名词扑面而来。司米以“返璞归真”为主题的展厅正式揭开神秘的“面纱”，白色为主色调的法式展厅、低调雅致，彰显品质生活，唤醒生活的本质，带你回归初心。                    </div>
					</div>
					<div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519112345_575.jpg)"></div>

				</div>
			</li>
			<li>
				<div>
					<div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519111452_882.jpg)"></div>
					<div class="nr">
						<h1>3D镭射板</h1>
						<div class="p">
							“3D镭射板”是采用激光封边技术将优质的ABS封边带与板材进行结合的升级型板材，在欧洲早已得到广泛使用，司米将这全球1000万用户选择的高品质板材带到了中国，不仅能更好地解决中国家庭厨房的各类问题，还带来更加便捷、高品质的家居生活。                    </div>
					</div>

				</div>
			</li>
			<li>
				<div>
					<div class="nr">
						<h1>财富分享</h1>
						<div class="p">
							司米橱柜从法国带来了“返璞归真”橱柜理念， 以及其82年的品牌历史、强大的品牌实力等，让司米在建博会上一发不可收拾，各大媒体也争先报道。同时，在建博会上，司米也成功聚集了一批意向加盟者，他们纷纷报名参加司米招商财富峰会。                    </div>
					</div>
					<div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519112324_378.jpg)"></div>

				</div>
			</li>
		</ul>
	</div>
</div>
<!--窍门贴士-->
<div class="sp-cook sp-tips">
	<h1 class="title">新品解密</h1>
	<div class="special-wp">
		<div class="sp-cook-one">
			<div title="万森纳" class="nr">
				<h1>万森纳</h1>
				<div class="p">万森纳，听到这个名字，葱葱郁郁的绿色之感扑面而来。中国有种隐逸生活叫“大隐隐于市”，法国有种慢生活向往叫“万森纳”，它让生活在喧嚣里的都市精英过上回归自然的生活。一款司米万森纳橱柜，道出了褪去繁华外表后的实用工业风格回归，没有了纷繁与喧嚣，没有了压力与负担，身心在这样一处角落倍感轻松。</div>
				<i></i>
			</div>
			<div class="img">
				<div style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519111027_523.jpg)"></div>
			</div>
		</div>
		<div class="sp-cook-one">
			<div title="吉维尼" class="nr">
				<h1>吉维尼</h1>
				<div class="p">也许不是所有人都适合小清新风格，但几乎没有人会抗拒小清新，吉维尼橱柜便是这样一位容易让人一见钟情的北欧“女孩”。它有着1945年沉淀而来的文艺气息，却身披永不褪色的青春活力。</div>
				<i></i>
			</div>
			<div class="img">
				<div style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519111007_675.jpg)"></div>
			</div>
		</div>
		<div class="sp-cook-one">
			<div title="卡德" class="nr">
				<h1>卡德</h1>
				<div class="p">散发出法国卡德钢琴王子的优雅气质，走近它，手指不由自主地像在黑白琴键上弹奏起来，不是旋律指挥着你，而是你在创造一切的旋律。</div>
				<i></i>
			</div>
			<div class="img">
				<div style="background-image: url(http://www.ssk.com.cn/upfile/2017/05/20170519110952_611.jpg)"></div>
			</div>
		</div>
	</div>
</div>
<!--法国真情-->
<div class="sp-truth">
	<h1 class="title">惊喜花絮</h1>

	<div class="special-wp">
		<div class="carousel swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide" style="background-image: url()"></div>
				<div class="swiper-slide" style="background-image: url()"></div>
				<div class="swiper-slide" style="background-image: url()"></div>
				<div class="swiper-slide" style="background-image: url()"></div>
				<div class="swiper-slide" style="background-image: url()"></div>
				<div class="swiper-slide" style="background-image: url()"></div>
			</div>
		</div>
		<div class="btn">
			<a href="javascript:;" class="prev"></a>
			<a href="javascript:;" class="next"></a>
		</div>
	</div>
	<script>
        $(function(){
            var mySwiper = new Swiper('.sp-truth .swiper-container', {
                autoplay: 3000,
//            loop:true,
                resistanceRatio:0
            })
            $('.sp-truth .prev').click(function(){
                mySwiper.slidePrev();
                mySwiper.startAutoplay();
            })
            $('.sp-truth .next').click(function(){
                mySwiper.slideNext();
                mySwiper.startAutoplay();
            })
        })
	</script>
</div>












<?php

get_footer("world");

?>
