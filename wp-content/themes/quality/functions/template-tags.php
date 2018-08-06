<?php
// blogs,pages and archive page title
function quality_archive_page_title(){
	if( is_archive() )
	{
		$archive_text = get_theme_mod('archive_prefix',__('Archives','quality'));
		
		echo '<h1>';
		
		if ( is_day() ) :
		
		  printf( __( '%1$s %2$s', 'quality' ), $archive_text, get_the_date() );
		  
        elseif ( is_month() ) :
		
		  printf( __( '%1$s %2$s', 'quality' ), $archive_text, get_the_date( 'F Y' ) );
		  
        elseif ( is_year() ) :
		
		  printf( __( '%1$s %2$s', 'quality' ), $archive_text, get_the_date( 'Y' ) );
		  
        elseif( is_category() ):
		
			$category_text = get_theme_mod('category_prefix',__('Category','quality'));
			
			printf( __( '%1$s %2$s', 'quality' ), $category_text, single_cat_title( '', false ) );
			
		elseif( is_author() ):
			
			$author_text = get_theme_mod('author_prefix',__('All posts by','quality'));
		
			printf( __( '%1$s %2$s', 'quality' ), $author_text, get_the_author() );
			
		elseif( is_tag() ):
			
			$tag_text = get_theme_mod('tag_prefix',__('Tag','quality'));
			
			printf( __( '%1$s %2$s', 'quality' ), $tag_text, single_tag_title( '', false ) );
			
			elseif( is_shop() ):
			
			$shop_text = get_theme_mod('shop_prefix',__('Shop','quality'));
			
			printf( __( '%1$s %2$s', 'quality' ), $shop_text, single_tag_title( '', false ));
			
        elseif( is_archive() ): 
		the_archive_title( '<h1>', '</h1>' ); 
		
		endif;
		

		echo '</h1>';
	}
	elseif( is_search() )
	{
		$search_text = get_theme_mod('search_prefix',__('Search results for','quality'));
		
		echo '<h1>';
		
		printf( __( '%1$s %2$s', 'quality' ), $search_text, get_search_query() );
		
		echo '</h1>';
	}
	elseif( is_404() )
	{
		$breadcrumbs_text = get_theme_mod('404_prefix',__('404','quality'));
		
		echo '<h1>';
		
		printf( __( '%1$s ', 'quality' ) , $breadcrumbs_text );
		
		echo '</h1>';
	}
	else
	{
		echo '<h1>'.get_the_title().'</h1>';
	}
}

// Quality post navigation
function quality_post_nav()
{
	global $post;
	echo '<div style="text-align:center;">';
	posts_nav_link( ' &#183; ', __('previous page','quality'), __('next page','quality') );
	echo '</div>';
}


//Hide Title of woocommerce shop page
add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );

function woo_hide_page_title() {
	
	return false;
	
}



add_action( 'wp_footer', 'demo_store' );
	function demo_store() {
	if ( class_exists( 'WooCommerce' ) ) {
	$woocommerce_demo_store = get_option('woocommerce_demo_store', 'no');
	if($woocommerce_demo_store !='no')
	{
	?>
	<style>
	.woocommerce-store-notice .demo_store, #wrapper {
		margin-top: 50px !important;
	}
	</style>
<?php } } }