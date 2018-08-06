<?php
//PRO Button

function quality_pro_customizer( $wp_customize ) {
class WP_PRO_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-box">
       <a href="<?php echo esc_url('http://webriti.com/quality/');?>" target="_blank" class="upgrade" id="review_pro"><?php _e('Upgrade to PRO','quality' ); ?></a>
		
	</div>
    <?php
    }
}
$wp_customize->add_section( 'quality_pro_section' , array(
		'title'      => __('Upgrade to PRO', 'quality'),
		'priority'   => 1100,
   	) );

$wp_customize->add_setting(
    'upgrade_pro',
    array(
       'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_PRO_Customize_Control( $wp_customize, 'upgrade_pro', array(
		'section' => 'quality_pro_section',
		'setting' => 'upgrade_pro',
    ))
);


//Mulitple Pages Link

class WP_multi_page_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	  <div class="pro-box">
     <a href="<?php echo esc_url('https://demo.webriti.com/?theme=Quality%20Pro');?>" target="_blank" class="multiple" id="review_pro"><?php _e( 'View PRO Demo','quality' ); ?></a>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'quality_multiple',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_multi_page_Customize_Control( $wp_customize, 'quality_multiple', array(	
		'section' => 'quality_pro_section',
		'setting' => 'quality_multiple',
    ))
);


class WP_Review_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	  <div class="pro-box">
     <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/quality#postform/');?>" target="_blank" class="review" id="review_pro"><?php _e('ADD YOUR REVIEW','quality' ); ?></a>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'pro_Review',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Review_Customize_Control( $wp_customize, 'pro_Review', array(	
		'section' => 'quality_pro_section',
		'setting' => 'pro_Review',
    ))
);





class WP_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/help/');?>" target="_blank" class="document" id="review_pro"><?php _e('DOCUMENTATION','quality' ); ?></a>
	 
	 <div>
	 <div class="pro-vesrion">
	 <?php _e("The PRO version gives you more opportunities to enhance your site and business. An effective online presence requires showcasing a company's products and services in the best possible way. Effectively engage your visitors with a Contact Us enquiry form or through an appealing About Us page, or introducing your Team Members, or your latest portfolio. The PRO version offers all this. Choose Quality PRO today and give your business the best!","quality");?>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review',
    array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_document_Customize_Control( $wp_customize, 'doc_Review', array(	
        'section' => 'quality_pro_section',
		'setting' => 'doc_Review',
    ))
);

}
add_action( 'customize_register', 'quality_pro_customizer' );
?>