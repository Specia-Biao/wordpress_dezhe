<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 14:48
 *
 *
 *Template Name:品牌理念
 */


get_header();
$id=get_the_ID();
$cat=get_category(21);

$parent_cat=get_category($cat->parent);
?>
    <div class="header-one">
		<span><?php echo $parent_cat->cat_name;?></span>
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
    <!--banner-->
    <div class="news-flash-list-banner talent-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/history_banner.jpg)">
        <div class="y">
            <h1><?php echo $cat->cat_name;?></h1>
            <h2><?php echo category_description("$cat->cat_ID");?></h2>
        </div>
    </div>

    <div class="nav-two swiper-container">
        <ul class="swiper-wrapper">
            <?php
            $history_menus = theme_nav_menu("history");
            foreach ($history_menus as $history_menu):
                ?>
                <li class="swiper-slide <?php echo ($id==($history_menu->item_id))?"active":"";?>">
                    <a href="<?php echo $history_menu->nav_url; ?>"> <?php echo $history_menu->navname; ?> </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="news-flash-details-nr clearfloat">
        <?php echo get_post($id)->post_content;?>
    </div>




















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
            <div class="brand-intro-main" style="font-size: 13px;line-height: 26px;color: #6F6F6F;">
               <?php echo get_post($id)->post_content;?>
            </div>
		</div>
	</div>



<?php

get_footer();
?>