<?php


/*
 *
 *
 * Template Name:资讯模板
 *
 * */
get_header();
$news_catId=8;
?>


    <div class="header-one">
		<span>司米快讯</span>
        <div class="back">
            <a href="javascript:void(0)" onclick="javascript:window.history.go(-1);">
                <i></i>
            </a>
        </div>
        <div class="nav-home">
            <a href="http://www.ssk.com.cn//wap">
                <span></span>
            </a>
        </div>

        <div class="nav-btn">
            <a href="javascript:void(0)">
                <span></span>
            </a>
        </div>
    </div>
    <!--轮播-->
    <div class="product-carousel-box product-carousel-box-1">
        <div class="product-carousel product-details-carousel news-flash-carousel">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image: url(http://www.ssk.com.cn/upfile/2017/09/20170927163747_270.png)">
                        <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=1039">
                        </a>
                        <div class="news-flash-title">
                            <h1>国庆“放价啦” 司米爆款橱柜限量抢</h1>
                            <div class="time">2017-09-27</div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image: url(http://www.ssk.com.cn/upfile/2017/09/20170915144225_321.jpg)">
                        <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=1036">
                        </a>
                        <div class="news-flash-title">
                            <h1>司米橱柜荣获外观设计专利证书，新品阿尔凯特...</h1>
                            <div class="time">2017-09-15</div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image: url(http://www.ssk.com.cn/upfile/2017/09/20170915144505_872.jpg)">
                        <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=1012">
                        </a>
                        <div class="news-flash-title">
                            <h1>司米电器上市，为司米整体厨房解决方案再添新...</h1>
                            <div class="time">2017-08-04</div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image: url(http://www.ssk.com.cn/upfile/2017/07/20170710175251_633.png)">
                        <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=972">
                        </a>
                        <div class="news-flash-title">
                            <h1>司米橱柜发布产品新概念：更懂厨房，从司米3D...</h1>
                            <div class="time">2017-07-10</div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image: url(http://www.ssk.com.cn/upfile/2017/06/20170605103328_714.jpg)">
                        <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=902">
                        </a>
                        <div class="news-flash-title">
                            <h1>法国SALM集团正式更名为Schmidt Groupe司米集...</h1>
                            <div class="time">2017-06-02</div>
                        </div>
                    </div>


                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            var mySwiper = new Swiper('.product-carousel .swiper-container', {
//			autoplay: 5000,//可选选项，自动滑动
                resistanceRatio: 0,
                pagination: '.product-carousel .swiper-pagination',
                loop: true
            })
        })
    </script>
    <div class="d-bg">
        <!--资讯-->
        <ul class="news-flash-list">
            <li>
                <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=list&tid=12">
                    <div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2016/11/20161117172551_304.jpg)">

                    </div>
                    <div class="title">
                        品牌资讯
                    </div>
                </a>
            </li>
            <li>
                <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=list&tid=14">
                    <div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2016/11/20161117172559_189.jpg)">

                    </div>
                    <div class="title">
                        媒体资讯
                    </div>
                </a>
            </li>
        </ul>
        <!--促销资讯-->
        <div class="promotional-information">
            <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=list&tid=13" style="background-image: url(http://www.ssk.com.cn/upfile/2016/11/20161117172609_750.jpg)">
                <span>促销资讯</span>
            </a>
        </div>
    </div>


















	<div class="newsMain">
		<div class="wp1200">
			<div class="newsCenterBox clearfloat">
				<div class="newsCenterText">
                        <?php
                            $news_cat=get_category("$news_catId");
                        ?>
					<div class="textBox">
						<h3><a><?php echo category_description("$news_catId")?></a></h3>
						<h4><a><?php echo $news_cat->cat_name;?></a></h4>
						<i></i>
						<div class="newsCenterCon clearfloat">


							<?php
							// 得到所有标签列表（15为标签id，想获取某个标签只需添加进去用逗号隔开，如'include' => '13，57'）
							$args=array(
								'include' => '28'
							);
							$tags = get_tags($args);
							//循环所有标签
							foreach ($tags as $tag) {
								// 得到标签ID
								// 得到标签下所有文章
								$tagid = $tag->term_id;
								$posts=query_posts("showposts=-1&tag_id=$tagid");
								$post=$posts[0];
								?>
                                <div class="img">
                                    <a href="<?php echo $post->guid;?>">
		                                <?php
		                                // 获取特色图像的地址
		                                $post_ID=$post->ID;
		                                $post_thumbnail_id = get_post_thumbnail_id($post_ID);
		                                $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
		                                $timthumb_src = wp_get_attachment_image_src( $post->ID,$size = 'medium');
		                                echo '<img src="' . $post_thumbnail_src[0] . '" /> ';
		                                ?>
                                    </a>
                                </div>
                                <div class="text">
                                    <h5><?php echo $post->post_title;?></h5>
                                    <a href=<?php echo $post->guid;?>" class="more">MORE</a>
                                </div>
							<?php } ?>
						</div>
						<ul class="newsCenterList">
							<?php
							// 得到所有标签列表（15为标签id，想获取某个标签只需添加进去用逗号隔开，如'include' => '13，57'）
							$args=array(
								'include' => '29'
							);
							$tags = get_tags($args);
							//循环所有标签
							foreach ($tags as $tag) :
								// 得到标签ID
								// 得到标签下所有文章
								$tagid = $tag->term_id;
								$posts=query_posts("showposts=-1&tag_id=$tagid");
								foreach ($posts as $post):
									?>
                                    <li><a href="<?php echo $post->guid;?>"><?php echo $post->post_title;?></a><span><?php echo the_time("m-n");?></span></li>
								<?php endforeach;?>
							<?php endforeach; ?>
						</ul>
					</div>

				</div>
				<div class="newsCenterImg">
					<div class="newsImgTop">
                        <?php
                            $news_catTops=get_categories("child_of=$news_catId");
                            foreach ($news_catTops as $newsKey=>$news_cat):?>
                                <?php if($newsKey==0):?>
                                    <div class="imgtext por">
                                        <div class="img por">
                                            <a href="<?php echo home_url()."?cat=".$news_cat->cat_ID;?>">
                                                <img src="<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$newsKey.".jpg";?>"/>
                                                <h5><?php echo $news_cat->cat_name;?></h5>
                                                <i></i>
                                                <div class="colordiv"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php elseif($newsKey==1):?>
                                    <div class="imgtext ml2 por">
                                        <div class="img">
                                            <a href="<?php echo home_url()."?cat=".$news_cat->cat_ID;?>">
                                                <img src="<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$newsKey.".jpg";?>"/>
                                                <h5><?php echo $news_cat->cat_name;?></h5>
                                                <i></i>
                                                <div class="colordiv"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                <?php endforeach;?>
					</div>
					<div class="newsImgBom">
                        <?php
                            $news_catBoms=get_categories("child_of=$news_catId");
                            foreach ($news_catBoms as $newsKey=>$news_cat):?>
                                <?php if($newsKey==2):?>
                                    <div class="img por">
                                        <a href="<?php echo home_url()."?cat=".$news_cat->cat_ID;?>">
                                            <img src="<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$newsKey.".jpg";?>"/>
                                            <h5><?php echo $news_cat->cat_name;?></h5>
                                            <i></i>
                                            <div class="colordiv"></div>
                                        </a>
                                    </div>
                            <?php endif;?>
                                <?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>