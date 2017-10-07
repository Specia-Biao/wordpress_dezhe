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
