<?php get_header(); ?>
<?php
global $asata_options;
$fullwidth = isset($asata_options['post_fullwidth'])&&$asata_options['post_fullwidth'] ? 'container-fluid': 'bt-container';
$sidebar_width = (int) isset($asata_options['post_sidebar_width']) ?  $asata_options['post_sidebar_width']: 3;
$sidebar_width_md = $sidebar_width + 1;
$table_of_content = isset($asata_options['single_table_of_content']) ? $asata_options['single_table_of_content']: false;
$post_navigation = isset($asata_options['single_post_navigation']) ? $asata_options['single_post_navigation']: true;
$author = isset($asata_options['single_author']) ? $asata_options['single_author']: true;
$comment = isset($asata_options['single_comment']) ? $asata_options['single_comment']: true;

$sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'full';

$sidebar_class = 'col-md-'.$sidebar_width_md.' col-lg-'.$sidebar_width;
if($sidebar_position == 'left' || $sidebar_position == 'right'){
	$content_class = 'col-md-'.(12 - $sidebar_width_md).' col-lg-'.(12 - $sidebar_width);
}elseif($sidebar_position == 'left_right'){
	$content_width = 12 - 2*$sidebar_width;
	$content_class = 'col-md-'.(12 - 2*$sidebar_width_md).' col-lg-'.(12 - 2*$sidebar_width);
}else{
	$content_class = 'col-md-12';
}

$post_titlebar = isset($asata_options['post_titlebar']) ? $asata_options['post_titlebar']: true;
if($post_titlebar) asata_titlebar();

if($table_of_content){
	$custom_script = "jQuery( function() {
						var settings = {
							target: 'h1,h2,h3,h4,h5,h6',
							default_text: 'Select table of content',
							content_witdh: 680,
							padding_left_right: 10,
							on_change( toc_obj, key_active ) { return; },
							on_show( toc_obj ) { return; },
							on_hide( toc_obj ) { return; },
						};

						new window.table_of_content( jQuery( '.post .bt-content' ), settings );
					} );";

	wp_add_inline_script( 'toc', $custom_script );
	wp_enqueue_script('toc');
	wp_enqueue_style('toc');
}

?>
	<div class="bt-main-content">
		<div class="<?php echo esc_attr($fullwidth); ?>">
			<div class="row">
				<!-- Start Left Sidebar -->
				<?php if($sidebar_position == 'left' || $sidebar_position == 'left_right'){ ?>
					<div class="bt-sidebar bt-left-sidebar <?php echo esc_attr($sidebar_class); ?>">
						<div class="bt-info-holder">
							<div class="bt-info-sticky">
								<?php echo get_sidebar('left'); ?>
							</div>
						</div>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="bt-content <?php echo esc_attr($content_class); ?>">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'framework/templates/blog/entry');
						
						if($post_navigation) asata_post_nav();
						
						$author_desc = get_the_author_meta('description');
						if($author && $author_desc) echo asata_author_render();
						
						// If comments are open or we have at least one comment, load up the comment template.
						if($comment){
							if ( comments_open() || get_comments_number() ) comments_template();
						}
					endwhile;
					?>
				</div>
				<!-- End Content -->
				<!-- Start Right Sidebar -->
				<?php if($sidebar_position == 'right' || $sidebar_position == 'left_right'){ ?>
					<div class="bt-sidebar bt-right-sidebar <?php echo esc_attr($sidebar_class); ?>">
						<div class="bt-info-holder">
							<div class="bt-info-sticky">
								<?php echo get_sidebar('right'); ?>
							</div>
						</div>
					</div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>
