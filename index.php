<?php
    get_header("index");
?>

<!--手机-->

    <div class="banner">
        <div class="swiper-container swiper-container-horizontal swiper-container-android">
            <div class="swiper-wrapper" style="transform: translate3d(-360px, 0px, 0px); transition-duration: 0ms;">
				<?php
				$img_shortcode = get_post_meta( 60, "gallery");
				do_shortcode( $img_shortcode[0] ,true);
				global $gallery;
				?>
				<?php foreach($gallery as $img){ ?>
                    <div class="swiper-slide" style="background-image: url(<?php echo $img->url;?>);" data-swiper-slide-index="<?php echo $key;?>">
                        <a href="javascript:void(0);"></a>
                    </div>
				<?php } ?><!--end foreach-->
            </div>
            <div class="swiper-pagination swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
        </div>
    </div>
    <script>
        $(function() {
            var mySwiper = new Swiper('.wap .swiper-container', {
                //			autoplay: 5000,//可选选项，自动滑动
                resistanceRatio: 0,
                pagination: '.banner .swiper-pagination',
                loop: true
            })
        })
    </script>
    <ul class="nav">
	    <?php
	    $smallmenus=theme_nav_menu("smallmenu");
	    foreach ($smallmenus as $samllMenuKey=>$smallmenu): ?>
            <li>
                <a href="<?php echo $smallmenu->nav_url;?>">
                    <div class="img">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/static/images/<?php echo "index_small_menu".$samllMenuKey.".png"?>" alt="">
                    </div>
                    <div class="title"><?php echo $smallmenu->navname;?></div>
                </a>
            </li>
	    <?php  $samllMenuKey++; endforeach;?>
    </ul>
    <div class="index-title">
	    <?php
            $product=get_category(2);
            $productId=$product->cat_ID;
            $product_cat_lists=get_categories("child_of=$productId");?>
        <div class="left">
            <h1><?php echo $product->cat_name;?></h1>
            <h2><?php echo  $product->slug; ?></h2>
            <i></i>
        </div>
        <div class="right">
            <a href="javascript:void(0);">
                <span>MORE</span>
            </a>
        </div>
    </div>
    <ul class="index-produits-nav clearfloat">
	    <?php
            $product=get_category(2);
            $productId=$product->cat_ID;
            $product_cat_lists=get_categories("child_of=$productId");?>
                <?php  if(!empty($product_cat_lists)):
                    foreach ($product_cat_lists as $product_key=>$product_cat): ?>
                        <li class="<?php echo ($product_key==0)?"active":"";?>"><?php echo $product_cat->cat_name;?></li>
                    <?php endforeach; ?>
                <?php endif;?>
    </ul>
    <div class="index-produits-box">
	    <?php
	    $product=get_category(2);
	    $product_cats=get_categories("child_of=$productId");
	    foreach ($product_cats as $product_cat) : ?>
        <ul>
	        <?php
	        $product_posts=get_posts("category=$product_cat->cat_ID");
	        foreach ($product_posts as $productKey=>$product_post):
		        $postid=$product_post->ID;
	            if($productKey>3) break;
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

    <div class="index-title">
	    <?php
	    $newsCat=get_category("8");
	    ?>
        <div class="left">
            <h1><?php echo $newsCat->cat_name;?></h1>
            <h2><?php echo category_description("8");?></h2>
            <i></i>
        </div>
        <div class="right">
            <a href="<?php echo home_url()."?cat=".$newsCat->cat_ID;?>">
                <span>MORE</span>
            </a>
        </div>
    </div>


    <ul class="index-news">
        <?php
            $news_posts=get_posts("category=10");
            foreach ($news_posts as $news_post): ?>
                <li>
                    <a href="<?php echo $news_post->guid;?>">
                        <div class="img">
	                        <?php
	                        // 获取特色图像的地址
	                        $post_ID=$postid;
	                        $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
	                        $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                        ?>
                            <div style="background-image: url(<?php echo $post_thumbnail_src[0];?>)"></div>

                        </div>
                        <div class="title">
                            <h1><?php echo $news_post->post_title;?></h1>
                            <div class="time"><?php echo $news_post->date;?></div>
                        </div>
                    </a>
                </li>
        <?php endforeach;?>
    </ul>



<!--手机-->

<?php
    get_footer();
?>