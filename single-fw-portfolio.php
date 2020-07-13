<?php get_header(); ?>
<?php
global $asata_options;
$fullwidth = isset($asata_options['single_portolio_fullwidth'])&&$asata_options['single_portolio_fullwidth'] ? 'container-fluid': 'bt-container';
$sidebar_width = (int) isset($asata_options['single_portolio_sidebar_width']) ?  $asata_options['single_portolio_sidebar_width']: 3;
$sidebar_width_md = $sidebar_width + 1;
$related_post = isset($asata_options['single_portfolio_related_post']) ? $asata_options['single_portfolio_related_post']: true;
$related_post_label = isset($asata_options['single_portfolio_related_post_label'])&&$asata_options['single_portfolio_related_post_label'] ? $asata_options['single_portfolio_related_post_label']: esc_html__('Portfolio Related', 'asata');
$related_post_count = (int) isset($asata_options['single_portfolio_related_post_count'])&&$asata_options['single_portfolio_related_post_count'] ? $asata_options['single_portfolio_related_post_count']: 3;
$related_post_per_row = (int) isset($asata_options['single_portfolio_related_post_per_row'])&&$asata_options['single_portfolio_related_post_per_row'] ? $asata_options['single_portfolio_related_post_per_row']: 3;

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

$single_portfolio_titlebar = isset($asata_options['single_portfolio_titlebar']) ? $asata_options['single_portfolio_titlebar']: true;
if($single_portfolio_titlebar) asata_titlebar();
?>
	<div class="bt-main-content">
		<div class="<?php echo esc_attr($fullwidth); ?>">
			<div class="row">
				<!-- Start Left Sidebar -->
				<?php if($sidebar_position == 'left' || $sidebar_position == 'left_right'){ ?>
					<div class="bt-sidebar bt-left-sidebar <?php echo esc_attr($sidebar_class); ?>">
						<?php echo get_sidebar('left'); ?>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="bt-content <?php echo esc_attr($content_class); ?>">
					<?php
					while ( have_posts() ) : the_post();
						$portfolio_options = function_exists('fw_get_db_post_option')?fw_get_db_post_option(get_the_ID(), 'portfolio_options'):array();
						$layout = isset($portfolio_options['layout'])?$portfolio_options['layout']:'default';
						get_template_part( 'framework/templates/portfolio/single/'.$layout);
					endwhile;
					?>
					<?php if($related_post){ ?>
						<div class="bt-related">
							<?php
								$taxterms = wp_get_object_terms( get_the_ID(), 'fw-portfolio-category', array('fields' => 'ids') );
								
								$args = array(
								'post_type' => 'fw-portfolio',
								'post_status' => 'publish',
								'posts_per_page' => $related_post_count,
								'tax_query' => array(
									array(
										'taxonomy' => 'fw-portfolio-category',
										'field' => 'id',
										'terms' => $taxterms
									)
								),
								'post__not_in' => array (get_the_ID()),
								);
								$related_items = new WP_Query( $args );
								
								$columns_class = 'col-md-6 col-lg-'.(12/$related_post_per_row);
								// loop over query
								if ($related_items->have_posts()) :
								?>
									<h3 class="bt-title"><?php echo esc_html($related_post_label); ?></h3>
									<div class="row">
										<?php while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
											<div class="<?php echo esc_attr($columns_class); ?>" style="margin-bottom: 30px">
												<div class="bt-item">
													<div class="bt-thumb">
														<div class="bt-image">
															<?php echo asata_get_image_type('thumbnail', get_the_ID(), 'ratio', 76 , 'full'); ?>
														</div>
													</div>
													<div class="bt-content">
														<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
														<?php the_terms( get_the_ID(), 'fw-portfolio-category', '<div class="bt-term">', ', ', '</div>' ); ?>
													</div>
												</div>
											</div>
										<?php endwhile; ?>
									</div>
								<?php
								endif;
								wp_reset_postdata();
							?>
						</div>
					<?php } ?>
				</div>
				<!-- End Content -->
				<!-- Start Right Sidebar -->
				<?php if($sidebar_position == 'right' || $sidebar_position == 'left_right'){ ?>
					<div class="bt-sidebar bt-right-sidebar <?php echo esc_attr($sidebar_class); ?>">
						<?php echo get_sidebar('right'); ?>
					</div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>
