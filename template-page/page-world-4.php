<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 15:05
 *
 * Template Name:工业4.0
 *
 */

get_header();
$id=get_the_ID();
$cat=get_category(20);
$post_thumbnail_id = get_post_thumbnail_id($id);
$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
?>


<div class="header-one">
		<span><?php echo $cat->cat_name;?></span>
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
<div class="factory-bg">
   <?php echo get_post($id)->post_content;?>
    <ul class="factory-list">
        <?php
        $industry_posts=get_posts("category=23");
        if(!empty($industry_posts)):
            foreach ($industry_posts as $industry_key=>$industry_post):?>
                <li>
                    <a href="javascript:;">
                        <?php
                        // 获取特色图像的地址
                        $post_ID=$industry_post->ID;
                        $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                        $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
                        ?>
                        <div class="img" style="background-image: url(<?php echo $post_thumbnail_src[0];?>)"></div>
                        <div class="nr">
                            <div class="p"><?php echo $industry_post->post_title;?></div>
                            <div class="icon"><span></span></div>
                        </div>
                    </a>
                </li>
            <?php endforeach;endif;?>
    </ul>
</div>
<script>
    $(function() {
        var mobileScroll1;
        function func(e) {
            e.preventDefault();
        }
    })
</script>


<?php
	get_footer();
?>

