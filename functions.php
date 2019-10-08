<?php
/**
 * Buildx functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Buildx
 * @since 1.0.0
 */

// requiring customizer file
require get_template_directory() . '/assets/customizer.php';
require get_template_directory() . '/assets/display-comments.php';
require get_template_directory() . '/assets/custom-functions.php';

// set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) $content_width = 1140;

// including stylesheet and script file
function buildx_load_scripts(){
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap/bootstrap.min.css', array(), '4.3.1', 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/fontawesome/all.min.css', array(), '5.9.0', 'all' );
	wp_enqueue_style( 'buildx-template', get_template_directory_uri().'/assets/css/template.css', array(), '1.1.6', 'all' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
	wp_enqueue_script( 'fitvids-js', get_template_directory_uri().'/assets/js/fitvids.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'buildx_load_scripts' );

function buildx_editor_style(){
	wp_enqueue_style( 'gutenberg-editor-style', get_template_directory_uri().'/assets/css/editor-style.css');
}
add_action( 'enqueue_block_assets', 'buildx_editor_style' );

// configuration function
function buildx_config(){

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'buildx' ),
			'footer_menu' => __( 'Footer Menu', 'buildx' ),
		)
	);

	$args = array(
		'height'      => 75,
		'width'      => 75,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' )
	);
	add_theme_support( 'custom-logo', $args);
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "custom-background", $args );

	add_image_size( 'buildx-blog-image', 730, 410, true );

	load_theme_textdomain( 'buildx', get_template_directory() . '/assets/languages' );

}
add_action( 'after_setup_theme', 'buildx_config', 0 );


// replaces the excerpt "[...]" to be "..."
function buildx_excerpt_more() {
	return esc_html__( '...', 'buildx' );
}
add_filter( 'excerpt_more', 'buildx_excerpt_more' );

// registering sidebar
function buildx_sidebar(){

	register_sidebar(
		array(
			'name' => esc_html__( 'Sidebar', 'buildx' ),
			'id' => 'sidebar-area',
			'description' => esc_html__( 'This is the blog sidebar. You can add your widgets here', 'buildx' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__( 'Footer Widget 1', 'buildx' ),
			'id' => 'footer-item-1',
			'description' => esc_html__( 'First Footer Area', 'buildx' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__( 'Footer Widget 2', 'buildx' ),
			'id' => 'footer-item-2',
			'description' => esc_html__( 'Second Footer Widget Area', 'buildx' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__( 'Footer Widget 3', 'buildx' ),
			'id' => 'footer-item-3',
			'description' => esc_html__( 'Third Footer Widget Area', 'buildx' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__( 'Footer Widget 4', 'buildx' ),
			'id' => 'footer-item-4',
			'description' => esc_html__( 'Fourth Footer Widget Area', 'buildx' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		)
	);

}
add_action('widgets_init', 'buildx_sidebar');

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function buildx_search_form() {
	$form = '<form role="search" method="get" class="form-inline" action="'.esc_url( home_url( '/' ) ).'">
				<div class="input-group">
					<input type="search" class="form-control" placeholder="'.esc_attr_x( 'Search here', 'placeholder', 'buildx' ).'" value="'.get_search_query().'" name="s">
					<div class="input-group-append">
						<button class="btn" type="submit"><span class="fas fa-search"></span></button>
					</div>
				</div>
			</form>';

	return $form;
}
add_filter( 'get_search_form', 'buildx_search_form' );