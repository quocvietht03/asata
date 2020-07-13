<?php
class WPBakeryShortCode_bt_steps extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		extract(shortcode_atts( array_merge(
			array(
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				'css' => ''
			)
		), $atts));
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-steps-element',
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrap_attr = array();
		$wrap_attr[] = 'class="' . esc_attr( implode(' ', $css_class) ) . '"';
		if ( ! empty( $el_id ) ) {
			$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		ob_start();
		?>
		<div <?php echo implode(' ', $wrap_attr); ?>>
			<ul>
				<?php 
					$steps_data = vc_param_group_parse_atts( $atts['steps_data'] );
					if(!empty($steps_data)){
						foreach($steps_data as $key => $item){
							$link = isset($item['link']) ? vc_build_link( $item['link'] ):array();
							$link_attr = vc_render_link_attr($link);
							$order = '<span class="bt-number">' . ($key + 1) . '</span>';
							$title = $desc = '';
							if(isset($item['title'])){
								$title = !empty($link_attr) ? '<h3 class="bt-title"><a '.implode(' ', $link_attr).'>'.$item['title'].'</a></h3>' : '<h3 class="bt-title">'.$item['title'].'</h3>';
							}
							if(isset($item['description'])){
								$desc = '<div class="bt-desc">'.$item['description'].'</div>';
							}
							echo '<li>'
									.$order
									.$title
									.$desc
								.'</li>';
						}
					}
				?>
			</ul>
		</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Steps', 'asata'),
	'base' => 'bt_steps',
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
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Steps', 'asata'),
				'param_name' => 'steps_data',
				'value' => '',
				'group' => esc_html__('Data', 'asata'),
				'description' => esc_html__('Add data for option - list_data.', 'asata'),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'asata'),
						'param_name' => 'title',
						'value' => '',
						'admin_label' => true,
						'description' => esc_html__('Enter text.', 'asata')
					),
					array(
						'type' => 'vc_link',
						'heading' => esc_html__('URL (Link)', 'asata'),
						'param_name' => 'link',
						'description' => esc_html__('Add custom link.', 'asata')
					),
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Description', 'asata'),
						'param_name' => 'description',
						'value' => '',
						'description' => esc_html__('Enter description.', 'asata')
					)
				)
			)
		),
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
