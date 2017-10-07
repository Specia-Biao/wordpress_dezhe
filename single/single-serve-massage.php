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
    <!--banner-->
    <div class="news-flash-list-banner talent-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/serve_massage.jpg)">
        <div class="y">
            <h1><?php echo $cat->cat_name;?></h1>
            <h2><?php echo category_description("$cat->cat_ID");?></h2>
        </div>
    </div>
    <!--二级导航-->

    <div class="nav-two swiper-container">
        <ul class="swiper-wrapper">
            <li class="swiper-slide ">
                <a href="<?php the_permalink(304);?>">
                    <?php echo get_post(304)->post_title;?>				</a>
            </li>
            <li class="swiper-slide ">
                <a href="<?php the_permalink(100);?>">
                    <?php echo get_post(100)->post_title;?>				</a>
            </li>
            <li class="swiper-slide">
                <a href="<?php the_permalink(105);?>">
                    <?php echo get_post(105)->post_title;?>				</a>
            </li>
            <li class="swiper-slide active">
                <a href="<?php the_permalink(103);?>">
                    <?php echo get_post(103)->post_title;?>				</a>
            </li>
        </ul>
    </div>
    <form name="contact_phone" id="contact_phone" method="post" action=""  onSubmit="return check()">
        <input type="hidden" name="linkurl" value="add"/>
        <input type="hidden" name="fgid" id="fgid" value="9"/>
        <input type="hidden" name="formcode" id="formcode" value="contact_phone"/>
        <input type="hidden" name="did" id="did" value="0"/>
        <input type="hidden" name="tokenkey" value="d16acece7ced1af6825e46e128710b73"/>
        <div class="join-us">
            <div class="bg-yy">
                <div class="bg">
                    <div class="input">
                        <input type="text" name="linkman" value="" placeholder="姓名" id="linkman">
                    </div>
                    <div class="input">
                        <input type="text" name="email" value="" placeholder="Email" id="email">
                    </div>
                    <div class="input">
                        <textarea placeholder="留言" name="pcontent"></textarea>
                    </div>
                    <div class="btn">
                        <button type="submit">提交</button>
                    </div>
                    <div class="btn" style="padding-top: 20px;">
                        <p><?php echo get_post($id)->post_content;?></p>
                    </div>
                </div>

            </div>
        </div>
        <script>
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
    </form>

<?php get_footer(); ?>