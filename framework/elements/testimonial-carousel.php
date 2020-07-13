<?php
class WPBakeryShortCode_bt_testimonial_carousel extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		extract(shortcode_atts(array_merge(
			array(
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				'layout' => 'default',
				'css' => ''
			),
			vc_attr_add_add_data_group(),
			vc_attr_add_add_owl_group(),
			vc_attr_add_add_post_media_group()
		), $atts));
		
		global $asata_options;
		$nav_dots = (isset($asata_options['nav_dots_style'])&&$asata_options['nav_dots_style'])?'nav-dots-style'.$asata_options['nav_dots_style']:'nav-dots-style0';
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-testimonial-carousel-element',
			$layout,
			$nav_dots,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrap_attr = array();
		$wrap_attr[] = 'class="' . esc_attr( implode(' ', $css_class) ) . '"';
		if ( ! empty( $el_id ) ) {
			$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		$owl_json = vc_render_owl_group($atts);
		
		$wp_query = vc_render_query_group($atts, 'bt_testimonial', 'bt_testimonial_category');
		
		$custom_script = "jQuery(document).ready(function($) {
							if ($('.bt-testimonial-carousel-element .owl-carousel').length) {
								$('.bt-testimonial-carousel-element .owl-carousel').each(function() {
									$(this).owlCarousel($(this).data('owl'));
									
									var obj = $(this).data('owl');
									if (obj.rows > 1){
										$(this).find('.bt-item').css('margin-bottom', obj.margin + 'px');
									}
								});
							}
						});";
		
		wp_add_inline_script( 'asata-main', $custom_script );
		wp_enqueue_script('owl-carousel');
		wp_enqueue_style('owl-carousel');
		
		ob_start();
		if ( $wp_query->have_posts() ) {
		?>
			<div <?php echo implode(' ', $wrap_attr); ?>>
				<div class="owl-carousel" data-owl="<?php echo esc_attr($owl_json); ?>">
					<?php
						if($rows == 1){
							while ( $wp_query->have_posts() ) { $wp_query->the_post();
								require get_template_directory().'/framework/elements/testimonial_layouts/'.$layout.'.php';
							}
						}else{
							$post_count = $wp_query->post_count;
							$count = 0;
							while ( $wp_query->have_posts() ) { $wp_query->the_post();
								if($count == 0 || $count%$rows == 0) echo '<div class="bt-items">';
									require get_template_directory().'/framework/elements/testimonial_layouts/'.$layout.'.php';
									$count++;
								if($count == $post_count || $count%$rows == 0) echo '</div>';
							}
						}
					?>
				</div>
			</div>
		<?php
		} else {
			esc_html_e('Post not found!', 'asata');
		}
		wp_reset_query();
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Testimonial Carousel', 'asata'),
	'base' => 'bt_testimonial_carousel',
	'category' => esc_html__('BT Elements', 'asata'),
	'icon' => 'bt-icon',
    'params' => array_merge(
		array(
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
		),
		vc_map_add_data_group('bt_testimonial_category', 'Data'),
		vc_map_add_owl_group(),
		array(
			array(
				'type' => 'bt_layout',
				'folder' => 'testimonial',
				'heading' => esc_html__('Layout', 'asata'),
				'param_name' => 'layout',
				'value' => array(
					esc_html__('Default', 'asata') => 'default',
					esc_html__('Layout 1', 'asata') => 'layout1',
					esc_html__('Layout 2', 'asata') => 'layout2',
					esc_html__('Layout 3', 'asata') => 'layout3',
					esc_html__('Layout 4', 'asata') => 'layout4',
					esc_html__('Layout 5', 'asata') => 'layout5'
				),
				'admin_label' => true,
				'group' => esc_html__('Item', 'asata'),
				'description' => esc_html__('Select layout of items display in this element.', 'asata')
			),
		),
		vc_map_add_post_media_group( 'media', 'Item', array()),
		array(
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'asata' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'asata' ),
			)
		)
	)
));
