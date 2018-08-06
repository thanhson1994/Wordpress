<?php
/**
 * Welcome Screen Class
 */
class quality_screen {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'quality_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'quality_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'quality_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'quality_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'quality_info_screen', array( $this, 'quality_getting_started' ), 	    10 );
		//add_action( 'quality_info_screen', array( $this, 'quality_action_required' ), 	    20 );
		add_action( 'quality_info_screen', array( $this, 'quality_child_themes' ), 		    30 );
		add_action( 'quality_info_screen', array( $this, 'quality_github' ), 		            40 );
		add_action( 'quality_info_screen', array( $this, 'quality_welcome_free_pro' ), 				50 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_quality_dismiss_required_action', array( $this, 'quality_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_quality_dismiss_required_action', array($this, 'quality_dismiss_required_action_callback') );

	}

	public function quality_register_menu() {
		add_theme_page( 'About Quality Theme', 'About Quality Theme', 'activate_plugins', 'quality-info', array( $this, 'quality_welcome_screen' ) );
	}

	public function quality_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'quality_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function quality_admin_notice() {
		?>
		
		<?php
            $theme_info = wp_get_theme();
		?>
			<div class="updated notice is-dismissible quality-notice">
			<h1><?php 
			printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'quality' ), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
				<p><?php echo sprintf( esc_html__( "Welcome! Thank you for choosing Webriti's Quality WordPress theme. To take full advantage of the features this theme has to offer visit our %swelcome page%s.", "quality"), '<a href="' . esc_url( admin_url( 'themes.php?page=quality-info' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=quality-info' ) ); ?>" class="button button-blue-secondary button_quality" style="text-decoration: none;"><?php _e( 'Get started with Quality', 'quality' ); ?></a></p>
			</div>
			<style>
			.quality-notice {
			background: #e9eff3 !important;
			border: 10px solid #fff !important;
			color: #608299 !important;
			padding: 30px 10px !important;
			text-align: center !important;
			box-shadow: none !important;
			text-align: center !important;
			padding: 25px !important;
			position: relative !important;
			}
			
			.button_quality{   
      			font-size: 14px!important;
				height: 46px!important;
				line-height: 44px!important;
				padding: 0 36px!important;}
			</style>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @sfunctionse  1.8.2.4
	 */
	public function quality_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_quality-info' == $hook_suffix ) {
			
			
			wp_enqueue_style( 'quality-info-css', get_template_directory_uri() . '/functions/quality-info/css/bootstrap.css' );
			
			wp_enqueue_style( 'quality-info-screen-css', get_template_directory_uri() . '/functions/quality-info/css/welcome.css' );

			wp_enqueue_script( 'quality-info-screen-js', get_template_directory_uri() . '/functions/quality-info/js/welcome.js', array('jquery') );

			global $quality_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('quality_show_required_actions') ):
				$quality_show_required_actions = get_option('quality_show_required_actions');
			else:
				$quality_show_required_actions = array();
			endif;

			if( !empty($quality_required_actions) ):
				foreach( $quality_required_actions as $quality_required_action_value ):
					if(( !isset( $quality_required_action_value['check'] ) || ( isset( $quality_required_action_value['check'] ) && ( $quality_required_action_value['check'] == false ) ) ) && ((isset($quality_show_required_actions[$quality_required_action_value['id']]) && ($quality_show_required_actions[$quality_required_action_value['id']] == true)) || !isset($quality_show_required_actions[$quality_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'quality-info-screen-js', 'qualityLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','quality' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @sfunctionse  1.8.2.4
	 */
	public function quality_scripts_for_customizer() {

		wp_enqueue_style( 'quality-info-screen-customizer-css', get_template_directory_uri() . '/functions/quality-info/css/welcome_customizer.css' );
		wp_enqueue_script( 'quality-info-screen-customizer-js', get_template_directory_uri() . '/functions/quality-info/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $quality_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('quality_show_required_actions') ):
			$quality_show_required_actions = get_option('quality_show_required_actions');
		else:
			$quality_show_required_actions = array();
		endif;

		if( !empty($quality_required_actions) ):
			foreach( $quality_required_actions as $quality_required_action_value ):
				if(( !isset( $quality_required_action_value['check'] ) || ( isset( $quality_required_action_value['check'] ) && ( $quality_required_action_value['check'] == false ) ) ) && ((isset($quality_show_required_actions[$quality_required_action_value['id']]) && ($quality_show_required_actions[$quality_required_action_value['id']] == true)) || !isset($quality_show_required_actions[$quality_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'quality-info-screen-customizer-js', 'qualityLiteWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=quality-info#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','quality'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @sfunctionse 1.8.2.4
	 */
	public function quality_dismiss_required_action_callback() {

		global $quality_required_actions;

		$quality_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $quality_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($quality_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('quality_show_required_actions') ):

				$quality_show_required_actions = get_option('quality_show_required_actions');

				$quality_show_required_actions[$quality_dismiss_id] = false;

				update_option( 'quality_show_required_actions',$quality_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$quality_show_required_actions_new = array();

				if( !empty($quality_required_actions) ):

					foreach( $quality_required_actions as $quality_required_action ):

						if( $quality_required_action['id'] == $quality_dismiss_id ):
							$quality_show_required_actions_new[$quality_required_action['id']] = false;
						else:
							$quality_show_required_actions_new[$quality_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'quality_show_required_actions', $quality_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @sfunctionse 1.8.2.4
	 */
	public function quality_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<ul class="quality-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting Started','quality'); ?></a></li>
			
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Why should you upgrade to PRO?','quality'); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO','quality'); ?></a></li>
			<li role="presentation"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child Themes','quality'); ?></a></li>
			
		</ul>
		</div>
		</div>
		</div>

		<div class="quality-tab-content">

			<?php do_action( 'quality_info_screen' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 *
	 */
	public function quality_getting_started() {
		require_once( get_template_directory() . '/functions/quality-info/sections/getting-started.php' );
	}


	
	/**
	 * Child themes
	 *
	 */
	public function quality_child_themes() {
		require_once( get_template_directory() . '/functions/quality-info/sections/child-themes.php' );
	}

	/**
	 * Contribute
	 *
	 */
	public function quality_github() {
		require_once( get_template_directory() . '/functions/quality-info/sections/github.php' );
	}


	/**
	 * Free vs PRO
	 * 
	 */
	public function quality_welcome_free_pro() {
		require_once( get_template_directory() . '/functions/quality-info/sections/free_pro.php' );
	}
}

$GLOBALS['quality_screen'] = new quality_screen();