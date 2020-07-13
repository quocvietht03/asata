<?php
class WPBakeryShortCode_bt_pricing_table extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'layout' => 'default',
			'featured' => '',
			'css_animation' => '',
			'el_id' => '',
			'el_class' => '',
			
			'icon_type' => 'font_icon',
			'font_icon' => 'fa fa-adjust',
			'image_icon' => '',
			'icon_font_size' => '',
			'icon_color' => '',
			'icon_background' => '',
			
			'price' => esc_html__('4.99', 'asata'),
			'price_font_size' => '',
			'price_line_height' => '',
			'price_letter_spacing' => '',
			'price_color' => '',
			'unit' => esc_html__('$', 'asata'),
			'unit_font_size' => '',
			'unit_line_height' => '',
			'unit_letter_spacing' => '',
			'unit_color' => '',
			'time' => esc_html__('per month', 'asata'),
			'time_font_size' => '',
			'time_line_height' => '',
			'time_letter_spacing' => '',
			'time_color' => '',
			
			'title' => esc_html__('Basic', 'asata'),
			'title_font_size' => '',
			'title_line_height' => '',
			'title_letter_spacing' => '',
			'title_color' => '',
			
			'options_font_size' => '',
			'options_line_height' => '',
			'options_letter_spacing' => '',
			'options_color' => '',
			
			'button_text' => esc_html__('Select Plan', 'asata'),
			'button_font_size' => '',
			'button_font_weight' => '',
			'button_line_height' => '',
			'button_letter_spacing' => '',
			'button_color' => '',
			'button_background' => '',
			'button_padding' => '',
			'button_border_style' => '',
			'button_border_width' => '',
			'button_border_color' => '',
			'button_border_radius' => '',
			
			'css' => ''
			
		), $atts));
		
		$ft_class = $featured ? ' is-featured': '';
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element bt-pricing-table-element' . $ft_class,
			$layout,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrap_attr = array();
		$wrap_attr[] = 'class="' . esc_attr( implode(' ', $css_class) ) . '"';
		if ( ! empty( $el_id ) ) {
			$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		/* Icon */
		$style_icon = array();
		if($icon_color) $style_icon[] = 'color: '.$icon_color.';';
		if($icon_background) $style_icon[] = 'background: '.$icon_background.';';
		
		$icon_attributes = array();
		if ( ! empty( $style_icon ) ) {
			$icon_attributes[] = 'style="' . esc_attr( implode(' ', $style_icon) ) . '"';
		}
		
		if($icon_type == 'font_icon'){
			$icon_size_style = $icon_font_size?'font-size: '.$icon_font_size.';':'';
			$icon = $font_icon?'<i class="'.esc_attr($font_icon).'" style="'.esc_attr($icon_size_style).'"></i>':'';
		}else{
			$icon_size_style = $icon_font_size?'width: '.$icon_font_size.'; height: auto;':'';
			$attachment_image = wp_get_attachment_image_src($image_icon, 'full', false);
			$icon = $attachment_image[0]?'<img src="'.esc_url($attachment_image[0]).'" style="'.esc_attr($icon_size_style).'" alt="'.esc_attr__('Thumbnail', 'asata').'"/>':'';
		}
		
		/* Price & Time */
		$style_price = array();
		if($price_font_size) $style_price[] = 'font-size: '.$price_font_size.';';
		if($price_line_height) $style_price[] = 'line-height: '.$price_line_height.';';
		if($price_letter_spacing) $style_price[] = 'letter-spacing: '.$price_letter_spacing.';';
		if($price_color) $style_price[] = 'color: '.$price_color.';';
		
		$price_attributes = array();
		if ( ! empty( $style_price ) ) {
			$price_attributes[] = 'style="' . esc_attr( implode(' ', $style_price) ) . '"';
		}
		
		$style_unit = array();
		if($unit_font_size) $style_unit[] = 'font-size: '.$unit_font_size.';';
		if($unit_line_height) $style_unit[] = 'line-height: '.$unit_line_height.';';
		if($unit_letter_spacing) $style_unit[] = 'letter-spacing: '.$unit_letter_spacing.';';
		if($unit_color) $style_unit[] = 'color: '.$unit_color.';';
		
		$unit_attributes = array();
		if ( ! empty( $style_unit ) ) {
			$unit_attributes[] = 'style="' . esc_attr( implode(' ', $style_unit) ) . '"';
		}
		
		$style_time = array();
		if($time_font_size) $style_time[] = 'font-size: '.$time_font_size.';';
		if($time_line_height) $style_time[] = 'line-height: '.$time_line_height.';';
		if($time_letter_spacing) $style_time[] = 'letter-spacing: '.$time_letter_spacing.';';
		if($time_color) $style_time[] = 'color: '.$time_color.';';
		
		$time_attributes = array();
		if ( ! empty( $style_time ) ) {
			$time_attributes[] = 'style="' . esc_attr( implode(' ', $style_time) ) . '"';
		}
		
		/* Title */
		$style_title = array();
		if($title_font_size) $style_title[] = 'font-size: '.$title_font_size.';';
		if($title_line_height) $style_title[] = 'line-height: '.$title_line_height.';';
		if($title_letter_spacing) $style_title[] = 'letter-spacing: '.$title_letter_spacing.';';
		if($title_color) $style_title[] = 'color: '.$title_color.';';
		
		$title_attributes = array();
		if ( ! empty( $style_title ) ) {
			$title_attributes[] = 'style="' . esc_attr( implode(' ', $style_title) ) . '"';
		}
		
		/* Options */
		$style_options = array();
		if($options_font_size) $style_options[] = 'font-size: '.$options_font_size.';';
		if($options_line_height) $style_options[] = 'line-height: '.$options_line_height.';';
		if($options_letter_spacing) $style_options[] = 'letter-spacing: '.$options_letter_spacing.';';
		if($options_color) $style_options[] = 'color: '.$options_color.';';
		
		$options_attributes = array();
		if ( ! empty( $style_options ) ) {
			$options_attributes[] = 'style="' . esc_attr( implode(' ', $style_options) ) . '"';
		}
		
		$options = vc_param_group_parse_atts( $atts['options'] );
		$options_value = array();
		if(!empty($options)){
			foreach($options as $option){
				$tip = $option['tip'] ? '<strong>'.$option['tip'].'</strong>' : '';
				$options_value[] = '<li class="'.esc_attr($option['status']).'">'.$option['name'].$tip.'</li>';
			}
		}
		
		/* Button */
		$link = isset($atts['link'])?vc_build_link( $atts['link'] ):array();
		$button_attributes = array();
		if(!empty($link)){
			if ( ! empty( $link['url'] ) ) {
				$button_attributes[] = 'href="' . esc_url( $link['url'] ) . '"';
			}
			
			if ( ! empty( $link['target'] ) ) {
				$button_attributes[] = 'target="' . esc_attr( $link['target'] ) . '"';
			}
			
			if ( ! empty( $link['rel'] ) ) {
				$button_attributes[] = 'rel="' . esc_attr( $link['rel'] ) . '"';
			}
			
			if ( ! empty( $link['title'] ) ) {
				$button_attributes[] = 'title="' . esc_attr( $link['title'] ) . '"';
			}
		}else{
			$button_attributes[] = 'href="#"';
		}
		$style_button = array();
		if($button_font_size) $style_button[] = 'font-size: '.$button_font_size.';';
		if($button_font_weight) $style_button[] = 'font-weight: '.$button_font_weight.';';
		if($button_line_height) $style_button[] = 'line-height: '.$button_line_height.';';
		if($button_letter_spacing) $style_button[] = 'letter-spacing: '.$button_letter_spacing.';';
		if($button_color) $style_button[] = 'color: '.$button_color.';';
		if($button_background) $style_button[] = 'background: '.$button_background.';';
		if($button_padding) $style_button[] = 'padding: '.$button_padding.';';
		if($button_border_style) $style_button[] = 'border-style: '.$button_border_style.';';
		if($button_border_width) $style_button[] = 'border-width: '.$button_border_width.';';
		if($button_border_color) $style_button[] = 'border-color: '.$button_border_color.';';
		if($button_border_radius) $style_button[] = 'border-radius: '.$button_border_radius.'; -webkit-border-radius: '.$border_radius.';';
		
		if ( ! empty( $style_button ) ) {
			$button_attributes[] = 'style="' . esc_attr( implode(' ', $style_button) ) . '"';
		}
		
		ob_start();
		?>
		<div <?php echo implode(' ', $wrap_attr); ?>>
			<?php require get_template_directory().'/framework/elements/pricing_table_layouts/'.$layout.'.php'; ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Pricing Table', 'asata'),
	'base' => 'bt_pricing_table',
	'category' => esc_html__('BT Elements', 'asata'),
	'icon' => 'bt-icon',
	'params' => array(
		array(
			'type' => 'bt_layout',
			'folder' => 'price',
			'heading' => esc_html__('Layout', 'asata'),
			'param_name' => 'layout',
			'value' => array(
				esc_html__('Default', 'asata') => 'default',
				esc_html__('Layout 1', 'asata') => 'layout1'
			),
			'description' => esc_html__('Select layout style in this elment.', 'asata')
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Is Featured?', 'asata'),
			'param_name' => 'featured',
			'value' => '',
			'description' => esc_html__('Set featured in this element.', 'asata')
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
			'type' => 'dropdown',
			'heading' => esc_html__('Icon Type', 'asata'),
			'param_name' => 'icon_type',
			'value' => array(
				esc_html__('Font Icon', 'asata') => 'font_icon',
				esc_html__('Image Icon', 'asata') => 'image_icon'
			),
			'group' => esc_html__('Icon', 'asata'),
			'description' => esc_html__('Select type icon in this elment.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Icon', 'asata'),
			'param_name' => 'font_icon',
			'value' => 'fa fa-adjust',
			'group' => esc_html__('Icon', 'asata'),
			'dependency' => array(
				'element'=>'icon_type',
				'value'=> 'font_icon'
			),
			'description' => esc_html__('Please, enter class font icon from https://fontawesome.com/v4.7.0/cheatsheet/ in this element.Ex: fa fa-twitter', 'asata')
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__('Image Icon', 'asata'),
			'param_name' => 'image_icon',
			'value' => '',
			'group' => esc_html__('Icon', 'asata'),
			'dependency' => array(
				'element'=>'icon_type',
				'value'=> 'image_icon'
			),
			'description' => esc_html__('Select box image icon in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Size', 'asata'),
			'param_name' => 'icon_font_size',
			'value' => '',
			'group' => esc_html__('Icon', 'asata'),
			'description' => esc_html__('Please, enter number with px font size icon in this element. Ex: 30px', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Color', 'asata'),
			'param_name' => 'icon_color',
			'value' => '',
			'group' => esc_html__('Icon', 'asata'),
			'description' => esc_html__('Select color icon in this element.', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Background', 'asata'),
			'param_name' => 'icon_background',
			'value' => '',
			'group' => esc_html__('Icon', 'asata'),
			'description' => esc_html__('Select background color icon in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Price', 'asata'),
			'param_name' => 'price',
			'value' => esc_html__('4.99', 'asata'),
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter price in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Price Font Size', 'asata'),
			'param_name' => 'price_font_size',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number  with px font size price in this element. Ex: 20px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Price Line Height', 'asata'),
			'param_name' => 'price_line_height',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number with px line height price in this element. Ex: 24px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Price Letter Spacing', 'asata'),
			'param_name' => 'price_letter_spacing',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number with px letter spacing price in this element. Ex: 1.2px', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Price Color', 'asata'),
			'param_name' => 'price_color',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Select color price in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Unit', 'asata'),
			'param_name' => 'unit',
			'value' => esc_html__('$', 'asata'),
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter unit in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Unit Font Size', 'asata'),
			'param_name' => 'unit_font_size',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number  with px font size unit in this element. Ex: 20px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Unit Line Height', 'asata'),
			'param_name' => 'unit_line_height',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number with px line height unit in this element. Ex: 24px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Unit Letter Spacing', 'asata'),
			'param_name' => 'unit_letter_spacing',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number with px letter spacing unit in this element. Ex: 1.2px', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Unit Color', 'asata'),
			'param_name' => 'unit_color',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Select color unit in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Time', 'asata'),
			'param_name' => 'time',
			'value' => 'per month',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter time in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Time Font Size', 'asata'),
			'param_name' => 'time_font_size',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number  with px font size time in this element. Ex: 14px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Time Line Height', 'asata'),
			'param_name' => 'time_line_height',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number with px line height time in this element. Ex: 24px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Time Letter Spacing', 'asata'),
			'param_name' => 'time_letter_spacing',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Please, enter number with px letter spacing time in this element. Ex: 1.2px', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Time Color', 'asata'),
			'param_name' => 'time_color',
			'value' => '',
			'group' => esc_html__('Price & Time', 'asata'),
			'description' => esc_html__('Select color time in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title', 'asata'),
			'param_name' => 'title',
			'value' => esc_html__('Basic', 'asata'),
			'group' => esc_html__('Title', 'asata'),
			'admin_label' => true,
			'description' => esc_html__('Please, enter title in this element.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title Font Size', 'asata'),
			'param_name' => 'title_font_size',
			'value' => '',
			'group' => esc_html__('Title', 'asata'),
			'description' => esc_html__('Please, enter number  with px font size title in this element. Ex: 20px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title Line Height', 'asata'),
			'param_name' => 'title_line_height',
			'value' => '',
			'group' => esc_html__('Title', 'asata'),
			'description' => esc_html__('Please, enter number with px line height title in this element. Ex: 24px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title Letter Spacing', 'asata'),
			'param_name' => 'title_letter_spacing',
			'value' => '',
			'group' => esc_html__('Title', 'asata'),
			'description' => esc_html__('Please, enter number with px letter spacing title in this element. Ex: 1.2px', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Title Color', 'asata'),
			'param_name' => 'title_color',
			'value' => '',
			'group' => esc_html__('Title', 'asata'),
			'description' => esc_html__('Select color title in this element.', 'asata')
		),
		array(
			'type' => 'param_group',
			'heading' => esc_html__('Options', 'asata'),
			'param_name' => 'options',
			'value' => rawurlencode( wp_json_encode( array(
				array(
					'name' => esc_html__( 'Disk space 250 GB', 'asata' ),
					'tip' => '',
					'status' => 'enable',
				),
				array(
					'name' => esc_html__( 'Bandwidth 25 GB', 'asata' ),
					'tip' => '',
					'status' => 'enable',
				),
				array(
					'name' => esc_html__( 'Sub Domain 1', 'asata' ),
					'tip' => '',
					'status' => 'enable',
				),
				array(
					'name' => esc_html__( 'E-mail accounts', 'asata' ),
					'tip' => esc_html__( 'No', 'asata' ),
					'status' => 'disable',
				),
				array(
					'name' => esc_html__( '24h Support', 'asata' ),
					'tip' => esc_html__( 'No', 'asata' ),
					'status' => 'disable',
				),
				array(
					'name' => esc_html__( 'E-mail Support', 'asata' ),
					'tip' => esc_html__( 'No', 'asata' ),
					'status' => 'disable',
				)
			) ) ),
			'group' => esc_html__('Options', 'asata'),
			'description' => esc_html__('Please, enter values for option - value.', 'asata'),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Option', 'asata'),
					'param_name' => 'name',
					'value' => '',
					'description' => esc_html__('Enter text used as name of option.', 'asata'),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Tip', 'asata'),
					'param_name' => 'tip',
					'value' => '',
					'description' => esc_html__('Enter text used as tip of option.', 'asata'),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Status', 'asata'),
					'param_name' => 'status',
					'value' => array(
						esc_html__('Enable', 'asata') => 'enable',
						esc_html__('Disable', 'asata') => 'disable',
					),
					'description' => esc_html__('Select status of option.', 'asata'),
				)
			)
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Size', 'asata'),
			'param_name' => 'options_font_size',
			'value' => '',
			'group' => esc_html__('Options', 'asata'),
			'description' => esc_html__('Please, enter number with px font size for options. Ex: 14px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Line Height', 'asata'),
			'param_name' => 'options_line_height',
			'value' => '',
			'group' => esc_html__('Options', 'asata'),
			'description' => esc_html__('Please, enter number with px line height for options. Ex: 28px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Letter Spacing', 'asata'),
			'param_name' => 'options_letter_spacing',
			'value' => '',
			'group' => esc_html__('Options', 'asata'),
			'description' => esc_html__('Please, enter number with px letter spacing for options. Ex: 1px', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Color', 'asata'),
			'param_name' => 'options_color',
			'value' => '',
			'group' => esc_html__('Options', 'asata'),
			'description' => esc_html__('Select color for options.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Button Text', 'asata'),
			'param_name' => 'button_text',
			'value' => esc_html__('Select Plan', 'asata'),
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Please, enter text to button.', 'asata')
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_html__('URL (Link)', 'asata'),
			'param_name' => 'link',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Add link to button.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Size', 'asata'),
			'param_name' => 'button_font_size',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Please, enter number with px font size text of button. Ex: 14px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Weight', 'asata'),
			'param_name' => 'button_font_weight',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Please, enter number font weight text of button. Ex: 400', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Line Height', 'asata'),
			'param_name' => 'button_line_height',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Please, enter number with px line height text of button. Ex: 24px', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Letter Spacing', 'asata'),
			'param_name' => 'button_letter_spacing',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Please, enter number with px letter spacing text of button. Ex: 1.2px', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Color', 'asata'),
			'param_name' => 'button_color',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Select color text of button.', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Background', 'asata'),
			'param_name' => 'button_background',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Select background color of button.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Padding', 'asata'),
			'param_name' => 'button_padding',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Please, enter number with px padding top/right/bottom/left of button. Ex: 10px 30px', 'asata')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Border Style', 'asata'),
			'param_name' => 'button_border_style',
			'value' => array(
				esc_html__('None', 'asata') => '',
				esc_html__('Solid', 'asata') => 'solid',
				esc_html__('Dashed', 'asata') => 'dashed',
				esc_html__('Dotted', 'asata') => 'dotted'
			),
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Select border style of button.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Border Width', 'asata'),
			'param_name' => 'button_border_width',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Please, enter number with px border width of button. Ex: 2px', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Border Color', 'asata'),
			'param_name' => 'button_border_color',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Select border color of button.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Border Radius', 'asata'),
			'param_name' => 'button_border_radius',
			'value' => '',
			'group' => esc_html__('Button', 'asata'),
			'description' => esc_html__('Please, enter number with px border radius of button. Ex: 5px', 'asata')
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__('CSS box', 'asata'),
			'param_name' => 'css',
			'group' => esc_html__('Design Options', 'asata'),
		)
	)
));
