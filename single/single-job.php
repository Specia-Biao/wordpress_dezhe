<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 14:12
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

<div class="insideBanner por">
	<div class="insideBannerBg"></div>
	<div class="insideBannerSwiper swiper-container" id="insideBannerSwiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/job_banner.jpg);"></div>
		</div>
	</div>

	<div class="path wp1200 clearfloat">
		<div class="word">
			<div class="cn"><?php echo $cat->cat_name;?></div>
			<div class="en font-baskvill"><?php echo category_description("$catId");?></div>
		</div>
		<div class="bread">
			<a href="/">首页</a>
			>&nbsp;<a href="<?php the_permalink(181);?>"><?php echo $parent_cat->cat_name;?></a>
			>&nbsp;<a href="<?php the_permalink(208);?>"><?php echo $cat->cat_name;?></a>
		</div>
	</div>
</div>

<div class="position-select-con">
	<div class="wp1200 clearfloat">
		<div class="position-select-word">
			<div class="word-big">职位选择</div>
			<div class="word-small">加入哲德大家庭，开创职业新里程</div>
		</div>
		<div class="position-select-form clearfloat">

			<form method="post" action="">
				<input type="hidden" name="lng" value="cn"/>
				<input type="hidden" name="tid" value="24"/>
				<input type="hidden" name="mid" value="4"/>
				<select name="area">
					<option value=" ">选择地区</option>
					<option value="常州市">常州市</option>
				</select>
				<select name="cat">
					<option value=" ">职业分类</option>
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
	<div class="wp1000">
		<div class="recrutment-goback"><a href="javascript:;" onclick="history.go(-1)" class="iconfont">返回</a></div>
		<div class="recrutment-detail">
			<div class="recrutment-top">
				<div class="recrutment-top-title"><?php echo get_post_meta("$id","pos",true);?></div>
				<div class="recrutment-top-tips">
					<span class="recrutment-top-num iconfont"><?php echo get_post_meta("$id","recruitment",true);?></span>
					<span class="recrutment-top-area iconfont"><?php echo get_post_meta("$id","area",true);?></span>
					<span class="recrutment-top-time iconfont"><?php the_time("Y-m-n");?></span>
				</div>
				<div class="recrutment-top-btn-table" id="recrutmentApplyBtn">
					<span class="recrutment-top-btn-tc">
						<b>申请</b><i>APPLICATION</i>
					</span>
				</div>
			</div>
			<article class="recrutment-article">
				<?php echo get_post($id)->post_content;?>
			</article>
		</div>
	</div>
</div>




<script>
    area = '<?php echo get_post_meta("$id","area",true);?>';
    pos = '<?php echo get_post_meta("$id","pos",true);?>';
</script>
<div class="dialog-apply-con" id="dialogApply">
	<form name="recruit" id="recruit" method="post" action=""  onSubmit="return check()" enctype="multipart/form-data">
		<input type="hidden" name="linkurl" value="add"/>
		<input type="hidden" name="fgid" id="fgid" value="6"/>
		<input type="hidden" name="formcode" id="formcode" value="recruit"/>
		<input type="hidden" name="did" id="did" value="0"/>
		<input type="hidden" name="tokenkey" value="2840926b60d581c1f5042010fb8da950"/>
		<div class="dialog-apply-box" id="dialogApplyBox">
			<div class="dialog-apply-bg"></div>
			<div class="dialog-apply-form">
				<div class="dialog-apply-close" id="dialogApplyClose" title="关闭">×</div>
				<div class="dialog-apply-title">
					<div class="big"><span>申请职位</span></div>
					<div class="small">加入德哲大家庭，开创职业新里程</div>
				</div>
				<div class="dialog-apply-input">
					<div class="dialog-apply-input-word"><span style="color: red;">*</span>姓名</div>
					<input name="linkman" id="linkman" type="text" value="">
				</div>
				<div class="dialog-apply-checkbox">
					<label><input type="radio" name="gender" value="男士"><span>男士</span></label>
					<label><input type="radio" name="gender" value="女士"><span>女士</span></label>
				</div>
				<div class="dialog-apply-input">
					<div class="dialog-apply-input-word"><span style="color: red;">*</span>手机号</div>
					<input id="linkphone" type="text" name="linkphone" value="">
				</div>
				<div class="dialog-apply-input">
					<div class="dialog-apply-input-word">地区</div>
					<input readonly type="text" id="area" value="" name="area">
				</div>
				<div class="dialog-apply-input">
					<div class="dialog-apply-input-word">应聘职位</div>
					<input readonly type="text" id="pos" value="" name="pos">
				</div>
				<div class="dialog-apply-textarea">
					<div class="dialog-apply-input-word-long">自我描述</div>
					<textarea name="detail"></textarea>
				</div>
				<div class="dialog-apply-file">
					<div class="dialog-apply-input-word">上传简历</div>
					<div class="dialog-apply-file-box clearfloat">
						<input type="file" name="afile"  id="fileApply">
						<div class="dialog-apply-file-btn" id="fileBtn">选择文件</div>
						<div class="dialog-apply-file-result" id="fileResult"></div>
					</div>
				</div>
				<div class="dialog-apply-btn"><input name="submit" type="submit" value="提交"></div>
			</div>
		</div>
	</form>
	<script>
        $(function () {
            $('#area').val(area);
            $('#pos').val(pos);
            toastr.options = {
                "positionClass": "toast-center-center"
            };
        })

        function check(){
            var linkman = $('#linkman').val();
            if(!linkman){
                toastr.error('请填写姓名!');
                return false;
            }

            if(!$('input:radio[name="gender"]:checked').val()){
                toastr.error('请选择性别!');
                return false;
            }
            var linkphone = $('#linkphone').val();
            var checkT = /^(1)[0-9]{10}$/;
            if(!linkphone){
                toastr.error('请填写手机号!');
                return false;
            }else if(!checkT.test(linkphone)){
                toastr.error('手机号填写错误!');
                return false;
            }
        }
	</script>
</div>


<?php
	get_footer();
?>