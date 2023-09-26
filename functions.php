<?php
/**
 * themetask functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themetask
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function themetask_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on themetask, use a find and replace
		* to change 'themetask' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'themetask', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails',array('post','page','service'));

	// This theme uses wp_nav_menu() in one location.

	add_theme_support('menus');

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary','themetask' ),
		)
	);

	function add_class_li($classes,$item,$args){
		if(isset($args->li_class)){
			$classes[] = $args->li_class;
		}
		return $classes;
		if(isset($args->active_class) && in_array('current-menu-item',$classes)){
			$classes[]= $args->active_class;
		}
	}

	add_filter('nav_menu_css_class','add_class_li',10,3);

	function add_anchor_class($attr,$item,$args){
		if(isset($args->a_class)){
			$attr['class'] = $args->a_class;
		}
		return $attr;
	}

	add_filter('nav_menu_link_attributes','add_anchor_class',10,3);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'themetask_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themetask_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'themetask_content_width', 640 );
}
add_action( 'after_setup_theme', 'themetask_content_width', 0 );

/** this Function use for read more button **/
function anik_excerpt_more($more){
	global $post;
	return '<br> <br> <a href="'. get_permalink( $post->ID) .'" class="read-button">'.'Read More'.'</a>';
}

add_filter('excerpt_more','anik_excerpt_more',10);
/** this is use for excerpt word length **/
function anik_excerpt_length($length){
	return 20;
}

add_filter('excerpt_length','anik_excerpt_length',20);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themetask_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'themetask' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'themetask' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'themetask_widgets_init' );

/** Custom service post functionality **/
function custom_post(){
	register_post_type(
		'custom_post',
		array(
			'labels' => array(
			'name'=>esc_html__('Custom Post','tasktheme'),
			'singular_name' => ('Custom Post'),
			'add_new' => ('Add New Post'),
			'add_new_item' => ('Add New Post'),
			'edit_item' => ('Edit Post'),
			'new_item' => ('New Post'),
			'view_item' => ('View Post'),
			'not found' => ('Sorry,We couldn\t find the service you looking for'),
			),
			'menu_icon' => 'dashicons-align-left',
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'menu_position' => 5,
			'has_archive' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'rewrite' => array('slug' => 'custom_post'),
			'supports' => array('title','thumbnail','editor','excerpt'),
		),

		add_theme_support('post-thumbnails'),
	);
}

add_action('init','custom_post');

// pagination or page navigation
function anik_page_nav(){
    global $wp_query,$wp_rewrite;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if(!$current=get_query_var('paged')) $current = 1;
    $args['base'] = str_replace(90, '%#%' , get_pagenum_link(90)); //get_pagenum_link and replace value must be same otherwise function data cannot be fount.
    // $args['base'] = $wp_rewrite->pagination_base . '/%#%';
    $args['current'] = $current;
    $total = 1;
    $args['prev_text'] = 'Prev';
    $args['next_text'] = 'Next';
    if($max > 1) echo '</pre>
    <div class="wp_pagenav">';
    if($total == 1 && $max > 1) $pages = '<p class="pages"> Page ' . $current .'<span> of </span>' . $max .'</p>';
    echo $pages . paginate_links($args);
    if($max>1) echo '</div><pre>';
 }

/**
 * Enqueue scripts and styles.
 */
function themetask_scripts() {
	/** enqueue style.css file **/
	wp_enqueue_style( 'themetask-style', get_stylesheet_uri(), array(), _S_VERSION );
	//wp_style_add_data( 'themetask-style', 'rtl', 'replace' );

	/** font awosome icons enqueue **/
	wp_enqueue_style('fontawosome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css',false);

	/** enqueue google font **/
	wp_enqueue_style('themetask_rubik_goole_font','https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800&display=swap',false);

	/** enqueu bootstrap.min.css file **/
	wp_register_style('bootstrap',get_template_directory_uri().'/assests/bootstrap/css/bootstrap.min.css',array(),'5.3.2','all');
	wp_enqueue_style('bootstrap');

	/** enqueue jquery file **/
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'themetask-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	/** enqueue bootstrap js file **/
	wp_enqueue_script('bootstrap',get_template_directory_uri() . '/assests/bootstrap/js/bootstrap.min.js',array(),'5.3.2',true);

	


	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'themetask_scripts' );



/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

