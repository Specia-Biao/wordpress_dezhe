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
<div class="d-bg">
    <div class="index-produits-box product-details-title">
        <ul>
            <li>
                <a href="javascript:void(0);">
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
    <?php echo get_post($id)->post_content; ?>

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
                <?php
                    $posts=get_posts("category=$cat_ID");
                    if (empty($post)): ?>
                <?php foreach ($posts as $post):?>
                            <li class="swiper-slide">
                                <a href="<?php echo $post->guid;?>">
                                    <?php
                                    // 获取特色图像的地址
                                    $post_ID=$join_post->ID;
                                    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                                    $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
                                    ?>
                                    <div class="img" style="background-image: url(<?php echo $post_thumbnail_src[0];?>)"></div>
                                    <div class="title">
                                       <?php echo $post->post_title;?>
                                    </div>
                                </a>
                            </li>
                <?php endforeach;endif;?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>
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





