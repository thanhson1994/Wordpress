<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function quality_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Open Sans:300,400,600,700,800','Roboto:100,300,400,500,600,700,900','Raleway:600','italic');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url($fonts_url);
}
function quality_scripts_styles() {
    wp_enqueue_style( 'quality-fonts', quality_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'quality_scripts_styles' );
?>