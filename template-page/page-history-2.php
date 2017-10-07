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

<div class="remember-banner-box">
    <div class="remember-banner">
        <div class="swiper-container">
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
                    <div class="swiper-slide" style="background-image: url(<?php echo $post_thumbnail_src[0];?>)"></div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="year-list swiper-container">
        <ul class="swiper-wrapper">
            <?php
            $cat_posts=get_posts("category=39&order=asc");
            foreach ($cat_posts as $cat_key=>$cat_post):?>
                <li class="swiper-slide <?php echo ($cay_key==0)?"active":"";?>">
                    <span><?php echo $cat_post->post_title;?></span>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<div class="remember-box">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            $cat_posts=get_posts("category=39&order=asc");
            foreach ($cat_posts as $cat_key=>$cat_post):?>
                <div class="swiper-slide remember-box-s">
                    <h1><?php echo $cat_post->post_title;?></h1>
                    <div class="p">
                        <?php echo $cat_post->post_content;?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/static/js/history.js"></script>


<?php


    get_footer();


?>


