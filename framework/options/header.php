<?php
// Header
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header', 'asata' ),
	'id'               => 'bt_header',
	'icon'             => 'el el-credit-card',
	'fields'           => array(
		array(
			'id'       => 'header_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Header Layout', 'asata' ),
			'subtitle' => esc_html__( 'Select a header layout default. Foreach pages, you can change the layout by page option', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header layout 1',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-v1.jpg'
				),
				'2' => array(
					'alt' => 'Header layout 2',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-v2.jpg'
				),
				'3' => array(
					'alt' => 'Header layout 3',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-v3.jpg'
				),
				'popup' => array(
					'alt' => 'Header popup',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-popup.jpg'
				),
				'onepage' => array(
					'alt' => 'Header layout onpage',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-onepage.jpg'
				),
				'onepagescroll' => array(
					'alt' => 'Header layout onepagescroll',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-onepagescroll.jpg'
				),
				'vertical' => array(
					'alt' => 'Header layout vertical',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-vertical.jpg'
				),
				'minivertical' => array(
					'alt' => 'Header layout mini vertical',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-minivertical.jpg'
				)
			),
			'default'  => '-1'
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header Style 01', 'asata' ),
	'id'               => 'bt_header_style1',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'header_layout_1',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'asata' ),
			'subtitle' => esc_html__( 'This is the options you can change for header style 01', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header layout 1',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-v1.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'h1_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h1_header_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header absolute.', 'asata' ),
			'default'  => false
		),
		array(
			'id'            => 'h1_max_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Header Max Width', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the width of the header.', 'asata' ),
			'default'       => 1170,
			'min'           => 1024,
			'step'          => 1,
			'max'           => 1920,
			'display_value' => 'text',
			'required' 		=> array('h1_header_absolute' , '=', '1'),
		),
		array(
			'id'       => 'h1_margin_top',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'bottom'   => false,
			'left'		=> false,
			'right'   	=> false,
			'title'    => esc_html__( 'Header Margin Top', 'asata' ),
			'subtitle' => esc_html__( 'Control the top margin the header.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h1_header_absolute' , '=', '1'),
		),
		array(
			'id'    => 'h1_header_desktop_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Desktop Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header desktop.', 'asata' )
		),
		array(
			'id'       => 'h1_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h1_header_top_left',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Left', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top left.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h1_header_top' , '=', '1')
		),
		array(
			'id'       => 'h1_header_top_right',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Right', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top right.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h1_header_top' , '=', '1')
		),
		array(
			'id'       => 'h1_header_top_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Top Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header top.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h1_header_top' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-header-desktop .bt-top, .bt-header-v1 .bt-header-mobile .bt-top')
		),
		array(
			'id'       => 'h1_header_top_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Top Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header top.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'required' 		=> array('h1_header_top' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-header-desktop .bt-top, .bt-header-v1 .bt-header-mobile .bt-top'),
		),
		array(
			'id'       => 'h1_header_top_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Header Top Font', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography header top.', 'asata' ),
			'font-style'   => false,
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('h1_header_top' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-header-desktop .bt-top, .bt-header-v1 .bt-header-mobile .bt-top')
		),
		array(
			'id'       => 'h1_header_top_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Header Top Link Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the link color of header top.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'required' 		=> array('h1_header_top' , '=', '1'),
			'output'   => array('.bt-header-v1 .bt-header-desktop .bt-top a, .bt-header-v1 .bt-header-mobile .bt-top a')
		),
		array(
			'id'       => 'h1_header_bottom_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Bottom Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header bottom absolute.', 'asata' ),
			'default'  => false,
			'required' 		=> array('h1_header_absolute' , '=', '0'),
		),
		array(
			'id'       => 'h1_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Bottom Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header bottom.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v1 .bt-header-desktop .bt-bottom'),
		),
		array(
			'id'       => 'h1_header_bottom_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Bottom Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header bottom.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v1 .bt-header-desktop .bt-bottom')
		),
		array(
			'id'       => 'h1_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
		),
		array(
			'id'            => 'h1_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'h1_menu_assign',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Assign', 'asata' ),
			'subtitle' => esc_html__( 'Select menu assing of header.', 'asata' ),
			'options'  => $menu_slug_opt,
			'default'  => 'auto'
		),
		array(
			'id'       => 'h1_menu_align',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Menu Align', 'asata' ),
			'subtitle' => esc_html__( 'Control align of menu.', 'asata' ),
			'options'  => array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right'
			),
			'default'  => 'right'
		),
		array(
			'id'       => 'h1_menu_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Menu Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v1 .bt-header-desktop .bt-menu-desktop')
		),
		array(
			'id'       => 'h1_menu_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v1 .bt-header-desktop .bt-bottom ul.menu > li > a')
		),
		array(
			'id'       => 'h1_menu_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v1 .bt-header-desktop .bt-bottom ul.menu > li > a, .bt-header-v1 .bt-header-desktop .bt-menu-content-right .widget .bt-toggle-btn')
		),
		array(
			'id'       => 'h1_menu_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v1 .bt-header-desktop .bt-bottom ul.menu li ul.sub-menu > li > a, 
								.bt-header-v1 .bt-header-stick .bt-menu-desktop ul.menu li ul.sub-menu > li > a,
								.bt-header-v1 .bt-header-desktop .bt-menu-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col a,
								.bt-header-v1 .bt-header-stick .bt-menu-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col > a')
		),
		array(
			'id'       => 'h1_menu_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v1 .bt-header-desktop .bt-bottom ul.menu li ul.sub-menu > li > a')
		),
		array(
			'id'       => 'h1_menu_content_right',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Content Right', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable content right of menu.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'h1_menu_content_right_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Menu Content Right Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content right of menu.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h1_menu_content_right' , '=', '1')
		),
		array(
			'id'       => 'h1_menu_content_right_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Content Right Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the content right of menu.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h1_menu_content_right' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-menu-content-right')
		),
		array(
			'id'       => 'h1_menu_canvas',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Canvas', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable menu canvas.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h1_menu_canvas_button_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Canvas Button color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'required' 		=> array('h1_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-menu-canvas-toggle')
		),
		array(
			'id'       => 'h1_menu_canvas_button_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Canvas Button Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu canvas.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h1_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-menu-canvas-toggle')
		),
		array(
			'id'    => 'h1_header_stick_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Stick Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header stick.', 'asata' )
		),
		array(
			'id'       => 'h1_header_stick',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Sticky', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable sticky header.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h1_header_stick_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Stick Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header stick.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'required' 		=> array('h1_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-header-stick'),
		),
		array(
			'id'       => 'h1_header_stick_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Stick Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h1_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-header-stick'),
		),
		array(
			'id'       => 'h1_logo_stick',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Stick', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header stick.', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
			'required' 		=> array('h1_header_stick' , '=', '1'),
		),
		array(
			'id'            => 'h1_logo_stick_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Stick Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo stick.', 'asata' ),
			'default'       => 24,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text',
			'required' 		=> array('h1_header_stick' , '=', '1'),
		),
		array(
			'id'       => 'h1_menu_space_stick',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Menu Space Stick', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h1_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v1 .bt-header-stick .bt-menu-desktop')
		),
		array(
			'id'       => 'h1_menu_first_level_font_stick',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography Stick', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level of the header stick.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('h1_header_stick' , '=', '1'),
			'output'   => array('.bt-header-v1 .bt-header-stick .bt-menu-desktop ul.menu > li > a')
		),
		array(
			'id'       => 'h1_menu_first_level_color_stick',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color Stick', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level of the header stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h1_header_stick' , '=', '1'),
			'output'   => array('.bt-header-v1 .bt-header-stick .bt-menu-desktop ul.menu > li > a, .bt-header-v1 .bt-header-stick .bt-menu-content-right .widget .bt-toggle-btn')
		),
		array(
			'id'    => 'h1_header_mobile_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Mobile Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header mobile.', 'asata' )
		),
		array(
			'id'       => 'h1_mobile_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.(Please enable and config in header desktop before enable)', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h1_mobile_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v1 .bt-header-mobile .bt-bottom'),
		),
		array(
			'id'       => 'h1_mobile_toggle_button',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Toggle Menu Button', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'output'    => array('.bt-header.bt-header-v1 .bt-header-mobile .bt-menu-toggle'),
		),
		array(
			'id'       => 'h1_logo_mobile',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header mobile', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			)
		),
		array(
			'id'            => 'h1_logo_mobile_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Mobile Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo mobile.', 'asata' ),
			'default'       => 24,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'h1_logo_mobile_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Header Mobile Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom margin the logo mobile.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v1 .bt-header-mobile .bt-bottom .logo')
		),
		array(
			'id'       => 'h1_mobile_menu_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of menu mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap'),
		),
		array(
			'id'       => 'h1_menu_mobile_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a,
								.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'h1_menu_mobile_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a')
		),
		array(
			'id'       => 'h1_menu_mobile_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a,
								.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'h1_menu_mobile_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v1 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header Style 02', 'asata' ),
	'id'               => 'bt_header_style2',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'header_layout_2',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'asata' ),
			'subtitle' => esc_html__( 'This is the options you can change for header style 02', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header layout 2',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-v2.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'h2_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h2_header_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header absolute.', 'asata' ),
			'default'  => false
		),
		array(
			'id'            => 'h2_max_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Header Max Width', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the width of the header.', 'asata' ),
			'default'       => 1170,
			'min'           => 1024,
			'step'          => 1,
			'max'           => 1920,
			'display_value' => 'text',
			'required' 		=> array('h2_header_absolute' , '=', '1'),
		),
		array(
			'id'       => 'h2_margin_top',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'bottom'   => false,
			'left'		=> false,
			'right'   	=> false,
			'title'    => esc_html__( 'Header Margin Top', 'asata' ),
			'subtitle' => esc_html__( 'Control the top margin the header.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h2_header_absolute' , '=', '1'),
		),
		array(
			'id'    => 'h2_header_desktop_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Desktop Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header desktop.', 'asata' )
		),
		array(
			'id'       => 'h2_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h2_header_top_left',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Left', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top left.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h2_header_top' , '=', '1')
		),
		array(
			'id'       => 'h2_header_top_right',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Right', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top right.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h2_header_top' , '=', '1')
		),
		array(
			'id'       => 'h2_header_top_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Top Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header top.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h2_header_top' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-header-desktop .bt-top, .bt-header-v2 .bt-header-mobile .bt-top')
		),
		array(
			'id'       => 'h2_header_top_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Top Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header top.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'required' 		=> array('h2_header_top' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-header-desktop .bt-top, .bt-header-v2 .bt-header-mobile .bt-top'),
		),
		array(
			'id'       => 'h2_header_top_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Header Top Font', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography header top.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => '',
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'required' 		=> array('h2_header_top' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-header-desktop .bt-top')
		),
		array(
			'id'       => 'h2_header_top_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Header Top Link Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the link color of header top.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'required' 		=> array('h2_header_top' , '=', '1'),
			'output'   => array('.bt-header-v2 .bt-header-desktop .bt-top a')
		),
		array(
			'id'       => 'h2_header_middle_left',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Middle Content Left', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header middle left.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => ''
		),
		array(
			'id'       => 'h2_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			)
		),
		array(
			'id'            => 'h2_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'h2_header_middle_right',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Middle Content Right', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header middle right.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => ''
		),
		array(
			'id'       => 'h2_header_middle_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Middle Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header middle.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v2 .bt-header-desktop .bt-middle')
		),
		array(
			'id'       => 'h2_header_middle_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Middle Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header middle.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v2 .bt-header-desktop .bt-middle'),
		),
		array(
			'id'       => 'h2_header_middle_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Header Middle Font', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography header middle.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'    => array('.bt-header-v2 .bt-header-desktop .bt-middle')
		),
		array(
			'id'       => 'h2_header_middle_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Header Middle Link Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the link color of header middle.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-desktop .bt-middle a')
		),
		array(
			'id'       => 'h2_header_bottom_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Bottom Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header bottom absolute.', 'asata' ),
			'default'  => false,
			'required' 		=> array('h2_header_absolute' , '=', '0'),
		),
		array(
			'id'       => 'h2_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Bottom Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header bottom.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v2 .bt-header-desktop .bt-bottom')
		),
		array(
			'id'       => 'h2_header_bottom_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Bottom Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header bottom.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v2 .bt-header-desktop .bt-bottom')
		),
		array(
			'id'       => 'h2_menu_assign',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Assign', 'asata' ),
			'subtitle' => esc_html__( 'Select menu assing of header.', 'asata' ),
			'options'  => $menu_slug_opt,
			'default'  => 'auto'
		),
		array(
			'id'       => 'h2_menu_align',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Menu Align', 'asata' ),
			'subtitle' => esc_html__( 'Control align of menu.', 'asata' ),
			'options'  => array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right'
			),
			'default'  => 'center'
		),
		array(
			'id'       => 'h2_menu_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Menu Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v1 .bt-header-desktop .bt-menu-desktop')
		),
		array(
			'id'       => 'h2_menu_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-desktop .bt-bottom ul.menu > li > a')
		),
		array(
			'id'       => 'h2_menu_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-desktop .bt-bottom ul.menu > li > a, .bt-header-v2 .bt-header-desktop .bt-menu-content-right .widget .bt-toggle-btn')
		),
		array(
			'id'       => 'h2_menu_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-desktop .bt-bottom ul.menu li ul.sub-menu > li > a, 
								.bt-header-v2 .bt-header-stick .bt-menu-desktop ul.menu li ul.sub-menu > li > a,
								.bt-header-v2 .bt-header-desktop .bt-menu-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col a,
								.bt-header-v2 .bt-header-stick .bt-menu-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col > a')
		),
		array(
			'id'       => 'h2_menu_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-desktop .bt-bottom ul.menu li ul.sub-menu > li > a')
		),
		
		array(
			'id'       => 'h2_menu_content_right',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Content Right', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable content right of menu.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h2_menu_content_right_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Menu Content Right Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content right of menu.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h2_menu_content_right' , '=', '1')
		),
		array(
			'id'       => 'h2_menu_content_right_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Content Right Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the content right of menu.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h2_menu_content_right' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-menu-content-right')
		),
		array(
			'id'       => 'h2_menu_canvas',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Canvas', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable menu canvas.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'h2_menu_canvas_button_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Canvas Button color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'required' 		=> array('h2_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-menu-canvas-toggle')
		),
		array(
			'id'       => 'h2_menu_canvas_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Canvas Button Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu canvas.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h2_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-menu-canvas-toggle')
		),
		array(
			'id'       => 'h2_menu_after_content_auto',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu After Content Auto', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to menu content right and menu canvas align after menu.', 'asata' ),
			'default'  => true
		),
		array(
			'id'    => 'h2_header_stick_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Stick Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header stick.', 'asata' )
		),
		array(
			'id'       => 'h2_header_stick',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Sticky', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable sticky header.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h2_header_stick_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Stick Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header stick.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'required' 		=> array('h2_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-header-stick'),
		),
		array(
			'id'       => 'h2_header_stick_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Stick Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h2_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-header-stick'),
		),
		array(
			'id'       => 'h2_logo_stick',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Stick', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header stick.', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
			'required' 		=> array('h2_header_stick' , '=', '1'),
		),
		array(
			'id'            => 'h2_logo_stick_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Stick Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo stick.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text',
			'required' 		=> array('h2_header_stick' , '=', '1'),
		),
		
		array(
			'id'       => 'h2_menu_align_stick',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Menu Align Stick', 'asata' ),
			'subtitle' => esc_html__( 'Control align of menu stick.', 'asata' ),
			'options'  => array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right'
			),
			'default'  => 'right',
			'required' 		=> array('h2_header_stick' , '=', '1'),
		),
		array(
			'id'       => 'h2_menu_space_stick',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Menu Space Stick', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h2_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v2 .bt-header-stick .bt-menu-desktop')
		),
		array(
			'id'       => 'h2_menu_first_level_font_stick',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography Stick', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level of the header stick.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('h2_header_stick' , '=', '1'),
			'output'   => array('.bt-header-v2 .bt-header-stick .bt-menu-desktop ul.menu > li > a')
		),
		array(
			'id'       => 'h2_menu_first_level_color_stick',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color Stick', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level of the header stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h2_header_stick' , '=', '1'),
			'output'   => array('.bt-header-v2 .bt-header-stick .bt-menu-desktop ul.menu > li > a, .bt-header-v2 .bt-header-stick .bt-menu-content-right .widget .bt-toggle-btn')
		),
		array(
			'id'    => 'h2_header_mobile_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Mobile Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header mobile.', 'asata' )
		),
		array(
			'id'       => 'h2_mobile_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.(Please enable and config in header desktop before enable)', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h2_mobile_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v2 .bt-header-mobile .bt-bottom'),
		),
		array(
			'id'       => 'h2_mobile_header_bottom_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Header Mobile Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the header mobile.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v2 .bt-header-mobile .bt-bottom')
		),
		array(
			'id'       => 'h2_mobile_toggle_button',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Toggle Menu Button', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'output'    => array('.bt-header.bt-header-v2 .bt-header-mobile .bt-menu-toggle'),
		),
		array(
			'id'       => 'h2_logo_mobile',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header mobile', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			)
		),
		array(
			'id'            => 'h2_logo_mobile_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Mobile Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo mobile.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'h2_mobile_menu_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of menu mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v2 .bt-header-mobile .bt-menu-mobile-wrap'),
		),
		array(
			'id'       => 'h2_menu_mobile_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li > a,
								.bt-header-v2 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-v2 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'h2_menu_mobile_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li > a')
		),
		array(
			'id'       => 'h2_menu_mobile_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a,
								.bt-header-v2 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'h2_menu_mobile_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v2 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header Style 03', 'asata' ),
	'id'               => 'bt_header_style3',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'header_layout_3',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'asata' ),
			'subtitle' => esc_html__( 'This is the options you can change for header style 03', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header layout 3',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-v3.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'h3_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h3_header_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header absolute.', 'asata' ),
			'default'  => false
		),
		array(
			'id'            => 'h3_max_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Header Max Width', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the width of the header.', 'asata' ),
			'default'       => 1170,
			'min'           => 1024,
			'step'          => 1,
			'max'           => 1920,
			'display_value' => 'text',
			'required' 		=> array('h3_header_absolute' , '=', '1'),
		),
		array(
			'id'       => 'h3_margin_top',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'bottom'   => false,
			'left'		=> false,
			'right'   	=> false,
			'title'    => esc_html__( 'Header Margin Top', 'asata' ),
			'subtitle' => esc_html__( 'Control the top margin the header.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h3_header_absolute' , '=', '1'),
		),
		array(
			'id'    => 'h3_header_desktop_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Desktop Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header desktop.', 'asata' )
		),
		array(
			'id'       => 'h3_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h3_header_top_left',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Left', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top left.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h3_header_top' , '=', '1')
		),
		array(
			'id'       => 'h3_header_top_right',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Right', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top right.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h3_header_top' , '=', '1')
		),
		array(
			'id'       => 'h3_header_top_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Top Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header top.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h3_header_top' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-top, .bt-header-v3 .bt-header-mobile .bt-top')
		),
		array(
			'id'       => 'h3_header_top_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Top Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header top.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'required' 		=> array('h3_header_top' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-top, .bt-header-v3 .bt-header-mobile .bt-top'),
		),
		array(
			'id'       => 'h3_header_top_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Header Top Font', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography header top.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('h3_header_top' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-top')
		),
		array(
			'id'       => 'h3_header_top_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Header Top Link Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the link color of header top.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'required' 		=> array('h3_header_top' , '=', '1'),
			'output'   => array('.bt-header-v3 .bt-header-desktop .bt-top a')
		),
		array(
			'id'       => 'h3_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			)
		),
		array(
			'id'            => 'h3_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'h3_header_middle_right',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Middle Content Right', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header middle right.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => ''
		),
		array(
			'id'       => 'h3_header_middle_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Middle Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header middle.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-middle')
		),
		array(
			'id'       => 'h3_header_middle_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Middle Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header middle.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-middle'),
		),
		array(
			'id'       => 'h3_header_middle_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Header Middle Font', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography header middle.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-middle')
		),
		array(
			'id'       => 'h3_header_middle_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Header Middle Link Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the link color of header middle.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-desktop .bt-middle a')
		),
		array(
			'id'       => 'h3_header_bottom_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Bottom Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header bottom absolute.', 'asata' ),
			'default'  => false,
			'required' 		=> array('h3_header_absolute' , '=', '0'),
		),
		array(
			'id'       => 'h3_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Bottom Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header bottom.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-bottom')
		),
		array(
			'id'       => 'h3_header_bottom_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Bottom Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header bottom.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-bottom')
		),
		array(
			'id'       => 'h3_menu_assign',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Assign', 'asata' ),
			'subtitle' => esc_html__( 'Select menu assing of header.', 'asata' ),
			'options'  => $menu_slug_opt,
			'default'  => 'auto'
		),
		array(
			'id'       => 'h3_menu_align',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Menu Align', 'asata' ),
			'subtitle' => esc_html__( 'Control align of menu.', 'asata' ),
			'options'  => array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right'
			),
			'default'  => 'left'
		),
		array(
			'id'       => 'h3_menu_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Menu Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-desktop .bt-menu-desktop')
		),
		array(
			'id'       => 'h3_menu_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-desktop .bt-bottom ul.menu > li > a')
		),
		array(
			'id'       => 'h3_menu_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-desktop .bt-bottom ul.menu > li > a, .bt-header-v3 .bt-header-desktop .bt-menu-content-right .widget .bt-toggle-btn')
		),
		array(
			'id'       => 'h3_menu_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-desktop .bt-bottom ul.menu li ul.sub-menu > li > a, 
								.bt-header-v3 .bt-header-stick .bt-menu-desktop ul.menu li ul.sub-menu > li > a,
								.bt-header-v3 .bt-header-desktop .bt-menu-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col a,
								.bt-header-v3 .bt-header-stick .bt-menu-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col > a')
		),
		array(
			'id'       => 'h3_menu_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-desktop .bt-bottom ul.menu li ul.sub-menu > li > a')
		),
		
		array(
			'id'       => 'h3_menu_content_right',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Content Right', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable content right of menu.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h3_menu_content_right_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Menu Content Right Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content right of menu.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h3_menu_content_right' , '=', '1')
		),
		array(
			'id'       => 'h3_menu_content_right_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Content Right Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the content right of menu.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h3_menu_content_right' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-menu-content-right')
		),
		array(
			'id'       => 'h3_menu_canvas',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Canvas', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable menu canvas.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'h3_menu_canvas_button_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Canvas Button color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color button toggle menu canvas.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'required' 		=> array('h3_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-menu-canvas-toggle')
		),
		array(
			'id'       => 'h3_menu_canvas_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Canvas Button Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu canvas.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h3_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-menu-canvas-toggle')
		),
		array(
			'id'       => 'h3_menu_after_content_auto',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu After Content Auto', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to menu content right and menu canvas align after menu.', 'asata' ),
			'default'  => false
		),
		array(
			'id'    => 'h3_header_stick_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Stick Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header stick.', 'asata' )
		),
		array(
			'id'       => 'h3_header_stick',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Sticky', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable sticky header.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h3_header_stick_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Stick Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header stick.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'required' 		=> array('h3_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-header-stick'),
		),
		array(
			'id'       => 'h3_header_stick_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Stick Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h3_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-header-stick'),
		),
		array(
			'id'       => 'h3_logo_stick',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Stick', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header stick.', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
			'required' 		=> array('h3_header_stick' , '=', '1'),
		),
		array(
			'id'            => 'h3_logo_stick_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Stick Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo stick.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text',
			'required' 		=> array('h3_header_stick' , '=', '1'),
		),
		
		array(
			'id'       => 'h3_menu_align_stick',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Menu Align Stick', 'asata' ),
			'subtitle' => esc_html__( 'Control align of menu stick.', 'asata' ),
			'options'  => array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right'
			),
			'default'  => 'right',
			'required' 		=> array('h3_header_stick' , '=', '1'),
		),
		array(
			'id'       => 'h3_menu_space_stick',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Menu Space Stick', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h3_header_stick' , '=', '1'),
			'output'    => array('.bt-header-v3 .bt-header-stick .bt-menu-desktop')
		),
		array(
			'id'       => 'h3_menu_first_level_font_stick',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography Stick', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level of the header stick.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('h3_header_stick' , '=', '1'),
			'output'   => array('.bt-header-v3 .bt-header-stick .bt-menu-desktop ul.menu > li > a')
		),
		array(
			'id'       => 'h3_menu_first_level_color_stick',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color Stick', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level of the header stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('h3_header_stick' , '=', '1'),
			'output'   => array('.bt-header-v3 .bt-header-stick .bt-menu-desktop ul.menu > li > a, .bt-header-v3 .bt-header-stick .bt-menu-content-right .widget .bt-toggle-btn')
		),
		array(
			'id'    => 'h3_header_mobile_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Mobile Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header mobile.', 'asata' )
		),
		array(
			'id'       => 'h3_mobile_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.(Please enable and config in header desktop before enable)', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'h3_mobile_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-mobile .bt-bottom'),
		),
		array(
			'id'       => 'h3_mobile_header_bottom_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Header Mobile Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the header mobile.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-mobile .bt-bottom')
		),
		array(
			'id'       => 'h3_mobile_toggle_button',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Toggle Menu Button', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'output'    => array('.bt-header.bt-header-v3 .bt-header-mobile .bt-menu-toggle'),
		),
		array(
			'id'       => 'h3_logo_mobile',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header mobile', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			)
		),
		array(
			'id'            => 'h3_logo_mobile_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Mobile Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo mobile.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'h3_mobile_menu_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of menu mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap'),
		),
		array(
			'id'       => 'h3_menu_mobile_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li > a,
								.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'h3_menu_mobile_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li > a')
		),
		array(
			'id'       => 'h3_menu_mobile_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a,
								.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'h3_menu_mobile_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-v3 .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header Popup', 'asata' ),
	'id'               => 'bt_header_popup',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'header_layout_popup',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'asata' ),
			'subtitle' => esc_html__( 'This is the options you can change for header popup', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header popup',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-popup.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'hp_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'hp_header_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header absolute.', 'asata' ),
			'default'  => false
		),
		array(
			'id'            => 'hp_max_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Header Max Width', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the width of the header.', 'asata' ),
			'default'       => 1170,
			'min'           => 1024,
			'step'          => 1,
			'max'           => 1920,
			'display_value' => 'text',
			'required' 		=> array('hp_header_absolute' , '=', '1'),
		),
		array(
			'id'       => 'hp_margin_top',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'bottom'   => false,
			'left'		=> false,
			'right'   	=> false,
			'title'    => esc_html__( 'Header Margin Top', 'asata' ),
			'subtitle' => esc_html__( 'Control the top margin the header.', 'asata' ),
			'default'  => '',
			'required' 		=> array('hp_header_absolute' , '=', '1'),
		),
		array(
			'id'    => 'hp_header_desktop_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Desktop Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header desktop.', 'asata' )
		),
		array(
			'id'       => 'hp_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'hp_header_top_left',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Left', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top left.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('hp_header_top' , '=', '1')
		),
		array(
			'id'       => 'hp_header_top_right',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Right', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top right.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('hp_header_top' , '=', '1')
		),
		array(
			'id'       => 'hp_header_top_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Top Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header top.', 'asata' ),
			'default'  => '',
			'required' 		=> array('hp_header_top' , '=', '1'),
			'output'    => array('.bt-header-popup .bt-header-desktop .bt-top, .bt-header-popup .bt-header-mobile .bt-top')
		),
		array(
			'id'       => 'hp_header_top_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Top Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header top.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'required' 		=> array('hp_header_top' , '=', '1'),
			'output'    => array('.bt-header-popup .bt-header-desktop .bt-top, .bt-header-popup .bt-header-mobile .bt-top'),
		),
		array(
			'id'       => 'hp_header_top_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Header Top Font', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography header top.', 'asata' ),
			'font-style'   => false,
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('hp_header_top' , '=', '1'),
			'output'    => array('.bt-header-popup .bt-header-desktop .bt-top, .bt-header-popup .bt-header-mobile .bt-top')
		),
		array(
			'id'       => 'hp_header_top_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Header Top Link Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the link color of header top.', 'asata' ),
			'active'    => false,
			'default'  => '',
			'required' 		=> array('hp_header_top' , '=', '1'),
			'output'   => array('.bt-header-popup .bt-header-desktop .bt-top a, .bt-header-popup .bt-header-mobile .bt-top a')
		),
		array(
			'id'       => 'hp_header_bottom_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Bottom Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header bottom absolute.', 'asata' ),
			'default'  => false,
			'required' 		=> array('hp_header_absolute' , '=', '0'),
		),
		array(
			'id'       => 'hp_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Bottom Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header bottom.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-popup .bt-header-desktop .bt-bottom'),
		),
		array(
			'id'       => 'hp_header_bottom_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Bottom Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header bottom.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-popup .bt-header-desktop .bt-bottom')
		),
		array(
			'id'       => 'hp_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
		),
		array(
			'id'            => 'hp_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'hp_menu_assign',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Assign', 'asata' ),
			'subtitle' => esc_html__( 'Select menu assing of header.', 'asata' ),
			'options'  => $menu_slug_opt,
			'default'  => 'auto'
		),
		array(
			'id'       => 'hp_menu_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-popup .bt-menu-popup .bt-menu-desktop > ul.menu > li > a,
								.bt-header-popup .bt-menu-popup .bt-menu-desktop > ul.menu > li.menu-item-has-children .menu-toggle')
		),
		array(
			'id'       => 'hp_menu_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-popup .bt-menu-popup .bt-menu-desktop > ul.menu > li > a, .bt-header-popup .bt-menu-popup-toggle')
		),
		array(
			'id'       => 'hp_menu_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-popup .bt-menu-popup .bt-header-desktop ul.menu li ul.sub-menu > li > a,
								.bt-header-popup .bt-menu-popup .bt-header-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col a,
								.bt-header-popup .bt-menu-popup .bt-menu-desktop > ul.menu li ul.sub-menu > li.menu-item-has-children .menu-toggle')
		),
		array(
			'id'       => 'hp_menu_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-popup .bt-menu-popup .bt-header-desktop ul.menu li ul.sub-menu > li > a')
		),
		array(
			'id'       => 'hp_menu_content_right',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Content Right', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable content right of menu.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'hp_menu_content_right_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Menu Content Right Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content right of menu.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('hp_menu_content_right' , '=', '1')
		),
		array(
			'id'    => 'hp_header_stick_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Stick Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header stick.', 'asata' )
		),
		array(
			'id'       => 'hp_header_stick',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Sticky', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable sticky header.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'hp_header_stick_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Stick Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header stick.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'required' 		=> array('hp_header_stick' , '=', '1'),
			'output'    => array('.bt-header-popup .bt-header-stick'),
		),
		array(
			'id'       => 'hp_header_stick_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Stick Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('hp_header_stick' , '=', '1'),
			'output'    => array('.bt-header-popup .bt-header-stick'),
		),
		array(
			'id'       => 'hp_logo_stick',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Stick', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header stick.', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
			'required' 		=> array('hp_header_stick' , '=', '1'),
		),
		array(
			'id'            => 'hp_logo_stick_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Stick Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo stick.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text',
			'required' 		=> array('hp_header_stick' , '=', '1'),
		),
		array(
			'id'    => 'hp_header_mobile_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Mobile Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header mobile.', 'asata' )
		),
		array(
			'id'       => 'hp_mobile_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.(Please enable and config in header desktop before enable)', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'hp_mobile_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-popup .bt-header-mobile .bt-bottom'),
		),
		array(
			'id'       => 'hp_mobile_toggle_button',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Toggle Menu Button', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'output'    => array('.bt-header.bt-header-popup .bt-header-mobile .bt-menu-toggle'),
		),
		array(
			'id'       => 'hp_logo_mobile',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header mobile', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			)
		),
		array(
			'id'            => 'hp_logo_mobile_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Mobile Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo mobile.', 'asata' ),
			'default'       => 24,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'hp_logo_mobile_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Logo Mobile Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom margin the logo mobile.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-popup .bt-header-mobile .bt-bottom .logo')
		),
		array(
			'id'       => 'hp_mobile_menu_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of menu mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap'),
		),
		array(
			'id'       => 'hp_menu_mobile_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a,
								.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'hp_menu_mobile_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a')
		),
		array(
			'id'       => 'hp_menu_mobile_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a,
								.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'hp_menu_mobile_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-popup .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header One Page', 'asata' ),
	'id'               => 'bt_header_onepage',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'header_layout_onepage',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'asata' ),
			'subtitle' => esc_html__( 'This is the options you can change for header one page.', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header layout onepage',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-onepage.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'honepage_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'    => 'honepage_header_desktop_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Desktop Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header desktop.', 'asata' )
		),
		array(
			'id'       => 'honepage_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'honepage_header_top_left',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Left', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top left.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('honepage_header_top' , '=', '1')
		),
		array(
			'id'       => 'honepage_header_top_center',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Center', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top center.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('honepage_header_top' , '=', '1')
		),
		array(
			'id'       => 'honepage_header_top_right',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Top Content Right', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in the header top right.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('honepage_header_top' , '=', '1')
		),
		array(
			'id'       => 'honepage_header_top_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Top Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header top.', 'asata' ),
			'default'  => array(
				'padding-top'    	=> '10px',
				'padding-right'    	=> '0px',
				'padding-bottom' 	=> '10px',
				'padding-left' 		=> '0px'
			),
			'required' 		=> array('honepage_header_top' , '=', '1'),
			'output'    => array('.bt-header-onepage .bt-header-desktop .bt-top, .bt-header-onepage .bt-header-mobile .bt-top')
		),
		array(
			'id'       => 'honepage_header_top_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Top Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header top.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#1ab7ea',
			),
			'required' 		=> array('honepage_header_top' , '=', '1'),
			'output'    => array('.bt-header-onepage .bt-header-desktop .bt-top, .bt-header-onepage .bt-header-mobile .bt-top'),
		),
		array(
			'id'       => 'honepage_header_top_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Header Top Font', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography header top.', 'asata' ),
			'font-style'   => false,
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => array(
				'color'       => '#eaeaea',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('honepage_header_top' , '=', '1'),
			'output'    => array('.bt-header-onepage .bt-header-desktop .bt-top')
		),
		array(
			'id'       => 'honepage_header_top_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Header Top Link Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the link color of header top.', 'asata' ),
			'active'    => false,
			'default'  => array(
				'regular' => '#fafafa',
				'hover'   => '#ee3364',
			),
			'required' 		=> array('honepage_header_top' , '=', '1'),
			'output'   => array('.bt-header-onepage .bt-header-desktop .bt-top a')
		),
		array(
			'id'       => 'honepage_header_bottom_absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Bottom Absolute', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header bottom absolute.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'honepage_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Bottom Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header bottom.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#ffffff',
			),
			'output'    => array('.bt-header-onepage .bt-header-desktop .bt-bottom'),
		),
		array(
			'id'       => 'honepage_header_bottom_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Bottom Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header bottom.', 'asata' ),
			'default'  => array(
				'padding-top'    	=> '0px',
				'padding-right'    	=> '0px',
				'padding-bottom' 	=> '0px',
				'padding-left' 		=> '0px'
			),
			'output'    => array('.bt-header-onepage .bt-header-desktop .bt-bottom')
		),
		array(
			'id'       => 'honepage_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
		),
		array(
			'id'            => 'honepage_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'honepage_menu_assign',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Assign', 'asata' ),
			'subtitle' => esc_html__( 'Select menu assing of header.', 'asata' ),
			'options'  => $menu_slug_opt,
			'default'  => 'auto'
		),
		array(
			'id'       => 'honepage_menu_align',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Menu Align', 'asata' ),
			'subtitle' => esc_html__( 'Control align of menu.', 'asata' ),
			'options'  => array(
				'left' => 'Left',
				'center' => 'Center',
				'right' => 'Right'
			),
			'default'  => 'right'
		),
		array(
			'id'       => 'honepage_menu_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Menu Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu.', 'asata' ),
			'default'  => array(
				'margin-left'    => '0px',
				'margin-right' => '10px'
			),
			'output'    => array('.bt-header-onepage .bt-header-desktop .bt-menu-desktop')
		),
		array(
			'id'       => 'honepage_menu_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'default'  => '',
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'output'   => array('.bt-header-onepage .bt-header-desktop .bt-bottom ul.menu > li > a')
		),
		array(
			'id'       => 'honepage_menu_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-onepage .bt-header-desktop .bt-bottom ul.menu > li > a, .bt-header-onepage .bt-header-desktop .bt-menu-content-right .widget .bt-toggle-btn')
		),
		array(
			'id'       => 'honepage_menu_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-onepage .bt-header-desktop .bt-bottom ul.menu li ul.sub-menu > li > a, 
								.bt-header-onepage .bt-header-stick .bt-menu-desktop ul.menu li ul.sub-menu > li > a,
								.bt-header-onepage .bt-header-desktop .bt-menu-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col a,
								.bt-header-onepage .bt-header-stick .bt-menu-desktop > ul.menu > li.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col > a')
		),
		array(
			'id'       => 'honepage_menu_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-onepage .bt-header-desktop .bt-bottom ul.menu li ul.sub-menu > li > a')
		),
		array(
			'id'       => 'honepage_menu_content_right',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Content Right', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable content right of menu.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'       => 'honepage_menu_content_right_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Menu Content Right Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content right of menu.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('honepage_menu_content_right' , '=', '1')
		),
		array(
			'id'       => 'honepage_menu_content_right_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Content Right Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the content right of menu.', 'asata' ),
			'default'  => array(
				'margin-left'    => '15px',
				'margin-right' => '0'
			),
			'required' 		=> array('honepage_menu_content_right' , '=', '1'),
			'output'    => array('.bt-header-onepage .bt-menu-content-right')
		),
		array(
			'id'       => 'honepage_menu_canvas',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Canvas', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable menu canvas.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'honepage_menu_canvas_button_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Canvas Button color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'required' 		=> array('honepage_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header.bt-header-onepage .bt-menu-canvas-toggle')
		),
		array(
			'id'       => 'honepage_menu_canvas_button_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Canvas Button Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu canvas.', 'asata' ),
			'default'  => array(
				'margin-left'    => '15px',
				'margin-right' => '0'
			),
			'required' 		=> array('honepage_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header-onepage .bt-menu-canvas-toggle')
		),
		array(
			'id'    => 'honepage_header_stick_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Stick Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header stick.', 'asata' )
		),
		array(
			'id'       => 'honepage_header_stick',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Sticky', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable sticky header.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'honepage_header_stick_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Stick Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header stick.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#ffffff',
			),
			'required' 		=> array('honepage_header_stick' , '=', '1'),
			'output'    => array('.bt-header-onepage .bt-header-stick'),
		),
		array(
			'id'       => 'honepage_header_stick_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Stick Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header stick.', 'asata' ),
			'default'  => array(
				'padding-top'    	=> '0px',
				'padding-right'    	=> '0px',
				'padding-bottom' 	=> '0px',
				'padding-left' 		=> '0px'
			),
			'required' 		=> array('honepage_header_stick' , '=', '1'),
			'output'    => array('.bt-header-onepage .bt-header-stick'),
		),
		array(
			'id'       => 'honepage_logo_stick',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Stick', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header stick.', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
			'required' 		=> array('honepage_header_stick' , '=', '1'),
		),
		array(
			'id'            => 'honepage_logo_stick_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Stick Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo stick.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text',
			'required' 		=> array('honepage_header_stick' , '=', '1'),
		),
		array(
			'id'       => 'honepage_menu_space_stick',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Menu Space Stick', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu stick.', 'asata' ),
			'default'  => array(
				'margin-left'    => '0px',
				'margin-right' => '10px'
			),
			'required' 		=> array('honepage_header_stick' , '=', '1'),
			'output'    => array('.bt-header-onepage .bt-header-stick .bt-menu-desktop')
		),
		array(
			'id'       => 'honepage_menu_first_level_font_stick',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography Stick', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level of the header stick.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('honepage_header_stick' , '=', '1'),
			'output'   => array('.bt-header-onepage .bt-header-stick .bt-menu-desktop ul.menu > li > a')
		),
		array(
			'id'       => 'honepage_menu_first_level_color_stick',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color Stick', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level of the header stick.', 'asata' ),
			'default'  => '',
			'required' 		=> array('honepage_header_stick' , '=', '1'),
			'output'   => array('.bt-header-onepage .bt-header-stick .bt-menu-desktop ul.menu > li > a, .bt-header-onepage .bt-header-stick .bt-menu-content-right .widget .bt-toggle-btn')
		),
		array(
			'id'    => 'honepage_header_mobile_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Mobile Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header mobile.', 'asata' )
		),
		array(
			'id'       => 'honepage_mobile_header_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Header Top Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable header top.(Please enable and config in header desktop before enable)', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'honepage_mobile_header_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#ffffff',
			),
			'output'    => array('.bt-header-onepage .bt-header-mobile .bt-bottom'),
		),
		array(
			'id'       => 'honepage_mobile_toggle_button',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Toggle Menu Button', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'output'    => array('.bt-header.bt-header-onepage .bt-header-mobile .bt-menu-toggle'),
		),
		array(
			'id'       => 'honepage_logo_mobile',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header mobile', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			)
		),
		array(
			'id'            => 'honepage_logo_mobile_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Mobile Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo mobile.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'honepage_logo_mobile_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Header Mobile Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom margin the logo mobile.', 'asata' ),
			'default'  => array(
				'margin-top'    => '10px',
				'margin-bottom' => '10px'
			),
			'output'    => array('.bt-header-onepage .bt-header-mobile .bt-bottom .logo')
		),
		array(
			'id'       => 'honepage_mobile_menu_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of menu mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#f8f8f8',
			),
			'output'    => array('.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap'),
		),
		array(
			'id'       => 'honepage_menu_mobile_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-transform'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a,
								.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'honepage_menu_mobile_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a')
		),
		array(
			'id'       => 'honepage_menu_mobile_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a,
								.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'honepage_menu_mobile_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header One Page Scroll', 'asata' ),
	'id'               => 'bt_header_onepage_scroll',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'header_layout_onepagescroll',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'asata' ),
			'subtitle' => esc_html__( 'This is the options you can change for header one page style', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header layout one page',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-onepagescroll.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'honepage1_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'honepage1_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => '',
			'output'    => array('.bt-header-onepagev1'),
		),
		array(
			'id'       => 'honepage1_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Padding Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding the header.', 'asata' ),
			'default'  => '',
			'output'    => array('.bt-header-onepagev1')
		),
		array(
			'id'       => 'honepage1_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo-white.png' 
			),
		),
		array(
			'id'            => 'honepage1_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo.', 'asata' ),
			'default'       => 36,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'honepage1_menu_assign',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Assign', 'asata' ),
			'subtitle' => esc_html__( 'Select menu assing of header.', 'asata' ),
			'options'  => $menu_slug_opt,
			'default'  => 'auto'
		),
		array(
			'id'       => 'honepage1_content_right_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Content Right Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content right of header.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
		),
		array(
			'id'       => 'honepages_croll_menu_canvas',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Menu Canvas', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to enable menu canvas.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'honepages_croll_menu_canvas_button_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Canvas Button color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'required' 		=> array('honepages_croll_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header.bt-header-onepagev1 .bt-menu-canvas-toggle')
		),
		array(
			'id'       => 'honepages_croll_menu_canvas_button_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'    => false,
			'bottom'     => false,
			'title'    => esc_html__( 'Menu Canvas Button Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right margin the menu canvas.', 'asata' ),
			'default'  => '',
			'required' 		=> array('honepages_croll_menu_canvas' , '=', '1'),
			'output'    => array('.bt-header.bt-header-onepagev1 .bt-menu-canvas-toggle')
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header Vertical', 'asata' ),
	'id'               => 'bt_header_vertical',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'header_layout_vertical',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'asata' ),
			'subtitle' => esc_html__( 'This is the options you can change for header one page style', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header layout vertical',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-vertical.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'            => 'hvertical_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Header Width', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the width of the header.', 'asata' ),
			'default'       => 320,
			'min'           => 240,
			'step'          => 1,
			'max'           => 450,
			'display_value' => 'text'
		),
		array(
			'id'       => 'hvertical_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#ffffff',
			),
			'output'    => array('.header-vertical .bt-header-vertical'),
		),
		array(
			'id'       => 'hvertical_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Header Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the padding of the header.', 'asata' ),
			'default'  => array(
				'padding-top'    => '60px',
				'padding-right'    => '50px',
				'padding-bottom'    => '60px',
				'padding-left' => '50px'
			),
			'output'    => array('.header-vertical .bt-header-vertical .bt-header-inner')
		),
		array(
			'id'       => 'hvertical_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
		),
		array(
			'id'            => 'hvertical_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'hvertical_logo_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'    => false,
			'left'	   => false,
			'title'    => esc_html__( 'Logo Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the margin-bottom of the logo.', 'asata' ),
			'default'  => array(
				'margin-bottom' => '40px'
			),
			'output'    => array('.header-vertical .bt-header-vertical .bt-header-inner .bt-logo')
		),
		array(
			'id'       => 'hvertical_menu_assign',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Assign', 'asata' ),
			'subtitle' => esc_html__( 'Select menu assing of header.', 'asata' ),
			'options'  => $menu_slug_opt,
			'default'  => 'auto'
		),
		array(
			'id'       => 'hvertical_full_height',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full height(100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% height according to the window size. Turn off to follow inner content.', 'asata' ),
			'default'  => false,
		),
		array(
			'id'            => 'hvertical_menu_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Menu Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the menu on screen 1920x900.', 'asata' ),
			'default'       => 540,
			'min'           => 120,
			'step'          => 10,
			'max'           => 720,
			'display_value' => 'text',
			'required' 		=> array('hvertical_full_height' , '=', '1')
		),
		array(
			'id'       => 'hvertical_menu_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'    => false,
			'left'	   => false,
			'title'    => esc_html__( 'Menu Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the margin-bottom of the menu.', 'asata' ),
			'default'  => array(
				'margin-bottom' => '40px'
			),
			'output'    => array('.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap')
		),
		array(
			'id'       => 'hvertical_menu_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu > li > a,
								.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list > ul.menu > li.menu-item-has-children > .menu-toggle, 
								.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list > ul.menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'hvertical_menu_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu > li > a')
		),
		array(
			'id'       => 'hvertical_menu_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu li ul.sub-menu > li > a, 
								.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu li ul.sub-menu > li.menu-item-has-children > .menu-toggle, 
								.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu li ul.sub-menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'hvertical_menu_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.header-vertical .bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu li ul.sub-menu > li > a')
		),
		array(
			'id'       => 'hvertical_content_bottom_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Content Bottom Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content bottom of header.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header Mini Vertical', 'asata' ),
	'id'               => 'bt_header_minivertical',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'header_layout_minivertical',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'asata' ),
			'subtitle' => esc_html__( 'This is the options you can change for header one page style', 'asata' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Header layout vertical',
					'img' => get_template_directory_uri() . '/assets/images/headers/header-minivertical.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'hminivertical_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#ffffff',
			),
			'output'    => array('.header-minivertical .bt-header-minivertical .bt-header-desktop'),
		),
		array(
			'id'       => 'hminivertical_mini_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mini Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the mini logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/mini-logo.png' 
			),
		),
		array(
			'id'            => 'hminivertical_mini_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the mini logo.', 'asata' ),
			'default'       => 40,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'hminivertical_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			),
		),
		array(
			'id'            => 'hminivertical_logo_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'hminivertical_menu_assign',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Assign', 'asata' ),
			'subtitle' => esc_html__( 'Select menu assing of header.', 'asata' ),
			'options'  => $menu_slug_opt,
			'default'  => 'auto'
		),
		array(
			'id'       => 'hminivertical_menu_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.header-minivertical .bt-header-minivertical .bt-header-desktop .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu > li > a')
		),
		array(
			'id'       => 'hminivertical_menu_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.header-minivertical .bt-header-minivertical .bt-header-desktop .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu > li > a')
		),
		array(
			'id'       => 'hminivertical_menu_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.header-minivertical .bt-header-minivertical .bt-header-desktop .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu li ul.sub-menu > li > a')
		),
		array(
			'id'       => 'hminivertical_menu_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.header-minivertical .bt-header-minivertical .bt-header-desktop .bt-header-inner .bt-vertical-menu-wrap .bt-menu-list ul.menu li ul.sub-menu > li > a')
		),
		array(
			'id'       => 'hminivertical_toggle_button',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Toggle Menu Button', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
		),
		array(
			'id'       => 'hminivertical_content_mini_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Content Mini Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content mini bar of header.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
		),
		array(
			'id'       => 'hminivertical_content_bottom_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Header Content Bottom Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in content bottom of header.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
		),
		array(
			'id'    => 'hminivertical_mobile_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Header Mobile Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change for header mobile.', 'asata' )
		),
		array(
			'id'       => 'hminivertical_mobile_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Header Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of header mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#ffffff',
			),
			'output'    => array('.bt-header-minivertical .bt-header-mobile'),
		),
		array(
			'id'       => 'hminivertical_mobile_toggle_button',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Toggle Menu Button', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color toggle menu button of the header mobile.', 'asata' ),
			'active'   => false,
			'default'  => '',
			'output'    => array('.bt-header.bt-header-minivertical .bt-header-mobile .bt-menu-toggle'),
		),
		array(
			'id'       => 'hminivertical_logo_mobile',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Mobile', 'asata' ),
			'subtitle' => esc_html__( 'Upload the logo of header mobile', 'asata' ),
			'default'  => array( 
				'url' => get_template_directory_uri().'/assets/images/logo.png' 
			)
		),
		array(
			'id'            => 'hminivertical_logo_mobile_height',
			'type'          => 'slider',
			'title'         => esc_html__( 'Logo Mobile Height', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the height of the logo mobile.', 'asata' ),
			'default'       => 30,
			'min'           => 20,
			'step'          => 1,
			'max'           => 80,
			'display_value' => 'text'
		),
		array(
			'id'       => 'hminivertical_logo_mobile_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Header Mobile Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom margin the logo mobile.', 'asata' ),
			'default'  => array(
				'margin-top'    => '10px',
				'margin-bottom' => '10px'
			),
			'output'    => array('.bt-header-minivertical .bt-header-mobile .bt-bottom .logo')
		),
		array(
			'id'       => 'hminivertical_mobile_menu_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu Mobile Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of menu mobile.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#f8f8f8',
			),
			'output'    => array('.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap'),
		),
		array(
			'id'       => 'hminivertical_menu_mobile_first_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile First Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile first level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a,
								.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile > ul.menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'hminivertical_menu_mobile_first_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile First Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile first level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a')
		),
		array(
			'id'       => 'hminivertical_menu_mobile_sub_level_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Menu Mobile Sub Level Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography menu mobile sub level.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'output'   => array('.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a,
								.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.menu-item-has-children > .menu-toggle, 
								.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li.page_item_has_children > .menu-toggle')
		),
		array(
			'id'       => 'hminivertical_menu_mobile_sub_level_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Menu Mobile Sub Level Color', 'asata' ),
			'subtitle' => esc_html__( 'Controls the color menu mobile sub level.', 'asata' ),
			'default'  => '',
			'output'   => array('.bt-header-minivertical .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu li ul.sub-menu > li > a')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Menu Canvas', 'asata' ),
	'id'               => 'bt_menu_canvas',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'menu_canvas_element',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Menu Canvas Content Element', 'asata'), 
			'subtitle' => esc_html__('Controls the content that displays in menu canvas.', 'asata'),
			'options'  => asata_get_sidebars(),
			'default'  => '',
			'required' 		=> array('h1_menu_canvas' , '=', '1')
		),
		array(
			'id'       => 'menu_canvas_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu Canvas Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of menu canvas.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => 'transparent',
			),
			'output'    => array('#bt_menu_canvas'),
		),
		array(
			'id'       => 'menu_canvas_sidebar_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Menu Canvas Sidebar Background', 'asata' ),
			'subtitle' => esc_html__( 'Control background color of menu canvas sidebar.', 'asata' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#ffffff',
			),
			'output'    => array('#bt_menu_canvas .bt-menu-canvas'),
		),
		
	)
) );

