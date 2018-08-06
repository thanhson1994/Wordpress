<!-- Footer Widget Secton -->
<footer class="site-footer">
<div class="container">
		<?php 
			if ( is_active_sidebar( 'footer-widget-area' ) )
			{ 
			?>
		<div class="row footer-sidebar">
		<?php 
			dynamic_sidebar( 'footer-widget-area' );			 
			 ?>
		</div>
			<?php } ?>
<?php
	$quality_pro_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
<div class="row">
		<div class="col-md-12">
			<div class="site-info">
				<?php if($current_options['footer_copyright_text']!='') { ?>
		<?php echo $current_options['footer_copyright_text']; } ?>
			</div>
		</div>			
</div>
</div>
</footer>	
	<!-- /Footer Widget Secton -->
</div>
<!------  Google Analytics code end ------->
</div> <!-- end of wrapper -->

<!-- Page scroll top -->
<a href="#" class="scroll-up"><i class="fa fa-chevron-up"></i></a>
<!-- Page scroll top -->

<?php wp_footer(); ?>
</body>
</html>