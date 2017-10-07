<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 13:32
 *
 *Template Name:人才招聘
 */

get_header();

$id=get_the_ID();

$cat=get_category(18);
$parent_cat=get_category($cat->parent);




$job_posts=get_posts("category=19&order=asc");

$sum=count($job_posts);
?>


<div class="insideBanner por">
	<div class="insideBannerBg"></div>
	<div class="insideBannerSwiper swiper-container" id="insideBannerSwiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/job_banner.jpg);"></div>
		</div>
	</div>
	<script>
        $(function() {
            var insideBannerSwiper = new Swiper('#insideBannerSwiper', {
                autoplay: 5000,
                loop: true
            });
        });
	</script>
	<div class="path wp1200 clearfloat">
		<div class="word">
			<div class="cn"><?php the_title()?></div>
			<div class="en font-baskvill"><?php the_excerpt();?></div>
		</div>
		<div class="bread">
			<a href="">首页</a>
			>&nbsp;<a href="<?php the_permalink(181);?>"><?php echo $parent_cat->cat_name;?></a>
			>&nbsp;<?php echo the_title();?>

		</div>
	</div>
</div>

<div class="position-select-con">
	<div class="wp1200 clearfloat">
		<div class="position-select-word">
			<div class="word-big">职位选择</div>
			<div class="word-small">加入德哲大家庭，开创职业新里程</div>
		</div>
		<div class="position-select-form clearfloat">
			<form method="post" action="">
				<input type="hidden" name="lng" value="cn"/>
				<input type="hidden" name="tid" value="24"/>
				<input type="hidden" name="mid" value="4"/>
				<select name="area">
					<option value="">选择地区</option>
					<option value="常州市">常州市</option>
				</select>
				<select name="cat">
					<option value="">职业分类</option>
					<option value="营销类">营销类</option>
					<option value="技术类">技术类</option>
					<option value="设计类">设计类</option>
				</select>
				<input type="text" id="keyword" name="keyword" value="" placeholder="输入关键字">
				<input type="submit" name="submit" value="搜索">
			</form>

		</div>
	</div>
</div>

<div class="recrutment-main">
	<div class="wp1200">
		<div class="recrutment-result">搜索到<?php echo $sum;?>个结果</div>
		<div class="recrutment-table-con">
			<div class="recrutment-table bge">
				<div class="form-th">
					<div class="form-tc">职位</div>
					<div class="form-tc">地区</div>
					<div class="form-tc">时间</div>
					<div class="form-tc">操作</div>
				</div>
			</div>

			<?php
				$job_posts=get_posts("category=19&order=asc");
				foreach ($job_posts as $job_post):?>
					<div class="recrutment-table">
						<div class="form-trow">
							<div class="form-tc" style="text-align:left;padding-left: 110px;">
                                <span class="form-name-icon iconfont" title='<?php echo get_post_meta("$job_post->ID","pos",true);?>'>
                                    <?php echo get_post_meta("$job_post->ID","pos",true);?>
                                </span>
                            </div>
							<div class="form-tc">
                                <span class="form-area-icon iconfont"><?php echo get_post_meta("$job_post->ID","area",true);?></span>
                            </div>
							<div class="form-tc">
                                <span class="form-time-icon iconfont"><?php $arr = explode(" ",$job_post->post_date);echo (!empty($arr[0]))?$arr[0]:"";?></span>
                            </div>
							<div class="form-tc">
								<span class="form-handle-btn-table">
									<span class="form-handle-btn-tc">
										<a href="<?php echo $job_post->guid;?>"><b>查看详情</b><i>READ MORE</i></a>
									</span>
								</span>
							</div>
						</div>
					</div>
				<?php endforeach;?>
		</div>
		<div class="paged">
			<a><span class="current disabled">上一页</span></a>
			<span class="current disabled">1</span>
			<a title="2" href="javascript:void(0);">2</a>
			<a title="3" href="javascript:void(0);">3</a>
			<a title="4" href="javascript:void(0);">4</a>
			<a class="p1" title="下一页" href="javascript:void(0);">下一页</a>
		</div>
	</div>
</div>

<?php

get_footer();

?>
