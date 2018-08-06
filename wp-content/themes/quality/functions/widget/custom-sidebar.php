<?php	
add_action( 'widgets_init', 'quality_widgets_init');
function quality_widgets_init() {
		
/*sidebar*/
register_sidebar( array(
		'name' => __('Sidebar widget area', 'quality' ),
		'id' => 'sidebar-primary',
		'description' => __('Sidebar widget area', 'quality' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
register_sidebar( array(
		'name' => __('Footer widget area', 'quality' ),
		'id' => 'footer-widget-area',
		'description' => __('Footer widget area', 'quality' ),
		'before_widget' => '<div class="col-md-3"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
	'name' => __('WooCommerce sidebar widget area', 'quality' ),
	'id' => 'woocommerce',
	'description' => __( 'WooCommerce sidebar widget area', 'quality' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
	) );
}	                     
?>