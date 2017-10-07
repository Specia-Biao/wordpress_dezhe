<?php


/*
 *
 *
 *Template Name:产品模板
 *
 * */
get_header();

?>
    <div class="proCenter-banner pc">
        <div class="proCenter-banner-swiperCon pc">
            <?php
                $product_cats=get_categories("child_of=2");
                foreach ($product_cats as $pro_img_key=>$product_cat):
                    ?>
                    <div class="proCenter-banner-swiper swiper-container swiper-container-horizontal  pro-swiper0 <?php echo ($pro_img_key==0)?"cur":""; ?>">
                        <div class="swiper-wrapper">
                            <?php
                                $product_posts=get_posts("category=$product_cat->cat_ID&order=asc");
                                foreach ($product_posts as $product_post_key=>$product_post):
                                    if($product_post_key>4) break;
                                    ?>
	                                <?php
                                        // 获取特色图像的地址
                                        $post_ID=$product_post->ID;
                                        $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                                        $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                                ?>
                                    <div class="swiper-slide" style="background-image: url(<?php echo $post_thumbnail_src[0];?>)">
                                        <div class="word">
                                            <div class="cn"><?php echo $product_post->post_title;?></div>
                                            <div class="en font-baskvill"></div>
                                            <a href="<?php echo $product_post->guid;?>" class="more"><span>MORE</span></a>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
          <?php endforeach;?>
        </div>
        <div class="proCenter-banner-seriesCon pc clearfloat">
            <ul class="hd" id="seriesList">
                    <?php
                    $product_cat1s=get_categories("child_of=2");
                    foreach ($product_cat1s as $pro_key=>$product_cat ): ?>
                        <li class="<?php echo ($pro_key==0)?"cur":"";?>"><span><?php echo $product_cat->cat_name;?></span></li>
                <?php endforeach;?>
            </ul>
            <div class="bd" id="seriesBox">
                <div class="info">
                    <div class="t">
                        <span style="color: #030303; font-family: 'Helvetica Neue', 'Microsoft YaHei', Helvetica, STHeiTi, sans-serif;"><span style="font-size: 22px;">皇家系列&mdash;优雅生活的极致演绎</span></span>
                    </div>
                    <div class="p">沐浴南欧的温暖阳光，纯正的法国血统在SCHMIDT司米橱柜身上刻下了深深的烙印，这份土地天然带着一份优雅。司米的优雅，像天幕低垂之际登上艾菲尔铁塔，落日辉映晚霞，星辰相互交替，是一种从容而深邃的美丽。</div>
                </div>
                <div class="info">
                    <div class="t">新贵系列&mdash;精致生活的完美诠释</div>
                    <div class="p">抓住生活中出现的每一秒灵感，司米橱柜让时尚成为一种生活方式，彰显每一个家庭的独特个性，法兰西的文化与审美，在与时代的碰撞中擦出夺目的火花，点亮消费者的家居生活，引领新兴创意与新贵族式生活风尚。</div>
                </div>
                <div class="info">
                    <div class="t">浪漫系列&mdash;浪漫生活的艺术呈现</div>
                    <div class="p">浪漫，是人类永恒追求的情感氛围和精神境界，生活正是因为有了浪漫的点染，才更具内涵，更加丰满。时光流转，气质却随智慧而累积凝聚，司米橱柜产品焕发着一种浪漫气息，其非凡的艺术创造力为我们打造浪漫生活。</div>
                </div>
                <div class="info">
                    <p>
                        <span style="color: #030303; font-family: 'Helvetica Neue', 'Microsoft YaHei', Helvetica, STHeiTi, sans-serif; font-size: 22px; background-color: rgba(254, 254, 254, 0.952941);">厨电系列</span><span style="color: #030303; font-family: 'Helvetica Neue', 'Microsoft YaHei', Helvetica, STHeiTi, sans-serif; font-size: 22px; background-color: rgba(254, 254, 254, 0.952941);">&mdash;匠心苛求 &nbsp;精铸优雅</span>
                    </p>
                    <p>
                        <span style="color: #030303; font-family: 'Helvetica Neue', 'Microsoft YaHei', Helvetica, STHeiTi, sans-serif; font-size: 22px; background-color: rgba(254, 254, 254, 0.952941);"><br/></span>
                    </p>
                    <p>
                        <span style="color: #696969; font-family: 'Helvetica Neue', 'Microsoft YaHei', Helvetica, STHeiTi, sans-serif; font-size: 13px; line-height: 26px; background-color: rgba(254, 254, 254, 0.952941);">坚持美观与实用完美结合，集欧洲科技之大成，司米电器在基于便捷生活、服务中国家庭的理念上，将&ldquo;领先每一个细节&rdquo;当成终身信条。当匠心邂逅优雅浪漫，当精湛科技遇上时尚设计，司米电器应运而生。</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="proCenter-main pc">
        <div class="proCenter-listCon">
            <?php
                foreach ($product_cats as $product_cat): ?>
                    <ul class="proCenter-list clearfloat">
                        <?php
                            $product_posts=get_posts("category=$product_cat->cat_ID;");
                            foreach ($product_posts as $product_post_detail):
                        ?>
                        <li>
                            <a href="<?php echo $product_post_detail->guid;?>">
	                            <?php
	                            // 获取特色图像的地址
	                            $post_ID=$product_post_detail->ID;
	                            $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
	                            $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                            ?>
                                <div class="img" style="background-image: url(<?php echo $post_thumbnail_src[0];?>)">
                                    <div class="imgbg"></div>
                                </div>
                                <div class="info">
                                    <span class="cn"><?php echo $product_post_detail->post_title;?></span><span class="en"><?php echo get_post_meta("$post_ID","en",true);?></span>
                                    <div class="line"></div>
                                </div>
                                <div class="shadow"></div>
                            </a>
                        </li>
                               <?php endforeach;?>
                    </ul>
             <?php endforeach;?>
        </div>
    </div>

<!--手机-->

    <div class="header-one wap">
		<span><?php echo get_category("2")->cat_name; ?></span>
        <div class="back">
            <a href="javascript:void(0)" onclick="javascript:window.history.go(-1);"><i></i></a>
        </div>
        <div class="nav-home">
            <a href="/">
                <span></span>
            </a>
        </div>

        <div class="nav-btn">
            <a href="javascript:void(0)">
                <span></span>
            </a>
        </div>
    </div>
    <div class="bg-1"></div>

    <div class="product-carousel-box wap">
	    <?php
	    $product_cats=get_categories("child_of=2");
	    foreach ($product_cats as $pro_img_key=>$product_cat):?>
        <div class="product-carousel" style="visibility: visible;">
            <div class="swiper-container swiper-container0 swiper-container-horizontal swiper-container-android">
                <div class="swiper-wrapper" style="transform: translate3d(-1440px, 0px, 0px); transition-duration: 0ms;">
                    <?php
                        $product_posts=get_posts("category=$product_cat->cat_ID&order=asc");
                        foreach ($product_posts as $product_post_key=>$product_post):
                            if($product_post_key>4) break;
                            ?>
                            <?php
                                // 获取特色图像的地址
                                $post_ID=$product_post->ID;
                                $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                                $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
                            ?>
                            <div class="swiper-slide" style="background-image: url(<?php echo $post_thumbnail_src[0];?>); width: 360px;" data-swiper-slide-index="<?php echo $product_post_key;?>">
                                <a href="">
                                    <h1><?php echo $product_post->post_title;?></h1>
                                    <h2></h2>
                                    <div>MORE &gt;</div>
                                </a>
                            </div>
                            <?php endforeach;?>
                </div>
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
            </div>
        </div>
	    <?php endforeach;?>
    </div>
    <script>
        $(function() {
            var seriesSwiperBox = $(".product-carousel"),
                seriesSwiperEle = []
            for (var i = 0; i < seriesSwiperBox.length; i++) {
                seriesSwiperEle[i] = new Swiper('.swiper-container' + i, {
                    simulateTouch: false,
                    pagination: '.swiper-container' + i + ' .swiper-pagination',
                    paginationClickable: true,
                    autoplayDisableOnInteraction: true,
                    loop: true,
                    prevButton: '.swiper-container' + i + ' .swiper-button-prev',
                    nextButton: '.pro-swiper' + i + ' .swiper-button-next',
                    autoplay: 3000
                });
            }
        })
    </script>
    <ul class="index-produits-nav clearfloat wap">
	    <?php
	    $product=get_category(2);
	    $productId=$product->cat_ID;
	    $product_cat_lists=get_categories("child_of=$productId");?>
	    <?php  if(!empty($product_cat_lists)):
		    foreach ($product_cat_lists as $product_key=>$product_cat): ?>
                <li class="<?php echo ($product_key==0)?"active":"";?>"><?php echo $product_cat->cat_name;?></li>
		    <?php endforeach; ?>
	    <?php endif;?>
    </ul>


    <div class="index-produits-box wap">
		<?php
		$product=get_category(2);
		$product_cats=get_categories("child_of=$productId");
		foreach ($product_cats as $product_cat) : ?>
            <ul>
				<?php
				$product_posts=get_posts("category=$product_cat->cat_ID");
				foreach ($product_posts as $productKey=>$product_post):
					$postid=$product_post->ID;
					?>
                    <li>
                        <a href="<?php echo $product_post->guid;?>">
                            <div class="img">
								<?php
								// 获取特色图像的地址
								$post_ID=$postid;
								$post_thumbnail_id = get_post_thumbnail_id( $post_ID );
								$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
								?>
                                <div style="background-image: url(<?php echo $post_thumbnail_src[0]; ?>)"></div>
                            </div>
                            <div class="title">
                                <div class="nr">
                                    <h4><?php echo $product_post->post_title;?></h4>
                                    <h5><?php echo get_post_meta("$product_post->ID","en",true);?></h5>
                                </div>
                                <div class="icon">
                                </div>
                            </div>
                        </a>
                    </li>
				<?php endforeach;?>
            </ul>
		<?php endforeach;?>
    </div>

    <ul class="paging">
	    <li><a href="javascript:void(0);">上一页</a></li>
        <li><a href="javascript:void(0);">下一页</a></li>
    </ul>
<!--手机-->

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/static/js/proBanner.js"></script>





<?php get_footer(); ?>