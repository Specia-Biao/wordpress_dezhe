<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 15:11
 *
 * Template Name:德哲世界
 *
 */

get_header();


$id=get_the_ID();

?>

<div class="about-index-main">
	<div class="about-index-main-title">
		<div class="cn"><?php the_title()?></div>
		<div class="en font-baskvill"><?php the_excerpt();?></div>
		<div class="s">
			<?php echo get_post($id)->post_content;?>
		</div>
	</div>
	<div class="wp1200 clearfloat">

        <?php
            $world_menus=theme_nav_menu("primary");
            foreach ($world_menus as $world_menu){
                if($world_menu->item_id==232){
                    $child_menus=$world_menu->child_url;
                }
            }
        ?>
		<a href="<?php echo $child_menus[0]->m_url;?>" class="about-index-big">
			<div class="img"><span style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/world_1.jpg)"></span></div>
			<div class="info">
				<div class="en font-baskvill"><?php echo get_post_meta("$id","en1",true);?></div>
				<div class="cn"><?php echo $child_menus[0]->navname;?></div>
				<div class="p"><?php echo get_post_meta("$id","content",true);?></div>
			</div>
		</a>
		<div class="about-index-small-box">
			<a href="<?php echo $child_menus[1]->m_url;?>" class="about-index-small clearfloat">
				<div class="img"><span style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/world_2.jpg)"></span></div>
				<div class="info">
					<div class="en font-baskvill"><?php echo get_post_meta("$id","en2",true);?></div>
					<div class="cn"><?php echo $child_menus[1]->navname;?></div>
				</div>
			</a>
			<a href="<?php echo $child_menus[2]->m_url;?>" class="about-index-small clearfloat">
				<div class="img"><span style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/static/upload/world_3.jpg)"></span></div>
				<div class="info">
					<div class="en font-baskvill"><?php echo get_post_meta("$id","en3",true);?></div>
					<div class="cn"><?php echo $child_menus[2]->navname;?></div>
				</div>
			</a>


		</div>
	</div>
</div>




<?php
get_footer();
?>






