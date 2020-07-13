<?php
class WPBakeryShortCode_bt_fancy_box extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		extract(shortcode_atts( array_merge(
			array(
				'style' => 'icon-top',
				'align' => 'text-left',
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				'css' => ''
			),
			vc_attr_add_icon_group( 'font' ),
			vc_attr_add_text_group( 'title' ),
			vc_attr_add_font_style( 'content' ),
			vc_attr_add_link_group( 'link' )
		), $atts));
		
		if($style == 'icon-left') $align = 'text-left';
		if($style == 'icon-right') $align = 'text-right';
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-fancy-box-element',
			$style,
			$align,
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
			<?php echo vc_render_icon_group($atts); ?>
			<div class="bt-content">
				<?php 
					echo vc_render_title_group($atts)
						.vc_render_content_group($atts, $content)
						.vc_render_link_group($atts);
				?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Fancy Box', 'asata'),
	'base' => 'bt_fancy_box',
	'category' => esc_html__('BT Elements', 'asata'),
	'icon' => 'bt-icon',
	'params' => array_merge(
		array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style', 'asata'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Icon Top', 'asata') => 'icon-top',
					esc_html__('Icon Left', 'asata') => 'icon-left',
					esc_html__('Icon Right', 'asata') => 'icon-right'
				),
				'description' => esc_html__('Select layout style in this elment.', 'asata')
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Align', 'asata'),
				'param_name' => 'align',
				'value' => array(
					esc_html__('Left', 'asata') => 'text-left',
					esc_html__('Center', 'asata') => 'text-center',
					esc_html__('Right', 'asata') => 'text-right',
				),
				'dependency' => array(
					'element'=>'style',
					'value'=> 'icon-top'
				),
				'description' => esc_html__('Select layout align in this elment.', 'asata')
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
		vc_map_add_icon_group( 'icon', 'Icon' ),
		vc_map_add_text_group( 'title', 'Title', true, true, array() ), 
		vc_map_add_content_group(), 
		vc_map_add_link_group('link', 'Extra Link', true, array()), 
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
