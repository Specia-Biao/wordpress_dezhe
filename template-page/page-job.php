<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 13:32
 *
 *Template Name:人才招聘
 */

get_header();

$id=get_the_ID();

$cat=get_category(18);
$parent_cat=get_category($cat->parent);




$job_posts=get_posts("category=19&order=asc");

$sum=count($job_posts);
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
<div class="product-carousel-box-2">
    <div class="news-flash-list-banner talent-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/job_banner.jpg)">

        <div class="y">
            <h1></h1>
            <h2></h2>
        </div>
    </div>
</div>
<form method="post" action="">
    <input type="hidden" name="lng" value="cn"/>
    <input type="hidden" name="tid" value="24"/>
    <input type="hidden" name="mid" value="4"/>

    <ul class="service-select query-select talent-select">
        <li>
            <select name="area" id="province" class="customSelect" style="border:none;">
                <option value="">选择地区</option>
                <option value="常州市">常州市</option>
            </select>
            <span style="border:none;background-color: #f5f5f5;"></span>
        </li>
        <li>
            <select name="cat" id="city" class="customSelect" style="border:none;">
                <option value=" ">职业分类</option>
                <option value="营销类">营销类</option>
                <option value="技术类">技术类</option>
                <option value="设计类">设计类</option>
            </select>
            <span style="border:none;background-color: #f5f5f5;"></span>
        </li>
    </ul>
    <div class="search-box-show">
        <div class="search-box">
            <input type="text" id="keyword" name="keyword" value="" placeholder="输入关键字" >
            <button  type="submit" name="submit" value="">搜索</button>
        </div>
    </div>
</form>


<!--地点-->
<ul class="query-list talent-list">
    <?php
    $job_posts=get_posts("category=19&order=asc");
    foreach ($job_posts as $job_post):?>
        <li>
            <a href="<?php echo $job_post->guid;?>">
                <div class="top">
                    <div class="title"><?php echo get_post_meta("$job_post->ID","pos",true);?></div>
                    <div class="icon">
                        <span>申请</span>
                        <span>application</span>
                    </div>
                </div>
                <div class="bottom">
                    <span class="add"><?php echo get_post_meta("$job_post->ID","area",true);?></span>
                    <span class="time"><?php $arr = explode(" ",$job_post->post_date);echo (!empty($arr[0]))?$arr[0]:"";?></span>
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



<?php   get_footer(); ?>
