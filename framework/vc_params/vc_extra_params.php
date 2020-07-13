<?php
//vc_section
vc_add_params( 'vc_section', array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Particles Effect', 'asata'),
		'param_name' => 'particles_effect',
		'value' => array(
			esc_html__('None', 'asata') => 'none',
			esc_html__('Default', 'asata') => 'default',
			esc_html__('Nasa', 'asata') => 'nasa',
			esc_html__('Bubble', 'asata') => 'bubble',
			esc_html__('Snow', 'asata') => 'snow',
			esc_html__('Nyan', 'asata') => 'nyan',
			esc_html__('Custom', 'asata') => 'custom'
		),
		'group' => esc_html__('Particles', 'asata'),
		'description' => esc_html__('Select particles effect in this section.', 'asata')
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__('Particles Json', 'asata'),
		'param_name' => 'particles_json',
		'value' => '',
		'group' => esc_html__('Particles', 'asata'),
		'dependency' => array(
			'element'=>'particles_effect',
			'value'=> 'custom'
		),
		'description' => esc_html__('Enter text json config particles effect.', 'asata')
	),
	array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Overlay Color', 'asata' ),
		'param_name' => 'overlay_color',
		'value' => '',
		'group' => esc_html__('Design Options', 'asata'),
		'description' => esc_html__( 'Choose overlay color in this section.', 'asata' )
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Disable Background Image', 'asata'),
		'param_name' => 'disable_bg_image',
		'value' => array(
			esc_html__('None', 'asata') => 'none',
			esc_html__('Screen less than 1200px', 'asata') => 'lg',
			esc_html__('Screen less than 992px', 'asata') => 'md',
			esc_html__('Screen less than 768px', 'asata') => 'sm',
			esc_html__('Screen less than 576px', 'asata') => 'xs'
		),
		'group' => esc_html__('Design Options', 'asata'),
		'description' => esc_html__('Disable background image in this section.', 'asata')
	),
) );

//vc_row
vc_add_params( 'vc_row', array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Row Style', 'asata'),
		'param_name' => 'row_container',
		'value' => array(
			esc_html__('Container', 'asata') => 'container',
			esc_html__('Container Fluid', 'asata') => 'container-fluid',
			esc_html__('Full Width', 'asata') => 'fullwidth'
		),
		'weight' => 1,
		'description' => esc_html__('Select row style.', 'asata')
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Content Max Width', 'asata'),
		'param_name' => 'row_content_max_width',
		'value' => '',
		'weight' => 1,
		'dependency' => array(
			'element'=>'row_container',
			'value'=> 'fullwidth'
		),
		'description' => esc_html__('Enter number with px to set content max with. Ex: 1240px', 'asata')
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_html__('Columns no gap', 'asata'),
		'param_name' => 'columns_no_gap',
		'value' => '',
		'weight' => 1,
		'description' => esc_html__('Enable no gap between columns in row.', 'asata')
	),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Delay', 'asata'),
        'param_name' => 'animate_delay',
        'value' => '',
		'group' => esc_html__('Animation', 'asata'),
        'description' => esc_html__('Animate delay (s). Example: 0.2', 'asata')
    ),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Duration', 'asata'),
        'param_name' => 'animate_duration',
        'value' => '',
		'group' => esc_html__('Animation', 'asata'),
        'description' => esc_html__('Animate duration (s). Example: 1.2', 'asata')
    ),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Particles Effect', 'asata'),
		'param_name' => 'particles_effect',
		'value' => array(
			esc_html__('None', 'asata') => 'none',
			esc_html__('Default', 'asata') => 'default',
			esc_html__('Nasa', 'asata') => 'nasa',
			esc_html__('Bubble', 'asata') => 'bubble',
			esc_html__('Snow', 'asata') => 'snow',
			esc_html__('Nyan', 'asata') => 'nyan',
			esc_html__('Custom', 'asata') => 'custom'
		),
		'group' => esc_html__('Particles', 'asata'),
		'description' => esc_html__('Enable particles effect in this section.', 'asata')
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__('Particles Json', 'asata'),
		'param_name' => 'particles_json',
		'value' => '',
		'group' => esc_html__('Particles', 'asata'),
		'dependency' => array(
			'element'=>'particles_effect',
			'value'=> 'custom'
		),
		'description' => esc_html__('Enter text json config particles effect.', 'asata')
	)
) );

vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "gap" );

//vc_column
vc_add_params( 'vc_column', array(
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Delay', 'asata'),
        'param_name' => 'animate_delay',
        'value' => '',
		'group' => esc_html__('Animation', 'asata'),
        'description' => esc_html__('Animate delay (s). Example: 0.2', 'asata')
    ),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Duration', 'asata'),
        'param_name' => 'animate_duration',
        'value' => '',
		'group' => esc_html__('Animation', 'asata'),
        'description' => esc_html__('Animate duration (s). Example: 1.2', 'asata')
    )
) );

//vc_custom_heading
vc_add_params( 'vc_custom_heading',array(
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Second Text', 'asata'),
		'param_name' => 'second_text',
		'value' => '',
		'description' => esc_html__('Enter second text for heading element.', 'asata'),
		'group' => esc_html__('Second Text', 'asata')
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Font Size', 'asata'),
		'param_name' => 'second_text_font_size',
		'value' => '',
		'group' => esc_html__('Second Text', 'asata'),
		'description' => esc_html__('Please, enter number with px font size second text in this element. Ex: 20px', 'asata')
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Font Weight', 'asata'),
		'param_name' => 'second_text_font_weight',
		'value' => '',
		'group' => esc_html__('Second Text', 'asata'),
		'description' => esc_html__('Please, enter number font weight second text in this element. Ex: 400', 'asata')
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Line Height', 'asata'),
		'param_name' => 'second_text_line_height',
		'value' => '',
		'group' => esc_html__('Second Text', 'asata'),
		'description' => esc_html__('Please, enter number with px line height second text in this element. Ex: 24px', 'asata')
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Letter Spacing', 'asata'),
		'param_name' => 'second_text_letter_spacing',
		'value' => '',
		'group' => esc_html__('Second Text', 'asata'),
		'description' => esc_html__('Please, enter number with px letter spacing second text in this element. Ex: 1.2px', 'asata')
	),
	array(
		'type' => 'colorpicker',
		'heading' => esc_html__('Second Text Color', 'asata'),
		'param_name' => 'second_text_color',
		'value' => '',
		'group' => esc_html__('Second Text', 'asata'),
		'description' => esc_html__('Select color second text in this element.', 'asata')
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Content Width', 'asata'),
		'param_name' => 'content_with',
		'value' => '',
		'description' => esc_html__('Enter number with px to set max with for heading element. Ex: 900px', 'asata'),
		'group' => esc_html__('Extra Options', 'asata')
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Content Alignment', 'asata'),
		'param_name' => 'content_alignment',
		'value' => array(
			esc_html__('Left', 'asata') => 'left',
			esc_html__('Center', 'asata') => 'center',
			esc_html__('Right', 'asata') => 'right'
		),
		'description' => esc_html__('Select content alignment for heading element.', 'asata'),
		'group' => esc_html__('Extra Options', 'asata')
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__('Custom Style', 'asata'),
		'param_name' => 'custom_style',
		'value' => '',
		'description' => esc_html__('Enter custom style for heading element', 'asata'),
		'group' => esc_html__('Extra Options', 'asata')
	)
) );

// vc_hoverbox
vc_add_param( 'vc_hoverbox', array(
    'type' => 'textfield',
    'heading' => esc_html__('Oder Number', 'asata'),
    'param_name' => 'oder_number',
    'value' => '',
	'weight' => 1,
    'description' => esc_html__('Enter oder number.', 'asata')
) );
