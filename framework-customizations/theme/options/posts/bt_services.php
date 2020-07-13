<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'services_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'services-meta' => array(
				'title' => esc_html__('Meta Fields', 'asata'),
				'type' => 'tab',
				'options' => array(
					'icon_font' => array( 
						'type' => 'text',
						'value' => 'fa fa-codepen',
						'label' => esc_html__('Icon Font', 'asata'),
						'desc'  => esc_html__('Please, enter icon font of service post.', 'asata'),
					),
					'icon_image' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Icon Image', 'asata'),
						'desc'  => esc_html__('Select icon image of service post.', 'asata'),
					),
					'info_option' => array(
						'type'  => 'addable-popup',
						'value' => array(
							array(
								'option' => 'Your option description 1'
							),
							array(
								'option' => 'Your option description 2'
							),
							array(
								'option' => 'Your option description 3'
							),
							array(
								'option' => 'Your option description 4'
							)
						),
						'label' => esc_html__('Info Option', 'asata'),
						'desc'  => esc_html__('Please configs info option of service post', 'asata'),
						'popup-options' => array(
							'option' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Value', 'asata'),
								'desc'  => esc_html__('Please, enter value of project item.', 'asata'),
							)
						),
						'template' => '{{- option }}',
						'add-button-text' => esc_html__('Add', 'asata'),
						'sortable' => true,
					),
				),
			),
			
		)
	)
	
);
