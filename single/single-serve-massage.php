<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 16:56
 *
 * 在线留言
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




<div class="insideBanner por" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/serve_massage.jpg)">
	<div class="insideBannerBg"></div>
	<div class="path wp1200 clearfloat">
		<div class="word">
			<div class="cn"><?php echo $cat->cat_name;?></div>
			<div class="en font-baskvill"><?php echo category_description("$catId");?></div>
		</div>
		<div class="bread">
			<a href="/">首页</a>
			>&nbsp;<a href="<?php the_permalink(107);?>"><?php echo $parent_cat->cat_name;?></a>
			>&nbsp;<a href="javascript:void(0);"><?php echo the_title();?></a>
		</div>
	</div>
</div>

<div class="join-main bgf2">
	<div class="wp1200">

		<div class="inside-menu">
			<a href="<?php the_permalink(304);?>" ><?php echo get_post(304)->post_title;?></a>
			<a href="<?php the_permalink(100);?>" ><?php echo get_post(100)->post_title;?></a>
			<a href="<?php the_permalink(105);?>" ><?php echo get_post(105)->post_title;?></a>
			<a href="<?php the_permalink(103);?>" class="cur"><?php echo get_post(103)->post_title;?></a>
		</div>
		<div class="join-form-con">
			<form name="contact" id="contact" method="post" onsubmit="return submitCheck();">
				<input type="hidden" name="linkurl" value="add"/>
				<input type="hidden" name="fgid" id="fgid" value="7"/>
				<input type="hidden" name="formcode" id="formcode" value="contact"/>
				<input type="hidden" name="did" id="did" value="0"/>
				<input type="hidden" name="tokenkey" value="d18a5cd04d3308846ef0ebb4b570963b"/>
				<div class="join-form-box">
					<div class="join-form-title"><span>在线留言</span></div>
					<div class="join-form-col clearfloat">
						<div class="join-form-cell">
							<div class="join-form-input-box">
								<div class="join-form-input-word"><span>*</span>姓名</div>
								<div class="join-form-input"><input name="linkman" id="linkman" type="text" value=""></div>
							</div>
						</div>
						<div class="join-form-cell">
							<div class="join-form-input-box">
								<div class="join-form-input-word"><span>*</span>Email</div>
								<div class="join-form-input"><input name="email" id="linkemail" type="text" value=""></div>
							</div>
						</div>
					</div>

					<div class="join-form-col clearfloat" style='border:1px solid #C8C8C8;'>
						<div class="join-form-input-word"><span>*</span>留言</div>
						<textarea name='contact'   id='linkcontact' style='width:680px;height: 100px;border:none;font-size: 14px;resize:none;padding-left: 20px;' value=''></textarea>
					</div>


					<div class="join-form-col">
						<div class="join-form-btn"><input name="submit" type="submit" value="提交"></div>
					</div>
					<div class="join-form-col">
						<?php
							echo get_post($id)->post_content;
						?>
					</div>

					<script>
                        $(function () {
                            toastr.options = {
                                "positionClass": "toast-center-center"
                            };
                        })
                        function submitCheck(){
                            var linkman = $('#linkman').val();
                            if(linkman==""){
                                toastr.error('请填写联系人!');
                                return false;
                            }
                            var linkemail = $('#linkemail').val();
                            if(linkemail==""){
                                toastr.error('请填写邮箱!');
                                return false;
                            }
                            var linkcontact = $('#linkcontact').val();
                            if(linkcontact==""){
                                toastr.error('请填写留言内容!');
                                return false;
                            }
                            var id="<?php echo $id;?>";
                            $.post("wp-comments-post.php",
                                {
                                    author:linkman,
                                    comment:"联系人："+linkman+"/"+
                                    "邮箱:"+linkemail+" /"+
                                    "留言内容:"+linkcontact+" /",
                                    comment_post_ID:id,
                                    comment_parent:0,
                                },
                                function(data,status){
                                    alert("提交成功");
                                });
                        }
					</script>
				</div>
			</form>

		</div>
	</div>
</div>

<?php



get_footer();



?>