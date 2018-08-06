<?php
/**
 * Child themes template
 */
?>
<div id="child_themes" class="quality-tab-pane">

	<?php
		$current_theme = wp_get_theme();
	?>
<div class="container-fluid">
		<div class="row">	

	<div class="quality-pane-center">

		<h1><?php esc_html_e('Install & Use Quality Child Themes','quality' ); ?></h1>

		<p><?php esc_html_e('Below you will find a selection of Quality child themes that will totally transform the look of your site.','quality' ); ?></p>

	</div>

	<div class="col-md-4">
	<div class="quality-tab-pane-half quality-tab-pane-first-half">
		<!-- Quality Blue -->
		<div class="quality-child-theme-container">
			<div class="quality-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/functions/quality-info/img/quality-blue.png'; ?>" alt="<?php esc_html_e( 'Quality Blue Child Theme', 'quality' ); ?>" />
				<div class="quality-child-theme-description">
					<h2><?php esc_html_e( 'Quality Blue', 'quality' ); ?></h2>
				</div>
			</div>
			<div class="quality-child-theme-details">
				<?php if ( 'quality-blue' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name"><?php echo 'Quality Blue'; ?></span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=quality-blue' ), 'install-theme_quality-blue' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'quality' ), '<span class="screen-reader-text">quality-blue</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/quality-blue"><?php esc_html_e( 'Live Preview','quality'); ?></a>
						<div class="quality-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Quality Blue - Current theme', 'quality' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','quality'); ?></a>
						<div class="quality-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="quality-tab-pane-half quality-tab-pane-first-half">
		<!-- Quality Green -->
		<div class="quality-child-theme-container">
			<div class="quality-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/functions/quality-info/img/quality-green.png'; ?>" alt="<?php esc_html_e( 'Quality Green Child Theme', 'quality' ); ?>" />
				<div class="quality-child-theme-description">
					<h2><?php esc_html_e('Quality Green', 'quality' ); ?></h2>
				</div>
			</div>
			<div class="quality-child-theme-details">
				<?php if ( 'quality-green' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name"><?php esc_html_e( 'Quality Green', 'quality' ); ?></span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=quality-green' ), 'install-theme_quality-green' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'quality' ), '<span class="screen-reader-text">quality green</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/quality-green"><?php esc_html_e( 'Live Preview','quality'); ?></a>
						<div class="quality-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Quality - Current theme', 'quality' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','quality'); ?></a>
						<div class="quality-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	</div>
	
	<div class="col-md-4">	
	<div class="quality-tab-pane-half quality-tab-pane-first-half">	
		<!-- Zifer Child -->
		<div class="quality-child-theme-container">
			<div class="quality-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/functions/quality-info/img/quality-orange.png'; ?>" alt="<?php esc_html_e( 'Quality Orange Child Theme', 'quality' ); ?>" />
				<div class="quality-child-theme-description">
					<h2><?php esc_html_e( 'Quality Orange', 'quality' ); ?></h2>
				</div>
			</div>
			<div class="quality-child-theme-details">
				<?php if ( 'quality orange' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name"><?php esc_html_e( 'Quality Orange', 'quality' ); ?></span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=quality-orange' ), 'install-theme_quality-orange' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'quality' ), '<span class="screen-reader-text">Quality Orange</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/quality-orange"><?php esc_html_e( 'Live Preview','quality'); ?></a>
						<div class="quality-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Quality Orange - Current theme', 'quality' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e( 'Customize','quality'); ?></a>
						<div class="quality-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
	 </div>
	 </div>
	</div>
</div>	
	</div>