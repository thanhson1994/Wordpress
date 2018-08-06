<?php function quality_archive_page_customizer( $wp_customize ) {

	$wp_customize->add_section(
        'breadcrumbs_setting',
        array(
            'title' => __('Archive page title','quality'),
            'description' =>'',
			'priority' => 1050,
			)
    );

	$wp_customize->add_setting(
    'archive_prefix',
    array(
        'default' => __('Archive','quality'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'quality_template_page_sanitize_text',
		)
	);	
	$wp_customize->add_control( 'archive_prefix',array(
    'label'   => __('Archive','quality'),
    'section' => 'breadcrumbs_setting',
	 'type' => 'text'
	));	
	
	$wp_customize->add_setting(
    'category_prefix',
    array(
        'default' => __('Category','quality'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'quality_template_page_sanitize_text',
		)
	);	
	$wp_customize->add_control( 'category_prefix',array(
    'label'   => __('Category','quality'),
    'section' => 'breadcrumbs_setting',
	 'type' => 'text'
	));

	$wp_customize->add_setting(
    'author_prefix',
    array(
        'default' => __('All posts by','quality'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'quality_template_page_sanitize_text',
		)
	);	
	$wp_customize->add_control( 'author_prefix',array(
    'label'   => __('Author','quality'),
    'section' => 'breadcrumbs_setting',
	 'type' => 'text'
	));
	
	$wp_customize->add_setting(
    'tag_prefix',
    array(
        'default' => __('Tag','quality'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'quality_template_page_sanitize_text',
		)
	);	
	$wp_customize->add_control( 'tag_prefix',array(
    'label'   => __('Tag','quality'),
    'section' => 'breadcrumbs_setting',
	 'type' => 'text'
	));
	
	
	$wp_customize->add_setting(
    'search_prefix',
    array(
        'default' => __('Search results for','quality'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'quality_template_page_sanitize_text',
		)
	);	
	$wp_customize->add_control( 'search_prefix',array(
    'label'   => __('Search','quality'),
    'section' => 'breadcrumbs_setting',
	 'type' => 'text'
	));
	
	$wp_customize->add_setting(
    '404_prefix',
    array(
        'default' => __('404','quality'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'quality_template_page_sanitize_text',
		)
	);	
	$wp_customize->add_control( '404_prefix',array(
    'label'   => __('404','quality'),
    'section' => 'breadcrumbs_setting',
	 'type' => 'text'
	));
	
	
	$wp_customize->add_setting(
    'shop_prefix',
    array(
        'default' => __('Shop','quality'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'quality_template_page_sanitize_text',
		)
	);	
	$wp_customize->add_control( 'shop_prefix',array(
    'label'   => __('Shop','quality'),
    'section' => 'breadcrumbs_setting',
	 'type' => 'text'
	));
}
add_action( 'customize_register', 'quality_archive_page_customizer' );

	function quality_template_page_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

	}



?>