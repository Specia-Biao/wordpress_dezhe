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



    <div class="insideBanner por" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/news_banner.jpg);">
        <div class="insideBannerBg"></div>
        <div class="path wp1200 clearfloat">
            <div class="word">
                <div class="cn"><?php echo get_category($newsId)->cat_name;?></div>
                <div class="en font-baskvill"><?php echo category_description("$newsId")?></div>
            </div>
            <div class="bread">
                <a href="/">首页</a>
                >&nbsp;<a href="<?php the_permalink(94);?>"><?php echo $parent_cat->cat_name;?></a>
                >&nbsp;<a href="<?php echo home_url()."?cat=".get_category($newsId)->cat_ID;?>"><?php echo get_category($newsId)->cat_name;?></a>
            </div>
        </div>
    </div>

    <div class="dot wp1200"></div>

    <div class="newsListCon">
        <div class="wp1200">
            <ul class="newsList">
                <?php
                    $news_posts=get_posts("category=$newsId&order=asc&orderby=date");
                    foreach ($news_posts as $news_key=>$news_post):?>
                        <li class="even por clearfloat <?php echo "li".$news_key;?>">
                            <a class="text por" href="<?php echo $news_post->guid;?>">
                                <div class="textB">
                                    <h5><?php echo $news_post->post_title;?></h5>
                                    <div class="p"><?php echo $news_post->post_excerpt;?></div>
                                    <i></i>
                                    <span class="time"><?php echo the_time("Y-m-n");?></span>
                                </div>
                                <div class="colorline"></div>
                            </a>
                            <div class="imgA">
                                <a class="img" href="<?php echo $news_post->guid;?>">
	                                <?php
	                                // 获取特色图像的地址
	                                $post_ID=$news_post->ID;
	                                $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
	                                $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                                echo '<img border="0" width="100%" alt="' . $news_post->post_title. '" src="' . $post_thumbnail_src[0] . '" /> ';
	                                ?>
                                </a>
                            </div>
                            <div class="shadow"></div>
                        </li>
                        <?php endforeach;?>
                <script>
                    $(function(){
                        for(var i = 0; i < 99; i++){
                            if(i%2==0){
                                $('.li'+i).removeClass('even');
                                $('.li'+i).addClass('odd');
                            }
                        }
                    })
                </script>
            </ul>
            <div class="paged">
                <a><span class="current disabled">上一页</span></a>
                <span class="current disabled">1</span>
                <a title="2" href="#">2</a>
                <a title="3" href="#">3</a>
                <a title="4" href="#">4</a>
                <a class="p1" title="下一页" href="#">下一页</a>
            </div>
        </div>
    </div>

<?php get_footer(); ?>