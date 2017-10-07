<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/6
 * Time: 11:15
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
<!--轮播-->
<div class="product-carousel-box">
    <div class="product-carousel product-details-carousel">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                    $img_shortcode = get_post_meta($id, "gallery" );
                    do_shortcode( $img_shortcode[0] ,true);
                    global $gallery;
                    ?>
                    <?php if(!empty($gallery)):?>
                        <?php foreach($gallery as $img){ ?>
                            <div class="swiper-slide" style="background-image: url(<?php echo $img->url;?>)">
                                <a href=""></a>
                            </div>
                        <?php } ?><!--end foreach-->
                <?php endif;?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<script>
    $(function() {
        var mySwiper = new Swiper('.product-carousel .swiper-container', {
            autoplay: 5000, //可选选项，自动滑动
            resistanceRatio: 0,
            pagination: '.product-carousel .swiper-pagination',
            loop: true
        })
    })
</script>
<div class="d-bg">
    <div class="index-produits-box product-details-title">
        <ul>
            <li>
                <a href="javascirpt:;">
                    <div class="title">
                        <div class="nr">
                            <h4><?php the_title();?></h4>
                            <h5><?php echo get_post_meta("$id","en",true); ?></h5>
                        </div>
                        <div class="icon"></div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="details">
            <div class="icon">
                <i></i>
            </div>
            <div class="p">
                <?php the_excerpt();?>
            </div>
        </div>
    </div>
    <!--产品介绍-->
    <?php
        echo get_post($id)->post_content;
    ?>





    <!--相关产品-->
    <div class="product-details-nr-title title-swiper-slide">
        相关产品
        <div class="title">
            <a href="javascript:;" class="prev"></a>
            <a href="javascript:;" class="next"></a>
        </div>
    </div>
    <div class="product-details-relevant-box">
        <div class="swiper-container" id="product-details-relevant">
            <ul class="product-details-relevant swiper-wrapper">
                <li class="swiper-slide">
                    <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=921">
                        <div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2017/06/20170613153131_728.jpg)">
                        </div>
                        <div class="title">
                            卡德						</div>
                    </a>
                </li>
                <li class="swiper-slide">
                    <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=562">
                        <div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2016/12/20161214174115_915.jpg)">
                        </div>
                        <div class="title">
                            诺昂庄园						</div>
                    </a>
                </li>
                <li class="swiper-slide">
                    <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=65">
                        <div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2016/11/20161125104417_415.jpg)">
                        </div>
                        <div class="title">
                            蒙特伯罗						</div>
                    </a>
                </li>
                <li class="swiper-slide">
                    <a href="http://www.ssk.com.cn/wap/index.php?ac=article&at=read&did=63">
                        <div class="img" style="background-image: url(http://www.ssk.com.cn/upfile/2016/11/20161124182238_569.jpg)">
                        </div>
                        <div class="title">
                            魅影						</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    $(function() {
        var mySwiperD = new Swiper('#product-details-relevant', {
            slidesPerView: 2,
            spaceBetween: 15,
            resistanceRatio: 0
        })
        $(".title-swiper-slide .next").click(function() {
            mySwiperD.slideNext();
        })
        $(".title-swiper-slide .prev").click(function() {
            mySwiperD.slidePrev();
        })
    })
</script>










<div class="proInfoCon">
    <div class="wp1200">
        <div class="proInfo-bread">
            <a href="/">首页</a>
            >&nbsp;<a href="<?php the_permalink(11);?>"><?php echo $parent_cat->cat_name;?></a>
            >&nbsp;<a href="<?php echo home_url()."?cat=".$cat->cat_ID;?>"><?php echo $cat->cat_name;?></a>
            >&nbsp;<?php the_title();?>

        </div>
        <div class="proInfo-introCon clearfloat">
            <div class="proInfo-slide" id="proInfoSlide">
                <div class="sp-slides">

	                <?php
                        $img_shortcode = get_post_meta($id, "gallery" );
                        do_shortcode( $img_shortcode[0] ,true);
                        global $gallery;
	                ?>
	                <?php if(!empty($gallery)):?>
                        <?php foreach($gallery as $img){ ?>
                            <div class="sp-slide">
                                <div class="img"><img src="<?php echo $img->url;?>" alt=""></div>
                            </div>
                        <?php } ?><!--end foreach-->
	                <?php endif;?>
                </div>
                <div class="sp-thumbnails">
	                <?php
	                $img_shortcode = get_post_meta($id, "gallery" );
	                do_shortcode( $img_shortcode[0] ,true);
	                global $gallery;
	                ?>
                    <?php if(!empty($gallery)):?>
                        <?php foreach($gallery as $img){ ?>
                            <div class="sp-thumbnail"><div class="sp-thumbnail-mask"></div><img src="<?php echo $img->url;?>"/></div>
                        <?php } ?><!--end foreach-->
                    <?php endif;?>
                </div>
            </div>
            <script>
                $(function(){
                    $('#proInfoSlide').sliderPro({
                        width: 800,
                        height: 492,
                        fade: true,
                        buttons: false,
                        autoplay: true,
                        thumbnailWidth: 126,
                        thumbnailHeight: 75,
                        thumbnailsMargin: 0,
                        thumbnailArrows: false,
                        touchSwipe: false,
                        arrows: true
                    });
                })
            </script>
            <div class="proInfo-introBox">
                <div class="proInfo-introBox-title">
                    <div class="cn"><?php the_title();?></div>
                    <div class="en"><?php echo get_post_meta("$id","en",true);?></div>
                </div>
                <div class="proInfo-scrollbar" id="proInfoScrollbar">
                    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                    <div class="viewport">
                        <div class="overview">
                           <?php the_excerpt();?>
                        </div>
                    </div>
                </div>
                <script>
                    $(function(){
                        $('#proInfoScrollbar').tinyscrollbar();
                    })
                </script>
            </div>
        </div>
    </div>
</div>

<div class="proInfoMain">
    <div class="wp1200 clearfloat">
        <div class="proInfoMain-left">
            <div class="proInfoMain-title">产品介绍</div>
            <article class="proInfoMain-article">
               <?php
                echo get_post($id)->post_content;
               ?>
            </article>
        </div>
        <div class="proInfoMain-right">
            <div class="proInfoMain-title">相关产品</div>
            <ul class="proInfo-relation">

                <?php
                     $pro_posts=get_posts("category=$catId&order=asc");
                    foreach ($pro_posts as $pro_key=>$pro_post):
                    if(($pro_post->ID)==$id) continue;
                    if($pro_key>4) break;
                    ?>
                        <li>
                            <a href="<?php echo $pro_post->guid;?>">
	                            <?php
                                    // 获取特色图像的地址
                                    $post_ID=$pro_post->ID;
                                    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                                    $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
	                            ?>
                                <img src="<?php echo $post_thumbnail_src[0]?>" alt="<?php echo $pro_post->post_title;?>">
                                <p><?php echo $pro_post->post_title;?></p>
                            </a>
                        </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>







<?php


            get_footer();


?>
