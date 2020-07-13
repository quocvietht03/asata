<?php
class WPBakeryShortCode_bt_post_box extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts( array_merge(
			array(
				'layout' => 'post-box-default',
				'image_align' => 'left',
				'overlay_color' => '',
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				'css' => ''
			),
			vc_attr_add_image_group( 'image' ),
			vc_attr_add_text_group( 'number' ),
			vc_attr_add_meta_group( 'meta', array('category', 'date') ),
			vc_attr_add_text_group( 'title' ),
			vc_attr_add_font_style( 'content' ),
			vc_attr_add_link_group( 'link' )
		), $atts));
		
		$content = wpb_js_remove_wpautop($content, true);
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-post-box-element',
			$layout,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		if($layout == 'post-box-default'){
			$css_class[] = 'bt-image-float-'.$image_align;
		}
		
		$wrap_attr = array();
		$wrap_attr[] = 'class="' . esc_attr( implode(' ', $css_class) ) . '"';
		if ( ! empty( $el_id ) ) {
			$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		$img = asata_get_image_type('attachment', $image, $image_type, $image_ratio , $image_size);
		
		ob_start();
		?>
		<div <?php echo implode(' ', $wrap_attr); ?>>
			<?php require get_template_directory().'/framework/elements/post_layouts/'.$layout.'.php'; ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Post Box', 'asata'),
	'base' => 'bt_post_box',
	'category' => esc_html__('BT Elements', 'asata'),
	'icon' => 'bt-icon',
	'params' => array_merge(
		array(
			array(
				'type' => 'bt_layout',
				'folder' => 'post',
				'heading' => esc_html__('Layout', 'asata'),
				'param_name' => 'layout',
				'value' => array(
					esc_html__('Default', 'asata') => 'post-box-default',
					esc_html__('Layout 1', 'asata') => 'post-box-layout1'
				),
				'admin_label' => true,
				'description' => esc_html__('Select layout style in this elment.', 'asata')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Image Alignment', 'asata'),
				'param_name' => 'image_align',
				'value' => array(
					esc_html__('Left', 'asata') => 'left',
					esc_html__('Right', 'asata') => 'right'
				),
				'dependency' => array(
					'element'=>'layout',
					'value'=> 'post-box-default'
				),
				'description' => esc_html__('Select image alignment.', 'asata')
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Overlay Color', 'asata'),
				'param_name' => 'overlay_color',
				'value' => '',
				'dependency' => array(
					'element'=>'layout',
					'value'=> 'post-box-layout1'
				),
				'description' => esc_html__('Select overlay color in this element.', 'asata')
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
			)
		), 
		vc_map_add_image_group( 'image', 'Image', array() ), 
		vc_map_add_text_group( 'number', 'Number', false, false, array( 'element' => 'layout', 'value' => 'post-box-default' ) ), 
		vc_map_add_text_group( 'title', 'Title', true, true, array() ), 
		vc_map_add_meta_group( 'meta', 'Meta', array(), array('category' => 'Category', 'date' => 'Date') ), 
		vc_map_add_content_group(), 
		vc_map_add_link_group( 'link', 'Extra Link', true, array() ), 
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
