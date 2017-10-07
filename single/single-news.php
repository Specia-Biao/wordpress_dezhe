<?php


/*
 *
 *新闻文章
 *
 *
 * */
get_header();


$id=get_the_ID();
$cats=get_the_category($id);
$catId=null;

foreach ($cats as $cat){
    if($cat->parent!=0){
	    $catId=$cat->cat_ID;
    }
}
$cat=get_category($catId);
$parent_cat=(get_category($cat->parent));

?>

    <div class="insideBanner por" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/news_banner.jpg);">
        <div class="insideBannerBg"></div>
        <div class="path wp1200 clearfloat">
            <div class="word">
                <div class="cn"><?php echo $cat->cat_name;?></div>
                <div class="en font-baskvill"><?php echo category_description("$catId");?></div>
            </div>
            <div class="bread">
                <a href="/">首页</a>
                >&nbsp;<a href="<?php the_permalink(94);?>"><?php echo $parent_cat->cat_name;?></a>
                >&nbsp;<a href="<?php echo home_url()."?cat=".$catId;?>"><?php echo $cat->cat_name;?></a>
            </div>
        </div>
    </div>

    <div class="dot wp1000"></div>

    <div class="newsCon wp1000">
        <div class="newsConTit wp860">
            <h3><?php the_title();?></h3>
            <div class="time">
                来源：<?php echo $cat->cat_name;?> &nbsp;&nbsp;<i></i>&nbsp;&nbsp; <span><?php the_time("Y-m-n");?></span>
            </div>
        </div>
        <div class="content wp860">
            <?php
                $content = get_post($id)->post_content;
                echo $content;//输出文章的内容
            ?>
        </div>
        <div class="plist wp860 clearfloat">
            <ul class="clearfloat">

	            <?php
	            $categories = get_the_category();
	            $categoryIDS = array();
	            foreach ($categories as $category) {
		            array_push($categoryIDS, $category->term_id);
	            }
	            $categoryIDS = implode(",", $categoryIDS);
	            ?>
                <li class="prev">
	                <?php if (get_previous_post($categoryIDS)) { previous_post_link('%link','%title',true);} else { echo "<a>没有上一篇</a>";} ?>
                </li>
                <li class="next">
	                <?php if (get_next_post($categoryIDS)) { next_post_link('%link','%title',true);} else { echo "<a>没有下一篇</a>";} ?>
                </li>
            </ul>
        </div>
    </div>
<?php get_footer();
?>