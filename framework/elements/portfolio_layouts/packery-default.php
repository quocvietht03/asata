<?php
$portfolio_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'portfolio_options'):array();
$img_url = asata_get_image_url('thumbnail', get_the_ID(), $image_size);

?>

<div class="bt-item">
	<div class="bt-image" style="background-image: url(<?php echo esc_url($img_url); ?>)"></div>
	<div class="bt-overlay">
		<div class="bt-content">
			<a class="bt-readmore" href="<?php the_permalink(); ?>"><i class="icon_link_alt"></i></a>
			<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="bt-term"><?php the_terms( get_the_ID(), 'fw-portfolio-category', '', ', ' ); ?></div>
		</div>
	</div>
</div>
