<?php
/**
 * Rico-Amber functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rico-Amber
 */

global $pageCountNumber;
global $ricoCount;
$ricoCount = 0;

class Rico_Nav_List extends Walker_Nav_Menu
{

	function start_lvl( &$output, $depth = 0, $args = array() )
    {
        $output .= "\n$indent<ul>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() )
    {
        $output .= "$indent</ul>\n";


    }

    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 )
    {
    	global $post;
		global $ricoCount;
    	$output .= "<li>\n";
    	$page = get_page_by_title($object->title);
    	$pageID = get_post_meta($page->ID, 'idName', true);
    	// $output .= sprintf("<div id='%s' class='nav-color'>\n", $pageID);
    	$output .= sprintf("<div id='nav-count-%s' class='nav-color'>\n", $ricoCount );
    	$output .= "</div>";
    	$output .= sprintf("<a href='%s'>%s", $object->url, $object->title);
	    $ricoCount++;

    }

	function end_el( &$output, $object, $depth = 0, $args = array() )
	{
		$output .= "</a></li>";
	}
}


function sb_scroller_scripts() {
    wp_enqueue_script( 'jquery' );
	wp_register_script( 'jqueryui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js');
    wp_enqueue_script( 'jqueryui' );
    wp_enqueue_script('jquery-effects-drop');
    wp_enqueue_script('jquery-effects-slide');
    wp_enqueue_script('jquery-effects-fade');
    wp_register_script('rico-amber-script', get_template_directory_uri().'/js/rico-amber.js',array('jquery', 'jqueryui'), true);
    wp_enqueue_script('rico-amber-script');
    wp_enqueue_script('countUp', get_template_directory_uri().'/js/countUp.js', false);
    wp_register_script('countUp');
    wp_enqueue_script('countUpJquery,', get_template_directory_uri().'/js/countUp-jquery.js', false);
    wp_register_script('countUpJquery');
    wp_register_script('slick', get_template_directory_uri().'/js/slick.min.js', true);
    wp_enqueue_script('slick');
	wp_register_script('circles', get_template_directory_uri().'/js/circles.js', true);
    wp_enqueue_script('circles');


}

add_action('wp_enqueue_scripts', 'sb_scroller_scripts');


if ( ! function_exists( 'rico_amber_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


function rico_amber_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Rico-Amber, use a find and replace
	 * to change 'rico-amber' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rico-amber', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'rico-amber' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rico_amber_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	add_image_size('portfolio-scroller', 290, 290, true);
	add_image_size('blog-posts', 290, 220, true);
}

endif;
add_action( 'after_setup_theme', 'rico_amber_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rico_amber_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rico_amber_content_width', 640 );
}


add_action( 'after_setup_theme', 'rico_amber_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rico_amber_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rico-amber' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rico-amber' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	$args = array(
		'name'          => __( ' Social-Icons' ),
		'id'            => 'social_icons',
		// 'description'   => '',
		'class'         => 'social-widget',
		'before_widget' => '<div id="social-footer" class="social-footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="Follow Us">',
		'after_title'   => '</h2>'
	);

	register_sidebar( $args );


	$postsArgs = array(
		'name'              => __( 'Current-Posts' ),
		'id'                => 'current_posts',
		'class'             => 'posts-widget',
		'before_widget'     => '<div id="currentPosts" class="currentPosts-widget">',
		'after_widget'      => '</div>',
		'before_title'      => '<h2 class="Recent Posts">',
		'after_title'       => '</h2>'
	);

	register_sidebar($postsArgs);
}
add_action( 'widgets_init', 'rico_amber_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rico_amber_scripts() {
	wp_enqueue_style( 'rico-amber-style', get_stylesheet_uri() );

	wp_enqueue_script( 'rico-amber-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rico-amber-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rico_amber_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function company_features_init(){
	$args = array(
		'label' => 'Company Features',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'company-features'),
		'query_var' => true,
		'menu_icon' => 'dashicons-grid-view',
		'supports' => array(
			'categories',
			'title',
			'editor',
			'excerpt',
			'trackbacks',
			'custom-fields',
//			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes',)
	);
	register_post_type('company-features', $args );
}
add_action('init', 'company_features_init');

function section_titles_init(){
	$args = array(
		'label' => 'Page Section Titles',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'section-titles'),
		'query_var' => true,
		'menu_icon' => 'dashicons-editor-ul',
		'supports' => array(
			'categories',
			'title',
			'editor',
			//'excerpt',
			//'trackbacks',
			'custom-fields',
			//'comments',
			'revisions',
			//'thumbnail',
			//'author',
			//'page-attributes',
			)
	);
	register_post_type('section-titles', $args );
}
add_action('init', 'section_titles_init');

function header_images_init(){
	$args = array(
		'label' => 'Header Images',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'header-images'),
		'query_var' => true,
		'menu_icon' => 'dashicons-format-gallery',
		'supports' => array(
			'categories',
			'title',
			'editor',
			'excerpt',
			//'trackbacks',
			'custom-fields',
			//'comments',
			'revisions',
			'thumbnail',
			//'author',
			//'page-attributes',
		)
	);
	register_post_type('header_images', $args );
}
add_action('init', 'header_images_init');
/**
 *
 */


function pw_show_gallery_image_urls(  ) {

	global $post;

	// Only do this on singular items
	// if( ! is_singular() )
	// 	return $content;
	//
	// // Make sure the post has a gallery in it
	// if( ! has_shortcode( $post->post_content, 'gallery' ) )
	// 	return $content;

	// Retrieve the first gallery in the post
	$gallery = get_post_gallery_images( $post );

	$image_list = '<div class="header-scroll">';

	// Loop through each image in each gallery
	foreach( $gallery as $image_url ) {

		$image_list .= '<div>' . '<img src="' . $image_url . '">' . '</div>';

	}

	$image_list .= '</div>';

	// Append our image list to the content of our post
	

	return $image_list;

}
add_filter( 'the_content', 'pw_show_gallery_image_urls' );

