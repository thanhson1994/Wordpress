<?php 
add_action( 'wp_enqueue_scripts', 'qualitygreen_enqueue_styles', 9999 );
function qualitygreen_enqueue_styles() {
    wp_enqueue_style('bootstrap', QUALITY_TEMPLATE_DIR_URI . '/css/bootstrap.css');
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style'));
	wp_enqueue_style('default-style-css', get_stylesheet_directory_uri()."/css/default.css" );
	wp_dequeue_style('default-css', QUALITY_TEMPLATE_DIR_URI . '/css/default.css');
	wp_enqueue_style('theme-menu', QUALITY_TEMPLATE_DIR_URI . '/css/theme-menu.css');
}

add_action( 'after_setup_theme', 'qualitygreen_setup' );
function qualitygreen_setup()
   	{	
		load_theme_textdomain( 'quality-green', get_stylesheet_directory() . '/languages' );
	}
?>