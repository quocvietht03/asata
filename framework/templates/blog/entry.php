<article <?php post_class(); ?>>
	<div class="bt-post-item">
		<?php echo asata_post_media_render(); ?>
		
		<?php if(is_single() || (get_post_format() != 'quote' && get_post_format() !='link')){ ?>
			<div class="bt-content">
				<?php
					echo asata_post_title_render();
					echo asata_post_meta_render();
					echo asata_post_content_render();
				?>
			</div>
		<?php } ?>
	</div>
</article>
