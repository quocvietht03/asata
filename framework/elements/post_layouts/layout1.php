<?php
	$format = get_post_format() ? get_post_format() : 'standard';
	$media_arr = explode(',', $multi_media);
	$format = in_array($format, $media_arr) ? $format : 'standard';
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
	
?>
<div class="bt-item">
	<?php if($media_type != 'multi' || ($format != 'quote' && $format !='link' && $format !='video' && $format !='audio')){ ?>
		<h4 class="bt-date">
				<span class="bt-d"><?php echo get_the_date('d'); ?></span>
				<span class="bt-m"><?php echo get_the_date('M'); ?></span>
		</h4>
	<?php } ?>
	<div class="bt-media <?php echo esc_attr($format); ?>">
		<?php require get_template_directory().'/framework/elements/post_layouts/media.php'; ?>
	</div>
	<?php if($media_type != 'multi' || ($format != 'quote' && $format !='link')){ ?>
		<div class="bt-content">
			<div class="bt-term"><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></div>
			<?php
				echo vc_render_post_title_group($atts);
				if($excerpt_limit != '-1') echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
			?>
			<div class="bt-author"><?php echo esc_html__('By ', 'asata'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></div>
		</div>
	<?php } ?>
</div>