<?php
$portfolio_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'portfolio_options'):array();
$img = asata_get_image_type('thumbnail', get_the_ID(), $image_type, $image_ratio , $image_size);

?>

<div class="bt-item">
	<div class="bt-thumb">
		<?php if($img) echo '<div class="bt-image">'.$img.'</div>'; ?>
		<div class="bt-overlay">
			<div class="bt-content">
				<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<h4 class="bt-term"><?php the_terms( get_the_ID(), 'fw-portfolio-category', '', ', ' ); ?></h4>
			</div>
		</div>
	</div>
</div>
