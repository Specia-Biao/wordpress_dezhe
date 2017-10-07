<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 16:52
 *
 * 免费量尺
 *
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
<!--免费测量-->

<?php echo get_post($id)->post_content;?>

<!--免费设计-->



<form name="scale" id="scale" method="post" action=""  onSubmit="return check()">
    <input type="hidden" name="linkurl" value="add"/>
    <input type="hidden" name="fgid" id="fgid" value="8"/>
    <input type="hidden" name="formcode" id="formcode" value="scale"/>
    <input type="hidden" name="did" id="did" value="0"/>
    <input type="hidden" name="tokenkey" value="495d9af914b21fda5ac8a75d5a89b587"/>
    <div class="scale">
        <i class="icon"></i>
        <h1>免费设计预约</h1>
        <div class="input">
            <input type="text" name="linkman" value="" placeholder="联系人" id="linkman">
        </div>
        <div class="input">
            <input type="text" name="linkphone" valu="" placeholder="联系电话" id="linkphone">
        </div>
        <div class="select">
            <select id="s1" name='prov' class=" customSelect " ></select>
            <span></span>
            </select>
        </div>
        <div class="select">
            <select id="s2" name='city' class="customSelect"></select>
            <span></span>
        </div>
        <div class="scale-btn">
            <button style="submit">提交</button>
        </div>
    </div>
    <script type="text/javascript" src="http://www.ssk.com.cn/templates/touch/script/city.js"></script>
    <script>
        function check() {
            var province = document.getElementById("s1").value;
            var city = document.getElementById("s2").value;
            var linkman = $('#linkman').val();
            var linkphone = $('#linkphone').val();
            if(linkman==''){
                alert('请填写联系人');
                return false;
            }
            if (/^13\d{9}$/g.test(linkphone) || (/^15[0-35-9]\d{8}$/g.test(linkphone)) || (/^18[0-9]\d{8}$/g.test(linkphone))) {
            }
            else {
                alert("您输入的手机号码格式不正确");
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
        }
        $(function(){
            new PCAS("prov", "city", "county", "省份", "地级市", "市、县级市、县");
        })
    </script>
</form>







<?php
    get_footer();
?>







