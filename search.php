
<?php

/*
 * 搜索
*/
get_header();
?>

<div class="insideBanner por" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/static/upload/store_banner.png);">
	<div class="insideBannerBg"></div>
	<div class="path wp1200 clearfloat">
		<div class="word">
			<div class="cn"><?php echo get_category( $parent_id )->cat_name; ?></div>
			<div class="en font-baskvill"><?php echo category_description( $parent_id ); ?></div>
		</div>
		<div class="bread">
			<a href="/">首页</a> >&nbsp;
			<a href="<?php the_permalink( 304 ); ?>"><?php echo get_category(12)->cat_name; ?></a> >&nbsp;
			<a href="<?php the_permalink( 304 ); ?>"><?php echo get_category(13)->cat_name; ?></a>
		</div>
	</div>
</div>

<div class="map-info-con">
	<div class="map-intro">
		<div class="wp1100 clearfloat">
			<div class="map-intro-word">
				<div class="cn">中国销售渠道-<?php echo get_category( $catId )->cat_name; ?></div>
				<div class="en font-baskvill"></div>
				<div class="p"><?php echo category_description( $catId ); ?></div>
				<div class="line"></div>
			</div>
			<div class="map-intro-area map-box" id="map">
				<?php
				$map_cats = get_categories( "child_of=13" );
				foreach ( $map_cats as $map_cat ):?>
					<div class="<?php echo $map_cat->slug; ?>" title="<?php echo $map_cat->cat_name; ?>" data-id="<?php echo $map_cat->cat_ID; ?>"></div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="map-info-select wp1100">
			<form method="post" action="<?php bloginfo("home"); ?>" onsubmit="return check()">
				<input type="hidden" name="lng" value="cn"/>
				<input type="hidden" name="tid" value="37"/>
				<input type="hidden" name="mid" value="15"/>
				<div class="map-select-box">
					<div class="map-select-wp">
						<select name="prov" id="s1"></select>
					</div>
					<div class="map-select-wp">
						<select name="city" id="s2"></select>
					</div>
					<div class="map-input-wp">
						<input type="text" id="s" name="s" name="keyword" value="" placeholder="输入关键字" id="mapSearchText">
						<div class="map-input-submit iconfont">
							<input type="submit" name="submit" value="" id="mapSearchSubmit">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="map-area-con wp1100 clearfloat">
		<div class="map-area-province iconfont" id="provinceName"><?php echo get_category( $catId )->cat_name; ?></div>
		<div class="map-area-city" id="mapArea">
			<?php
			$citys=[];
			$city_posts=get_posts("category=$catId");
			foreach ($city_posts as $city_post){
				$city_post_id=$city_post->ID;
				$city=get_post_meta("$city_post_id","city",true);
				array_push($citys,$city);
			}
			$results = array_unique($citys);
			foreach ($results as $result):?>
				<a class="city_title" title="<?php echo $result;?>"><?php echo $result;?></a>
			<?php endforeach;?>


		</div>
	</div>


	<script>
        function check() {
            var province = $('#s1').find(':selected').text();
            if (province == '省份') {
                alert('请选择省份');
                return false;
            }
        }
        $(function () {
            //加载下拉框省市
            new PCAS("prov", "city", "county", "省份", "地级市", "市、县级市、县");

            var provinceName = '安徽省'; // 程序输出默认省份
            var cityName = ''; // 程序输出默认城市，没有为空字符

            // 地图点击
            $('#map').children().click(function (e) {
                e.stopPropagation();
                var self = $(this),
                    name = self.attr('title'),
                    id = self.attr('data-id');
                self.addClass('on').siblings().removeClass('on');
            });
        });
	</script>


	<div class="map-area-list wp1100">
		<ul class="clearfloat">
			<?php
			$posts=get_posts("category=$catId");
			foreach ($posts as $post):
				$post_id=$post->ID;
				$address=get_post_meta("$post_id","address",true);
				$title_city=get_post_meta("$post_id","city",true);
				?>
				<li title="<?php echo $title_city;?>">
					<a href="http://map.baidu.com/?newmap=1&ie=utf-8&s=s%26wd%3D<?php echo $address;?>">
						<div class="info">
							<div class="t"><?php echo $post->post_title;?></div>
							<div class="address"><?php echo get_post_meta("$post_id","address",true)?></div>
							<div class="phone"><?php echo get_post_meta("$post_id","phone",true)?></div>
						</div>
						<div class="look-map">
							<p>查看地图</p>
							<i>carte</i>
						</div>
						<div class="line"></div>
					</a>
					<div class="shadow"></div>
				</li>
			<?php endforeach;?>



		</ul>
		<div class="paged"></div>
	</div>
</div>
<script type="text/javascript" src="http://www.ssk.com.cn/templates/specialty/script/zt/city.js"></script>






<?php get_footer(); ?>