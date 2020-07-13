<?php
	$img_class = ($image_align == 'right') ? 'col-lg-6 col-md-12 order-last': 'col-lg-6 col-md-12';
?>

<div class="row align-items-center">
	<div class="<?php echo esc_attr($img_class); ?>">
		<?php if($img) echo '<div class="bt-image">'.$img.'</div>'; ?>
	</div>
	<div class="col-lg-6 col-md-12">
		<div class="bt-content">
			<?php
				echo vc_render_text_group( $atts, 'number' )
					.vc_render_meta_group( $atts, array('category', 'date') )
					.vc_render_title_group($atts)
					.vc_render_content_group($atts, $content)
					.vc_render_link_group($atts);
				
			?>
		</div>
	</div>
</div>
