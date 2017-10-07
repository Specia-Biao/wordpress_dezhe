<!--手机-->
<div class="footer">
    <div class="iphone">
        <a href="tel:<?php echo get_post_meta("54","tel",true);?>">
            <span><?php echo get_post_meta("54","tel",true);?></span>
        </a>
    </div>
    <div class="link">
        <a href="" class="wb"></a>
        <a href="javascript:;" class="wx"></a>
    </div>
</div>
<div class="foot">
    ©<?php the_time("Y")?><a href=""><?php echo bloginfo("name");?></a> | <a title="" target="_blank" href="http://www.aite5.cn/"><span> Design by 艾特沃</span></a>
</div>
<!--手机-->


<!--手机端-->
<script  type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/core.js"></script>
<script  type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/js/script.js"></script>
<!--手机端-->

</body>
</html>

