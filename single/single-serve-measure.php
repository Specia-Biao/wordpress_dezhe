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
?>
<div class="service-free-banner">
    <div class="service-free-bg" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/serve_measure.jpg)">
        <div class="service-free-article">
            <?php
                   echo get_post($id)->post_content;
            ?>
        </div>
    </div>
    <div class="service-free-footer">
        <div class="wp1200 clearfloat por">
            <div class="img"><img src="<?php echo get_stylesheet_directory_uri();?>/static/images/icon2.png" alt=""></div>
            <div class="footerForm clearfloat">
                <script type="text/javascript">
                    function footappform(seccodetype) {
                        var linkm = $('input[name=linkm]').val();
                        var linkp = $('input[name=linkp]').val();
                        var prova = $('select[name=prova] :selected').val();
                        var citya = $('select[name=citya] :selected').val();
                        if (document.footapp.linkp.value==""){
                            document.footapp.linkp.focus();
                            alert('联系电话输入错误，请返回重新输入');
                            return false;
                        }
                        if (document.footapp.linkm.value == '') {
                            document.footapp.linkm.focus();
                            alert('联系人输入错误，请返回重新输入');
                            return false;
                        }
                        if (document.footapp.citya.value == '') {
                            document.footapp.citya.focus();
                            alert('城市输入错误，请返回重新输入');
                            return false;
                        }
                        var id="<?php echo $id;?>";
                        $.post("wp-comments-post.php",
                            {
                                author:linkm,
                                comment:"联系人："+linkm+"/"+
                                "联系电话:"+linkp+" /"+
                                "省份:"+prova+" /"+
                                "城市:"+citya+" /",
                                comment_post_ID:id,
                                comment_parent:0,
                            },
                            function(data,status){
                                alert("提交成功");
                            });
                    }
                </script>
                <form name="footapp" id="footapp" method="post" action="" onSubmit="return footappform('0')">
                    <input type="hidden" name="linkurl" value="add"/>
                    <input type="hidden" name="fgid" id="fgid" value="3"/>
                    <input type="hidden" name="formcode" id="formcode" value="footapp"/>
                    <input type="hidden" name="did" id="did" value="0"/>
                    <input type="hidden" name="tokenkey" value="73003d049c6e90bc0b7025984fcecca4"/>
                    <div class="input">
                        <input type="text" name="linkm" value="" placeholder="联系人">
                    </div>
                    <div class="input">
                        <input type="text" name="linkp" value="" placeholder="联系电话">
                    </div>
                    <div class="input">
                        <select name="prova" id="s1" class="bottomSelect"></select>
                    </div>
                    <div class="input">
                        <select name="citya" id="s2" class="bottomSelect"></select>
                    </div>
                    <div class="input" style="display: none">
                        <select name="countya" id="s3" class="bottomSelect"></select>
                    </div>
                    <input type="submit" name="submit" value="提交">
                </form>

            </div>
        </div>
    </div>
</div>

<ul class="service-free-floatbox">
	<?php
	$services=theme_nav_menu("service");
	foreach ($services as $skey=>$service){ ?>
        <li>
            <a href="<?php echo $service->m_url;?>" title="<?php echo $service->navname;?>">
                <img src="<?php echo get_stylesheet_directory_uri();?>/static/images/<?php echo "float".++$skey.".png";?>" alt="">
            </a>
        </li>
	<?php  } ?>
</ul>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/zt/city.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/core.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/script.js"></script>
<script>
    $(function () {
        new PCAS("prova", "citya", "countya", "省份", "城市", "区/县");
    })
</script>










