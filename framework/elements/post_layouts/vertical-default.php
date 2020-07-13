<?php
	$format = get_post_format() ? get_post_format() : 'standard';
	$icon_url = get_template_directory_uri().'/assets/images/icon-'.$format.'.png';
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
	if(!$zigzag) $count = 0;
	if($count % 2 == 0){
		$type_class = 'bt-odd';
		$img_class = 'col-xl-7 col-lg-6 col-md-12';
	}else{
		$type_class = 'bt-even';
		$img_class = 'col-xl-7 col-lg-6 col-md-12 order-last';
	}
	
	$img = asata_get_image_type('thumbnail', get_the_ID(), $image_type, $image_ratio , $image_size);
	
?>

<div class="bt-item <?php echo esc_attr($type_class); ?>">
	<div class="row align-items-center">
		<div class="<?php echo esc_attr($img_class); ?>">
			<div class="bt-media <?php echo esc_attr($format); ?>">
				<?php if($img) echo '<div class="bt-image">'.$img.'</div>'; ?>
				<div class="bt-format-icon"><img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($format); ?>" /></div>
			</div>
		</div>
		<div class="col-xl-5 col-lg-6 col-md-12">
			<div class="bt-content">
				<ul class="bt-meta">
					<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
					<li><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></li>
				</ul>
				<?php
					echo vc_render_post_title_group($atts);
					if($excerpt_limit != '-1') echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
					echo vc_render_readmore_group($atts);
				?>
			</div>
		</div>
	</div>
</div>
