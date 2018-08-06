<?php 

  // Template Name: Blog Full Width
get_header();
quality_breadcrumbs(); ?>
<section id="section-block" class="site-content">
	<div class="container">
		<div class="row">
		<!--Blog Posts-->
		<div class="col-md-12 col-sm-8 col-xs-12">
			<div class="news">
				<?php 
				 $args = array( 'post_type' => 'post');		
				$post_data = new WP_Query( $args );
				if ( $post_data->have_posts() ) : while($post_data->have_posts()): $post_data->the_post();
                global $more;
                $more = 0; 
				get_template_part('content','');
				endwhile; ?>
				<div class="paginations">					
				 <?php 
				 $GLOBALS['wp_query']->max_num_pages = $post_data->max_num_pages;
                the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
				'next_text'          => '<i class="fa fa-angle-double-right"></i>',
				) );
				 ?>
				</div>
				<?php if(wp_link_pages()) { wp_link_pages();  }  ?>
				<?php wp_reset_postdata(); endif; ?>					
			</div>	
		<!--/Blog Content-->	
		</div>
	</div>
</div>
</section>
<?php 
get_footer();
?>