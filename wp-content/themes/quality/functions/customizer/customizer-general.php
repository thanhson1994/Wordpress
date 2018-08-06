<?php
function quality_general_customizer( $wp_customize ) {
	
	//Theme color
class WP_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>'.__('Theme Color','quality').'</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked="checked"'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="color_scheem_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-patterns/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  }
		  ?>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-quality_pro_options-webriti_stylesheet label img").click(function(){
					$("#customize-control-quality_pro_options-webriti_stylesheet label img").removeClass("color_scheem_active");
					$(this).addClass("color_scheem_active");
				});
			});
		  </script>
		  <?php
       }

}

/* General Section */
	$wp_customize->add_panel( 'general_options', array(
		'priority'       => 400,
		'capability'     => 'edit_theme_options',
		'title'      => __('General setting', 'quality'),
	) );
	
	
	$wp_customize->add_section( 'theme_color', array(
		'priority'       => 400,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Color', 'quality'),
		'panel'  => 'general_options',
	) );
	
	
	$wp_customize->add_setting(
	'quality_pro_options[style_sheet]', array(
        'default'        => 'default.css',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));
    
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'quality_pro_options[style_sheet]',
	array(
        'label'   => 'Theme Color Schemes',
        'section' => 'theme_color',
		'type' => 'radio',
		'choices' => array(
			'default.css' => 'blue.png',
			'red.css' => 'default.png',
    )
	)));
}

add_action( 'customize_register', 'quality_general_customizer' );
?>