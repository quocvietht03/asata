<?php
// Colors
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Colors', 'asata' ),
	'id'               => 'bt_colors',
	'icon'             => 'el el-tint',
	'fields'           => array(
		array(
			'id'       => 'main_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Main Color', 'asata' ),
			'subtitle' => esc_html__( 'Control the main highlight color throughout the theme. Class apply: bt-main-color', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-main-color')
		),
		array(
			'id'       => 'secondary_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Secondary Color', 'asata' ),
			'subtitle' => esc_html__( 'Control the secondary highlight color throughout the theme. Class apply: bt-secondary-color', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-secondary-color')
		),
		array(
			'id'       => 'body_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Body Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color of all text body.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'output'   => array('body')
		),
		array(
			'id'       => 'heading_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Heading Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color of all heading.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'output'   => array('h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a')
		),
		array(
			'id'       => 'link_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Link Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color of all text links.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'output'   => array('a')
		),
		
	)
) );
