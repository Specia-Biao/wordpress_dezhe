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
    <div class="news-flash-list-banner talent-banner" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/join_banner.jpg)">
        <div class="y">
            <h1><?php echo $cat->cat_name;?></h1>
            <h2><?php echo category_description("$cat->cat_ID");?></h2>
        </div>
    </div>


    <div class="nav-two swiper-container">
        <ul class="swiper-wrapper">
            <?php
            $inside_menus=theme_nav_menu("join");
            foreach ($inside_menus as $inside_key=>$inside_menu):
                ?>
                <li class="swiper-slide <?php echo ($id==($inside_menu->item_id))?"active":"";?>">
                    <a href="<?php echo $inside_menu->nav_url;?>"><?php echo $inside_menu->navname;?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>















<form name="join_phone" id="join_phone" method="post" action=""  onSubmit="return check()">
    <input type="hidden" name="linkurl" value="add"/>
    <input type="hidden" name="fgid" id="fgid" value="10"/>
    <input type="hidden" name="formcode" id="formcode" value="join_phone"/>
    <input type="hidden" name="did" id="did" value="0"/>
    <input type="hidden" name="tokenkey" value="ea8b1d4739d6b71898758cbf2bf233dc"/>
    <div class="join-us">
        <div class="bg-yy">
            <div class="bg">
                <div class="input">
                    <input type="text" name="linkman" value="" placeholder="姓名" id="linkman">
                </div>
                <div class="input">
                    <input type="text" name="linkphone" value="" placeholder="联系电话" id="linkphone">
                </div>
                <div class="input">
                    <input type="text" name="bussiness" value="" placeholder="现经营事业" id="bussiness">
                </div>
                <ul class="radio">
                    <li class="active" ><input type="radio" value="已有店面" name="isshore" checked="checked" style="display: none;"><span>已有店面</span></li>
                    <li><input type="radio" value="没有店面" name="isshore" style="display: none;" checked><span>没有店面</span></li>
                </ul>
                <div class="input">
                    <input type="text" name="area" type="text" value="" placeholder="店面面积" id="area">
                </div>
                <div class="input">
                    <input type="text" name="putin" type="text" value="" placeholder="计划投入" id="putin">
                </div>
                <div class="title">
                    加盟区域
                </div>
                <ul class="select">
                    <li><select name="prov" id="s1" class="customSelect"></select><span></span></li>
                    <li><select name="city" id="s2" class="customSelect"></select><span></span></li>
                    <li><select name="county" id="s3" class="customSelect"></select><span></span></li>
                </ul>

                <div class="btn">
                    <button type="submit">提交</button>
                </div>
            </div>
        </div>
    </div>
</form>



<?

get_footer();
?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/city.js"></script>
<script>
    function check() {
        var linkman = $('#linkman').val();
        var linkphone = $('#linkphone').val();
        var bussiness = $('#bussiness').val();
        var area = $('#area').val();
        var putin = $('#putin').val();
        var province = document.getElementById("s1").value;
        var city = document.getElementById("s2").value;
        var county = document.getElementById("s3").value;
        if(linkman==''){
            alert('请填写姓名');
            return false;
        }
        if (/^13\d{9}$/g.test(linkphone) || (/^15[0-35-9]\d{8}$/g.test(linkphone)) || (/^18[0-9]\d{8}$/g.test(linkphone))) {
        }
        else {
            alert("您输入的手机号码格式不正确");
            return false;
        }
        if(bussiness==''){
            alert('请填写现经营事业');
            return false;
        }
        if(area==''){
            alert('请填写店面面积');
            return false;
        }
        if(putin==''){
            alert('请填写计划投入');
            return false;
        }
        if(province==''){
            alert('请选择省份');
            return false;
        }
        if(city==''){
            alert('请选择城市');
            return false;
        }
        if(county==''){
            alert('请选择市、县级');
            return false;
        }
    }
    $(function(){
        new PCAS("prov", "city", "county", "省份", "地级市", "市、县级市、县");
    })
</script>
