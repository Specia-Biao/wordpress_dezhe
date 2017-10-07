<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 15:46
 *
 *
 * Template Name:德哲中国
 */
get_header();

$id = get_the_ID();
$cat = get_category("22");
$parent_cat = get_category($cat->parent);
?>


<div class="header-one">
    <span><?php echo $parent_cat->cat_name; ?></span>
    <div class="back">
        <a href="javascript:void(0)" onclick="javascript:window.history.go(-1);"> <i></i> </a>
    </div>
    <div class="nav-home">
        <a href="/wap"> <span></span> </a>
    </div>

    <div class="nav-btn">
        <a href="javascript:void(0)"> <span></span> </a>
    </div>
</div><!--banner-->
<div class="news-flash-list-banner talent-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/static/upload/china_banner.jpg)">
    <div class="y">
        <h1><?php echo $cat->cat_name; ?></h1>
        <h2><?php echo category_description("22"); ?></h2>
    </div>
</div>
<div class="fame-box">
    <h1><?php echo the_excerpt(); ?></h1>
    <div class="info">
        <?php echo get_post($id)->post_content; ?>
    </div>
</div>
<ul class="fame-list">


    <?php
    $china_cats = get_categories("child_of=$cat->cat_ID");
    foreach ($china_cats as $china_cat):?><?php
        if ($china_cat->parent != $cat->cat_ID) continue; ?>

        <li>
            <a href="<?php echo home_url() . "?cat=" . $china_cat->cat_ID; ?>">
                <div class="img">
                    <div style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/static/upload/special/special_<?php echo $china_cat->cat_ID; ?>.jpg)"></div>
                </div>
                <div class="title">
                    <h1><?php echo $china_cat->cat_name; ?></h1>
                    <span></span><i></i>
                </div>
            </a>
        </li>
    <?php endforeach; ?>
</ul>


<!--下一页-->
<ul class="paging">
    <li><a><span class="current disabled">上一页</span></a></li>
    <li><a><span class="current disabled">下一页</span></a></li>
</ul>

<?php get_footer(); ?>


