<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 16:53
 */

get_header();

?>

<div class="insideBanner por" style="background-image: url(<?php echo "";?>);">
    <div class="insideBannerBg"></div>
    <div class="path wp1200 clearfloat">
        <div class="word">
            <div class="cn">门店查询</div>
            <div class="en font-baskvill">MAGASIN DE REQUÊTES</div>
        </div>
        <div class="bread">
            <a href="/">首页</a>
            >&nbsp;<a href="">司米服务</a>
            >&nbsp;<a href="">门店查询</a>

        </div>
    </div>
</div>

<div class="map-info-con">
    <div class="map-intro">
        <div class="wp1100 clearfloat">
            <div class="map-intro-word">
                <div class="cn">中国销售渠道-广东省</div>
                <div class="en font-baskvill">Les canaux de vente</div>
                <div class="p">司米为全球26个国家提供定制服务，目前中国拥有超过600家专卖店，平均两天就有一家专卖店盛大开启。</div>
                <div class="line"></div>
            </div>
            <div class="map-intro-area map-box" id="map">
                <div class="nmg" title="内蒙古自治区" data-id="4"></div>
                <div class="ah" title="安徽省" data-id="11"></div>
                <div class="gd" title="广东省" data-id="18"></div>
                <div class="gs" title="甘肃省" data-id="27"></div>
                <div class="gx" title="广西壮族自治区" data-id="19"></div>
                <div class="hainan" title="海南省" data-id="20"></div>
                <div class="hb" title="湖北省" data-id="16"></div>
                <div class="heb" title="河北省" data-id="2"></div>
                <div class="bj" title="北京市" data-id="0"></div>
                <div class="fj" title="福建省" data-id="12"></div>
                <div class="hen" title="河南省" data-id="15"></div>
                <div class="hlj" title="黑龙江省" data-id="7"></div>
                <div class="hun" title="湖南省" data-id="17"></div>
                <div class="jl" title="吉林省" data-id="6"></div>
                <div class="js" title="江苏省" data-id="9"></div>
                <div class="jx" title="江西省" data-id="13"></div>
                <div class="ln" title="辽宁省" data-id="5"></div>
                <div class="sc" title="四川省" data-id="22"></div>
                <div class="gz" title="贵州省" data-id="23"></div>
                <div class="chq" title="重庆市" data-id="21"></div>
                <div class="sd" title="山东省" data-id="14"></div>
                <div class="shx" title="陕西省" data-id="26"></div>
                <div class="nx" title="宁夏回族自治区" data-id="29"></div>
                <div class="sx" title="山西省" data-id="3"></div>
                <div class="tj" title="天津市" data-id="1"></div>
                <div class="tw" title="台湾省" data-id="33"></div>
                <div class="xj" title="新疆维吾尔自治区" data-id="30"></div>
                <div class="xz" title="西藏自治区" data-id="25"></div>
                <div class="qh" title="青海省" data-id="28"></div>
                <div class="yn" title="云南省" data-id="24"></div>
                <div class="zj" title="浙江省" data-id="10"></div>
                <div class="sh" title="上海市" data-id="8"></div>
            </div>
        </div>
        <div class="map-info-select wp1100">
            <form method="post" action="?ac=search&at=getcitydata" onsubmit="return check()">
                <input type="hidden" name="lng" value="cn"/>
                <input type="hidden" name="tid" value="37"/>
                <input type="hidden" name="mid" value="15"/>
                <div class="map-select-box">
                    <div class="map-select-wp">
                        <select name="prov" id="s1" ></select>
                    </div>
                    <div class="map-select-wp">
                        <select name="city" id="s2" ></select>
                    </div>
                    <div class="map-input-wp">
                        <input type="text" name="keyword" value="" placeholder="输入关键字" id="mapSearchText">
                        <div class="map-input-submit iconfont">
                            <input type="submit" name="submit" value="" id="mapSearchSubmit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="map-area-con wp1100 clearfloat">
        <div class="map-area-province iconfont" id="provinceName"></div>
        <div class="map-area-city" id="mapArea"></div>
    </div>
    <script src="<?php echo get_stylesheet_directory_uri();?>/static/js/area.js"></script>
    <script>
        function check() {
            var province = $('#s1').find(':selected').text();

            if(province=='省份'){
                alert('请选择省份');
                return false;
            }
        }

        $(function () {
            //加载下拉框省市
            new PCAS("prov", "city", "county", "省份", "地级市", "市、县级市、县");

            var provinceName = '安徽省'; // 程序输出默认省份
            var cityName = ''; // 程序输出默认城市，没有为空字符
            mapInit(provinceName, cityName); // 初始化地图
//			provinceSelectInit(); // 初始化省份选择

            getInfo(provinceName);

            //默认加载城市数据
            setAjax(provinceName);

            // 地图点击
            $('#map').children().click(function (e) {
                e.stopPropagation();
                var self = $(this),
                    name = self.attr('title'),
                    id = self.attr('data-id');

                self.addClass('on').siblings().removeClass('on');
                updateMapArea(name, '', id);
                setAjax(name);
            });

        });


        function getInfo(pro){
            //获取省份信息
            var data = '';
            $.get('index.php?ac=article&at=getpro',{ pro : pro },function(msg){
                $(msg).each(function(item,eval){
                    data += "<div class='cn'>中国销售渠道-"+eval.province+"</div><div class='en font-baskvill'>"+eval.title+"</div><div class='p'>"+eval.summary+"</div><div class='line'></div>";
                })
                if(data){
                    $('.map-intro-word').html(data);
                }else{
                    data = '<div class="cn">中国销售渠道-'+pro+'</div><div class="en font-baskvill">Les canaux de vente</div><div class="p">司米为全球26个国家提供定制服务，目前中国拥有超过600家专卖店，平均两天就有一家专卖店盛大开启。</div><div class="line"></div>';
                    $('.map-intro-word').html(data);
                }
            },'json');

        }

        /**
         * 发送ajax
         */
        function setAjax(pro,page,city){

            var page = arguments[1] ? arguments[1] : 1;
            var city = arguments[2] ? arguments[2] : '';

            getInfo(pro);
            $('.page a').off('click')
            $('#mapArea a').off('click')
            //定义变量
            var data = '';
            var pageN = '';
            var pageP = '';
            var pageNum = '';
            var prev = '';
            var next = '';
            var now = '';
            var pageArray = new Array();

            $.get('index.php?ac=article&at=getcitydata',{ pro : pro , page : page , city : city },function(msg){

                $(msg).each(function(item,eval){

                    pageArray = eval.pageArr;
                    prev = eval.prev;
                    next = eval.next;
                    now = eval.now;

                    data += "<li><a target='_blank' href='http://map.baidu.com/?newmap=1&ie=utf-8&s=s%26wd%3D"+eval.longtitle+"'><div class='info'><div class='t'>"+eval.title+"</div><div class='address'>"+eval.longtitle+"</div><div class='phone'>"+eval.phone+"</div></div><div class='look-map'><p>查看地图</p><i>carte</i></div><div class='line'></div></a><div class='shadow'></div></li>";
                })

                //将数据加载到页面中
                $('.map-area-list ul').html(data);
                if(data){
                    //加载分页数据
                    pageP = "<a id='prev' href='javascript:;' rel='"+prev+"'>上一页</a>";
                    for(var i=1; i<=pageArray.length;i++){
                        pageNum += "<a href='javascript:;' class='on"+i+"' rel='"+i+"'>"+i+"</a>";
                    }
                    pageN = "<a id='next' href='javascript:;' rel='"+next+"'>下一页</a>";
                    page = pageP+pageNum+pageN;
                    $('.paged').html(page);
                    $('.paged').attr('now',now);
                    var nowid = $('.paged').attr('now');
                    $('.paged').find('.on'+now).addClass('current');
                }else{
                    $('.paged').html('');
                }

                //点击分页事件
                $('.paged a').click(function(){
                    var page = $(this).attr('rel');
                    setAjax(pro,page,city);
                })

            },'json')

            //城市点击事件
            $('#mapArea a').click(function(){
                $(this).siblings('a').removeClass('on')
                $(this).addClass('on');
                var name = $(this).html();
                getInfo(pro);
                setAjax(pro,1,name)
            });

        }
    </script>
    <div class="map-area-list wp1100">
        <ul class="clearfloat">

            <!--<li>-->
            <!--<a href="#">-->
            <!--<div class="info">-->
            <!--<div class="t"></div>-->
            <!--<div class="address">广东省广州市天河区潭村马会家居二楼2607</div>-->
            <!--<div class="phone">020-38355050</div>-->
            <!--</div>-->
            <!--<div class="look-map">-->
            <!--<p>查看地图</p>-->
            <!--<i>carte</i>-->
            <!--</div>-->
            <!--<div class="line"></div>-->
            <!--</a>-->
            <!--<div class="shadow"></div>-->
            <!--</li>-->

        </ul>
        <div class="paged"></div>
    </div>
</div>
<script type="text/javascript" src="http://www.ssk.com.cn/templates/specialty/script/zt/city.js"></script>



<?php
    get_footer();
?>
