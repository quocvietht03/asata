<?php
// Icons
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Font Icons', 'asata' ),
	'id'               => 'bt_fonticons',
	'icon'             => 'el el-info-circle',
	'fields'           => array(
		array(
			'id'       => 'font_awesome',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Awesome', 'asata' ),
			'subtitle' => esc_html__( 'Use font awesome.', 'asata' ),
			'default'  => true,
		),
		array(
			'id'       => 'font_elegant',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Elegant', 'asata' ),
			'subtitle' => esc_html__( 'Use font elegant.', 'asata' ),
			'default'  => true,
		),
		array(
			'id'       => 'font_pe_icon_7_stroke',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Pe Icon 7 Stroke', 'asata' ),
			'subtitle' => esc_html__( 'Use font pe icon 7 stroke.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'flaticon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Font Flaticon', 'asata' ),
			'subtitle' => esc_html__( 'Use font flaticon.', 'asata' ),
			'default'  => false,
		),
	)
) );
