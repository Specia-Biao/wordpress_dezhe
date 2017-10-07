<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 9:21
 *
 *
 *
 * Template Name:加入我们
 */
get_header();




$id=get_the_ID();

$cat=get_category(18);
$parent_cat=get_category($cat->parent);
?>

    <div class="insideBanner por" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/join_banner.jpg)">
        <div class="insideBannerBg"></div>
        <div class="path wp1200 clearfloat">
            <div class="word">
                <div class="cn"><?php echo $cat->cat_name;?></div>
                <div class="en font-baskvill"><?php echo category_description("$cat->cat_ID")?></div>
            </div>
            <div class="bread">
                <a href="/">首页</a>
                >&nbsp;<a href="<?php the_permalink(181);?>"><?php echo $parent_cat->cat_name;?></a>
                >&nbsp;<a href="<?php the_permalink(181);?>"><?php echo $cat->cat_name;?></a>
                >&nbsp;<?php echo the_title();?>
            </div>
        </div>
    </div>

    <div class="join-main bgf2">

        <div class="wp1200">

            <div class="inside-menu">
				<?php
				$inside_menus=theme_nav_menu("join");
				foreach ($inside_menus as $inside_key=>$inside_menu):?>
                    <a href="<?php echo $inside_menu->m_url;?>" class="<?php echo ($inside_menu->item_id==$id)?"cur":"";?>"><?php echo $inside_menu->navname;?></a>
				<?php endforeach;?>
            </div>
            <div class="join-form-con">
                <form name="joinus" id="joinus" method="post" action="" onsubmit="return check()">
                    <input type="hidden" name="linkurl" value="add">
                    <input type="hidden" name="fgid" id="fgid" value="5">
                    <input type="hidden" name="formcode" id="formcode" value="joinus">
                    <input type="hidden" name="did" id="did" value="0">
                    <input type="hidden" name="tokenkey" value="3967ea7c3fd62e039d431d6fcc1d35d0">
                    <div class="join-form-box">
                        <div class="join-form-title"><span>加入我们</span></div>
                        <div class="join-form-col clearfloat">
                            <div class="join-form-cell">
                                <div class="join-form-input-box">
                                    <div class="join-form-input-word"><span>*</span>联系人</div>
                                    <div class="join-form-input"><input name="linkman" id="linkman" type="text" value=""></div>
                                </div>
                            </div>
                            <div class="join-form-cell">
                                <div class="join-form-input-box">
                                    <div class="join-form-input-word"><span>*</span>联系电话</div>
                                    <div class="join-form-input"><input name="linkphone" id="linkphone" type="text" value=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-form-col clearfloat">
                            <div class="join-form-cell">
                                <div class="join-form-input-box">
                                    <div class="join-form-input-word"><span></span>现经营事业</div>
                                    <div class="join-form-input"><input name="bussiness" type="text" value=""></div>
                                </div>
                            </div>
                            <div class="join-form-cell">
                                <div class="join-form-radio-box clearfloat">
                                    <label><input type="radio" value="已有店面" name="isshore" checked=""><span>已有店面</span></label>
                                    <label><input type="radio" value="没有店面" name="isshore"><span>没有店面</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="join-form-col clearfloat">
                            <div class="join-form-cell">
                                <div class="join-form-input-box">
                                    <div class="join-form-input-word"><span></span>店面面积</div>
                                    <div class="join-form-input"><input name="area" type="text" value=""></div>
                                </div>
                            </div>
                            <div class="join-form-cell">
                                <div class="join-form-input-box">
                                    <div class="join-form-input-word"><span>*</span>计划投入</div>
                                    <div class="join-form-input"><input name="putin" id="putin" type="text" value=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-form-col">
                            <div class="join-form-select-con">
                                <div class="join-form-input-word"><span>*</span>加盟区域：</div>
                                <div class="join-form-select clearfloat">
                                    <select name="prov" id="s1" class="bottomSelect"><option value="">省份</option><option value="北京市">北京市</option><option value="天津市">天津市</option><option value="河北省">河北省</option><option value="山西省">山西省</option><option value="内蒙古自治区">内蒙古自治区</option><option value="辽宁省">辽宁省</option><option value="吉林省">吉林省</option><option value="黑龙江省">黑龙江省</option><option value="上海市">上海市</option><option value="江苏省">江苏省</option><option value="浙江省">浙江省</option><option value="安徽省">安徽省</option><option value="福建省">福建省</option><option value="江西省">江西省</option><option value="山东省">山东省</option><option value="河南省">河南省</option><option value="湖北省">湖北省</option><option value="湖南省">湖南省</option><option value="广东省">广东省</option><option value="广西壮族自治区">广西壮族自治区</option><option value="海南省">海南省</option><option value="重庆市">重庆市</option><option value="四川省">四川省</option><option value="贵州省">贵州省</option><option value="云南省">云南省</option><option value="西藏自治区">西藏自治区</option><option value="陕西省">陕西省</option><option value="甘肃省">甘肃省</option><option value="青海省">青海省</option><option value="宁夏回族自治区">宁夏回族自治区</option><option value="新疆维吾尔自治区">新疆维吾尔自治区</option><option value="香港特别行政区">香港特别行政区</option><option value="澳门特别行政区">澳门特别行政区</option><option value="台湾省">台湾省</option></select>
                                    <select name="city" id="s2" class="bottomSelect"><option value="">地级市</option></select>
                                    <select name="county" id="s3" class="bottomSelect"><option value="">市、县级市、县</option></select>
                                </div>
                            </div>
                        </div>
                        <div class="join-form-col">
                            <div class="join-form-btn"><input name="submit" type="submit" value="提交" id="joinFormbtn"></div>
                        </div>
                        <script>
                            $(function () {
                                toastr.options = {
                                    "positionClass": "toast-center-center"
                                };
                            })
                            function check(){

                                var linkman = $('#linkman').val();
                                if(!linkman){
                                    toastr.error('请填写联系人!');
                                    return false;
                                }
                                var linkphone = $('#linkphone').val();
                                var checkT = /^((\d{11})|(\d{7,8})|(\d{4}|\d{3})-(\d{7,8}))$/;
                                if(!linkphone){
                                    toastr.error('请填写联系电话!');
                                    return false;
                                }else if(!checkT.test(linkphone)){
                                    toastr.error('联系电话格式填写错误!');
                                    return false;
                                }
                                var putin = $('#putin').val();
                                if(!putin){
                                    toastr.error('请填写计划投入!');
                                    return false;
                                }
                                if($('select[name="prov"] :selected').val()==0){
                                    toastr.error('请选择加盟区域!');
                                    return false;
                                }
                            }
                        </script>
                    </div>
                </form>
            </div>
        </div>
</div>



<?

get_footer();
?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/zt/city.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/core.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/script.js"></script>
<script>
    $(function () {
        new PCAS("prov", "city", "county", "省份", "城市", "区/县");
    })
</script>
