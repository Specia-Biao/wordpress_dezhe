<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 9:21
 *
 *
 *
 * Template Name:加盟优势
 */
get_header();



$id=get_the_ID();

$cat=get_category(18);
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
    <div class="news-flash-list-banner talent-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/join_banner.jpg)">
        <div class="y">
            <h1><?php echo $cat->cat_name;?></h1>
            <h2><?php echo category_description("$cat->cat_ID");?></h2>
        </div>
    </div>

    <div class="nav-two swiper-container">
        <ul class="swiper-wrapper">
            <?php
            $inside_menus=theme_nav_menu("join");
            foreach ($inside_menus as $inside_key=>$inside_menu):
                ?>
                <li class="swiper-slide <?php echo ($id==($inside_menu->item_id))?"active":"";?>">
                    <a href="<?php echo $inside_menu->nav_url;?>"><?php echo $inside_menu->navname;?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="join-superiority-title">
        <h1><?php echo get_post($id)->post_content;?></h1>
        <h5><?php the_excerpt();?></h5>
    </div>
    <?php
    $join_posts=get_posts("category=32&order=asc");
    foreach ($join_posts as $join_key=>$join_post):?>
        <?php  if($join_key==count($join_posts)):?>
            <div class="join-superiority-nr join-superiority-nr-last">
                <div class="p clearfloat">
                    <?php
                    // 获取特色图像的地址
                    $post_ID=$join_post->ID;
                    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                    $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full'); ?>
                    <p><img src="<?php echo $post_thumbnail_src[0] ;?>" alt="" /></p>
                    <h1><?php echo $join_post->post_title;?></h1>
                    <p><?php echo $join_post->post_content;?></p>
                </div>
            </div>
            <?php else:?>
            <div class="join-superiority-nr">
                <div class="p clearfloat">
                    <?php
                    // 获取特色图像的地址
                    $post_ID=$join_post->ID;
                    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                    $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full'); ?>
                    <p><img src="<?php echo $post_thumbnail_src[0] ;?>" alt="" /></p>
                    <h1><?php echo $join_post->post_title;?></h1>
                    <p><?php echo $join_post->post_content;?></p>
                </div>
            </div>
            <?php endif;?>
    <?php endforeach;?>

<?

get_footer();
?>