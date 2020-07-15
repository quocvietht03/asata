<?php
// General
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'General', 'asata' ),
	'id'               => 'bt_general',
	'icon'             => 'el el-adjust-alt',
	'fields'           => array(
		array(
			'id'       => 'less_design',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Less Design', 'asata' ),
			'subtitle' => esc_html__( 'Enable less design to generate css over time...', 'asata' ),
			'default'  => true,
		),
		array(
			'id'       => 'site_layout',
			'type'     => 'button_set',
			'title'    => esc_html__('Site Layout', 'asata'),
			'subtitle' => esc_html__('Control the site layout.', 'asata'),
			'options' => array(
				'wide' => esc_html__('Wide', 'asata'), 
				'boxed' => esc_html__('Boxed', 'asata'),
			 ), 
			'default' => 'wide'
		),
		array(
			'id'            => 'site_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Site Width', 'asata' ),
			'subtitle'      => esc_html__( 'Control the overall site width.', 'asata' ),
			'default'       => 90,
			'min'           => 86,
			'step'          => 1,
			'max'           => 98,
			'display_value' => 'text',
			'required' 		=> array('site_layout' , '=', 'boxed')
		),
		array(
			'id'            => 'site_container',
			'type'          => 'slider',
			'title'         => esc_html__( 'Site Container', 'asata' ),
			'subtitle'      => esc_html__( 'Control the overall container.', 'asata' ),
			'default'       => 1200,
			'min'           => 1200,
			'step'          => 1,
			'max'           => 1600,
			'display_value' => 'text'
		),
		array(
			'id'       => 'body_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Body Background', 'asata' ),
			'subtitle' => esc_html__( 'Control the background of the body.', 'asata' ),
			'default'  => '',
			'output'    => array('body'),
		),
		array(
			'id'            => 'mobile_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Mobile Width', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the width to enable mobile.', 'asata' ),
			'default'       => 992,
			'min'           => 540,
			'step'          => 1,
			'max'           => 1199,
			'display_value' => 'text'
		),
		array(
			'id'       => 'particles_effect',
			'type'     => 'switch',
			'title'    => esc_html__( 'Particles Effect', 'asata' ),
			'subtitle' => esc_html__( 'Use particles effect.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'smooth_scroll',
			'type'     => 'switch',
			'title'    => esc_html__( 'Smooth Scroll', 'asata' ),
			'subtitle' => esc_html__( 'Use smooth scroll.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'nice_scroll_bar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Nice Scroll Bar', 'asata' ),
			'subtitle' => esc_html__( 'Use nice scroll bar.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'=>'nice_scroll_bar_element',
			'type' => 'textarea',
			'title' => esc_html__('Nice Scroll Bar Elements', 'asata'), 
			'subtitle' => esc_html__('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,...', 'asata'),
			'default' => '.bt-nice-scroll',
			'required' 		=> array('nice_scroll_bar' , '=', '1')
		),
		array(
			'id'       => 'back_to_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Back To Top', 'asata' ),
			'subtitle' => esc_html__( 'Control button back to top.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'back_to_top_style',
			'type'     => 'select',
			'title'    => esc_html__( 'Back To Top Style', 'asata' ),
			'subtitle' => esc_html__( 'Select style button back to top.', 'asata' ),
			'options'  => array(
				'square' => esc_html__( 'Square', 'asata' ),
				'rounded' => esc_html__( 'Rounded', 'asata' ),
				'circle' => esc_html__( 'Circle', 'asata' )
			),
			'default'  => 'square',
			'required' 		=> array('back_to_top' , '=', '1')
		),
		array(
			'id'       => 'site_loading',
			'type'     => 'switch',
			'title'    => esc_html__( 'Site Loading', 'asata' ),
			'subtitle' => esc_html__( 'Control animation before site load complete.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'site_loading_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Site Loading Text', 'asata' ),
			'subtitle' => esc_html__( 'Enter text of loading.', 'asata' ),
			'default'  => esc_html__( 'Loading', 'asata' )
		),
		array(
			'id'       => 'site_loading_text_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Site Loading Font', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography loading.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => false,
			'text-align'   => false,
			'text-transform'   => true,
			'ext-font-css' => get_template_directory_uri().'/framework/options/fonts.css',
			'fonts'  => $fonts, 'google' => false,
			'default'  => '',
			'required' 		=> array('site_loading' , '=', '1'),
			'output'    => array('#site_loading .loading-text span')
		),
		array(
			'id'       => 'site_loading_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Site Loading Background', 'asata' ),
			'subtitle' => esc_html__( 'Control the background of loading.', 'asata' ),
			'default'  => '',
			'required' 		=> array('site_loading' , '=', '1'),
			'output'    => array('#site_loading')
		),
		array(
			'id'       => 'nav_dots_style',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Nav & Dots Style', 'asata' ),
			'subtitle' => esc_html__( 'Select a navigaiton & dots style for carousel.', 'asata' ),
			'options'  => array(
				'0' => array(
					'alt' => 'Nav & Dots Default',
					'img' => get_template_directory_uri() . '/assets/images/button/nav-dots-default.jpg'
				),
				'1' => array(
					'alt' => 'Nav & Dots Style 1',
					'img' => get_template_directory_uri() . '/assets/images/button/nav-dots-style1.jpg'
				)
			),
			'default'  => '0'
		),
		array(
			'id'       => 'pagination_style',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Pagination Style', 'asata' ),
			'subtitle' => esc_html__( 'Select a pagination style.', 'asata' ),
			'options'  => array(
				'0' => array(
					'alt' => 'Pagination Style default',
					'img' => get_template_directory_uri() . '/assets/images/button/pagination-default.jpg'
				),
				'1' => array(
					'alt' => 'Pagination Style 1',
					'img' => get_template_directory_uri() . '/assets/images/button/pagination-style1.jpg'
				)
			),
			'default'  => '0'
		),
		array(
			'id'       => 'pagination_prev_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Previous Text', 'asata' ),
			'subtitle' => esc_html__( 'Enter previous text of pagination.', 'asata' ),
			'default'  => 'Previous'
		),
		array(
			'id'       => 'pagination_next_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Next Text', 'asata' ),
			'subtitle' => esc_html__( 'Enter next text of pagination.', 'asata' ),
			'default'  => 'Next'
		),
	)
) );
