<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 14:48
 *
 *
 *Template Name:品牌介绍
 */

get_header();

$id = get_the_ID();

$cat = get_category(21);

$parent_cat = get_category($cat->parent);


?>


<div class="header-one">
		<span><?php echo $parent_cat->cat_name;?></span>
    <div class="back">
        <a href="javascript:void(0)" onclick="javascript:window.history.go(-1);"> <i></i> </a>
    </div>
    <div class="nav-home">
        <a href="/wap"> <span></span> </a>
    </div>

    <div class="nav-btn">
        <a href="javascript:void(0)"> <span></span> </a>
    </div>
</div>
<!--banner-->
<div class="news-flash-list-banner talent-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/static/upload/history_banner.jpg)">
    <div class="y">
        <h1><?php echo  $cat->cat_name;?></h1>
        <h2><?php echo category_description("$cat->cat_ID");?></h2>
    </div>
</div>

<div class="nav-two swiper-container">
    <ul class="swiper-wrapper">
        <?php
            $history_menus = theme_nav_menu("history");
            foreach ($history_menus as $history_menu):
                ?>
                <li class="swiper-slide <?php echo ($id==$history_menu->item_id)?"active":"";?>">
                    <a href="<?php echo $history_menu->nav_url; ?>"> <?php echo $history_menu->navname; ?> </a>
                </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="news-flash-details-nr clearfloat">
    <?php
        echo get_post($id)->post_content;
    ?>
</div>

<?php
    get_footer();
?>