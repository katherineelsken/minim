<?php
/**
 * minim functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package minim
 */

if ( ! function_exists( 'minim_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function minim_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on minim, use a find and replace
	 * to change 'minim' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'minim', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'minim' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'minim_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'minim_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minim_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'minim_content_width', 640 );
}
add_action( 'after_setup_theme', 'minim_content_width', 0 );

/**
 * Register widget areas.
 *
 */
function minim_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'minim' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'minim' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => 'Home Widget 1',
		'id'            => 'home-1',
		'before_widget' => '<div class="home-widget-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	
		register_sidebar( array(
		'name'          => 'Home Widget 2',
		'id'            => 'home-2',
		'before_widget' => '<div class="wrap"><div class="home-widget-2">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	
		register_sidebar( array(
		'name'          => 'Footer Widget 1',
		'id'            => 'footer-widget-1',
		'before_widget' => '<div class="footer-widgets-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	
		register_sidebar( array(
		'name'          => 'Footer Widget 2',
		'id'            => 'footer-widget-2',
		'before_widget' => '<div class="footer-widgets-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	
		register_sidebar( array(
		'name'          => 'Footer Widget 3',
		'id'            => 'footer-widget-3',
		'before_widget' => '<div class="footer-widgets-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'minim_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function minim_scripts() {
	wp_enqueue_style( 'minim-style', get_stylesheet_uri() );

	wp_enqueue_script( 'minim-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'minim-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'minim_scripts' );

//Make the tag cloud uniform
function custom_tag_cloud_widget($args) {
	$args['largest'] = 16; //largest tag
	$args['smallest'] = 16; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['number'] = 10; //adding a 0 will display all tags

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );


//Pagination
function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}


//Soliloquy Slider defaults
add_filter( 'soliloquy_defaults', 'minim_soliloquy_default_settings', 20, 2 );
function minim_soliloquy_default_settings( $defaults, $post_id ) {
     
    $defaults['slider_width']  = 2000; // Slider width.
    $defaults['slider_height'] = 600; // Slider height.
     
    return $defaults;
     
}



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
 * Customizer CSS output.
 */
require get_template_directory() . '/inc/output.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
