<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'menu_mega_type' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'type' => array(
				'type' => 'short-select',
				'label'   => esc_html__('Type', 'asata'),
				'value' => 'customize',
				'choices' => array(
					'customize' => esc_html__('Customize', 'asata'),
					'fullwidth' => esc_html__('Fullwidth', 'asata'),
				),
			)
		),
		'choices' => array(
			'customize' => array(
				'menu_mega_container_width' => array(
					'label' => esc_html__('Width', 'asata'),
					'desc' => esc_html__('Please enter number with px for container width (default: 840px)', 'asata'),
					'type' => 'short-text',
					'value' => '1000px'
				),
				'menu_mega_container_position' => array(
					'label' => esc_html__('Position', 'asata'),
					'desc' => esc_html__('Select the sub menu display position', 'asata'),
					'type' => 'radio',
					'value' => 'menu-item-pos-left',
					'choices' => array(
						'menu-item-pos-left' => esc_html__('Left', 'asata'),
						'menu-item-pos-center' => esc_html__('Center', 'asata'),
						'menu-item-pos-right' => esc_html__('Right', 'asata'),
					),
					'inline' => true,
				),
			),
		),
	),
	'menu_mega_container_bg' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'type' => array(
				'type' => 'short-select',
				'label'   => esc_html__('Background Type', 'asata'),
				'value' => 'color',
				'choices' => array(
					'color' => esc_html__('Color', 'asata'),
					'image' => esc_html__('Image', 'asata'),
				),
			)
		),
		'choices' => array(
			'color' => array(
				'bg_color' => array(
					'label' => esc_html__( 'Background Color', 'asata' ),
					'desc'  => esc_html__( 'Choose background color for container mega menu (default: #ffffff)', 'asata' ),
					'type'  => 'color-picker',
					'value' => '#ffffff',
				),
			),
			'image' => array(
				'bg_image' => array(
					'label' => esc_html__( 'Background Image', 'asata' ),
					'desc'  => esc_html__( 'Choose background image for container mega menu', 'asata' ),
					'type'  => 'upload',
				),
				'bg_image_repeat' => array(
					'label' => esc_html__( 'Background Repeat', 'asata' ),
					'desc'  => esc_html__( 'Choose background repeat for container mega menu', 'asata' ),
					'type' => 'short-select',
					'value' => 'no-repeat',
					'choices' => array(
						'no-repeat' => esc_html__('No Repeat', 'asata'),
						'repeat' => esc_html__('Repeat', 'asata'),
					),
				),
				'bg_image_size' => array(
					'label' => esc_html__( 'Background Size', 'asata' ),
					'desc'  => esc_html__( 'Choose background size for container mega menu', 'asata' ),
					'type' => 'short-select',
					'value' => 'cover',
					'choices' => array(
						'cover' => esc_html__('Cover', 'asata'),
						'contain' => esc_html__('Contain', 'asata'),
					),
				),
				'bg_image_position' => array(
					'label' => esc_html__( 'Background Position', 'asata' ),
					'desc'  => esc_html__( 'Please enter background position for container mega menu (default: center center)', 'asata' ),
					'type' => 'short-text',
					'value' => 'center center',
				),
			),
		),
	),
	'menu_mega_row_padding' => array(
		'label' => esc_html__('Padding', 'asata'),
		'desc' => esc_html__('Please enter number with px or % for row padding (default: 15px 10px)', 'asata'),
		'type' => 'short-text',
		'value' => '15px 10px'
	),
	'badge' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'selected' => array(
				'type' => 'switch',
				'value' => 'no',
				'label' => esc_html__('Badge', 'asata'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'asata'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'asata'),
				)
			),
		),
		'choices' => array(
			'yes' => array(
				'badge_group' => array(
					'type' => 'group',
					'attr' => array('class' => ''),
					'options' => array(
						'badge_text' => array(
							'type' => 'short-text',
							'html' => '',
							'value' => '',
							'label' => esc_html__('Text', 'asata'),
						),
						'badge_background_color' => array(
							'value' => '#E23F3F',
							'type' => 'color-picker',
							'label' => esc_html__('Background Color', 'asata'),
						),
						'badge_color' => array(
							'value' => '#FFFFFF',
							'type' => 'color-picker',
							'label' => esc_html__('Color', 'asata'),
						),
					),
				),
			),
		),
	),
);
