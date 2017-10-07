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

$id=get_the_ID();
$cat=get_category("22");
$parent_cat=get_category($cat->parent);
?>







<div class="insideBanner por" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/china_banner.jpg);">
	<div class="insideBannerBg"></div>
	<div class="path wp1200 clearfloat">
		<div class="word">
			<div class="cn"><?php echo $cat->cat_name;?></div>
			<div class="en font-baskvill"><?php echo category_description($cat->cat_ID);?></div>
		</div>
		<div class="bread">
			<a href="/">首页</a>
			>&nbsp;<a href="<?php the_permalink(232);?>"><?php echo $parent_cat->cat_name;?></a>
			>&nbsp;<?php echo $cat->cat_name;?>
		</div>
	</div>
</div>
<div class="people-con">
	<div class="people-list-top wp1200">
		<h2><?php echo the_excerpt();?></h2>
		<div class="info">
			<?php echo get_post($id)->post_content;?>
		</div>
	</div>
	<ul class="pepople-list clearfloat">
		<?php
		$china_cats=get_categories("child_of=$cat->cat_ID");
		foreach ($china_cats as $china_cat):?>
            <?php
                if($china_cat->parent!=$cat->cat_ID) continue;?>
			<li>
				<a href="<?php echo home_url()."?cat=".$china_cat->cat_ID;?>">
					<div class="img" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/special/special_<?php echo $china_cat->cat_ID;?>.jpg)"></div>
					<div class="name"><?php echo $china_cat->cat_name;?></div>
					<div class="post"></div>
					<div class="intro"><?php echo category_description($china_cat->cat_ID);?></div>
					<div class="line"></div>
				</a>
				<div class="shadow"></div>
			</li>
		<?php endforeach;?>
	</ul>
</div>
<?php get_footer(); ?>


