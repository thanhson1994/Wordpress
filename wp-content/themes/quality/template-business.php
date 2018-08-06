	<?php 
		// Template Name: Business Template
		
		get_header();
		get_template_part('index', 'static');	
		$quality_pro_options=theme_data_setup(); 
		$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options );
		do_action( 'quality_sections', false );		
		//****** get index service  *********/
		//****** get index Projects  *********/
		
		//****** get index Blog  *********/
		if (  $current_options['home_blog_enabled'] == true ) {
		get_template_part('index', 'blog');
		}
		get_footer();  
	?>
		