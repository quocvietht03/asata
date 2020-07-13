<?php
class WPBakeryShortCode_bt_counter extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts( array_merge(
			array(
				'style' => 'icon-top',
				'align' => 'text-left',
				'number_add_prefix' => '',
				'number_add_suffix' => '',
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				'css' => ''
				
			),
			vc_attr_add_icon_group( 'font' ),
			vc_attr_add_text_group( 'number' ),
			vc_attr_add_text_group( 'number_prefix' ),
			vc_attr_add_text_group( 'number_suffix' ),
			vc_attr_add_text_group( 'number_before' ),
			vc_attr_add_text_group( 'number_after' ),
			vc_attr_add_text_group( 'title' )
		), $atts));
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-counter-element',
			$style,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		if($style == 'icon-top') $css_class[] = $align;
		
		$wrap_attr = array();
		$wrap_attr[] = 'class="' . esc_attr( implode(' ', $css_class) ) . '"';
		if ( ! empty( $el_id ) ) {
			$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		wp_enqueue_script('counterup');
		
		ob_start();
		?>
			<div <?php echo implode(' ', $wrap_attr); ?>>
				<?php
					echo vc_render_icon_group($atts);
					if($number){
						$style_number = vc_render_font_style( $number_font_size, $number_line_height, $number_letter_spacing, $number_color );
						echo '<h2 class="bt-number-wrap" '.implode(' ', $style_number).'>';
							if($number_add_prefix){
								$style_prefix = vc_render_font_style( $number_prefix_font_size, $number_prefix_line_height, $number_prefix_letter_spacing, $number_prefix_color );
								echo '<span class="bt-prefix" '.implode(' ', $style_prefix).'>'.$number_prefix.'</span>';
							}
							echo '<span class="bt-number">'.$number.'</span>';
							if($number_add_suffix){
								$style_suffix = vc_render_font_style( $number_suffix_font_size, $number_suffix_line_height, $number_suffix_letter_spacing, $number_suffix_color );
								echo '<span class="bt-suffix" '.implode(' ', $style_suffix).'>'.$number_suffix.'</span>';
							}
						echo '</h2>';
					}
					echo vc_render_title_group($atts); 
				?>
			</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Counter', 'asata'),
	'base' => 'bt_counter',
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
					'element' => 'style',
					'value' => 'icon-top'
				),
				'description' => esc_html__('Select layout align in this elment.', 'asata')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Nubmer add prefix?', 'asata' ),
				'param_name' => 'number_add_prefix'
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Nubmer add suffix?', 'asata' ),
				'param_name' => 'number_add_suffix'
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
		vc_map_add_text_group( 'number', 'Number', false, false, array() ), 
		vc_map_add_text_group( 'number_prefix', 'Prefix', false, false, array( 'element' => 'number_add_prefix', 'value' => 'true' ) ), 
		vc_map_add_text_group( 'number_suffix', 'Suffix', false, false, array( 'element' => 'number_add_suffix', 'value' => 'true' ) ), 
		vc_map_add_text_group( 'title', 'Title', true, true, array() ), 
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
