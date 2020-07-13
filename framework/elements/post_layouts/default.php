<?php
	$format = get_post_format() ? get_post_format() : 'standard';
	$media_arr = explode(',', $multi_media);
	$format = in_array($format, $media_arr) ? $format : 'standard';
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
	
?>
<div class="bt-item">
	<div class="bt-media <?php echo esc_attr($media_type.' '.$format); ?>">
		<?php require get_template_directory().'/framework/elements/post_layouts/media.php'; ?>
		<?php if($media_type != 'multi' || ($format != 'quote' && $format !='link' && $format !='video' && $format !='audio')){ ?>
			<h4 class="bt-term">
				<?php
					$terms = get_the_terms( get_the_ID(), 'category', '', ', ' ); 
					$term = array_pop($terms);
					echo '<a href="'.get_term_link($term->slug, 'category').'">'.$term->name.'</a>';
				?>
			</h4>
		<?php } ?>
	</div>
	<?php if($media_type != 'multi' || ($format != 'quote' && $format !='link')){ ?>
		<div class="bt-content">
			<?php
				echo vc_render_post_title_group($atts);
				if($excerpt_limit != '-1') echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
			?>
			<div class="bt-meta-wrap">
				<ul class="bt-meta">
					<li><?php echo '<i class="icon_pencil-edit"></i> '.esc_html__('By ', 'asata'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
					<li><?php echo '<i class="icon_ribbon_alt"></i> '; ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></li>
				</ul>
			</div>
		</div>
	<?php } ?>
</div>