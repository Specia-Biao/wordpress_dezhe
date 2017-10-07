
<div class="go-back-to">
	<a href="javascript:void(0);">
		<img src="<?php echo get_stylesheet_directory_uri();?>/static/images/sideicon5.png" alt="">回到顶部</a>
</div>
<ul class="floatBox">
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

<div class="fastLinkCon">
	<div class="wp1200 clearfloat">
		<div class="fastLinkOther">
			<a class="logo" href="/">
				<img src="<?php echo get_stylesheet_directory_uri();?>/static/images/logo.png"/> </a>
			<div class="share clearfloat">
				<a href="#" class="weibo"></a><a href="#" class="weixin por">
					<div class="ewm"></div>
				</a>
			</div>
			<div class="phone">
				<a href="tel:<?php echo get_post_meta("54","tel",true);?>"><?php echo get_post_meta("54","tel",true);?></a>
			</div>
		</div>
		<div class="fastLinkTb">
			<div class="tb">
				<?php
				$footer_menu=theme_nav_menu("bottom");
				if(!empty($footer_menu)):
					foreach ($footer_menu as $menu):
						?>
						<div class="td">
							<dl>
								<dt><a href="<?php echo $menu->m_url;?>"><?php echo $menu->navname;?></a></dt>
								<?php if (!empty($menu->child_url)):
									$footer_child_menu=$menu->child_url;
									foreach ($footer_child_menu as $footer_menu): ?>
										<dd><a href="<?php echo $footer_menu->m_url;?>"><?php echo $footer_menu->navname;?></a></dd>
									<?php endforeach;endif; ?>
							</dl>
						</div>
					<?php endforeach;endif; ?>
			</div>
		</div>
	</div>
</div>





<div class="footer">
	哲德有限公司保留所有版权©2016 <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo get_option( 'zh_cn_l10n_icp_num');?></a>
	<a title="" target="_blank" href="http://www.aite5.cn/">Design by 艾特沃</a>
</div>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/special/core.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/special/script.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/static/special/special.js"></script>

</body>
</html>

