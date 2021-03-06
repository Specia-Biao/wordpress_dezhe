<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( '主菜单','twentyfifteen' ),
		'social'  => __( '手机菜单', 'twentyfifteen' ),
		'bottom'  => __( '底部菜单', 'twentyfifteen' ),
		'join'  => __( '加盟菜单', 'twentyfifteen' ),
		'service'  => __( '服务菜单', 'twentyfifteen' ),
		'history'  => __( '品牌菜单', 'twentyfifteen' ),
		'smallmenu'  => __( '首页菜单2', 'twentyfifteen' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Twenty Fifteen 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.

	/**
	 * Filter Twenty Fifteen custom-header support arguments.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-color     		Default color of the header.
	 *     @type string $default-attachment     Default attachment of the header.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

    //把相册改成图集
    remove_shortcode('gallery', 'gallery_shortcode');
    add_shortcode('gallery', 'produce_shortcode');

    //添加页面的摘要
	add_post_type_support('page', array('excerpt'));

	//给文章添加另一个编辑器-图集
	add_action( 'add_meta_boxes', 'theme_add_post_editor' );
	add_action('save_post', 'save_gallery');
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fifteen 1.7
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function twentyfifteen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyfifteen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyfifteen_resource_hints',10,2 );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';



class topnavurl{
    public $level;//菜单所在的层数
    public $pid;//父菜单的菜单id
    public $order;//排序序号
    public $type;//菜单所指向对象的类型
    public $item_id;//菜单所指向对象的id
	public $nav_id;//菜单的id
	public $nav_url;//菜单指向对象的url
	public $navname;//菜单所显示的标题
	public $nav_description;// 显示分类描述
	public $child_url=array();//子菜单
}
class childnavurl{
	public $level;
	public $pid;
	public $order;
	public $type;
	public $item_id;
	public $nav_id;
	public $nav_url;
	public $navname;
}

function getnavlist($nav){
	$newnav=array();
	$xml = simplexml_load_string($nav);
	$json = json_encode($xml);

	$json= str_replace("@attributes","attributes",$json);
	$jsons=json_decode($json);
//    print_r($json);
	$navlists=$jsons->ul->li;
	foreach ($navlists as $navlist){
		$item=new topnavurl();
		$item->nav_url=$navlist->a->attributes->href;
		$item->navname=$navlist->a->span;
		$c=array();
		$a=$navlist->ul->li;
		if(count($a)!=0){
			foreach ($a as $nitem){
				$j=new childnavurl();
				$j->nav_url=$nitem->a->attributes->href;
				$j->navname=$nitem->a->span;
				$c[]=$j;
			}
			$item->child_url=$c;
		}
		$newnav[]=$item;
	}
//    global $navset;
//    $navset=$newnav;
	return $newnav;
}
add_filter('wp_nav_menu','getnavlist');

function theme_nav_menu($nav_location){
    $nav_id= get_nav_menu_locations()[$nav_location];
    $nav_items=wp_get_nav_menu_items($nav_id);
    $maxlevel=0;
    $re1=array();
    $re_bylevel=array();
	foreach ($nav_items as $navitem){
		$item=new topnavurl();
		if($navitem->menu_item_parent==0){
			$item->level=0;
			$item->pid=0;
			$item->order=$navitem->menu_order;
			$item->type=$navitem->object;
			$item->item_id=$navitem->object_id;
			$item->nav_id=$navitem->ID;
			$item->nav_url=$navitem->url;
			$item->navname=$navitem->title;
			$item->nav_description=$navitem->description;
			$re1[$navitem->ID]=$item;
        }else{
			$parentitem=$navitem->menu_item_parent;
            $level=$re1[$parentitem]->level+1;
            if($level>$maxlevel){
	            $maxlevel=$level;
            }
			$item->level=$level;
			$item->pid=$parentitem;
			$item->order=$navitem->menu_order;
			$item->type=$navitem->object;
			$item->item_id=$navitem->object_id;
			$item->nav_id=$navitem->ID;
			$item->nav_url=$navitem->url;
			$item->navname=$navitem->title;
			$item->nav_description=$navitem->description;
			$re1[$navitem->ID]=$item;
        }
	}
    for($n=0;$n<($maxlevel+1);$n++){
	    $re_bylevel[$n]=array();
    }
    foreach ($re1 as $navitem){
        array_push($re_bylevel[$navitem->level],$navitem);
    }
    while($maxlevel>-1){
	    $level=$re_bylevel[$maxlevel];
        foreach ($level as $litem){
            $pid=$litem->pid;
            if($maxlevel!=0){
                foreach ($re_bylevel[$maxlevel-1] as $plitem){
                    if($plitem->nav_id==$pid){
                        array_push($plitem->child_url,$litem);
                    }else{
//		                    print_r($plitem->nav_id.":".$pid."<br>");
                    }
                }
            }

        }
	    $maxlevel--;
    }
    return $re_bylevel[0];
}
class galleryimg{
    public $ID;
    public $excerpt;
    public $url;
}
function produce_shortcode($attr){
	$s=$attr["ids"];
	$re=array();
	$imgids=explode(",",$s);
	foreach ($imgids as $imgid){
		$i=new galleryimg();
		$i->ID=$imgid;
		$img=get_post($imgid);
		$i->excerpt=$img->post_excerpt;
		$i->url=wp_get_attachment_image_src( $img->ID, 'full')[0];
		$re[]=$i;
	}
	global $gallery;
	$gallery=$re;
	return gallery_shortcode($attr);
}

/***************************************自己的设置***********************************************************/



/**
 * 添加另一个编辑器
*/
function theme_add_post_editor(){
	$screens = array( 'post' );
	foreach ($screens as $screen) {
		add_meta_box(
			'gallery',
			"图集",
			"theme_add_gallery_callback",
			"post",
			"advanced",
			"default");
	}
}
function theme_add_gallery_callback(){
	global $post;
	echo wp_editor(get_post_meta($post->ID, "gallery", true),  "gallery_editor", $settings = array('wpautop' =>  true,) );// wp_editor这个函数就是用来吧WordPress的编辑器输出出来的
}
function save_gallery($post_id){
	if ( 'post' == $_POST['post_type'] ) {
		$data= sanitize_text_field( $_POST['gallery_editor'] );;
		if(get_post_meta($post_id, "gallery") == "")

			add_post_meta($post_id, "gallery", $data, true);

        elseif($data != get_post_meta($post_id, "gallery", true))

			update_post_meta($post_id, "gallery", $data);

        elseif($data == "")

			delete_post_meta($post_id, "gallery", get_post_meta($post_id, "gallery", true));
	}else{
		return;
	}
}
function getsiteinfo(){
    global $wpdb;
	$info=$wpdb->get_results('SELECT * FROM wp_siteinfo;');
	$re=[];
	foreach ($info as $item){
	    $re[$item->key]=$item->value;
    }
	return $re;
}
function mget_categories($parent){
	global $wpdb;
	$cateid=$wpdb->get_results("SELECT * FROM wp_term_taxonomy where parent=$parent;");
	$re=array();
	foreach ($cateid as $id){
		$res=get_category($id->term_id);
		array_push($re,$res);
	}
	return $re;
}
function get_all_posts($cateid,$num){
	global $wpdb;
	$ccates=$wpdb->get_results("SELECT * FROM wp_term_taxonomy WHERE parent=$cateid");
	$query="SELECT distinct object_id FROM wp_term_relationships WHERE term_taxonomy_id=$cateid";
	foreach($ccates as $ccate){
		$query=$query." OR term_taxonomy_id=$ccate->term_id";
	}
	$query=$query." ORDER BY object_id";
	if($num!=null){
		$query=$query." LIMIT 0,$num";
	}
	$posts=$wpdb->get_results($query);
	$re=array();
	foreach ($posts as $post){
		$a=get_post($post->object_id);
		array_push($re,$a);
	}
	return $re;
}
function get_post_slug($slug){
	global $wpdb;
	$post=$wpdb->get_row("SELECT * FROM wp_posts WHERE post_name=\"$slug\" AND post_status=\"publish\"");
	return get_post($post->ID);
}






















