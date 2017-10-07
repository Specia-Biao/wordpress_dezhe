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
$id=get_the_ID(); ?>

<div class="map-index-con">
	<div class="map-index-intro">
        <?php echo get_post($id)->post_content;?>
    </div>
	<div class="map-index-big-map map-box">
        <?php
            $map_cats=get_categories("child_of=13");
            foreach ($map_cats as $map_cat):?>
                <a href="<?php echo home_url()."?cat=".$map_cat->cat_ID;?>" class="<?php echo $map_cat->slug;?>" title="<?php echo $map_cat->cat_name;?>"></a>
        <?php endforeach;?>
	</div>
	<div class="map-index-title wp1100 clearfloat">
		<div class="map-index-title-word">
			<div class="cn"><?php echo the_title();?></div>
			<div class="en font-baskvill"><?php echo the_excerpt();?></div>
		</div>
		<div class="map-index-select">
			<form method="post" action="<?php bloginfo("home"); ?>" onsubmit="return check()">
				<div class="map-select-box">
					<div class="map-select-wp">
						<select name="prov" name="meta_key" id="meta_key" value="prova" id="s1" ></select>
					</div>
					<div class="map-select-wp">
						<select name="city" name="meta_key" id="meta_key" value="city" id="s2" ></select>
					</div>
					<div class="map-input-wp">
						<input type="text" name="s" id="s" name="keyword" value="" placeholder="输入关键字" id="mapSearchText">
						<div class="map-input-submit iconfont">
							<input type="submit" name="submit" value="" id="mapSearchSubmit">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="map-index-list clearfloat">
		<div class="map-index-list-box">
			<div class="map-index-list-word">
				<div class="map-index-list-title">
                    <a href="<?php echo get_post(105)->guid;?>"><?php echo get_post(105)->post_title;?></a></div>
                    <div class="map-index-list-p">
                        <?php echo get_post(105)->post_content;?>
                    </div>
			</div>
		</div>
		<div class="map-index-list-box">
            <a class="map-index-list-link" href="<?php echo get_post(100)->guid;?>">
				<div class="img">
					<?php
                        // 获取特色图像的地址
                        $post_ID=100;
                        $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
                        $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
					?>
                    <img src="<?php echo $post_thumbnail_src[0];?>" alt="" />
                </div>
				<div class="map-link-info">
					<div class="map-link-title"><?php echo get_post(100)->post_title;?></div>
					<div class="map-link-p"><?php echo get_post(100)->post_excerpt;?></div>
				</div>
			</a>
        </div>

		<div class="map-index-list-box">
            <a class="map-index-list-link" href="<?php echo get_post(103)->guid;?>">
				<div class="img">
					<?php
					// 获取特色图像的地址
					$post_ID1=103;
					$post_thumbnail_id = get_post_thumbnail_id( $post_ID1 );
					$post_thumbnail_src1 = wp_get_attachment_image_src($post_thumbnail_id,'Full');
					?>
                    <img src="<?php echo $post_thumbnail_src1[0];?>" alt="" />

                </div>
				<div class="map-link-info">
					<div class="map-link-title"><?php echo get_post(103)->post_title;?></div>
					<div class="map-link-p"><?php echo get_post(103)->post_excerpt;?></div>
				</div>
			</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/zt/city.js"></script>
<script>
    function check() {
        var province = $('#s1').find(':selected').text();
        if(province=='省份'){
            alert('请选择省份');
            return false;
        }
    }




    $(function(){
        new PCAS("prov", "city", "county", "省份", "地级市", "市、县级市、县");
    })
</script>















<?php get_footer();?>
