<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'portfolio_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'portfolio-layout' => array(
				'title' => esc_html__('Layout Settings', 'asata'),
				'type' => 'tab',
				'options' => array(
					'titlebar_background' => array(
						'label' => esc_html__( 'Title Bar Background', 'asata' ),
						'desc'  => esc_html__( 'Upload title bar background image.', 'asata' ),
						'type'  => 'upload',
					),
					'layout' => array(
						'type'  => 'select',
						'value' => 'default',
						'label' => esc_html__('Layout', 'asata'),
						'desc'  => esc_html__('Select a layout', 'asata'),
						'choices' => array(
							'default' => esc_html__('Default(Image Left)', 'asata'),
							'layout1' => esc_html__('Layout 1(Image Top)', 'asata'),
							'layout2' => esc_html__('Layout 2(Image Bottom)', 'asata')
						)
					),
					'gallery-type' => array(
						'type'  => 'select',
						'value' => 'grid',
						'label' => esc_html__('Gallery Type', 'asata'),
						'desc'  => esc_html__('Select gallery type', 'asata'),
						'choices' => array(
							'grid' => esc_html__('Grid', 'asata'),
							'slider' => esc_html__('Slider', 'asata')
						)
					),
					'gallery-column' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Gallery Columns', 'asata'),
						'desc'  => esc_html__('Select gallery columns', 'asata'),
						'choices' => array(
							'col-lg-12' => esc_html__('1 Column', 'asata'),
							'col-lg-6' => esc_html__('2 Columns', 'asata'),
							'col-md-6 col-lg-4' => esc_html__('3 Columns', 'asata'),
							'col-md-6 col-lg-3' => esc_html__('4 Columns', 'asata')
						)
					),
					'gallery-space' => array(
						'type'  => 'short-text',
						'value' => '30',
						'label' => esc_html__('Gallery Space', 'asata'),
						'desc'  => esc_html__('Please, enter gallery space.', 'asata'),
					),
				),
			),
			'portfolio-meta' => array(
				'title' => esc_html__('Meta Fields', 'asata'),
				'type' => 'tab',
				'options' => array(
					'info-option' => array(
						'type'  => 'addable-popup',
						'value' => array(
							array(
								'title' => 'Client:',
								'value' => 'Bearsthemes'
							),
							array(
								'title' => 'Date:',
								'value' => 'May 14, 2018'
							),
							array(
								'title' => 'Tags:',
								'value' => 'photography, agency, creative'
							),
							array(
								'title' => 'Project Type:',
								'value' => 'Multipurpose Template'
							)
						),
						'label' => esc_html__('Info Option', 'asata'),
						'desc'  => esc_html__('Please configs info option of project', 'asata'),
						'popup-options' => array(
							'title' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Title', 'asata'),
								'desc'  => esc_html__('Please, enter title of project item.', 'asata'),
							),
							'value' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Value', 'asata'),
								'desc'  => esc_html__('Please, enter value of project item.', 'asata'),
							)
						),
						'template' => '{{- title }}',
						'add-button-text' => esc_html__('Add', 'asata'),
						'sortable' => true,
					)
					
				),
			),
			
		)
	)
	
);