<?php


/*
 *
 *
 * Template Name:资讯模板
 *
 * */
get_header();

$id=get_the_ID();
$cat=get_category(8);

$news_id=10;
?>
    <div class="header-one">
		<span><?php echo $cat->cat_name;?></span>
        <div class="back">
            <a href="javascript:void(0)" onclick="javascript:window.history.go(-1);">
                <i></i>
            </a>
        </div>
        <div class="nav-home">
            <a href="/wap">
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
                    <?php
                    $news_posts=get_posts("category=$news_id&order=asc&orderby=date");
                    foreach ($news_posts as $news_key=>$news_post):?>
                        <?php
                            // 获取特色图像的地址
                            $post_ID=$news_post->ID;
                            $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                            $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full'); ?>
                        <div class="swiper-slide" style="background-image: url(<?php echo $post_thumbnail_src[0]; ?>)">
                            <a href="<?php echo $news_post->guid;?>">
                            </a>
                            <div class="news-flash-title">
                                <h1><?php echo $news_post->post_title;?></h1>
                                <div class="time"><?php $arr = explode(" ",$job_post->post_date);echo (!empty($arr[0]))?$arr[0]:"";?></div>
                            </div>
                        </div>
                    <?php endforeach;?>
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

            <?php $news_cat=get_categories("child_of=$cat->cat_ID"); ?>



            <li>
                <a href="<?php echo home_url()."?cat=".$news_cat[0]->cat_ID;?>">
                    <div class="img" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$news_cat[0]->cat_ID.".jpg";?>)">
                    </div>
                    <div class="title">
                        <?php echo $news_cat[0]->cat_name;?>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo home_url()."?cat=".$news_cat[1]->cat_ID;?>">
                    <div class="img" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$news_cat[1]->cat_ID.".jpg";?>)">
                    </div>
                    <div class="title">
                        <?php echo $news_cat[1]->cat_name;?>
                    </div>
                </a>
            </li>
        </ul>
        <!--促销资讯-->
        <div class="promotional-information">
            <a href="<?php echo home_url()."?cat=".$news_cat[2]->cat_ID;?>" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$news_cat[2]->cat_ID.".jpg";?>)">
                <span>  <?php echo $news_cat[2]->cat_name;?></span>
            </a>
        </div>
    </div>


<?php get_footer(); ?>