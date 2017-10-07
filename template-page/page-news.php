<?php


/*
 *
 *
 * Template Name:资讯模板
 *
 * */
get_header();
$news_catId=8;
?>


	<div class="newsMain">
		<div class="wp1200">
			<div class="newsCenterBox clearfloat">
				<div class="newsCenterText">
                        <?php
                            $news_cat=get_category("$news_catId");
                        ?>
					<div class="textBox">
						<h3><a><?php echo category_description("$news_catId")?></a></h3>
						<h4><a><?php echo $news_cat->cat_name;?></a></h4>
						<i></i>
						<div class="newsCenterCon clearfloat">


							<?php
							// 得到所有标签列表（15为标签id，想获取某个标签只需添加进去用逗号隔开，如'include' => '13，57'）
							$args=array(
								'include' => '28'
							);
							$tags = get_tags($args);
							//循环所有标签
							foreach ($tags as $tag) {
								// 得到标签ID
								// 得到标签下所有文章
								$tagid = $tag->term_id;
								$posts=query_posts("showposts=-1&tag_id=$tagid");
								$post=$posts[0];
								?>
                                <div class="img">
                                    <a href="<?php echo $post->guid;?>">
		                                <?php
		                                // 获取特色图像的地址
		                                $post_ID=$post->ID;
		                                $post_thumbnail_id = get_post_thumbnail_id($post_ID);
		                                $post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
		                                $timthumb_src = wp_get_attachment_image_src( $post->ID,$size = 'medium');
		                                echo '<img src="' . $post_thumbnail_src[0] . '" /> ';
		                                ?>
                                    </a>
                                </div>
                                <div class="text">
                                    <h5><?php echo $post->post_title;?></h5>
                                    <a href=<?php echo $post->guid;?>" class="more">MORE</a>
                                </div>
							<?php } ?>
						</div>
						<ul class="newsCenterList">
							<?php
							// 得到所有标签列表（15为标签id，想获取某个标签只需添加进去用逗号隔开，如'include' => '13，57'）
							$args=array(
								'include' => '29'
							);
							$tags = get_tags($args);
							//循环所有标签
							foreach ($tags as $tag) :
								// 得到标签ID
								// 得到标签下所有文章
								$tagid = $tag->term_id;
								$posts=query_posts("showposts=-1&tag_id=$tagid");
								foreach ($posts as $post):
									?>
                                    <li><a href="<?php echo $post->guid;?>"><?php echo $post->post_title;?></a><span><?php echo the_time("m-n");?></span></li>
								<?php endforeach;?>
							<?php endforeach; ?>
						</ul>
					</div>

				</div>
				<div class="newsCenterImg">
					<div class="newsImgTop">
                        <?php
                            $news_catTops=get_categories("child_of=$news_catId");
                            foreach ($news_catTops as $newsKey=>$news_cat):?>
                                <?php if($newsKey==0):?>
                                    <div class="imgtext por">
                                        <div class="img por">
                                            <a href="<?php echo home_url()."?cat=".$news_cat->cat_ID;?>">
                                                <img src="<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$newsKey.".jpg";?>"/>
                                                <h5><?php echo $news_cat->cat_name;?></h5>
                                                <i></i>
                                                <div class="colordiv"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php elseif($newsKey==1):?>
                                    <div class="imgtext ml2 por">
                                        <div class="img">
                                            <a href="<?php echo home_url()."?cat=".$news_cat->cat_ID;?>">
                                                <img src="<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$newsKey.".jpg";?>"/>
                                                <h5><?php echo $news_cat->cat_name;?></h5>
                                                <i></i>
                                                <div class="colordiv"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                <?php endforeach;?>
					</div>
					<div class="newsImgBom">
                        <?php
                            $news_catBoms=get_categories("child_of=$news_catId");
                            foreach ($news_catBoms as $newsKey=>$news_cat):?>
                                <?php if($newsKey==2):?>
                                    <div class="img por">
                                        <a href="<?php echo home_url()."?cat=".$news_cat->cat_ID;?>">
                                            <img src="<?php echo get_stylesheet_directory_uri();?>/static/upload/<?php echo "news_cat".$newsKey.".jpg";?>"/>
                                            <h5><?php echo $news_cat->cat_name;?></h5>
                                            <i></i>
                                            <div class="colordiv"></div>
                                        </a>
                                    </div>
                            <?php endif;?>
                                <?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>