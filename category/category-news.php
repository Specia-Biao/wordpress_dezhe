<?php


/*
 *
 *
 * 资讯分类
 *
 * */
get_header();
global $wp_query;
$newsId = get_query_var('cat');
$parent_cat=get_category(get_category($newsId)->parent);

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
    <div class="news-flash-list-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/news_banner.jpg);">
        <div class="y">
            <h1><?php echo $cat->cat_name;?></h1>
            <h2><?php echo category_description("$cat->cat_ID");?></h2>
        </div>
    </div>
    <ul class="index-news">


        <?php
        $news_posts=get_posts("category=$newsId&order=asc&orderby=date");
        foreach ($news_posts as $news_key=>$news_post):?>
            <li>
                <a href="<?php echo $news_post->guid;?>">
                    <div class="img">
                        <?php
                        // 获取特色图像的地址
                        $post_ID=$news_post->ID;
                        $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                        $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
                        ?>
                        <div style="background-image: url(<?php echo $post_thumbnail_src[0];?>)"></div>
                    </div>
                    <div class="title">
                        <h1><?php echo $news_post->post_title;?></h1>
                        <div class="time"><?php $arr = explode(" ",$news_post->post_date);echo (!empty($arr[0]))?$arr[0]:"";?></div>
                    </div>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
    <!--下一页-->
    <ul class="paging">
        <li><a><span class="current disabled">上一页</span></a></li>
        <li><a class="p1" title="下一页" href="">下一页</a></li>
    </ul>

<?php get_footer(); ?>