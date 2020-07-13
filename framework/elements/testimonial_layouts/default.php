<?php
$testimonial_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'testimonial_options'):array();

$positon = isset($testimonial_options['position'])?$testimonial_options['position']:'';

$img = asata_get_image_type('thumbnail', get_the_ID(), $image_type, $image_ratio , $image_size);

?>

<div class="bt-item">
	<div class="bt-thumb">
		<?php if($img) echo '<div class="bt-image">'.$img.'</div>'; ?>
		<i class="icon_quotations"></i>
	</div>
	<div class="bt-content">
		<div class="bt-desc"><?php echo get_the_content(); ?></div>
		<div class="bt-inner">
			<h3 class="bt-title"><?php the_title(); ?></h3>
			<?php if($positon) echo '<div class="bt-position">'.$positon.'</div>'; ?>
		</div>
	</div>
</div>
