<?php
	global $asata_options;
	$fullwidth = isset($asata_options['titlebar_fullwidth'])&&$asata_options['titlebar_fullwidth'] ? 'container-fluid': 'bt-container';
	$titlebar_align = isset($asata_options['titlebar_align']) ? $asata_options['titlebar_align']: 'text-center';
?>
<div class="bt-titlebar bt-titlebar-v3">
	<div class="bt-titlebar-inner">
		<div class="bt-overlay"></div>
		<div class="<?php echo esc_attr($fullwidth); ?>">
			<div class="bt-content <?php echo esc_attr($titlebar_align); ?>">
				<div class="bt-page-title">
					<?php
						if(isset($asata_options['titlebar_page_title_before'])&&$asata_options['titlebar_page_title_before']&&isset($asata_options['titlebar_page_title_before_content'])&&$asata_options['titlebar_page_title_before_content']){
							echo '<div class="bt-before">'.$asata_options['titlebar_page_title_before_content'].'</div>';
						}
					?>
					<h2><?php echo asata_page_title(); ?></h2>
					<?php
						if(isset($asata_options['titlebar_page_title_after'])&&$asata_options['titlebar_page_title_after']&&isset($asata_options['titlebar_page_title_after_content'])&&$asata_options['titlebar_page_title_after_content']){
							echo '<div class="bt-after">'.$asata_options['titlebar_page_title_after_content'].'</div>';
						}
					?>
				</div>
				<div class="bt-breadcrumb">
					<?php
						if(isset($asata_options['titlebar_breadcrumb_before'])&&$asata_options['titlebar_breadcrumb_before']&&isset($asata_options['titlebar_breadcrumb_before_content'])&&$asata_options['titlebar_breadcrumb_before_content']){
							echo '<div class="bt-before">'.$asata_options['titlebar_breadcrumb_before_content'].'</div>';
						}
					?>
					<div class="bt-path">
						<?php
							$home_text = (isset($asata_options['titlebar_breadcrumb_home_text'])&&$asata_options['titlebar_breadcrumb_home_text'])?$asata_options['titlebar_breadcrumb_home_text']: 'Home';
							$delimiter = (isset($asata_options['titlebar_breadcrumb_delimiter'])&&$asata_options['titlebar_breadcrumb_delimiter'])?$asata_options['titlebar_breadcrumb_delimiter']: '-';
							
							echo asata_page_breadcrumb($home_text, $delimiter);
						?>
					</div>
					<?php
						if(isset($asata_options['titlebar_breadcrumb_after'])&&$asata_options['titlebar_breadcrumb_after']&&isset($asata_options['titlebar_breadcrumb_after_content'])&&$asata_options['titlebar_breadcrumb_after_content']){
							echo '<div class="bt-after">'.$asata_options['titlebar_breadcrumb_after_content'].'</div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
