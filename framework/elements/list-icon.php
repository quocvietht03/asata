<?php
class WPBakeryShortCode_bt_list_icon extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		extract(shortcode_atts( array_merge(
			array(
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				'css' => ''
			),
			vc_attr_add_font_style( 'item' )
		), $atts));
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-list-icon-element',
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrap_attr = array();
		$wrap_attr[] = 'class="' . esc_attr( implode(' ', $css_class) ) . '"';
		if ( ! empty( $el_id ) ) {
			$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		$style = vc_render_font_style( $item_font_size, $item_line_height, $item_letter_spacing, $item_color );
		
		ob_start();
		?>
		<div <?php echo implode(' ', $wrap_attr); ?>>
			<ul <?php echo implode(' ', $style) ?>>
				<?php 
					$list_data = vc_param_group_parse_atts( $atts['list_data'] );
					if(isset($list_data)){
						foreach($list_data as $item){
							$icon = '';
							if(isset($item['item_add_icon'])){
								vc_icon_element_fonts_enqueue( $item['item_icon_type'] );
								$iconClass = $item['item_icon_'.$item['item_icon_type']] ? $item['item_icon_'.$item['item_icon_type']] : 'fa fa-adjust';
								$icon = '<i class="'.esc_attr($iconClass).'"></i>';
							}
							$link = isset($item['link']) ? vc_build_link( $item['link'] ):array();
							
							$link_attr = vc_render_link_attr($link);
							if(isset($item['text'])){
								if(!empty($link_attr)){
									echo '<li>'.$icon.'<a '.implode(' ', $link_attr).'>'.$item['text'].'</a></li>';
								}else{
									echo '<li>'.$icon.$item['text'].'</li>';
								}
							}
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
	'name' => esc_html__('List Icon', 'asata'),
	'base' => 'bt_list_icon',
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
				'heading' => esc_html__('List Item', 'asata'),
				'param_name' => 'list_data',
				'value' => '',
				'group' => esc_html__('Data', 'asata'),
				'description' => esc_html__('Add data for option - list_data.', 'asata'),
				'params' => array_merge(
					array(
						array(
							'type' => 'checkbox',
							'heading' => esc_html__( 'Add icon?', 'asata' ),
							'param_name' => 'item_add_icon',
						)
					),
					vc_map_add_icon_select( 'item', '', array( 'element' => 'item_add_icon', 'value' => 'true' ) ),
					array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Text', 'asata'),
							'param_name' => 'text',
							'value' => '',
							'admin_label' => true,
							'description' => esc_html__('Enter text.', 'asata')
						),
						array(
							'type' => 'vc_link',
							'heading' => esc_html__('URL (Link)', 'asata'),
							'param_name' => 'link',
							'description' => esc_html__('Add custom link.', 'asata')
						)
					)
				)
			)
		),
		vc_map_add_font_style( 'item', 'Style', array() ),
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
