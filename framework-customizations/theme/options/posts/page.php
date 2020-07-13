<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$menu_slug_opt = array();
$menus_obj = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
$menu_slug_opt['auto'] = 'Auto';
foreach ( $menus_obj as $menu_obj ) {
	$menu_slug_opt[$menu_obj->slug] = $menu_obj->name;
}

$options = array(
	'page_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'page_general_setting' => array(
				'title' => esc_html__('General', 'asata'),
				'type' => 'tab',
				'options' => array(
					'page_titlebar' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Title Bar', 'asata'),
						'desc' => esc_html__('Turn on to disable title bar in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'page_container' => array(
						'type'  => 'short-text',
						'value' => '',
						'label' => esc_html__('Container', 'asata'),
						'desc'  => esc_html__('Enter number to control overall container. Default: 1200', 'asata')
					),

				),
			),
			'page_header_setting' => array(
				'title' => esc_html__('Header', 'asata'),
				'type' => 'tab',
				'options' => array(
					'header_layout' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Header Layout', 'asata'),
						'desc'  => esc_html__('Select a header layout in current page', 'asata'),
						'choices' => array(
							'default' => esc_html__('Default', 'asata'),
							'1' => esc_html__('Header 1', 'asata'),
							'2' => esc_html__('Header 2', 'asata'),
							'3' => esc_html__('Header 3', 'asata'),
							'popup' => esc_html__('Header Popup', 'asata'),
							'onepage' => esc_html__('Header One Page', 'asata'),
							'onepagescroll' => esc_html__('Header One Page Scroll', 'asata'),
							'vertical' => esc_html__('Header Vertical', 'asata'),
							'minivertical' => esc_html__('Header Mini Vertical', 'asata')
						)
					),
					'header_fullwidth' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Full Width (100%)', 'asata'),
						'desc' => esc_html__('Turn on to disable header full width (100%) in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'header_absolute' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Header Absolute', 'asata'),
						'desc' => esc_html__('Turn on to disable header absolute in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'header_top' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Header Top', 'asata'),
						'desc' => esc_html__('Turn on to disable header top in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'header_logo' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Logo', 'asata'),
						'desc'  => esc_html__('Select image to change the logo in current page.', 'asata'),
					),
					'header_logo_height' => array(
						'type'  => 'short-text',
						'value' => '',
						'label' => esc_html__('Logo Height', 'asata'),
						'desc'  => esc_html__('Controls the height of the logo in current page. EX: 50', 'asata')
					),
					'header_menu_assign' => array(
						'type'  => 'select',
						'value' => 'default',
						'label' => esc_html__('Menu Assign', 'asata'),
						'desc'  => esc_html__('Select a menu assign of header layout in current page', 'asata'),
						'choices' => $menu_slug_opt
					),
					'header_stick' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Header Sticky', 'asata'),
						'desc' => esc_html__('Turn on to disable header stick in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'header_logo_stick' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Logo Stick', 'asata'),
						'desc'  => esc_html__('Select image to change the logo stick in current page.', 'asata'),
					),
					'header_logo_stick_height' => array(
						'type'  => 'short-text',
						'value' => '',
						'label' => esc_html__('Logo Height', 'asata'),
						'desc'  => esc_html__('Controls the height of the logo stick in current page. EX: 40', 'asata')
					),
					'mobile_header_top' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Header Top Mobile', 'asata'),
						'desc' => esc_html__('Turn on to disable header top mobile in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'logo_mobile' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Logo Mobile', 'asata'),
						'desc'  => esc_html__('Select image to change the logo mobile in current page.', 'asata'),
					),
					'logo_mobile_height' => array(
						'type'  => 'short-text',
						'value' => '',
						'label' => esc_html__('Logo Height', 'asata'),
						'desc'  => esc_html__('Controls the height of the logo mobile in current page. EX: 30', 'asata')
					),
					
				),
			),
			'page_titlebar_setting' => array(
				'title' => esc_html__('Title Bar', 'asata'),
				'type' => 'tab',
				'options' => array(
					'titlebar_layout' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Title Bar Layout', 'asata'),
						'desc'  => esc_html__('Select a title bar layout in current page', 'asata'),
						'choices' => array(
							'default' => esc_html__('Default', 'asata'),
							'1' => esc_html__('Title Bar 1', 'asata'),
							'2' => esc_html__('Title Bar 2', 'asata'),
							'3' => esc_html__('Title Bar 3', 'asata')
						)
					),
					'page_titlebar_space' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Title Bar Space', 'asata'),
						'desc' => esc_html__('Turn on to disable space between title bar and content in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'page_titlebar_background' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Title Bar Background', 'asata'),
						'desc'  => esc_html__('Select image to change the title bar background in current page.', 'asata'),
					),
				),
			) ,
			'page_footer_setting' => array(
				'title' => esc_html__('Footer', 'asata'),
				'type' => 'tab',
				'options' => array(
					'footer_layout' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Footer Layout', 'asata'),
						'desc'  => esc_html__('Select a footer layout in current page', 'asata'),
						'choices' => array(
							'default' => esc_html__('Default', 'asata'),
							'1' => esc_html__('Footer 1', 'asata'),
							'2' => esc_html__('Footer 2', 'asata')
						)
					),
					'page_footer_space' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Footer Space', 'asata'),
						'desc' => esc_html__('Turn on to disable space between footer and content in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'footer_fixed' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Fixed', 'asata'),
						'desc' => esc_html__('Turn on to disable footer fixed in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'footer_fullwidth' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Full Width (100%)', 'asata'),
						'desc' => esc_html__('Turn on to disable footer full width (100%) in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
					'footer_top' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Footer Top', 'asata'),
						'desc' => esc_html__('Turn on to disable footer top in current page.', 'asata'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'asata'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'asata'),
						),
					),
				),
			),
		),
	),
	
);