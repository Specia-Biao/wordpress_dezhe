<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 14:12
 */

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
    <div class="talent-details-title">
        <h1><?php the_title();?></h1>
        <div class="icon">
            <span class="pople"><?php echo get_post_meta("$id","recruitment",true);?></span>
            <span class="add"><?php echo get_post_meta("$id","area",true);?></span>
            <span class="time"><?php the_time("Y-m-n");?></span>
        </div>
    </div>
    <div class="talent-details-nr">
        <div class="p">
           <?php echo get_post($id)->post_content;?>
        </div>
        <div class="btn">
            <a href="mailto:<?php echo get_post_meta("$id","email",true);?>">
                申请职位
            </a>
        </div>
    </div>
<?php
	get_footer();
?>