<?php


/*
 *
 *
 * 工程案例
 *
 * */
get_header();

global $wp_query;
$catId = get_query_var('cat');


//$cast_cat=get_the_category();
//$id=$cast_cat[0]->term_id;
?>
	<div class="case_list_pc">
		<div class="blank25"></div>
		<div class="blank25"></div>
		<div class="blank15"></div>
		<div id="main">
			<div class="project_title">项目案例</div>
			<div class="project_desc"></div>
			<div class="project_btns">
				<div clas="project_cate_list">
					<?php
					$cats=get_categories("child_of=4");
					foreach ($cats as $cat){
						?>
						<a href="<?php echo home_url()."?cat=$cat->term_id"?>" class="move_slow" title="<?php echo $cat->cat_name;?>"> <?php echo $cat->cat_name;?> </a>
					<?php } ?>
				</div>
			</div>
			<div class="blank25"></div>
			<div class="blank25"></div>
			<div class="blank20"></div>
			<div class="project_list">
				<?php
				$arr = array('meta_key' => '_thumbnail_id',
				             'showposts' => 100,        // 显示5个特色图像
				             'posts_per_page' => 1,   // 显示5个特色图像
				             'orderby' => 'rand',   // 按发布时间先后顺序获取特色图像，可选：'title'、'rand'、'comment_count'等
				             'ignore_sticky_posts' => 1,
				             'category' => 0 ,
				             'order' => 'DESC',
				             'cat'=>$catId
				);
				$slideshow = new WP_Query($arr);
				if ($slideshow->have_posts()) {
					$postNum=0;
					while ($slideshow->have_posts()) {
						$slideshow->the_post();
						?>
						<div class="pro_item move_slow <?php echo ($postNum%4==0)?"last":"";?>">
							<div class="pro_img img_center">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="pic_box">
									<?php
									// 获取特色图像的地址
									$timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),450);
									echo '<img border="0" alt="' . get_the_title() . '" src="' . $timthumb_src[0] . '" /> ';
									?>
									<span></span>
								</a>
							</div>
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="pro_name"><?php the_title();?></a>
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="more">more</a>
						</div>
						<?php
						$postNum++;
					} // endwhile
					wp_reset_postdata();
				} // endif
				?>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="case_list_mobile">
		<div class="case_bg"></div>
		<div class="blank15"></div>
		<div id="main">
			<div class="project_title">项目案例</div>
			<div class="project_desc">
				<?php echo get_post()->post_content;?>
			</div>
			<div class="project_btns">
				<div class="case_title">项目案例</div>
				<div class="project_cate_list">
					<?php
					$cats=get_categories("child_of=4");
					foreach ($cats as $cat){
						?>
						<a href="<?php echo home_url()."?cat=$cat->term_id"?>" class="move_slow" title="<?php echo $cat->cat_name;?>"> <?php echo $cat->cat_name;?> </a>
					<?php } ?>
				</div>
			</div>
			<div class="blank25"></div>
			<div class="blank25"></div>
			<div class="blank20"></div>
			<div class="project_list">
				<?php
				$arr = array('meta_key' => '_thumbnail_id',
				             'showposts' => 100,        // 显示5个特色图像
				             'posts_per_page' => 1,   // 显示5个特色图像
				             'orderby' => 'rand',   // 按发布时间先后顺序获取特色图像，可选：'title'、'rand'、'comment_count'等
				             'ignore_sticky_posts' => 1,
				             'category' => 0 ,
				             'order' => 'DESC',
				             'cat'=>$catId
				);
				$slideshow = new WP_Query($arr);
				if ($slideshow->have_posts()) {
					$postNum=0;
					while ($slideshow->have_posts()) {
						$slideshow->the_post();
						?>
						<div class="pro_item move_slow <?php echo ($postNum%4==0)?"last":"";?>">
							<div class="pro_img img_center">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="pic_box">
									<?php
									// 获取特色图像的地址
									$timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),450);
									echo '<img border="0" alt="' . get_the_title() . '" src="' . $timthumb_src[0] . '" /> ';
									?>
									<span></span>
								</a>
							</div>
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="pro_name"><?php the_title();?></a>
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" class="more">more</a>
						</div>
						<?php
						$postNum++;
					} // endwhile
					wp_reset_postdata();
				} // endif
				?>
				<div class="blank20"></div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="blank20"></div>

	<script type="text/javascript">
        $(".case_list_mobile .case_title").click(function(){
            var type = $(".case_list_mobile .project_cate_list").css("display");
            if(type=='none'){
                $(".case_list_mobile .project_cate_list").show();
            }else{
                $(".case_list_mobile .project_cate_list").hide();
            }
        });
	</script>
<?php get_footer();
?>