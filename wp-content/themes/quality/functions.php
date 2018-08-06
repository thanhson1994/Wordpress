<?php
  /**Theme Name	: Quality
   * Theme Core Functions and Codes
  */	
  	/**Includes reqired resources here**/
  	define('QUALITY_TEMPLATE_DIR_URI',get_template_directory_uri());	
  	define('QUALITY_TEMPLATE_DIR',get_template_directory());
  	define('QUALITY_THEME_FUNCTIONS_PATH',QUALITY_TEMPLATE_DIR.'/functions');	
  	define('QUALITY_THEME_OPTIONS_PATH',QUALITY_TEMPLATE_DIR_URI.'/functions/theme_options');
  
	require( QUALITY_THEME_FUNCTIONS_PATH . '/menu/new_Walker.php'); //NEW Walker Class Added.  
	require( QUALITY_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');
	
  	require_once( QUALITY_THEME_FUNCTIONS_PATH . '/scripts/scripts.php');     //Theme Scripts And Styles	
  		
	require( QUALITY_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php'); //Comment Handling
  	require( QUALITY_THEME_FUNCTIONS_PATH . '/widget/custom-sidebar.php'); //Sidebar Registration
	
	//Customizer
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-general.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-slider.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-home.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-blog.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-archive.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer_import_data.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/font/font.php');
	require( QUALITY_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
	
	//Alpha Color Control
	require( QUALITY_THEME_FUNCTIONS_PATH . '/customizer/customizer-alpha-color-picker/class-quality-customize-alpha-color-control.php');
	
	require( QUALITY_THEME_FUNCTIONS_PATH . '/template-tags.php');
	
	$repeater_path = trailingslashit( get_template_directory() ) . '/functions/customizer-repeater/functions.php';
	if ( file_exists( $repeater_path ) ) {
	require_once( $repeater_path );
	}

	//wp title tag starts here
  	function quality_head( $title, $sep )
  	{	global $paged, $page;		
  		if ( is_feed() )
  			return $title;
  		// Add the site name.
  		$title .= get_bloginfo( 'name' );
  		// Add the site description for the home/front page.
  		$site_description = get_bloginfo( 'description' );
  		if ( $site_description && ( is_home() || is_front_page() ) )
  			$title = "$title $sep $site_description";
  		// Add a page number if necessary.
  		if ( $paged >= 2 || $page >= 2 )
  			$title = "$title $sep " . sprintf( _e( 'Page', 'quality' ), max( $paged, $page ) );
  		return $title;
  	}	
  	add_filter( 'wp_title', 'quality_head', 10, 2);
  	
  	add_action( 'after_setup_theme', 'quality_setup' ); 	
  	function quality_setup()
  	{	
		//content width
		if ( ! isset( $content_width ) ) $content_width = 700;//In PX
		// Load text domain for translation-ready
  		load_theme_textdomain( 'quality', QUALITY_THEME_FUNCTIONS_PATH . '/lang' );
  		add_theme_support( 'post-thumbnails' ); //supports featured image
  		// This theme uses wp_nav_menu() in one location.
  		register_nav_menu( 'primary', __( 'Primary Menu', 'quality' ) ); //Navigation
  		// theme support 	
  		add_theme_support( 'automatic-feed-links');
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		//Title tag
		add_theme_support( "title-tag" );
		
		// woocommerce support
		add_theme_support( 'woocommerce' );
  		
  		require_once('theme_setup_data.php');
  		// setup admin pannel defual data for index page		
  		$quality_pro_options=theme_data_setup();

	if ( is_admin() ) {

        require( QUALITY_THEME_FUNCTIONS_PATH . '/quality-info/welcome-screen.php');
	}

		
  	}
  	// Read more tag to formatting in blog page 
  	function quality_new_content_more($more)
	{  global $post;
		return '<p><a href="' . get_permalink() . "#more-{$post->ID}\" class=\"more-link\">" .__('Read More','quality')."</a></p>";
	}
	add_filter( 'the_content_more_link', 'quality_new_content_more' );
	
	
	
	
	add_filter( "the_excerpt", "quality_add_class_to_excerpt" );
	function quality_add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="qua-blog-post-description"', $excerpt);
	}
	
	add_action( 'admin_init', 'quality_detect_button' );
	function quality_detect_button() {
	wp_enqueue_style( 'quality-info-button', get_template_directory_uri() . '/css/import-button.css' );
	}
	
	
	function quality_theme_plugin_notify() {
   ?>
               <div class="notice-warning notice is-dismissible">
               <p><b><?php echo sprintf( esc_html__( "Important Notice: We hope you are enjoying this theme, and we thank you for updating it. Please install our Webriti Companion plugin to manage your Services/Projects sections. Don't worry, nothing is lost, just install the Companion Plugin. Go to the Customizer and install the Webriti Companion plugin from there.", 'quality' ) ); ?></b></p>
                <p><a href="<?php echo esc_url( admin_url( '/customize.php' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Go To Customizer', 'quality' ); ?></a></p>
            </div>
		
   <?php
	}
	$old_theme = get_option( 'quality_pro_options');
	if($old_theme!='')
	{
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( is_plugin_active( 'webriti-companion/webriti-companion.php' ) ) {}	else{	
	add_action( 'admin_notices', 'quality_theme_plugin_notify' );

	}
	}
the_tags();	
?>