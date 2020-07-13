<?php
$testimonial_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'testimonial_options'):array();

$positon = isset($testimonial_options['position'])?$testimonial_options['position']:'';
$signature = isset($testimonial_options['signature'])?$testimonial_options['signature']:'';

$img = asata_get_image_type('thumbnail', get_the_ID(), $image_type, $image_ratio , $image_size);

?>

<div class="bt-item row align-items-center">
	<div class="bt-thumb col-auto">
		<?php
			$thumb_size = (!empty($img_size))?$img_size:'thumbnail'; 
			$thumbnail = wpb_getImageBySize( array(
				'post_id' => get_the_ID(),
				'attach_id' => null,
				'thumb_size' => $thumb_size,
				'class' => ''
			) );
			echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
		?>
		<div class="bt-quote bt-font-h2">&#8220;</div>
	</div>
	<div class="bt-content col">
		<div class="bt-desc bt-font-h2"><?php echo get_the_content(); ?></div>
		<div class="bt-info row align-items-center">
			<?php if (!empty($signature)) echo '<div class="bt-signature col-auto"><img src="'.esc_url($signature['url']).'" alt="'.esc_attr__('Signature', 'asata').'"/></div>'; ?>
			<div class="col">
				<h3 class="bt-title"><?php the_title(); ?></h3>
				<?php if($positon) echo '<div class="bt-position">'.$positon.'</div>'; ?>
			</div>
		</div>
		
	</div>
</div>
