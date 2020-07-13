<?php
	$format = get_post_format() ? get_post_format() : 'standard';
	$media_arr = explode(',', $multi_media);
	$format = in_array($format, $media_arr) ? $format : 'standard';
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
	
?>
<div class="bt-item">
	<div class="bt-media <?php echo esc_attr($format); ?>">
		<?php require get_template_directory().'/framework/elements/post_layouts/media.php'; ?>
	</div>
	<?php if($media_type != 'multi' || ($format != 'quote' && $format !='link')){ ?>
		<div class="bt-content">
			<h4 class="bt-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></h4>
			<?php echo vc_render_post_title_group($atts); ?>
			<ul class="bt-meta">
				<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
				<?php if(comments_open()){ ?>
					<li><a href="<?php comments_link(); ?>"><?php comments_number( esc_html__('0 Comments', 'asata'), esc_html__('1 Comment', 'asata'), esc_html__('% Comments', 'asata') ); ?></a></li>
				<?php } ?>
				<li><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
			</ul>
			<?php
				if($excerpt_limit != '-1') echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
				echo vc_render_readmore_group($atts);
			?>
		</div>
	<?php } ?>
</div>