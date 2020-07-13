<?php
	$format = get_post_format() ? get_post_format() : 'standard';
	$media_arr = explode(',', $multi_media);
	$format = in_array($format, $media_arr) ? $format : 'standard';
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
	
?>
<div class="bt-item">
	<div class="bt-media-wrap">
		<div class="bt-media <?php echo esc_attr($format); ?>">
			<?php require get_template_directory().'/framework/elements/post_layouts/media.php'; ?>
		</div>
	</div>
	<?php if($media_type != 'multi' || ($format != 'quote' && $format !='link')){ ?>
		<div class="bt-content">
			<h4 class="bt-date"><a href="<?php the_permalink(); ?>"><i class="icon_calendar"></i> <?php echo get_the_date(get_option('date_format')); ?></a></h4>
			<?php
				echo vc_render_post_title_group($atts);
				if($excerpt_limit != '-1') echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
				echo vc_render_readmore_group($atts);
			?>
		</div>
	<?php } ?>
</div>
