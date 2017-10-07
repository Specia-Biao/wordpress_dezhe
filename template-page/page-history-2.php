<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 14:48
 *
 *
 *Template Name:品牌纪事
 */


get_header();
$id=get_the_ID();
$cat=get_category(21);
$parent_cat=get_category($cat->parent);
?>

    <div class="insideBanner por" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/history_banner.jpg);">
        <div class="insideBannerBg"></div>
        <div class="path wp1200 clearfloat">
            <div class="word">
                <div class="cn"><?php echo $cat->cat_name;?></div>
                <div class="en font-baskvill"><?php echo category_description("$cat->cat_ID")?></div>
            </div>
            <div class="bread">
                <a href="/">首页</a>
                >&nbsp;<a href="<?php the_permalink(232);?>"><?php echo $parent_cat->cat_name;?></a>
                >&nbsp;<a href="<?php the_permalink(213);?>"><?php echo $cat->cat_name;?></a>
                >&nbsp;<?php the_title();?>

            </div>
        </div>
    </div>

	<div class="brand-main">
		<div class="wp1200">
			<div class="inside-menu">
				<?php
				$history_menus=theme_nav_menu("history");
				foreach ($history_menus as $history_menu):?>
                    <a href="<?php echo $history_menu->m_url;?>" class="<?php echo ($history_menu->item_id==$id)?"cur":"";?>"><?php echo $history_menu->navname;?></a>
				<?php endforeach;?>
			</div>
            <div class="history-con clearfloat">
                <div class="history-slide-con">
                    <div class="history-slide-prev" id="historySlidePrev"><span></span></div>
                    <div class="history-slide" id="historySlide">
                        <div class="history-slide-wrapper">
                            <?php
                                $cat_posts=get_posts("category=39&order=asc");
                                foreach ($cat_posts as $cat_post):?>
                                    <div class="history-slide-slide"><span class="font-baskvill"><?php echo $cat_post->post_title; ?></span>
                                        <div class="p">
                                            <?php echo get_post($cat_post->ID)->post_content;?>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                        </div>
                    </div>
                    <div class="history-slide-next" id="historySlideNext"><span></span></div>
                </div>
                <div class="history-intro-con">
                    <div class="history-intro-tb">
                        <div class="history-intro-title font-baskvill" id="histroyIntroTitle"></div>
                        <div class="history-intro-detail" id="histroyIntroDetail"></div>
                    </div>
                </div>

                <div class="history-slide-img swiper-container" id="historySlideImg">
                    <div class="swiper-wrapper">
	                    <?php
	                    $cat_posts=get_posts("category=39&order=asc");
	                    foreach ($cat_posts as $cat_post):?>
		                    <?php
		                    // 获取特色图像的地址
		                    $post_ID=$cat_post->ID;
		                    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
		                    $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
		                    ?>
                            <div class="swiper-slide">
                                <div class="img">
                                    <span class="swiper-lazy" data-background="<?php echo $post_thumbnail_src[0];?>"></span></div>
                                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            </div>
	                    <?php endforeach;?>
                    </div>
                </div>
            </div>
		</div>
	</div>

<?php


    get_footer();



?>


