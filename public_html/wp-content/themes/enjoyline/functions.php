<?php
/**
 * enjoyline functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package enjoyline
 */

if ( ! function_exists( 'enjoyline_setup' ) ) :

function enjoyline_setup() {

	load_theme_textdomain( 'enjoyline', get_template_directory() . '/languages' );

	add_theme_support( "wp-block-styles" );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "align-wide" );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add theme support for Custom Logo.
	// Custom logo.
	$logo_width  = 300;
	$logo_height = 70;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	$args = array(
		'height'      => $logo_height,
		'width'       => $logo_width,
		'flex-height' => true,
		'flex-width'  => true,
	);

	add_theme_support('custom-logo', $args);
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'enjoyline' ),
		'footer' => esc_html__( 'Footer Menu', 'enjoyline' ),	
		'mobile' => esc_html__( 'Mobile Menu', 'enjoyline' ),			
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
	add_theme_support( 'custom-background', apply_filters( 'enjoyline_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_editor_style( array( 'assets/css/editor-style.css', '' ) ); 
}
endif;
add_action( 'after_setup_theme', 'enjoyline_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// Set content-width.
global $content_width;

if ( ! isset( $content_width ) ) {
	$content_width = 790;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function enjoyline_sidebar_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'enjoyline' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'enjoyline' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Sidebar (optional)', 'enjoyline' ),
		'id'            => 'home-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'enjoyline' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columns', 'enjoyline' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'enjoyline' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget ht_grid_1_4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );			

}
add_action( 'widgets_init', 'enjoyline_sidebar_init' );

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
 * SVG Icons.
 */
require get_template_directory() . '/inc/classes/class-enjoyline-svg-icons.php';

/**
 * Menu Walker.
 */
require get_template_directory() . '/inc/classes/class-enjoyline-walker-page.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load about page.
 */
require get_template_directory() . '/inc/about.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

/**
 * Enqueues scripts and styles.
 */
function enjoyline_scripts() {

    // load jquery if it isn't

    wp_enqueue_script('jquery');

    //  Enqueues Javascripts
    wp_enqueue_script( 'enjoyline-superfish', get_template_directory_uri() . '/assets/js/superfish.js', array(), '', true );
    wp_enqueue_script( 'enjoyline-html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );

	wp_enqueue_script( 'enjoyline-index', get_template_directory_uri() . '/assets/js/index.js', array(), '20221110', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '20221110', true );		
	wp_enqueue_script( 'enjoyline-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20221110', true );

    // Enqueues CSS styles
    wp_enqueue_style( 'enjoyline-fontawesome-style',   get_template_directory_uri() . '/assets/css/font-awesome.css' );
    wp_enqueue_style( 'enjoyline-genericons-style',   get_template_directory_uri() . '/genericons/genericons.css' );     
    wp_enqueue_style( 'enjoyline-style', get_stylesheet_uri(), array(), '20221110' );     
    wp_enqueue_style( 'enjoyline-responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20221110' ); 
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'enjoyline_scripts' );

/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'enjoyline_post_thumb', 300, 300, true ); 
}
