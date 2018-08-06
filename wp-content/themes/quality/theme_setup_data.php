<?php
function theme_data_setup()
{	
	return $theme_options=array(
			//Logo and Fevicon header			
			'home_feature' => QUALITY_TEMPLATE_DIR_URI .'/images/slider/slide.jpg',
			'upload_image_logo'=>'',
			'height'=>'80',
			'width'=>'200',
			'text_title'=>false,
			'upload_image_favicon'=>'',
			'style_sheet' => 'default.css',
			
			/* Home Image */
			'home_image_title' => __('Elegant design','quality'),
			'home_image_sub_title' => __('Welcome to Quality theme','quality'),
			'home_image_description' => __('Create beautiful websites, 100% responsive and easy to customize.','quality'),
			'home_image_button_text' => __('Get this theme','quality'),
			'home_image_button_link' => '#',

			'service_title'=> __('Our awesome services','quality'),
			'service_description' => 'Lorem Ipsum which looks reason able. The generated Lorem Ipsum is therefore always free.',
			
			'service_enable' => true,
			'service_one_title' => __('Beautiful Design','quality'),
			'service_two_title' => __('Global Customer Base','quality'),
			'service_three_title' => __('Friendly Support','quality'),
			'service_four_title' => __('A great value','quality'),
			
			'service_one_icon' => 'fa fa-shield',
			'service_two_icon' => 'fa fa-tablet',
			'service_three_icon' => 'fa fa-edit',
			'service_four_icon' => 'fa fa-star-half-o',
			
			'service_one_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'service_two_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'service_three_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'service_four_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			//Projects Section Settings
			'home_projects_enabled' => true,
			'project_heading_one' => __('Featured portfolio projects','quality'),
			'project_tagline' => __('Most popular of our works.','quality'),
			
			'project_one_thumb' => QUALITY_TEMPLATE_DIR_URI .'/images/project_thumb.png',
			'project_one_title' => __('Business cards','quality'),
			
		    'project_two_thumb' => QUALITY_TEMPLATE_DIR_URI .'/images/project_thumb1.png',
			'project_two_title' => __('Business cards','quality'),
			
			'project_three_thumb' => QUALITY_TEMPLATE_DIR_URI .'/images/project_thumb2.png',
			'project_three_title' => __('Business cards','quality'),
			
			'project_four_thumb' => QUALITY_TEMPLATE_DIR_URI .'/images/project_thumb3.png',
			'project_four_title' => __('Business cards','quality'),
			
			//BLOG
			'home_blog_enabled' => true,
			'blog_heading' => __('Our latest blog posts','quality'),
			'home_blog_description' => __('News <b>And</b> Updates','quality'),
			'home_meta_section_settings' => false,
			
			//Custom css
			'webrit_custom_css'=>'',						
			//Footer Customization
			'footer_copyright_text' => '<p>©2018 All Rights Reserved - Webriti. Designed and Developed by<a href="https://www.webriti.com/" target="_blank"> Webriti</a></p>',
		);
}
?>