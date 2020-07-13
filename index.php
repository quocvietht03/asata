<?php get_header(); ?>
<?php
global $asata_options;
$fullwidth = isset($asata_options['blog_fullwidth'])&&$asata_options['blog_fullwidth'] ? 'container-fluid': 'bt-container';
$columns = (int) isset($asata_options['blog_columns']) ?  $asata_options['blog_columns']: 1;
$sidebar_width = (int) isset($asata_options['blog_sidebar_width']) ?  $asata_options['blog_sidebar_width']: 3;
$sidebar_width_md = $sidebar_width + 1;

$sidebar_class = 'col-md-'.$sidebar_width_md.' col-lg-'.$sidebar_width;
if(is_active_sidebar('main-sidebar')){
	$content_class = 'col-md-'.(12 - $sidebar_width_md).' col-lg-'.(12 - $sidebar_width);
}else{
	$content_class = 'col-md-12 col-lg-12';
}


asata_titlebar();
?>
	<div class="bt-main-content">
		<div class="<?php echo esc_attr($fullwidth); ?>">
			<div class="row">
				<div class="bt-content <?php echo esc_attr($content_class); ?>">
					<?php
					if( have_posts() ) {
						?>
							<div class="bt-items-wrap columns-<?php echo esc_attr($columns); ?>">
								<?php
									while ( have_posts() ) : the_post();
										get_template_part( 'framework/templates/blog/entry');
									endwhile;
								?>
							</div>
						<?php
						asata_paging_nav();
					}else{
						get_template_part( 'framework/templates/entry', 'none');
					}
					?>
				</div>
				<div class="bt-sidebar bt-right-sidebar <?php echo esc_attr($sidebar_class); ?>">
					<?php if(is_active_sidebar('main-sidebar')) echo get_sidebar('main-sidebar'); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
