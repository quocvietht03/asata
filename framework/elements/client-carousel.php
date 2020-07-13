<?php
class WPBakeryShortCode_bt_client_carousel extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		extract(shortcode_atts(array_merge(
			array(
				'layout' => 'default',
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				'css' => ''
			),
			vc_attr_add_image_group( 'image' ),
			vc_attr_add_add_owl_group()
		), $atts));
		
		global $asata_options;
		$nav_dots = (isset($asata_options['nav_dots_style'])&&$asata_options['nav_dots_style'])?'nav-dots-style'.$asata_options['nav_dots_style']:'nav-dots-style0';
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-client-carousel-element',
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
		
		$client_logo = vc_param_group_parse_atts( $atts['client_logo'] );
		
		$custom_script = "jQuery(document).ready(function($) {
							if ($('.bt-client-carousel-element .owl-carousel').length) {
								$('.bt-client-carousel-element .owl-carousel').each(function() {
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
		
		if(!empty($client_logo)){
		?>
			<div <?php echo implode(' ', $wrap_attr); ?>>
				<div class="owl-carousel" data-owl="<?php echo esc_attr($owl_json); ?>">
					<?php
						if($rows == 1){
							foreach($client_logo as $logo){
								/* Link */
								$link = isset($logo['link'])?vc_build_link( $logo['link'] ):array();
								$link_attributes = array();
								$link_attributes[] = 'class="bt-link"';
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
								}
								
								/* Logo */
								$img = asata_get_image_type('attachment', $logo['logo'], $image_type, $image_ratio , $image_size);
								
								if($img){
									echo '<div class="bt-item">
										<a '.implode(' ', $link_attributes).'>'.$img.'</a>
									</div>';
								}
							}
						}else{
							$client_logo_count = count($client_logo);
							$count = 0;
							
							foreach($client_logo as $logo){
								/* Link */
								$link = isset($logo['link'])?vc_build_link( $logo['link'] ):array();
								$link_before = $link_after = '';
								$link_attributes = array();
								$link_attributes[] = 'class="bt-link"';
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
								
								/* Logo */
								$img = asata_get_image_type('attachment', $logo['logo'], $image_type, $image_ratio , $image_size);
								
								if($count == 0 || $count%$rows == 0) echo '<div class="bt-items">';
									if($img){
										echo '<div class="bt-item">'.$link_before.$img.$link_after.'</div>';
									}
									$count++;
								if($count == $client_logo_count || $count%$rows == 0) echo '</div>';
							}
						}
					?>
				</div>
			</div>
		<?php
		}
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Client Carousel', 'asata'),
	'base' => 'bt_client_carousel',
	'category' => esc_html__('BT Elements', 'asata'),
	'icon' => 'bt-icon',
    'params' => array_merge(
		array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Layout', 'asata'),
				'param_name' => 'layout',
				'value' => array(
					esc_html__('Default', 'asata') => 'default'
				),
				'admin_label' => true,
				'description' => esc_html__('Select layout of items display in this element.', 'asata')
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
				'heading' => esc_html__('Client Logo', 'asata'),
				'param_name' => 'client_logo',
				'value' => '',
				'group' => esc_html__('Data', 'asata'),
				'description' => esc_html__('Please, select logo for option - client_logo.', 'asata'),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => 'Name',
						'param_name' => 'name',
						'value' => 'Logo name',
						'description' => esc_html__('Enter text used as name of logo.', 'asata'),
						'admin_label' => true,
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Logo', 'asata'),
						'param_name' => 'logo',
						'value' => '',
						'description' => esc_html__('Select client logo in this element.', 'asata')
					),
					array(
						'type' => 'vc_link',
						'heading' => esc_html__('URL (Link)', 'asata'),
						'param_name' => 'link',
						'description' => esc_html__('Add link of logo in this element.', 'asata')
					),
				)
			)
		),
		vc_map_add_image_size_group( 'image', 'Data', array() ),
		vc_map_add_owl_group(),
		array(
			array(
				'type' => 'css_editor',
				'heading' => esc_html__('CSS box', 'asata'),
				'param_name' => 'css',
				'group' => esc_html__('Design Options', 'asata'),
			)
		)
	)
));
