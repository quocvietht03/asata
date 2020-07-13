<?php if($img) echo '<div class="bt-thumb"><div class="bt-image">'.$img.'</div></div>'; ?>
<div class="bt-content">
	<?php 
		echo vc_render_title_group($atts)
			.vc_render_content_group($atts, $content)
			.vc_render_link_group($atts);
	?>
</div>
