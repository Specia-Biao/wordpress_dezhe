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
    <div class="news-flash-details-title">
        <div class="title">
            <?php the_title();?>	</div>
        <div class="icon">
            <span class="time"><?php the_time("Y-m-n");?></span>
            <span class="number">作者：<?php echo the_author();?></span>
        </div>
    </div>
    <div class="news-flash-details-nr clearfloat">
        <?php echo get_post($id)->post_content;?>
    </div>

    <!--下一页-->
    <ul class="paging">
        <li title=""><a href="">上一篇</a></li>
    </ul>




















<?php get_footer();
?>