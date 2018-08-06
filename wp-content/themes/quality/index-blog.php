<section id="section-block" class="news">
  <div class="container">
	<?php 
	$quality_pro_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options );
	if(($current_options['blog_heading']) || ($current_options['home_blog_description']!='' )) { ?>
	<div class="row">
		<div class="section-header">			
			<?php if($current_options['blog_heading']) { ?>
			<p><?php echo $current_options['blog_heading']; ?></p>
			<?php } if($current_options['home_blog_description']) { ?>
			<h1 class="widget-title"><?php echo $current_options['home_blog_description']; ?></h1>
			<?php } ?>
			<hr class="divider">
		</div>
	</div>
	<?php } ?>
	<div class="row">
		<?php $args = array( 'post_type' => 'post','posts_per_page' =>2,'post__not_in'=>get_option("sticky_posts")); 	
		query_posts( $args );
		if(query_posts( $args ))
		{	while(have_posts()):the_post();
			{ 	
			$recent_expet = get_the_excerpt(); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
					<article class="post">								
						<?php $defalt_arg =array('class' => "img-responsive");
						if(has_post_thumbnail()):?>
						<figure class="post-thumbnail">
							<?php the_post_thumbnail('', $defalt_arg); ?>
						</figure>
						<?php endif; ?>	
						
						<div class="post-content">	
							<?php if($current_options['home_meta_section_settings'] == '' ) {?>
							<div class="item-meta">
								<a class="author-image item-image" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '40'); ?></a>
								<?php echo ' ';?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
								<br>
								<a class="entry-date" href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>">
								<?php echo get_the_date('M j, Y'); ?></a>
							</div>
							<?php } ?>
							<header class="entry-header">
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</header>	
							<div class="entry-content">
								<?php the_content(__('Read More','quality')); ?>
							</div>
							<?php if($current_options['home_meta_section_settings'] == '' ) {?>
							<hr />
							<div class="entry-meta">
								<span class="comment-links"><a href="<?php the_permalink(); ?>"><?php comments_number(__( 'No Comments', 'quality'), __('One comment', 'quality'), __('% comments', 'quality')); ?></a></span>
								<?php $cat_list = get_the_category_list();
								if(!empty($cat_list)) { ?>
								<span class="cat-links"><?php _e('In','quality');?><a href="<?php the_permalink(); ?>"><?php the_category(' '); ?></a></span>
								<?php } ?>
								
							</div>
							<?php } ?>
						</div>				
					</article>
				</div>
			<?php } endwhile; 
			} ?>
	</div>
</div>
<!-- /Quality Blog Section ---->
</section>
