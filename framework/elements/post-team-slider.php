<?php
class WPBakeryShortCode_bt_post_team_slider extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'layout' =>  'default',
			'css_animation' => '',
			'el_id' => '',
			'el_class' => '',
			
			'css' => ''
			
		), $atts));
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-post-team-slider-element',
			$layout,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrap_attr = array();
		$wrap_attr[] = 'class="' . esc_attr( implode(' ', $css_class) ) . '"';
		if ( ! empty( $el_id ) ) {
			$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		$custom_script = "jQuery(document).ready(function($) {
							if ($('.bt-post-team-slider-element .owl-carousel').length) {
								$('.bt-post-team-slider-element .owl-carousel').each(function() {
									$(this).owlCarousel({
										items: 1,
										dots: false,
										mouseDrag: false,
										touchDrag: false,
										pullDrag: false,
										URLhashListener: true,
										startPosition: 'URLHash',
										animateIn: 'slideInUp',
										animateOut: 'fadeOut'
									});
								});
								
								var hash = location.hash,
									nav_btn = $('.bt-post-team-slider-element .bt-thumb-nav .bt-btn');
								
								if(hash === ''){
									nav_btn.each(function() {
										if($(this).attr('href') == '#bt-hash-0') {
											$(this).addClass('active');
										}
									});
								}else{
									nav_btn.each(function() {
										if($(this).attr('href') == location.hash) {
											$(this).addClass('active');
										}
									});
								}
								nav_btn.on( 'click', function() {
									nav_btn.removeClass('active');
									$(this).addClass('active');
								});
							}
						});";
		
		wp_add_inline_script( 'asata-main', $custom_script );
		wp_enqueue_script('owl-carousel');
		wp_enqueue_style('owl-carousel');
		
		ob_start();
		?>
		<div <?php echo implode(' ', $wrap_attr); ?>>
			<?php $post_team = vc_param_group_parse_atts( $atts['post_team'] ); ?>
			
			<div class="owl-carousel">
				<?php
					if(!empty($post_team)){
						foreach($post_team as $key => $team){
						?>
							<div class="bt-item" data-hash="bt-hash-<?php echo esc_attr($key); ?>">
								<div class="row align-items-center">
									<div class="col-lg-6 col-md-12">
										<?php
											$attachment_image = wp_get_attachment_image_src($team['image'], 'full', false);
											$img = $attachment_image[0]?'<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr__('Thumbnail', 'asata').'"/>':'';
											if($img) echo '<div class="bt-image">'.$img.'</div>'; 
										?>
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="bt-content">
											<?php
												$title_link = isset($team['title_link'])?vc_build_link( $team['title_link'] ):array();
												$title_link_attributes = array();
												if(!empty($title_link)){
													if ( ! empty( $title_link['url'] ) ) {
														$title_link_attributes[] = 'href="' . esc_url( $title_link['url'] ) . '"';
													}
													
													if ( ! empty( $title_link['target'] ) ) {
														$title_link_attributes[] = 'target="' . esc_attr( $title_link['target'] ) . '"';
													}
													
													if ( ! empty( $title_link['rel'] ) ) {
														$title_link_attributes[] = 'rel="' . esc_attr( $title_link['rel'] ) . '"';
													}
													
													if ( ! empty( $title_link['title'] ) ) {
														$title_link_attributes[] = 'title ="'.esc_attr($title_link['title']).'"';
													}
												}
												
												if($team['title']){
													if(!empty($title_link_attributes)){
														echo '<h3 class="bt-title"><a '.implode(' ', $title_link_attributes).'>'.$team['title'].'</a></h3>';
													}else{
														echo '<h3 class="bt-title" >'.$team['title'].'</h3>';
													}
												}
												
												if($team['position']) echo '<div class="bt-position">'.$team['position'].'</div>';
												
												if($team['description']) echo '<div class="bt-desc">'.$team['description'].'</div>';
												
												$social_media = vc_param_group_parse_atts( $team['social_media'] );
												if(!empty($social_media)){
													echo '<ul class="bt-social">';
														foreach($social_media as $social){
															$icon_class = isset($social['icon'])?$social['icon']:'';
															$icon = (!empty($icon_class))?'<i class="'.esc_attr($icon_class).'"></i>': '';
															
															$link = isset($social['link'])?vc_build_link( $social['link'] ):array();
															$link_before = '<a href="#">';
															$link_after = '</a>';
															$link_attributes = array();
															$link_attributes[] = 'class="bt-link"';
															
															$link_attributes[] = 'data-btIcon="'.esc_attr($icon_class).'"';
															
															if(!empty($link)){
																if ( ! empty( $link['url'] ) ) {
																	$link_attributes[] = 'href="' . esc_url( $link['url'] ) . '"';
																}
																if ( ! empty( $link['target'] ) ) {
																	$link_attributes[] = 'target="' . esc_attr( $link['target'] ) . '"';
																}
																if ( ! empty( $link['rel'] ) ) {
																	$link_attributes[] = 'rel="' . esc_attr( $link['rel'] ) . '"';
																}
																if ( ! empty( $link['title'] ) ) {
																	$link_attributes[] = 'title="'.esc_attr($link['title']).'"';
																}
																$link_before = '<a '.implode(' ', $link_attributes).'>';
																$link_after = '</a>';
															}
															if($icon){
																echo '<li>'.$link_before.$icon.$link_after.'</li>';
															}
														}
													echo '</ul>';
												}
											?>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
					}
				?>
			</div>
			
			<div class="bt-thumb-nav">
				<?php
					if(!empty($post_team)){
						foreach($post_team as $key => $team){
							$attachment_image = wp_get_attachment_image_src($team['image'], 'thumbnail', false);
							
							?>
								<a class="bt-btn" href="#bt-hash-<?php echo esc_attr($key); ?>">
									<?php if($attachment_image[0]) echo '<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr__('Thumbnail', 'asata').'"/>'; ?>
								</a>
							<?php
						}
					}
				?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Post Team Slider', 'asata'),
	'base' => 'bt_post_team_slider',
	'category' => esc_html__('BT Elements', 'asata'),
	'icon' => 'bt-icon',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Layout', 'asata'),
			'param_name' => 'layout',
			'value' => array(
				esc_html__('Default', 'asata') => 'default'
			),
			'description' => esc_html__('Select layout style in this elment.', 'asata')
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'asata'),
			'param_name' => 'el_id',
			'value' => '',
			'description' => esc_html__('Enter element ID (Note: make sure it is unique and valid).', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra Class', 'asata'),
			'param_name' => 'el_class',
			'value' => '',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'asata')
		),
		array(
			'type' => 'param_group',
			'heading' => esc_html__('Post Team', 'asata'),
			'param_name' => 'post_team',
			'value' => '',
			'group' => esc_html__('Data Setting', 'asata'),
			'description' => esc_html__('Please, select custom data for option - post_team.', 'asata'),
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__('Image', 'asata'),
					'param_name' => 'image',
					'value' => '',
					'description' => esc_html__('Select featured image in this element.', 'asata')
				),
				array(
					'type' => 'textfield',
					'heading' => 'Title',
					'param_name' => 'title',
					'value' => 'Post title',
					'description' => esc_html__('Enter text used as title of team.', 'asata'),
					'admin_label' => true,
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__('URL (Link)', 'asata'),
					'param_name' => 'title_link',
					'description' => esc_html__('Add link of team in this element.', 'asata')
				),
				array(
					'type' => 'textfield',
					'heading' => 'Position',
					'param_name' => 'position',
					'value' => 'Post Position',
					'description' => esc_html__('Enter text used as position of team.', 'asata')
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__('Description', 'asata'),
					'param_name' => 'description',
					'value' => '',
					'description' => esc_html__('Please, enter description in this element.', 'asata')
				),
				array(
					'type' => 'param_group',
					'heading' => esc_html__('Social Media', 'asata'),
					'param_name' => 'social_media',
					'value' => '',
					'group' => esc_html__('Data Setting', 'asata'),
					'description' => esc_html__('Please, select logo for option - social_media.', 'asata'),
					'params' => array(
						array(
							'type' => 'textfield',
							'class' => '',
							'heading' => esc_html__('Icon', 'asata'),
							'param_name' => 'icon',
							'value' => 'fa fa-facebook',
							'description' => esc_html__('Please, enter class font icon in this element.', 'asata'),
							'admin_label' => true,
						),
						array(
							'type' => 'vc_link',
							'heading' => esc_html__('URL (Link)', 'asata'),
							'param_name' => 'link',
							'description' => esc_html__('Add link of social in this element.', 'asata')
						),
					)
				),
			)
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__('CSS box', 'asata'),
			'param_name' => 'css',
			'group' => esc_html__('Design Options', 'asata'),
		)
	)
));
