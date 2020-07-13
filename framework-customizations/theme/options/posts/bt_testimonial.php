<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'testimonial_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'testimonial-meta' => array(
				'title' => esc_html__('Meta Fields', 'asata'),
				'type' => 'tab',
				'options' => array(
					'position' => array(
						'type'  => 'text',
						'value' => 'Ceo/Founder',
						'label' => esc_html__('Position', 'asata'),
						'desc'  => esc_html__('Please, enter position of testimonial.', 'asata'),
					),
					'signature' => array(
						'label' => esc_html__( 'Signature', 'asata' ),
						'desc'  => esc_html__( 'Upload signature position of testimonial.', 'asata' ),
						'type'  => 'upload',
					),
				),
			),
			
		)
	)
	
);