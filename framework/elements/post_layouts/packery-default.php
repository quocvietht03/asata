<?php
$portfolio_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'portfolio_options'):array();
$img_url = asata_get_image_url('thumbnail', get_the_ID(), $image_size);

?>

<div class="bt-item">
	<div class="bt-image" style="background-image: url(<?php echo esc_url($img_url); ?>)"></div>
	<div class="bt-date">
		<a href="<?php the_permalink(); ?>">
			<span class="bt-m"><?php echo get_the_date('M'); ?></span>
			<span class="bt-d"><?php echo get_the_date('d'); ?></span>
		</a>
	</div>
	<div class="bt-overlay">
		<div class="bt-content">
			<div class="bt-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></div>
			<?php 
				echo vc_render_post_title_group($atts); 
				echo vc_render_readmore_group($atts);
			?>
		</div>
	</div>
</div>
