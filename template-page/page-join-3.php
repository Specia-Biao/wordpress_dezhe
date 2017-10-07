<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 9:21
 *
 *
 *
 * Template Name:加盟条件
 */
get_header();



$id=get_the_ID();

$cat=get_category(18);
$parent_cat=get_category($cat->parent);
?>

    <div class="insideBanner por" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/join_banner.jpg)">
        <div class="insideBannerBg"></div>
        <div class="path wp1200 clearfloat">
            <div class="word">
                <div class="cn"><?php echo $cat->cat_name;?></div>
                <div class="en font-baskvill"><?php echo category_description("$cat->cat_ID")?></div>
            </div>
            <div class="bread">
                <a href="/">首页</a>
                >&nbsp;<a href="<?php the_permalink(181);?>"><?php echo $parent_cat->cat_name;?></a>
                >&nbsp;<a href="<?php the_permalink(181);?>"><?php echo $cat->cat_name;?></a>
                >&nbsp;<?php echo the_title();?>
            </div>
        </div>
    </div>

    <div class="join-main">
        <div class="wp1200">
            <div class="inside-menu">
				<?php
				$inside_menus=theme_nav_menu("join");
				foreach ($inside_menus as $inside_key=>$inside_menu):
					?>
                    <a href="<?php echo $inside_menu->m_url;?>" class="<?php echo ($inside_menu->item_id==$id)?"cur":"";?>"><?php echo $inside_menu->navname;?></a>
				<?php endforeach;?>
            </div>
            <div class="join-brand-article">
                <?php
                    echo get_post($id)->post_content;
                ?>
            </div>
        </div>

</div>

<?

get_footer();
?>