<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/23
 * Time: 12:43
 *
 *
 *
 * Template Name:门店查询
 */


get_header();
$id = get_the_ID();
$cat=get_category(12);
?>


<div class="header-one">
		<span><?php echo $cat->cat_name;?></span>
    <div class="back">
        <a href="javascript:void(0)" onclick="javascript:window.history.go(-1);"> <i></i> </a>
    </div>
    <div class="nav-home">
        <a href="/wap"> <span></span> </a>
    </div>

    <div class="nav-btn">
        <a href="javascript:void(0)"> <span></span> </a>
    </div>
</div>
<!--门店查询-->
<form method="post" action="" onsubmit="return check()">
    <input type="hidden" name="lng" value="cn"/>
    <input type="hidden" name="tid" value="37"/>
    <input type="hidden" name="mid" value="15"/>
    <div class="service-title">
        <h1>门店查询</h1>
    </div>
    <ul class="service-select">
        <li>
            <select id="s1" name='prov' class=" customSelect "></select> <span></span>
        </li>
        <li>
            <select id="s2" name='city' class=" customSelect "></select> <span></span>
        </li>
    </ul>
    <div class="service-btn">
        <button type="submit" name="submit" id="mapSearchSubmit">查询</button>
    </div>
</form>



<!--咨询司米-->
<div class="service-consult">
    <div>
        <?php echo get_post($id)->post_content;?>
    </div>
</div>
<ul class="service-contact">
    <li><a href="<?php echo get_post(100)->guid; ?>">
            <div class="img">
                <?php
                // 获取特色图像的地址
                $post_ID = 100;
                $post_thumbnail_id = get_post_thumbnail_id($post_ID);
                $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id, 'Full');
                ?>
                <div style="background-image: url(<?php echo $post_thumbnail_src[0]; ?>);">&nbsp;</div>
            </div>
            <div class="title">
                <h1><?php echo get_post(100)->post_title; ?></h1>
                <div class="p"><?php echo get_post(100)->post_excerpt; ?></div>
                <div class="icon"><em>&nbsp;</em></div>
            </div>
        </a></li>
    <li><a href="<?php echo get_post(103)->guid; ?>">
            <div class="img">
                <?php
                // 获取特色图像的地址
                $post_ID = 103;
                $post_thumbnail_id = get_post_thumbnail_id($post_ID);
                $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id, 'Full');
                ?>
                <div style="background-image: url(<?php echo $post_thumbnail_src[0]; ?>);">&nbsp;</div>
            </div>
            <div class="title">
                <h1><?php echo get_post(103)->post_title; ?></h1>
                <div class="p"><?php echo get_post(103)->post_excerpt; ?></div>
                <div class="icon"><em>&nbsp;</em></div>
            </div>
        </a></li>
</ul>


<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/static/js/city.js"></script>
<script>
    function check() {
        var province = $('#s1').find(':selected').text();
        if (province == '省份') {
            alert('请选择省份');
            return false;
        }
    }
    $(function () {
        new PCAS("prov", "city", "county", "省份", "地级市", "市、县级市、县");
    })
</script>


<?php get_footer(); ?>
