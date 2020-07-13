<?php
	global $asata_options;
	$post_title = isset($asata_options['portfolio_title']) ? $asata_options['portfolio_title']: true;
	$post_featured = isset($asata_options['portfolio_featured']) ? $asata_options['portfolio_featured']: true;
	$post_image_size = isset($asata_options['portfolio_image_size']) ? $asata_options['portfolio_image_size']: 'full';
	$post_image_type = isset($asata_options['portfolio_image_type']) ? $asata_options['portfolio_image_type']: 'auto';
	$post_image_ratio = isset($asata_options['portfolio_image_ratio']) ? $asata_options['portfolio_image_ratio']: 66;
	$post_meta = isset($asata_options['portfolio_meta']) ? $asata_options['portfolio_meta']: true;
	$post_meta_author = isset($asata_options['portfolio_meta_author']) ? $asata_options['portfolio_meta_author']: true;
	$post_meta_author_label = isset($asata_options['portfolio_meta_author_label'])&&$asata_options['portfolio_meta_author_label'] ? $asata_options['portfolio_meta_author_label']: esc_html__('By:', 'asata');
	$post_meta_date = isset($asata_options['portfolio_meta_date']) ? $asata_options['portfolio_meta_date']: true;
	$post_meta_date_label = isset($asata_options['portfolio_meta_date_label'])&&$asata_options['portfolio_meta_date_label'] ? $asata_options['portfolio_meta_date_label']: esc_html__('Date:', 'asata');
	$post_meta_date_format = isset($asata_options['portfolio_meta_date_format'])&&$asata_options['portfolio_meta_date_format'] ? $asata_options['portfolio_meta_date_format']: get_option('date_format');
	$post_meta_category = isset($asata_options['portfolio_meta_category']) ? $asata_options['portfolio_meta_category']: true;
	$post_meta_category_label = isset($asata_options['portfolio_meta_category_label'])&&$asata_options['portfolio_meta_category_label'] ? $asata_options['portfolio_meta_category_label']: esc_html__('Category:', 'asata');
	$post_excerpt = isset($asata_options['portfolio_excerpt']) ? $asata_options['portfolio_excerpt']: true;
	$post_excerpt_length = (int) isset($asata_options['portfolio_excerpt_length']) ? $asata_options['portfolio_excerpt_length']: 55;
	$post_excerpt_more = isset($asata_options['portfolio_excerpt_more']) ? $asata_options['portfolio_excerpt_more']: '[...]';
	$post_readmore = isset($asata_options['portfolio_readmore']) ? $asata_options['portfolio_readmore']: true;
	$post_readmore_label = isset($asata_options['portfolio_readmore_label'])&&$asata_options['portfolio_readmore_label'] ? $asata_options['portfolio_readmore_label']: esc_html__('Read More', 'asata');
	
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'portfolio_options'):array();
?>
<article <?php post_class(); ?>>
	<div class="bt-post-item">
		<?php if($post_featured){ ?>
			<div class="bt-media">
				<?php echo asata_get_image_type('thumbnail', get_the_ID(), $post_image_type, $post_image_ratio , $post_image_size); ?>
			</div>
		<?php } ?>
		<div class="bt-content">
			<?php if($post_title){ ?>
				<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php } ?>
			
			<?php if($post_meta){ ?>
				<ul class="bt-meta">
					<?php if($post_meta_date){ ?>
						<li><?php echo '<i class="icon_calendar"></i> '; ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></li>
					<?php } ?>
					<?php if($post_meta_category){ ?>
						<?php the_terms( get_the_ID(), 'fw-portfolio-category', '<li class="bt-term"><i class="icon_ribbon_alt"></i> ', ', ', '</li>' ); ?>
					<?php } ?>
				</ul>
			<?php } ?>
			
			<?php if($post_excerpt){ ?>
				<div class="bt-excerpt">
					<?php echo wp_trim_words(get_the_excerpt(), $post_excerpt_length, $post_excerpt_more); ?>
				</div>
			<?php } ?>
			
			<?php if($post_readmore){ ?>
				<a class="bt-btn bt-readmore" href="<?php the_permalink(); ?>"><?php echo esc_html($post_readmore_label); ?></a>
			<?php } ?>
		</div>
	</div>
</article>
