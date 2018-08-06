<?php
function quality_scripts()
{	
	$quality_pro_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options );
	
	wp_enqueue_style('bootstrap', QUALITY_TEMPLATE_DIR_URI . '/css/bootstrap.css');
	wp_enqueue_style('quality-style', get_stylesheet_uri() );
	
	
	if(get_option('quality_pro_options')!='')
	{
	$class=$current_options['style_sheet'];
	wp_enqueue_style('default', QUALITY_TEMPLATE_DIR_URI . '/css/'.$class);
	}
	else
	{
	wp_enqueue_style('quality-default', QUALITY_TEMPLATE_DIR_URI . '/css/default.css');
	}
	
	wp_enqueue_style('theme-menu', QUALITY_TEMPLATE_DIR_URI . '/css/theme-menu.css');
	wp_enqueue_style('font-awesome-min', QUALITY_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');
	wp_enqueue_script('bootstrap', QUALITY_TEMPLATE_DIR_URI .'/js/bootstrap.min.js',array('jquery'));
	wp_enqueue_script('menu', QUALITY_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
	wp_enqueue_style('lightbox-css', QUALITY_TEMPLATE_DIR_URI . '/css/lightbox.css');
	wp_enqueue_script('lightbox', QUALITY_TEMPLATE_DIR_URI .'/js/lightbox/lightbox-2.6.min.js');
	
		
}
add_action('wp_enqueue_scripts', 'quality_scripts');

if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}

function quality_custom_enqueue_css()
{	global $pagenow;
	if ( in_array( $pagenow, array( 'post.php', 'post-new.php', 'page-new.php', 'page.php' ) ) ) {
		wp_enqueue_style('meta-box-css', QUALITY_TEMPLATE_DIR_URI . '/css/meta-box.css');	
	}	
}
add_action( 'admin_print_styles', 'quality_custom_enqueue_css', 10 );

function quality_custmizer_style()
 {
		wp_enqueue_style('quality-customizer-css',QUALITY_TEMPLATE_DIR_URI.'/css/cust-style.css');
}
add_action('customize_controls_print_styles','quality_custmizer_style');
add_action('wp_head','head_enqueue_custom_css');
function head_enqueue_custom_css()
{
	$quality_pro_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); 
	if($current_options['webrit_custom_css']!='') {  ?>
	<style>
	<?php echo $current_options['webrit_custom_css']; ?>
	</style>
<?php } } ?>