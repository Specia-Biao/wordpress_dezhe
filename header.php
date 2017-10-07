<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Language" content="zh-CN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta name="copyright" content="">
    <meta name="Author" content="">
    <meta name="Robots" content="all">
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="renderer" content="webkit">
    <title><?php echo get_blogInfo( "name" ); ?></title>
    <link id="cores" href='<?php echo get_template_directory_uri(); ?>/static/style/core.css' rel='stylesheet' type='text/css'/>
    <link id="links" href='<?php echo get_template_directory_uri(); ?>/static/style/style.css' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/static/js/jquery.js"></script>
</head>



<body>

<!--手机导航-->
<div class="iphone-nav" id="wrapper1">
    <div id="scroller">
        <!--有二级菜单的，需要给li标签加类名li-->
        <ul>
            <?php
            $main_menu=theme_nav_menu("primary");
            if(!empty($main_menu)): ?>
                <?php foreach ($main_menu as $menuKey=>$menu):?>
                    <?php if($menuKey==0):?>
                        <li>
                            <div class="a"><a href="<?php echo $menu->nav_url;?>"><span><?php echo $menu->navname;?></span></a><i></i></div>
                        </li>
                    <?php else:?>
                        <li class="li">
                            <div class="a">
                                <a href="<?php echo $menu->nav_url;?>"><span><?php echo $menu->navname;?></span></a><i></i>
                            </div>
                            <ul class="two">
                                <?php
                                if(!(empty($menu->child_url))):
                                    $child_menu=$menu->child_url;
                                    foreach ($child_menu as $c_key=>$c_menu):?>
                                        <li><a href="<?php echo $c_menu->nav_url;?>"><span><?php echo $c_menu->navname;?></span></a></li>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </ul>
                        </li>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
        </ul>
    </div>
</div>
<div class="bg-1"></div>