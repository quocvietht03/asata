<?php
$style_overlay = $overlay_color ? 'background: '.$overlay_color.';': '';

if($img) echo '<div class="bt-image">'.$img.'</div>';
?>

<div class="bt-overlay" <?php if($style_overlay) echo 'style="'.esc_attr($style_overlay).'"'; ?>></div>
<div class="bt-content">
	<?php
		echo vc_render_title_group($atts)
			.vc_render_meta_group( $atts, array('category', 'date') )
			.vc_render_content_group($atts, $content)
			.vc_render_link_group($atts);
	?>
</div>
