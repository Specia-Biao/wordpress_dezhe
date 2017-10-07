<?php

/*
 * 产品分类
*/

get_header();

    global $wp_query;
    $catId = get_query_var('cat'); ?>


<!--手机-->
    <div class="header-one">
        <span><?php echo get_category("2")->cat_name; ?></span>
        <div class="back">
            <a href="javascript:void(0)" onclick="javascript:window.history.go(-1);"><i></i></a>
        </div>
        <div class="nav-home">
            <a href="/">
                <span></span>
            </a>
        </div>

        <div class="nav-btn">
            <a href="javascript:void(0)">
                <span></span>
            </a>
        </div>
    </div>
    <div class="bg-1"></div>
    <div class="product-carousel-box">
		<?php
		$product_cats=get_categories("child_of=2");
		foreach ($product_cats as $pro_img_key=>$product_cat):?>
            <div class="product-carousel" style="visibility: <?php echo ($catId==$product_cat->cat_ID)?"visible":"";?>">
                <div class="swiper-container swiper-container0 swiper-container-horizontal swiper-container-android">
                    <div class="swiper-wrapper" style="transform: translate3d(-1440px, 0px, 0px); transition-duration: 0ms;">
						<?php
                            $product_posts=get_posts("category=$product_cat->cat_ID&order=asc");
                            foreach ($product_posts as $product_post_key=>$product_post):
                                if($product_post_key>4) break;
                                ?>
                                <?php
                                // 获取特色图像的地址
                                $post_ID=$product_post->ID;
                                $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                                $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
							?>
                            <div class="swiper-slide" style="background-image: url(<?php echo $post_thumbnail_src[0];?>); width: 360px;" data-swiper-slide-index="<?php echo $product_post_key;?>">
                                <a href="">
                                    <h1><?php echo $product_post->post_title;?></h1>
                                    <h2></h2>
                                    <div>MORE &gt;</div>
                                </a>
                            </div>
						<?php endforeach;?>
                    </div>
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
                </div>
            </div>
		<?php endforeach;?>
    </div>
    <script>
        $(function() {
            var seriesSwiperBox = $(".product-carousel"),
                seriesSwiperEle = []
            for (var i = 0; i < seriesSwiperBox.length; i++) {
                seriesSwiperEle[i] = new Swiper('.swiper-container' + i, {
                    simulateTouch: false,
                    pagination: '.swiper-container' + i + ' .swiper-pagination',
                    paginationClickable: true,
                    autoplayDisableOnInteraction: true,
                    loop: true,
                    prevButton: '.swiper-container' + i + ' .swiper-button-prev',
                    nextButton: '.pro-swiper' + i + ' .swiper-button-next',
                    autoplay: 3000
                });
            }
        })
    </script>
    <ul class="index-produits-nav clearfloat">
		<?php
		$product=get_category(2);
		$productId=$product->cat_ID;
		$product_cat_lists=get_categories("child_of=$productId");?>
		<?php  if(!empty($product_cat_lists)):
			foreach ($product_cat_lists as $product_key=>$product_cat): ?>
                <li class="<?php echo ($product_cat==$catId)?"active":"";?>"><?php echo $product_cat->cat_name;?></li>
			<?php endforeach; ?>
		<?php endif;?>
    </ul>
    <div class="index-produits-box">
		<?php
		$product=get_category(2);
		$product_cats=get_categories("child_of=$productId");
		foreach ($product_cats as $product_cat) : ?>
            <ul style="display:<?php echo (($product_cat->cat_ID)==$catId)?"block":"none";?>">
				<?php
				$product_posts=get_posts("category=$product_cat->cat_ID");
				foreach ($product_posts as $productKey=>$product_post):
					$postid=$product_post->ID;
					?>
                    <li>
                        <a href="<?php echo $product_post->guid;?>">
                            <div class="img">
								<?php
								// 获取特色图像的地址
								$post_ID=$postid;
								$post_thumbnail_id = get_post_thumbnail_id( $post_ID );
								$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
								?>
                                <div style="background-image: url(<?php echo $post_thumbnail_src[0]; ?>)"></div>
                            </div>
                            <div class="title">
                                <div class="nr">
                                    <h4><?php echo $product_post->post_title;?></h4>
                                    <h5><?php echo get_post_meta("$product_post->ID","en",true);?></h5>
                                </div>
                                <div class="icon">
                                </div>
                            </div>
                        </a>
                    </li>
				<?php endforeach;?>
            </ul>
		<?php endforeach;?>
    </div>
    <ul class="paging">
        <li><a href="javascript:void(0);">上一页</a></li>
        <li><a href="javascript:void(0);">下一页</a></li>
    </ul>
    <!--手机-->

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/static/js/proBanner.js"></script>
<?php get_footer(); ?>