<?php
get_header("world");
global $wp_query;
$catId = get_query_var('cat');
?>
<!--banner-->

<div class="special-banner" style="background-image:url(<?php echo get_stylesheet_directory_uri();?>/static/upload/special/special_banner_<?php echo $catId ?>.jpg)">
	<div class="special-wp">
		<div class="p">
		</div>
	</div>
</div>


<!--导航-->
<div class="special-nav">
	<div class="special-wp clearfloat">
		<h1 class="logo">
			<a href="/wap"> <img src="<?php echo get_stylesheet_directory_uri();?>/static/images/special/logo.jpg" alt=""></a>
		</h1>
		<ul class="special-nav-ul clearfloat">
            <?php
                $special_cats=get_categories("child_of=$catId");
                foreach ($special_cats as $special_cat): ?>
                    <li class="active">
                        <a href="javascript:;">
                            <span><?php echo $special_cat->cat_name;?></span>
                            <i></i>
                        </a>
                    </li>
            <?php endforeach;?>
			<li class="icon"></li>
		</ul>
		<div class="home">
			<a href="/wap">
				<img src="<?php echo get_stylesheet_directory_uri();?>/static/images/special/icon-1.png" alt="">
			</a>
		</div>
	</div>
</div>






<?php
$special_detail_cats=get_categories("child_of=$catId");
?>




<!--达人厨师-->
<div class="sp-cook" id="sp-cook">
	<h1 class="title"><?php echo $special_detail_cats[0]->cat_name;?></h1>
	<div class="sp-cook-box">
		<div class="special-wp">
			<div class="sp-cook-one">
                <?php
                    $ID1=$special_detail_cats[0]->cat_ID;
                    $spost1s=get_posts("category=$ID1&order=asc;");
                    $spost1=$spost1s[0];
                ?>
				<div title="<?php echo $spost1->post_title;?>" class="nr">
					<h1><?php echo $spost1->post_title;?></h1>
					<div class="p"><?php echo $spost1->post_content;?></div>
					<i></i>
				</div>
				<div class="img">
					<?php
					// 获取特色图像的地址
					$post_ID=$spost1->ID;
					$post_thumbnail_id = get_post_thumbnail_id( $post_ID );
					$post_thumbnail_src1 = wp_get_attachment_image_src($post_thumbnail_id,'Full');
					?>
					<div style="background-image: url(<?php echo $post_thumbnail_src1[0]?>)"></div>
				</div>
			</div>
		</div>
		<div class="special-wp-1140">
			<ul class="sp-cook-two clearfloat">
				<?php
                    $ID2=$special_detail_cats[0]->cat_ID;
                    $spost2s=get_posts("category=$ID2&order=asc;");
                   foreach ($spost2s as $spost_2_key=>$spost2):
                       if ($spost_2_key==0) continue;
                       if($spost_2_key>4) break;
				?>
				<li>
					<div class="top">
						<?php
                            // 获取特色图像的地址
                            $post_ID=$spost2->ID;
                            $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                            $post_thumbnail_src2 = wp_get_attachment_image_src($post_thumbnail_id,'Full');
						?>
                        <div style="background-image: url(<?php echo $post_thumbnail_src2[0]?>)"></div>
					</div>
					<div title="<?php echo $spost2->post_title;?>" class="bottom">
						<h1><?php echo $spost2->post_title;?></h1>
						<div class="p">
							<?php echo $spost2->post_content;?>
                        </div>
					</div>
				</li>
                <?php endforeach;?>
			</ul>
		</div>
	</div>
</div>
<!--做法详解-->
<div class="sp-practice">
	<h1 class="title"><?php echo $special_detail_cats[1]->cat_name;?></h1>
	<div class="special-wp-1150">
		<ul class="sp-practice-list clearfloat">
            <?php
                $ID3=$special_detail_cats[1]->cat_ID;
                $spost3s=get_posts("category=$ID3");
                foreach ($spost3s as $spost_3_key=>$spost3):
                    if($spost_3_key%2==0): ?>
                        <li>
                            <div>
                                <div class="nr">
                                    <h1><?php echo $spost3->post_title;?></h1>
                                    <div class="p">
	                                    <?php echo $spost3->post_content;?></div>
                                </div>
	                            <?php
	                            // 获取特色图像的地址
	                            $post_ID=$spost3->ID;
	                            $post_thumbnail_id = get_post_thumbnail_id($post_ID);
	                            $post_thumbnail_src3 = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                            ?>
                                <div class="img" style="background-image: url(<?php echo $post_thumbnail_src3[0]?>)"></div>
                            </div>
                        </li>
                <?php else:?>
                        <li>
                            <div>
	                            <?php
	                            // 获取特色图像的地址
	                            $post_ID=$spost3->ID;
	                            $post_thumbnail_id = get_post_thumbnail_id($post_ID);
	                            $post_thumbnail_src2 = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                            ?>
                                <div class="img" style="background-image: url(<?php echo $post_thumbnail_src2[0]?>)"></div>
                                <div class="nr">
                                    <h1><?php echo $spost3->post_title;?></h1>
                                    <div class="p">
					                    <?php echo $spost3->post_content;?>   </div>
                                </div>
                            </div>
                        </li>
                <?php endif;?>
                <?php endforeach;?>
		</ul>
	</div>
</div>
<!--窍门贴士-->
<div class="sp-cook sp-tips">
	<h1 class="title"><?php echo $special_detail_cats[2]->cat_name;?></h1>
	<div class="special-wp">


		<?php
		$ID4=$special_detail_cats[2]->cat_ID;
		$spost4s=get_posts("category=$ID4");
		foreach ($spost4s as $spost_4_key=>$spost4):?>
            <div class="sp-cook-one">
                <div title="<?php echo $spost4->post_title;?>" class="nr">
                    <h1><?php echo $spost4->post_title;?></h1>
                    <div class="p"><?php echo $spost4->post_content;?></div>
                    <i></i>
                </div>
                <div class="img">
	                <?php
	                // 获取特色图像的地址
	                $post_ID=$spost4->ID;
	                $post_thumbnail_id = get_post_thumbnail_id($post_ID);
	                $post_thumbnail_src4 = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                ?>
                    <div style="background-image: url(<?php echo $post_thumbnail_src4[0]?>)"></div>
                </div>
            </div>
		<?php endforeach;?>
	</div>
</div>
<!--法国真情-->
<div class="sp-truth">
	<h1 class="title"><?php echo $special_detail_cats[3]->cat_name;?></h1>
	<div class="special-wp">
		<div class="carousel swiper-container">
			<div class="swiper-wrapper">

                <?php
                $ID5=$special_detail_cats[3]->cat_ID;
                $spost5s=get_posts("category=$ID5");
                $postid5=$spost5s[0]->ID;
				$img_shortcode = get_post_meta($postid5, "gallery" );
				do_shortcode( $img_shortcode[0] ,true);
				global $gallery;
				?>
                <?php if (!empty($gallery)):?>
                    <?php foreach($gallery as $img){ ?>
                        <div class="swiper-slide" style="background-image: url(<?php echo $img->url;?>)"></div>
                    <?php } ?><!--end foreach-->
                <?php endif;?>
			</div>
		</div>
		<div class="btn">
			<a href="javascript:;" class="prev"></a>
			<a href="javascript:;" class="next"></a>
		</div>
	</div>
	<script>
        $(function(){
            var mySwiper = new Swiper('.sp-truth .swiper-container', {
                autoplay: 3000,
                resistanceRatio:0
            })
            $('.sp-truth .prev').click(function(){
                mySwiper.slidePrev();
                mySwiper.startAutoplay();
            })
            $('.sp-truth .next').click(function(){
                mySwiper.slideNext();
                mySwiper.startAutoplay();
            })
        })
	</script>
</div>

<?php
get_footer("world");
?>
