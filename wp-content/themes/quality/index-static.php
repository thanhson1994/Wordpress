<!-- Quality Main Slider --->
<?php $quality_pro_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>


<!-- /Quality Main Slider --->

<section id="slider-carousel">
	<div id="post-<?php the_ID(); ?>" class="item" 
				<?php if($current_options['home_feature']!=''){ ?>
				style="background-image:url(<?php echo $current_options['home_feature'];?>">
				<?php
			}	?>
	
	
		<div class="container">
			<div class="slider-caption">
			<?php if($current_options['home_image_title']){ ?>
			<h5><?php echo $current_options['home_image_title']; ?></h5>
			<?php } ?>
			<?php if($current_options['home_image_sub_title']){ ?>
			<h1><?php echo $current_options['home_image_sub_title']; ?></h1>
			<?php } ?>
			<?php if($current_options['home_image_description']){ ?>
			<p><?php  echo $current_options['home_image_description']; ?></p>
			<?php }
				if($current_options['home_image_button_text']!=''){?>
			<div class="slide-btn-area-sm">
			<a class="slide-btn-sm" href="<?php echo $current_options['home_image_button_link']; ?>" target="_blank">
				<?php echo $current_options['home_image_button_text']; ?>
			</a>
			</div>
			<?php }?>
			</div>
		</div>
	</div>
</section>