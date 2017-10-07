<?php
	get_header("product");
?>
<div class="blank20"></div>
<div class="blank20"></div>
<div id="main">
	<div class="detail_info_outer detail_info_outer_pc">
		<div class="detail_info">
			<div class="detail_left prod_gallery_x fl">
				<div class="detail_pic">
					<div class="up pic_shell">
						<div class="big_box">
							<div class="magnify">

								<?php
								// 获取特色图像的地址
								$post_ID=$post->ID;
								$post_thumbnail_id = get_post_thumbnail_id( $post_ID );
								$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
								// echo $post_thumbnail_src[0];
								$timthumb_src = wp_get_attachment_image_src( $post->ID,$size = 'medium');
								echo '<a class="big_pic" href="' . $post_thumbnail_src[0] . '"><img itemprop="image" class="normal" src="' . $post_thumbnail_src[0] . '" rel="' . $post_thumbnail_src[0] . '" alt="" /></a>';
								?>
							</div>
						</div>
					</div>
					<div class="small_carousel">
						<div class="viewport">
							<ul class="list">
								<?php
								$img_shortcode = get_post_meta( $post->ID, "gallery" );
								do_shortcode( $img_shortcode[0] ,true);
								global $gallery;
								?>
								<?php if($gallery!=""){
								foreach($gallery as $img){ ?>
                                <li class="item FontBgColor current" pos="1">
                                    <a href="javascript:;" class="pic_box FontBorderHoverColor" alt="" title="" hidefocus="true">
                                        <img src="<?php echo $img->url;?>" title="<?php echo $img->excerpt;?>" alt="<?php echo $img->excerpt;?>" normal="<?php echo $img->url;?>" mask="<?php echo $img->url;?>">
                                        <span></span>
                                    </a>
                                </li>
								<?php } ?><!--end foreach-->
                               <?php  } ?>
							</ul>
						</div>
						<a href="javascript:void(0);" hidefocus="true" class="btn left prev"><span class="icon_left_arraw icon_arraw"></span></a>
						<a href="javascript:void(0);" hidefocus="true" class="btn right next"><span class="icon_right_arraw icon_arraw"></span></a>
					</div>
				</div>
            </div>
			<div class="detail_right">
				<h3 class="product_name">
					<?php the_title();?></h3>
				<hr />
				<div class="blank25"></div>
<!--				<div class="biref_dest">test</div>-->
				<div class="blank25"></div>
				<div class="attribute_btns attribute_btns_pc">
					<ul class="widget attributes" default_selected="1">
					</ul>
				</div>
				<div class="blank25"></div>
				<div class="parameter_list">
					<ul>
                        <li class="bg_1">
							<b class="parameter_title">模型</b>
							<span class="model"><?php $model= get_post_meta($post->ID, 'model', true);echo $model; ?></span>
						</li>
						<li class="bg_2">
							<b class="parameter_title">大小</b>
							<span class="size"><?php $size= get_post_meta($post->ID, 'size', true);echo $size; ?></span>
						</li>
						<li class="bg_1">
							<b class="parameter_title">容量</b>
							<span class="capacity"><?php $capacity= get_post_meta($post->ID, 'capacity', true);echo $capacity; ?></span>
						</li>
						<li class="bg_2">
							<b class="parameter_title">价格</b>
							<span class="price"><?php $price= get_post_meta($post->ID, 'price', true);echo $price; ?></span>
						</li>
					</ul>
				</div>
				<div class="blank25"></div>
<!--				<a href="javascrript:void(0);" title="Inquiry" class="inquiry_btn">Inquiry</a>-->
				<div class="share">
					<div class="addthis_inline_share_toolbox"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="blank20"></div>
	<div class="products_description">
		<div class="pro_des">
            <div style="margin: 0px; padding: 8px 0px 4px 8px; border-width: 0px 0px 2px; border-top-style: initial; border-right-style: initial; border-bottom-style: solid; border-left-style: initial; border-top-color: initial; border-right-color: initial; border-bottom-color: rgb(210, 242, 221); border-left-color: initial; border-image: initial; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 32px; line-height: 1; font-family: inherit; vertical-align: baseline; border-radius: 3px 3px 0px 0px; color: rgb(23, 154, 67); background-color: rgb(210, 242, 221);">Detailed&amp;Production</div>
			<?php
                $content = get_post($id)->post_content;
                echo $content;//输出文章的内容
             ?>
		</div>
	</div>
</div>
<iframe name="export_pdf" id="export_pdf" class="export_pdf" src="" style="width:0px; height:0px;"></iframe>
    <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/static/js/plugin/jquery.imagezoom.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".normal").imagezoom();
            $(".list li a").click(function(){
                //增加点击的li的class:tb-selected，去掉其他的tb-selecte
                $(this).parents("li").addClass("current").siblings().removeClass("current");
                //赋值属性
                $(".normal").attr('src',$(this).find("img").attr("normal"));
                $(".normal").attr('rel',$(this).find("img").attr("mask"));
            });
        });
    </script>
<?php get_footer();?>