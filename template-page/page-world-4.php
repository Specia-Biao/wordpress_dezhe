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
$post_thumbnail_id = get_post_thumbnail_id($id);
$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
?>
<div class="industry-main">
	<div class="industry-title wp1200">
		<p class="big"><?php echo the_excerpt();?></p>
		<p><img src="<?php echo $post_thumbnail_src[0];?>" alt="" width="411" height="57" /></p>
		<p class="en"><?php echo get_post_meta("$id","en",true); ?></p>
	</div>
	<div class="industry-intro-con wp1200 clearfloat">
		<div class="industry-video">
			<object width="496" height="321" data="http://vodcdn.video.taobao.com/player/ugc/tb_ugc_bytes_core_player_loader.swf?version=1.0.20160613&amp;vid=41617152&amp;uid=2456321367&amp;p=1&amp;t=1&amp;rid=&amp;random=6666" type="application/x-shockwave-flash">
				<param name="data" value="http://vodcdn.video.taobao.com/player/ugc/tb_ugc_bytes_core_player_loader.swf?version=1.0.20160613&amp;vid=41617152&amp;uid=2456321367&amp;p=1&amp;t=1&amp;rid=&amp;random=6666" />
				<param name="src" value="http://vodcdn.video.taobao.com/player/ugc/tb_ugc_bytes_core_player_loader.swf?version=1.0.20160613&amp;vid=41617152&amp;uid=2456321367&amp;p=1&amp;t=1&amp;rid=&amp;random=6666" />
			</object>
		</div>
		<div class="industry-video-info"><?php echo get_post($id)->post_content;?></div>
	</div>
	<div class="industry-list-con wp1200">
		<div class="line"></div>
		<ul class="industry-list">

            <?php
            $industry_posts=get_posts("category=23");
            if(!empty($industry_posts)):
                foreach ($industry_posts as $industry_key=>$industry_post):?>
                    <?php if($industry_key<9):?>
                    <li>
                        <div class="dot"></div>
                        <div class="wrapper">
                            <div class="bg"></div>
                            <div class="box clearfloat">
	                            <?php
                                    // 获取特色图像的地址
                                    $post_ID=$industry_post->ID;
                                    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                                    $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                            ?>
                                <img src="<?php echo $post_thumbnail_src[0];?>" alt="<?php echo  $industry_post->post_title;?>">
                                <div class="num font-baskvill"><?php echo "0".++$industry_key?></div>
                                <div class="info">
                                    <h5><?php echo $industry_post->post_title;?></h5>
                                    <div class="p"><?php echo $industry_post->post_content;?></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php else : ?>
                        <li>
                            <div class="dot"></div>
                            <div class="wrapper">
                                <div class="bg"></div>
                                <div class="box clearfloat">
	                                <?php
                                        // 获取特色图像的地址
                                        $post_ID=$industry_post->ID;
                                        $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                                        $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                                ?>
                                    <img src="<?php echo $post_thumbnail_src[0];?>" alt="<?php echo  $industry_post->post_title;?>">
                                    <div class="num font-baskvill"><?php ++$industry_key?></div>
                                    <div class="info">
                                        <h5><?php echo $industry_post->post_title;?></h5>
                                        <div class="p"><?php echo $industry_post->post_content;?></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endif;?>
            <?php endforeach;endif;?>
		</ul>
<!--		<script>-->
<!--            $.get('/get_post.php', {} ,function (data) {-->
<!--                var data = JSON.parse(data);-->
<!--                $('.industry-list li').click(function (e) {-->
<!--                    e.stopPropagation();-->
<!--                    var i = $(this).index();-->
<!--                    openIndustryDialog(i, data.data[i]);-->
<!--                });-->
<!--            })-->
<!--		</script>-->
	</div>
</div>






<?php
	get_footer();
?>

