<?php
/********************************************************
 * Add new font icon
 ********************************************************/
/**
* Register Backend and Frontend CSS Styles
*/
add_action( 'vc_base_register_front_css', 'asata_vc_iconpicker_base_register_css' );
add_action( 'vc_base_register_admin_css', 'asata_vc_iconpicker_base_register_css' );
function asata_vc_iconpicker_base_register_css(){
	wp_register_style('elegant', get_template_directory_uri() . '/assets/iconfonts/elegant/elegant-style.css');
}

/**
* Enqueue Backend and Frontend CSS Styles
*/
add_action( 'vc_backend_editor_enqueue_js_css', 'asata_vc_iconpicker_editor_jscss' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'asata_vc_iconpicker_editor_jscss' );
function asata_vc_iconpicker_editor_jscss(){
	wp_enqueue_style( 'elegant' );
}

/**
* Define the Icons for VC Iconpicker
*/
add_filter( 'vc_iconpicker-type-elegant', 'vc_iconpicker_type_elegant' );
function vc_iconpicker_type_elegant( $icons ) {
	$icofont_icons = array(
		array('icon_lightbulb_alt' => 'icon_lightbulb_alt'),
		array('icon_gift_alt' => 'icon_gift_alt'),
		array('icon_wallet' => 'icon_wallet'),
		array('icon_mug' => 'icon_mug'),
		array('icon_easel' => 'icon_easel'),
		array('icon_globe' => 'icon_globe'),
		array('icon_lifesaver' => 'icon_lifesaver'),
		array('icon_piechart' => 'icon_piechart'),
		array('icon_datareport' => 'icon_datareport'),
		array(' icon_pens' => ' icon_pens'),
		array(' icon_cog' => ' icon_cog'),

	);

	return array_merge( $icons, $icofont_icons );
}


/********************************************************
 * Shortcode Attribute Params
 ********************************************************/
 /**
 * Icon Select Attribute Params
 * @param text $name
 * @return mixed|void
 */
 function vc_attr_add_icon_select( $name = 'font' ) {
	$data = array(
		$name.'_icon_type' => 'fontawesome',
		$name.'_icon_fontawesome' => '',
		$name.'_icon_openiconic' => '',
		$name.'_icon_typicons' => '',
		$name.'_icon_entypo' => '',
		$name.'_icon_linecons' => ''
	);
	
	return apply_filters( 'vc_attr_add_icon_select', $data, $name );
}

/**
 * Icon Style Attribute Params
 * @param text $name
 * @return mixed|void
 */
 function vc_attr_add_icon_style( $name ) {
	$data = array(
		$name.'_style' => 'simple',
		$name.'_size' => '',
		$name.'_font_size' => '',
		$name.'_color' => '',
		$name.'_background' => '',
		$name.'_border_style' => '',
		$name.'_border_width' => '',
		$name.'_border_color' => ''
	);
	
	return apply_filters( 'vc_attr_add_icon_style', $data, $name );
}

 /**
 * Icon Group Attribute Params
 * @param text $name
 * @return mixed|void
 */
 function vc_attr_add_icon_group( $name ) {
	$data = array_merge(
		vc_attr_add_icon_select( $name ),
		vc_attr_add_icon_style( $name ),
		array(
			$name.'_type' => 'font_icon',
			'image_icon' => '',
		)
	);
	
	return apply_filters( 'vc_attr_add_icon_group', $data, $name );
}

/**
 * Image Group Attribute Params
 * @param text $name
 * @return mixed|void
 */
 function vc_attr_add_image_group( $name = 'image' ) {
	$data = array(
		$name => '',
		$name.'_size' => 'full',
		$name.'_type' => 'auto',
		$name.'_ratio' => '66'
	);
	
	return apply_filters( 'vc_attr_add_image_group', $data, $name );
}

 /**
 * Font Style Group Attribute Params
 * @param text $name
 * @return mixed|void
 */
 function vc_attr_add_font_style( $name = 'text' ) {
	$data = array(
		$name.'_font_size' => '',
		$name.'_line_height' => '',
		$name.'_letter_spacing' => '',
		$name.'_color' => ''
	);
	
	return apply_filters( 'vc_attr_add_font_style', $data, $name );
}

/**
 * Text Group Attribute Params
 * @param text $name
 * @return mixed|void
 */
 function vc_attr_add_text_group( $name = 'text' ) {
	$data = array_merge(
		array(
			$name => ''
		),
		vc_attr_add_font_style( $name )
	);
	
	return apply_filters( 'vc_attr_add_text_group', $data, $name );
}

/**
 * Link Group Attribute Params
 * @param text $name
 * @return mixed|void
 */
 function vc_attr_add_link_group( $name = 'link' ) {
	$data = array_merge(
		array(
			$name.'_add_icon' => '',
			$name.'_icon_align' => 'left'
		),
		vc_attr_add_icon_select( $name ),
		vc_attr_add_font_style( $name )
	);
	
	return apply_filters( 'vc_attr_add_link_group', $data, $name );
}

/**
 * Meta Group Attribute Params
 * @param text $name
 * @param array $fields
 * @return mixed|void
 */
 function vc_attr_add_meta_group( $name = 'meta', $fields = array() ) {
	$data = array();
	if(!empty($fields)){
		foreach($fields as $field){
			$data[] = array( $field => '' );
		}
	}
	
	$data = array_merge(
		$data,
		vc_attr_add_font_style( $name )
	);
	
	return apply_filters( 'vc_attr_add_meta_group', $data, $name, $fields );
}

/**
 * Data Group Attribute Params
 * @return mixed|void
 */
 function vc_attr_add_add_data_group() {
	$data = array(
		'category' => '',
		'post_ids' => '',
		'posts_per_page' => 10,
		'orderby' => 'none',
		'order' => 'none'
	);
	
	return apply_filters( 'vc_attr_add_add_data_group', $data );
}

/**
 * Responsive Group Attribute Params
 * @return mixed|void
 */
 function vc_attr_add_add_responsive_group() {
	$data = array(
		'columns_lg' => '',
		'columns_md' => '',
		'columns_sm' => '',
		'columns_xs' => ''
	);
	
	return apply_filters( 'vc_attr_add_add_responsive_group', $data );
}

/**
 * Owl Group Attribute Params
 * @return mixed|void
 */
 function vc_attr_add_add_owl_group() {
	$data = array(
		'rows' => 1,
		'items' => 4,
		'margin' => 30,
		'loop' => '',
		'autoplay' => '',
		'autoplayhoverpause' => '',
		'smartspeed' => '',
		'nav' => '',
		'dots' => '',
		
		'items_lg' => 3,
		'items_md' => 2,
		'items_sm' => 2,
		'items_xs' => 1,
		'nav_xs' => '',
		'dots_xs' => ''
	);
	
	return apply_filters( 'vc_attr_add_add_owl_group', $data );
}

/**
 * Post Media Group Attribute Params
 * @return mixed|void
 */
 function vc_attr_add_add_post_media_group() {
	$data = array_merge(
		array(
			'media_type' => 'simple',
			'multi_media' => 'standard,video,gallery'
		),
		vc_attr_add_image_group( 'image' )
	);
	
	return apply_filters( 'vc_attr_add_add_post_media_group', $data );
}

/**
 * Excerpt Group Attribute Params
 * @return mixed|void
 */
 function vc_attr_add_add_excerpt_group() {
	$data = array(
		'excerpt_limit' => 20,
		'excerpt_more' => '.'
	);
	
	return apply_filters( 'vc_attr_add_add_excerpt_group', $data );
}

/**
 * Read More Group Attribute Params
 * @return mixed|void
 */
 function vc_attr_add_add_readmore_group($name = 'readmore') {
	 $data = array_merge(
		array(
			$name.'_text' => esc_html__('Read More', 'asata'),
			$name.'_add_icon' => '',
			$name.'_icon_align' => 'left'
		),
		vc_attr_add_icon_select( $name )
	);
	
	return apply_filters( 'vc_attr_add_add_readmore_group', $data, $name );
}

/********************************************************
 * Shortcode Map Params
 ********************************************************/
/**
 * Icon Group Params
 * @param text $name
 * @param text $group
 * @return mixed|void
 */
function vc_map_add_icon_select( $name = 'i', $group = 'Icon', $dependency = array() ) {
	$data = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library', 'asata' ),
			'value' => array(
				esc_html__( 'Font Awesome', 'asata' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'asata' ) => 'openiconic',
				esc_html__( 'Typicons', 'asata' ) => 'typicons',
				esc_html__( 'Entypo', 'asata' ) => 'entypo',
				esc_html__( 'Linecons', 'asata' ) => 'linecons',
				esc_html__( 'Mono Social', 'asata' ) => 'monosocial',
				esc_html__( 'Material', 'asata' ) => 'material',
				esc_html__( 'Elegant', 'asata' ) => 'elegant',
			),
			'param_name' => $name.'_icon_type',
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__( 'Select icon library.', 'asata' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'asata' ),
			'param_name' => $name.'_icon_fontawesome',
			'value' => 'fa fa-adjust',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'dependency' => array(
				'element' => $name.'_icon_type',
				'value' => 'fontawesome',
			),
			'group' => $group,
			'description' => esc_html__( 'Select icon from library.', 'asata' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'asata' ),
			'param_name' => $name.'_icon_openiconic',
			'value' => 'vc-oi vc-oi-dial',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => $name.'_icon_type',
				'value' => 'openiconic',
			),
			'group' => $group,
			'description' => esc_html__( 'Select icon from library.', 'asata' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'asata' ),
			'param_name' => $name.'_icon_typicons',
			'value' => 'typcn typcn-adjust-brightness',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => $name.'_icon_type',
				'value' => 'typicons',
			),
			'group' => $group,
			'description' => esc_html__( 'Select icon from library.', 'asata' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'asata' ),
			'param_name' => $name.'_icon_entypo',
			'value' => 'entypo-icon entypo-icon-note',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => $name.'_icon_type',
				'value' => 'entypo',
			),
			'group' => $group,
			'description' => esc_html__( 'Select icon from library.', 'asata' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'asata' ),
			'param_name' => $name.'_icon_linecons',
			'value' => 'vc_li vc_li-heart',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => $name.'_icon_type',
				'value' => 'linecons',
			),
			'group' => $group,
			'description' => esc_html__( 'Select icon from library.', 'asata' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'asata' ),
			'param_name' => $name.'_icon_monosocial',
			'value' => 'vc-mono vc-mono-fivehundredpx',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => $name.'_icon_type',
				'value' => 'monosocial',
			),
			'group' => $group,
			'description' => esc_html__( 'Select icon from library.', 'asata' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'asata' ),
			'param_name' => $name.'_icon_material',
			'value' => 'vc-material vc-material-cake',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'material',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => $name.'_icon_type',
				'value' => 'material',
			),
			'group' => $group,
			'description' => esc_html__( 'Select icon from library.', 'asata' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'asata' ),
			'param_name' => $name.'_icon_elegant',
			'value' => '',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'elegant',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => $name.'_icon_type',
				'value' => 'elegant',
			),
			'group' => $group,
			'description' => esc_html__( 'Select icon from library.', 'asata' ),
		)
	);

	return apply_filters( 'vc_map_add_icon_select', $data, $name, $group, $dependency );
}

/**
 * Icon Style Group Params
 * @param text $name
 * @param text $group
 * @return mixed|void
 */
function vc_map_add_icon_style( $name = 'i', $group = 'Icon' ) {
	$data = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Icon Style', 'asata'),
			'param_name' => $name.'_style',
			'value' => array(
				esc_html__('Simple', 'asata') => 'simple',
				esc_html__('Square', 'asata') => 'square',
				esc_html__('Rounded', 'asata') => 'rounded',
				esc_html__('Circle', 'asata') => 'circle'
			),
			'group' => $group,
			'description' => esc_html__('Select style icon.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Size', 'asata'),
			'param_name' => $name.'_size',
			'value' => '',
			'group' => $group,
			'dependency' => array(
				'element'=>$name.'_style',
				'value'=> array('square', 'rounded', 'circle'),
			),
			'description' => esc_html__('Enter number with unit size.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Size', 'asata'),
			'param_name' => $name.'_font_size',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('Enter number with unit font size.', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Color', 'asata'),
			'param_name' => $name.'_color',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('Select color.', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Background', 'asata'),
			'param_name' => $name.'_background',
			'value' => '',
			'group' => $group,
			'dependency' => array(
				'element'=> $name.'_style',
				'value'=> array('square', 'rounded', 'circle'),
			),
			'description' => esc_html__('Select background color.', 'asata')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Border Style', 'asata'),
			'param_name' => $name.'_border_style',
			'value' => array(
				esc_html__('None', 'asata') => '',
				esc_html__('Solid', 'asata') => 'solid',
				esc_html__('Dashed', 'asata') => 'dashed',
				esc_html__('Dotted', 'asata') => 'dotted'
			),
			'group' => $group,
			'dependency' => array(
				'element'=> $name.'_style',
				'value'=> array('square', 'rounded', 'circle'),
			),
			'description' => esc_html__('Select border style.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Border Width', 'asata'),
			'param_name' => $name.'_border_width',
			'value' => '',
			'group' => $group,
			'dependency' => array(
				'element'=> $name.'_style',
				'value'=> array('square', 'rounded', 'circle'),
			),
			'description' => esc_html__('Enter number with unit border width.', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Border Color', 'asata'),
			'param_name' => $name.'_border_color',
			'value' => '',
			'group' => $group,
			'dependency' => array(
				'element'=> $name.'_style',
				'value'=> array('square', 'rounded', 'circle'),
			),
			'description' => esc_html__('Select border color.', 'asata')
		)
	);

	return apply_filters( 'vc_map_add_icon_style', $data, $name, $group );
}

/**
 * Font Icon Group Params
 * @param text $name
 * @param text $group
 * @return mixed|void
 */
function vc_map_add_icon_group( $name = 'i', $group = 'Icon' ) {
	$data = array_merge(
		array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Icon Type', 'asata'),
				'param_name' => $name.'_type',
				'value' => array(
					esc_html__('Font Icon', 'asata') => 'font_icon',
					esc_html__('Image Icon', 'asata') => 'image_icon'
				),
				'group' => $group,
				'description' => esc_html__('Select type icon.', 'asata')
			)
		),
		vc_map_add_icon_select( 'font', $group, array('element' => $name.'_type', 'value' => 'font_icon') ),
		array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image', 'asata'),
				'param_name' => 'image_icon',
				'value' => '',
				'group' => $group,
				'dependency' => array(
					'element' => $name.'_type',
					'value'=> 'image_icon'
				),
				'description' => esc_html__('Select image icon.', 'asata')
			)
		),
		vc_map_add_icon_style( $name, $group )
	);

	return apply_filters( 'vc_map_add_icon_group', $data, $name, $group );
}

/**
 * Font Style Group Params
 * @param text $name
 * @param text $group
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_font_style( $name = 'text', $group = 'Text', $dependency = array() ) {
	$data = array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Size', 'asata'),
			'param_name' => $name.'_font_size',
			'value' => '',
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Enter font size (number with unit).', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Line Height', 'asata'),
			'param_name' => $name.'_line_height',
			'value' => '',
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Enter line height (number with unit).', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Letter Spacing', 'asata'),
			'param_name' => $name.'_letter_spacing',
			'value' => '',
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Enter letter spacing (number with unit).', 'asata')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Color', 'asata'),
			'param_name' => $name.'_color',
			'value' => '',
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Select color.', 'asata')
		)
	);

	return apply_filters( 'vc_map_add_font_style', $data, $name, $group );
}

/**
 * Image Size Group Params
 * @param text $name
 * @param text $group
 * @param bool $label
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_image_size_group( $name = 'image', $group = 'Image', $dependency = array() ) {
	$data = array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Size', 'asata'),
			'param_name' => $name.'_size',
			'value' => '',
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Enter size. ( thumbnail | medium | medium_large | large | full | width x height )', 'asata')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Type', 'asata'),
			'param_name' => $name.'_type',
			'value' => array(
				esc_html__('Auto', 'asata') => 'auto',
				esc_html__('Ratio', 'asata') => 'ratio'
			),
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Select type.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Ratio', 'asata'),
			'param_name' => $name.'_ratio',
			'value' => '',
			'group' => $group,
			'dependency' => array(
				'element'=> $name.'_type',
				'value'=> 'ratio'
			),
			'description' => esc_html__('Enter number.', 'asata')
		)
	);
	
	return apply_filters( 'vc_map_add_image_size_group', $data, $name, $group, $dependency );
}

/**
 * Image Group Params
 * @param text $name
 * @param text $group
 * @param bool $label
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_image_group( $name = 'image', $group = 'Image', $dependency = array() ) {
	$data = array_merge(
		array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image', 'asata'),
				'param_name' => $name,
				'value' => '',
				'group' => $group,
				'dependency' => $dependency,
				'description' => esc_html__('Select image.', 'asata')
			)
		),
		vc_map_add_image_size_group( $name, $group, $dependency )
	);
	
	return apply_filters( 'vc_map_add_image_group', $data, $name, $group, $dependency );
}

/**
 * Link Group Params
 * @param text $name
 * @param text $group
 * @param bool $icon
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_link_group( $name = 'link', $group = 'Link', $icon = false, $dependency = array() ) {
	$data = array(
		array(
			'type' => 'vc_link',
			'heading' => esc_html__('URL (Link)', 'asata'),
			'param_name' => $name,
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Add link of the text.', 'asata')
		)
	);
	
	if($icon == true){
		$data = array_merge($data, 
			array(
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Add icon?', 'asata' ),
					'param_name' => $name.'_add_icon',
					'group' => $group
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon Alignment', 'asata' ),
					'param_name' => $name.'_icon_align',
					'value' => array(
						esc_html__( 'Left', 'asata' ) => 'left',
						esc_html__( 'Right', 'asata' ) => 'right',
					),
					'dependency' => array(
						'element' => $name.'_add_icon',
						'value' => 'true'
					),
					'group' => $group,
					'description' => esc_html__( 'Select icon alignment.', 'asata' ),
				),
			),
			vc_map_add_icon_select( $name, $group, array( 'element' => $name.'_add_icon', 'value' => 'true' ) )
		);
	}
	
	$data = array_merge($data, 
		vc_map_add_font_style( $name, $group, $dependency )
	);

	return apply_filters( 'vc_map_add_link_group', $data, $name, $group, $icon, $dependency );
}

/**
 * Text Group Params
 * @param text $name
 * @param text $group
 * @param bool $label
 * @param bool $link
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_text_group( $name = 'text', $group = 'Text', $label = false, $link = true, $dependency = array() ) {
	$data = array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Text', 'asata'),
			'param_name' => $name,
			'value' => '',
			'group' => $group,
			'admin_label' => $label,
			'dependency' => $dependency,
			'description' => esc_html__('Enter Text.', 'asata')
		)
	);
	if($link == true){
		$data = array_merge($data, 
			array(
				array(
					'type' => 'vc_link',
					'heading' => esc_html__('URL (Link)', 'asata'),
					'param_name' => $name.'_link',
					'group' => $group,
					'dependency' => $dependency,
					'description' => esc_html__('Add link of the text.', 'asata')
				)
			)
		);
	}
	
	$data = array_merge($data, 
		vc_map_add_font_style( $name, $group, $dependency )
	);

	return apply_filters( 'vc_map_add_text_group', $data, $name, $group, $label, $link, $dependency );
}

/**
 * Content Group Params
 * @param text $name
 * @param text $group
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_content_group( $name = 'content', $group = 'Content', $dependency = array() ) {
	$data = array_merge(
		array(
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content', 'asata'),
				'param_name' => $name,
				'value' => '',
				'group' => $group,
				'dependency' => $dependency,
				'description' => esc_html__('Enter Text.', 'asata')
			)
		),
		vc_map_add_font_style( $name, $group, $dependency )
	);

	return apply_filters( 'vc_map_add_desc_group', $data, $name, $group, $dependency );
}

/**
 * Meta Group Params
 * @param text $name
 * @param text $group
 * @param array $dependency
 * @param array $fields
 * @return mixed|void
 */
function vc_map_add_meta_group( $name = 'meta', $group = 'Meta', $dependency = array(), $fields = array() ) {
	$data = array();
	if(!empty($fields)){
		foreach($fields as $field_key => $field_val){
			$data = array_merge(
				$data, 
				array(
					array(
						'type' => 'textfield',
						'heading' => $field_val,
						'param_name' => $field_key,
						'value' => '',
						'group' => $group,
						'description' => esc_html__('Enter text.', 'asata')
					),
					array(
						'type' => 'vc_link',
						'heading' => $field_val.esc_html__(' URL (Link)', 'asata'),
						'param_name' => $field_key.'_link',
						'group' => $group,
						'description' => esc_html__('Add custom link.', 'asata')
					)
				)
			);
		}
	}
	
	$data = array_merge(
			$data,
			vc_map_add_font_style($name, $group)
		);

	return apply_filters( 'vc_map_add_meta_group', $data, $name, $group, $dependency );
}

/**
 * Data Group Params
 * @param text $taxonomy
 * @param text $group
 * @return mixed|void
 */
function vc_map_add_data_group( $taxonomy = 'category', $group = 'Data' ) {
	if($taxonomy){
		$data = array(
			array(
				'type' => 'bt_taxonomy',
				'taxonomy' => $taxonomy,
				'heading' => esc_html__('Categories', 'asata'),
				'param_name' => 'category',
				'group' => $group,
				'description' => esc_html__('Note: By default, all your posts will be displayed. If you want to narrow output, select category(s) above. Only selected categories will be displayed.', 'asata')
			)
		);
	}
	
	$data = array_merge(
		$data, 
		array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Post IDs', 'asata'),
				'param_name' => 'post_ids',
				'group' => $group,
				'description' => esc_html__('Enter post IDs to be excluded (Note: separate values by commas (,)).', 'asata'),
			),
			array (
				'type' => 'textfield',
				'heading' => esc_html__('Count', 'asata'),
				'param_name' => 'posts_per_page',
				'value' => 10,
				'group' => $group,
				'description' => esc_html__('The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'asata')
			),
			array (
				'type' => 'dropdown',
				'heading' => esc_html__('Order by', 'asata'),
				'param_name' => 'orderby',
				'value' => array (
						esc_html__('None', 'asata') => 'none',
						esc_html__('Title', 'asata') => 'title',
						esc_html__('Date', 'asata') => 'date',
						esc_html__('ID', 'asata') => 'ID'
				),
				'group' => $group,
				'description' => esc_html__('Select order type.', 'asata')
			),
			array (
				'type' => 'dropdown',
				'heading' => esc_html__('Order', 'asata'),
				'param_name' => 'order',
				'value' => Array (
						esc_html__('None', 'asata') => 'none',
						esc_html__('ASC', 'asata') => 'ASC',
						esc_html__('DESC', 'asata') => 'DESC'
				),
				'group' => $group,
				'description' => esc_html__('Select sorting order.', 'asata')
			)	
		)
	);

	return apply_filters( 'vc_map_add_data_group', $data, $taxonomy, $group );
}

/**
 * Responsive Group Params
 * @param text $group
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_responsive_group( $group = 'Responsive', $dependency = array('element' => 'columns', 'value' => array('col-xl-3', 'col-xl-4', 'col-xl-6')) ) {
	$data = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Large Screen', 'asata'),
			'param_name' => 'columns_lg',
			'value' => array(
				esc_html__('Auto', 'asata') => '',
				esc_html__('4 Columns', 'asata') => 'col-lg-3',
				esc_html__('3 Columns', 'asata') => 'col-lg-4',
				esc_html__('2 Columns', 'asata') => 'col-lg-6',
				esc_html__('1 Column', 'asata') => 'col-lg-12'
			),
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Select columns display (Screen width >=992px and <1199px).', 'asata')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Medium Screen', 'asata'),
			'param_name' => 'columns_md',
			'value' => array(
				esc_html__('Auto', 'asata') => '',
				esc_html__('4 Columns', 'asata') => 'col-md-3',
				esc_html__('3 Columns', 'asata') => 'col-md-4',
				esc_html__('2 Columns', 'asata') => 'col-md-6',
				esc_html__('1 Column', 'asata') => 'col-md-12'
			),
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Select columns display (Screen width >=768px and <992px).', 'asata')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Small Screen', 'asata'),
			'param_name' => 'columns_sm',
			'value' => array(
				esc_html__('Auto', 'asata') => '',
				esc_html__('4 Columns', 'asata') => 'col-sm-3',
				esc_html__('3 Columns', 'asata') => 'col-sm-4',
				esc_html__('2 Columns', 'asata') => 'col-sm-6',
				esc_html__('1 Column', 'asata') => 'col-sm-12'
			),
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Select columns display (Screen width >=576px and <768px).', 'asata')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Extra Screen', 'asata'),
			'param_name' => 'columns_xs',
			'value' => array(
				esc_html__('Auto', 'asata') => '',
				esc_html__('4 Columns', 'asata') => 'col-xs-3',
				esc_html__('3 Columns', 'asata') => 'col-xs-4',
				esc_html__('2 Columns', 'asata') => 'col-xs-6',
				esc_html__('1 Column', 'asata') => 'col-xs-12'
			),
			'group' => $group,
			'dependency' => $dependency,
			'description' => esc_html__('Select columns display (Screen <576px).', 'asata')
		)
	);

	return apply_filters( 'vc_map_add_responsive_group', $data, $group, $dependency );
}

/**
 * Owl Group Params
 * @param text $group
 * @return mixed|void
 */
function vc_map_add_owl_group( $group = 'Owl' ) {
	$data = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Rows', 'asata'),
			'param_name' => 'rows',
			'value' => array(
				esc_html__('1', 'asata') => 1,
				esc_html__('2', 'asata') => 2,
				esc_html__('3', 'asata') => 3
				
			),
			'group' => $group,
			'description' => esc_html__('The number of rows you want to see on the screen.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Items', 'asata' ),
			'param_name' => 'items',
			'value' => 4,
			'group' => $group,
			'description' => esc_html__('The number of items you want to see on the screen.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Margin', 'asata'),
			'param_name' => 'margin',
			'value' => 30,
			'group' => $group,
			'description' => esc_html__('Margin-right(px) on item.', 'asata')
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Loop', 'asata'),
			'param_name' => 'loop',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('Infinity loop. Duplicate last and first items to get loop illusion.', 'asata')
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Autoplay.', 'asata'),
			'param_name' => 'autoplay',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('Autoplay.', 'asata')
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('AutoplayHoverPause', 'asata'),
			'param_name' => 'autoplayhoverpause',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('Pause on mouse hover.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('SmartSpeed', 'asata'),
			'param_name' => 'smartspeed',
			'value' => '',
			'group' => $group,
			'description' => esc_html__( 'Speed Calculate.', 'asata' )
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Show next/prev buttons?', 'asata'),
			'param_name' => 'nav',
			'value' => '',
			'group' => $group
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Show dots navigation?', 'asata'),
			'param_name' => 'dots',
			'value' => '',
			'group' => $group
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Items Large Screen', 'asata'),
			'param_name' => 'items_lg',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('The number of items you want to see on the screen(>=992px and <1199px).', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Items Medium Screen', 'asata'),
			'param_name' => 'items_md',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('The number of items you want to see on the screen(>=768px and <992px).', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Items Small Screen', 'asata'),
			'param_name' => 'items_sm',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('The number of items you want to see on the screen(>=576px and <768px).', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Items Extra Screen', 'asata'),
			'param_name' => 'items_xs',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('The number of items you want to see on the screen(<576px).', 'asata')
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Show next/prev buttons on the screen(<576px)?', 'asata'),
			'param_name' => 'nav_xs',
			'value' => '',
			'group' => $group
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Show dots navigation on the screen(<576px)?', 'asata'),
			'param_name' => 'dots_xs',
			'value' => '',
			'group' => $group
		)
		
	);

	return apply_filters( 'vc_map_add_owl_group', $data, $group );
}

/**
 * Post Media Group Params
 * @param text $name
 * @param text $group
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_post_media_group( $name = 'media', $group = 'Item', $dependency = array() ) {
	$data = array_merge(
		array( 
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Media Type', 'asata'),
				'param_name' => $name.'_type',
				'value' => array(
					esc_html__('Simple', 'asata') => 'simple',
					esc_html__('Multi', 'asata') => 'multi'
				),
				'dependency' => $dependency,
				'group' => $group,
				'description' => esc_html__('Select media type.', 'asata')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Multi Media', 'asata'),
				'param_name' => 'multi_media',
				'value' => array(
					esc_html__('Standard', 'asata') => 'standard',
					esc_html__('Video', 'asata') => 'video',
					esc_html__('Audio', 'asata') => 'audio',
					esc_html__('Quote', 'asata') => 'quote',
					esc_html__('Link', 'asata') => 'link',
					esc_html__('Gallery', 'asata') => 'gallery'
				),
				'std' => 'standard,video,gallery',
				'dependency' => array(
					'element' => $name.'_type',
					'value' => 'multi'
				),
				'group' => $group,
				'description' => esc_html__('Select multi media type.', 'asata')
			)
		),
		vc_map_add_image_size_group('image', $group, array())
	);

	return apply_filters( 'vc_map_add_post_media_group', $data, $name, $group, $dependency );
}

/**
 * Post Excerpt Group Params
 * @param text $name
 * @param text $group
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_post_excerpt_group( $name = 'excerpt', $group = 'Item', $dependency = array() ) {
	$data = array( 
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Excerpt Limit', 'asata'),
			'param_name' => $name.'_limit',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('Enter number. Set to "-1" for hidden.', 'asata')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Excerpt More', 'asata'),
			'param_name' => $name.'_more',
			'value' => '',
			'group' => $group,
			'description' => esc_html__('Enter text.', 'asata')
		)
	);

	return apply_filters( 'vc_map_add_post_excerpt_group', $data, $name, $group, $dependency );
}


/**
 * Post Read More Group Params
 * @param text $name
 * @param text $group
 * @param array $dependency
 * @return mixed|void
 */
function vc_map_add_post_read_more_group( $name = 'readmore', $group = 'Item', $dependency = array() ) {
	$data = array_merge( 
		array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Readmore Text', 'asata'),
				'param_name' => $name.'_text',
				'value' => '',
				'group' => $group,
				'description' => esc_html__('Enter text of label button.', 'asata')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Read More Icon?', 'asata' ),
				'param_name' => $name.'_add_icon',
				'group' => $group
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon Alignment', 'asata' ),
				'param_name' => $name.'_icon_align',
				'value' => array(
					esc_html__( 'Left', 'asata' ) => 'left',
					esc_html__( 'Right', 'asata' ) => 'right',
				),
				'dependency' => array(
					'element' => $name.'_add_icon',
					'value' => 'true'
				),
				'group' => $group,
				'description' => esc_html__( 'Select icon alignment.', 'asata' ),
			),
		),
		vc_map_add_icon_select( $name, $group, array( 'element' => $name.'_add_icon', 'value' => 'true' ) )
	);

	return apply_filters( 'vc_map_add_post_read_more_group', $data, $name, $group, $dependency );
}

/********************************************************
 * Shortcode Output Render
 ********************************************************/
 /**
 * Icon Render
 * @param array $param
 * @return mixed|void
 */
function vc_render_icon( $param = array() ) {
	$font_icon_type = isset($param['font_icon_type']) ? $param['font_icon_type'] : 'fontawesome';
	$font_icon_fontawesome = isset($param['font_icon_fontawesome']) ? $param['font_icon_fontawesome'] : '';
	$font_icon_openiconic = isset($param['font_icon_openiconic']) ? $param['font_icon_openiconic'] : '';
	$font_icon_typicons = isset($param['font_icon_typicons']) ? $param['font_icon_typicons'] : '';
	$font_icon_entypo = isset($param['font_icon_entypo']) ? $param['font_icon_entypo'] : '';
	$font_icon_linecons = isset($param['font_icon_linecons']) ? $param['font_icon_linecons'] : '';
	
	vc_icon_element_fonts_enqueue( $font_icon_type );
	$iconClass = isset(${'font_icon_' . $font_icon_type}) && ${'font_icon_' . $font_icon_type} ? ${'font_icon_' . $font_icon_type} : 'fa fa-adjust';
	
	$output = '<i class="'.esc_attr($iconClass).'"></i>';
	
	return apply_filters( 'vc_render_icon', $output, $param );
}

/**
 * Icon Group Render
 * @param array $param
 * @return mixed|void
 */
function vc_render_icon_group( $param = array() ) {
	$icon_type = isset($param['icon_type']) ? $param['icon_type'] : 'font_icon';
	$font_icon_type = isset($param['font_icon_type']) ? $param['font_icon_type'] : 'fontawesome';
	$font_icon_fontawesome = isset($param['font_icon_fontawesome']) ? $param['font_icon_fontawesome'] : '';
	$font_icon_openiconic = isset($param['font_icon_openiconic']) ? $param['font_icon_openiconic'] : '';
	$font_icon_typicons = isset($param['font_icon_typicons']) ? $param['font_icon_typicons'] : '';
	$font_icon_entypo = isset($param['font_icon_entypo']) ? $param['font_icon_entypo'] : '';
	$font_icon_linecons = isset($param['font_icon_linecons']) ? $param['font_icon_linecons'] : '';
	$font_icon_elegant = isset($param['font_icon_elegant']) ? $param['font_icon_elegant'] : '';
	$image_icon = isset($param['image_icon']) ? $param['image_icon'] : '';
	$icon_style = isset($param['icon_style']) ? $param['icon_style'] : 'simple';
	$icon_size = isset($param['icon_size']) ? $param['icon_size'] : '';
	$icon_font_size = isset($param['icon_font_size']) ? $param['icon_font_size'] : '';
	$icon_color = isset($param['icon_color']) ? $param['icon_color'] : '';
	$icon_background = isset($param['icon_background']) ? $param['icon_background'] : '';
	$icon_border_style = isset($param['icon_border_style']) ? $param['icon_border_style'] : '';
	$icon_border_width = isset($param['icon_border_width']) ? $param['icon_border_width'] : '';
	$icon_border_color = isset($param['icon_border_color']) ? $param['icon_border_color'] : '';
	
	$style_icon = array();
	
	if($icon_style != 'simple'){
		if($icon_size) $style_icon[] = 'width: '.$icon_size.'; height: '.$icon_size.'; line-height: '.$icon_size.';';
		if($icon_background) $style_icon[] = 'background: '.$icon_background.';';
		if($icon_border_style) $style_icon[] = 'border-style: '.$icon_border_style.';';
		if($icon_border_width) $style_icon[] = 'border-width: '.$icon_border_width.';';
		if($icon_border_color) $style_icon[] = 'border-color: '.$icon_border_color.';';
	}
	if($icon_color) $style_icon[] = 'color: '.$icon_color.';';

	$icon_attributes = array();
	if ( ! empty( $style_icon ) ) {
		$icon_attributes[] = 'style="' . esc_attr( implode(' ', $style_icon) ) . '"';
	}
	
	if($icon_type == 'font_icon'){
		vc_icon_element_fonts_enqueue( $font_icon_type );
		$iconClass = isset(${'font_icon_' . $font_icon_type}) && ${'font_icon_' . $font_icon_type} ? ${'font_icon_' . $font_icon_type} : 'fa fa-adjust';
		
		$icon_size_style = $icon_font_size ?'font-size: '.$icon_font_size.';':'';
		$icon = '<i class="'.esc_attr($iconClass).'" style="'.esc_attr($icon_size_style).'"></i>';
	}else{
		$icon_size_style = $icon_font_size ? 'width: '.$icon_font_size.'; height: auto;' : '';
		$attachment_image = wp_get_attachment_image_src($image_icon, 'full', false);
		$icon = $attachment_image[0]?'<img src="'.esc_url($attachment_image[0]).'" style="'.esc_attr($icon_size_style).'" alt="'.esc_attr__('Thumbnail', 'asata').'"/>':'';
	}
	
	$output =  '<div class="bt-icon '.esc_attr($icon_style).'" '.implode(' ', $icon_attributes).'>'.$icon.'</div>';
	
	return apply_filters( 'vc_render_icon_group', $output, $param );
}

/**
 * Font Style Render
 * @param text $font_size
 * @param text $line_height
 * @param text $letter_spacing
 * @param text $color
 * @return mixed|void
 */
function vc_render_font_style( $font_size, $line_height, $letter_spacing, $color ) {
	$style = $attr = array();
	
	if($font_size) $style[] = 'font-size: '.$font_size.';';
	if($line_height) $style[] = 'line-height: '.$line_height.';';
	if($letter_spacing) $style[] = 'letter-spacing: '.$letter_spacing.';';
	if($color) $style[] = 'color: '.$color.';';
	
	if ( ! empty( $style ) ) {
		$attr[] = 'style="' . esc_attr( implode(' ', $style) ) . '"';
	}
	
	return apply_filters( 'vc_render_font_style', $attr, $font_size, $line_height, $letter_spacing, $color );
}

/**
 * Link Attribute Render
 * @param array $link
 * @return mixed|void
 */
function vc_render_link_attr( $link ) {
	$attr = array();
	if(!empty($link)){
		if ( ! empty( $link['url'] ) ) {
			$attr[] = 'href="' . esc_url( $link['url'] ) . '"';
		}
		
		if ( ! empty( $link['target'] ) ) {
			$attr[] = 'target="' . esc_attr( $link['target'] ) . '"';
		}
		
		if ( ! empty( $link['rel'] ) ) {
			$attr[] = 'rel="' . esc_attr( $link['rel'] ) . '"';
		}
		
		if ( ! empty( $link['title'] ) ) {
			$attr[] = 'title ="'.esc_attr($link['title']).'"';
		}
	}
	
	return apply_filters( 'vc_render_link_attr', $attr, $link );
}

/**
 * Text Group Render
 * @param array $param
 * @param text $name
 * @return mixed|void
 */
function vc_render_text_group( $param = array(), $name = 'text' ) {
	$value = isset($param[$name]) ? $param[$name] : '';
	$font_size = isset($param[$name.'_font_size']) ? $param[$name.'_font_size'] : '';
	$line_height = isset($param[$name.'_line_height']) ? $param[$name.'_line_height'] : '';
	$letter_spacing = isset($param[$name.'_letter_spacing']) ? $param[$name.'_letter_spacing'] : '';
	$color = isset($param[$name.'_color']) ? $param[$name.'_color'] : '';
	
	$style = vc_render_font_style( $font_size, $line_height, $letter_spacing, $color );
	
	$output = $value ? '<h2 class="bt-'.esc_attr($name).'" '.implode(' ', $style).'>'.$value.'</h2>': '';
	
	return apply_filters( 'vc_render_text_group', $output, $param );
}

/**
 * Title Group Render
 * @param array $param
 * @return mixed|void
 */
function vc_render_title_group( $param = array() ) {
	$title = isset($param['title']) ? $param['title'] : '';
	$font_size = isset($param['title_font_size']) ? $param['title_font_size'] : '';
	$line_height = isset($param['title_line_height']) ? $param['title_line_height'] : '';
	$letter_spacing = isset($param['title_letter_spacing']) ? $param['title_letter_spacing'] : '';
	$color = isset($param['title_color']) ? $param['title_color'] : '';
	$link = isset($param['title_link']) ? vc_build_link( $param['title_link'] ):array();
	
	$style = vc_render_font_style( $font_size, $line_height, $letter_spacing, $color );
	$link_attr = vc_render_link_attr($link);
	
	$output = '';
	
	if($title){
		if(!empty($link_attr)){
			$output = '<h3 class="bt-title"><a '.implode(' ', $style).' '.implode(' ', $link_attr).'>'.$title.'</a></h3>';
		}else{
			$output = '<h3 class="bt-title" '.implode(' ', $style).'>'.$title.'</h3>';
		}
	}
	
	return apply_filters( 'vc_render_title_group', $output, $param );
}

/**
 * Content Group Render
 * @param array $param
 * @param text $content
 * @return mixed|void
 */
function vc_render_content_group( $param = array(), $content = null ) {
	$content = wpb_js_remove_wpautop($content, true);
	
	$font_size = isset($param['content_font_size']) ? $param['content_font_size'] : '';
	$line_height = isset($param['content_line_height']) ? $param['content_line_height'] : '';
	$letter_spacing = isset($param['content_letter_spacing']) ? $param['content_letter_spacing'] : '';
	$color = isset($param['content_color']) ? $param['content_color'] : '';
	
	$style = vc_render_font_style( $font_size, $line_height, $letter_spacing, $color );
	
	$output = $content ? '<div class="bt-desc" '.implode(' ', $style).'>'.$content.'</div>': '';
	
	return apply_filters( 'vc_render_content_group', $output, $param, $content );
}

/**
 * Meta Group Render
 * @param array $param
 * @param array $fields
 * @return mixed|void
 */
function vc_render_meta_group( $param = array(), $fields = array() ) {
	$font_size = isset($param['meta_font_size']) ? $param['meta_font_size'] : '';
	$line_height = isset($param['meta_line_height']) ? $param['meta_line_height'] : '';
	$letter_spacing = isset($param['meta_letter_spacing']) ? $param['meta_letter_spacing'] : '';
	$color = isset($param['meta_color']) ? $param['meta_color'] : '';
	
	$fields_output = array();
 	if(!empty($fields)){
		foreach($fields as $field){
			$value = isset($param[$field]) ? $param[$field] : '';
			$link = isset($param[$field.'_link']) ? vc_build_link( $param[$field.'_link'] ):array();
			$link_attr = vc_render_link_attr($link);
			if($value){
				if(!empty($link_attr)){
					$fields_output[] = '<a class="bt-meta-item bt-'.esc_attr($field).'" '.implode(' ', $link_attr).'>'.$value.'</a>';
				}else{
					$fields_output[] = '<span class="bt-meta-item bt-'.esc_attr($field).'">'.$value.'</span>';
				}
			}
			 
		}
	}
	
	
	$style = vc_render_font_style( $font_size, $line_height, $letter_spacing, $color );
	
	$output = !empty($fields_output) ? '<h4 class="bt-meta" '.implode(' ', $style).'>'.implode(' ', $fields_output).'</h4>': '';
	
	return apply_filters( 'vc_render_meta_group', $output, $param );
}

/**
 * Link Group Render
 * @param array $param
 * @return mixed|void
 */
function vc_render_link_group( $param = array() ) {
	$add_icon = isset($param['link_add_icon']) ? $param['link_add_icon'] : '';
	$icon_align = isset($param['link_icon_align']) ? $param['link_icon_align'] : 'left';
	$icon_type = isset($param['link_icon_type']) ? $param['link_icon_type'] : 'fontawesome';
	$icon_fontawesome = isset($param['link_icon_fontawesome']) ? $param['link_icon_fontawesome'] : '';
	$icon_openiconic = isset($param['link_icon_openiconic']) ? $param['link_icon_openiconic'] : '';
	$icon_typicons = isset($param['link_icon_typicons']) ? $param['link_icon_typicons'] : '';
	$icon_entypo = isset($param['link_icon_entypo']) ? $param['link_icon_entypo'] : '';
	$icon_linecons = isset($param['link_icon_linecons']) ? $param['link_icon_linecons'] : '';
	$font_size = isset($param['link_font_size']) ? $param['link_font_size'] : '';
	$line_height = isset($param['link_line_height']) ? $param['link_line_height'] : '';
	$letter_spacing = isset($param['link_letter_spacing']) ? $param['link_letter_spacing'] : '';
	$color = isset($param['link_color']) ? $param['link_color'] : '';
	$link = isset($param['link']) ? vc_build_link( $param['link'] ):array();
	
	$link_text = '';
	$link_attr = array();
	
	if(!empty($link)){
		$link_text = !empty($link['title']) ? $link['title'] : '';
		$link_attr = vc_render_link_attr($link);
		$link_style = vc_render_font_style( $font_size, $line_height, $letter_spacing, $color );
		$link_attr[] = implode(' ', $link_style);
	}
	
	if($add_icon){
		vc_icon_element_fonts_enqueue( $icon_type ); 
		$iconClass = ${'icon_' . $icon_type} ? ${'icon_' . $icon_type} : 'fa fa-adjust';
		if($icon_align == 'right'){
			$link_text = $link_text.' <i class="'.esc_attr($iconClass).'"></i>';
		}else{
			$link_text = '<i class="'.esc_attr($iconClass).'"></i> '.$link_text;
		}
	}
	
	$output = $link_text ? '<a class="bt-btn bt-readmore" '.implode(' ', $link_attr).'>'.$link_text.'</a>': '';
	
	return apply_filters( 'vc_render_link_group', $output, $param );
}

/**
 * Grid Item Attribute Group Render
 * @param array $param
 * @param text $tax
 * @return mixed|void
 */
function vc_render_grid_item_attr_group( $param = array() ) {
	$space = isset($param['space']) ? $param['space'] : 30;
	$columns = isset($param['columns']) ? $param['columns'] : 'col-xl-3';
	$columns_lg = isset($param['columns_lg']) ? $param['columns_lg'] : 'col-lg-4';
	$columns_md = isset($param['columns_md']) ? $param['columns_md'] : 'col-md-4';
	$columns_sm = isset($param['columns_sm']) ? $param['columns_sm'] : 'col-sm-6';
	$columns_xs = isset($param['columns_xs']) ? $param['columns_xs'] : 'col-xs-12';
	
	/* Space */
	$item_style = array();
	$item_style[] = 'padding-left: '.($space/2).'px;';
	$item_style[] = 'padding-right: '.($space/2).'px;';
	$item_style[] = 'margin-bottom: '.$space.'px;';

	$item_attr = array();
	if ( ! empty( $item_style ) ) {
		$item_attr[] = 'style="' . esc_attr( implode(' ', $item_style) ) . '"';
	}

	/* Columns */
	$column_class = array();
	$column_class[] = $columns ? $columns: 'col-xl-3';
	if($columns != 'col-xl-12'){
		$column_class[] = $columns_lg ? $columns_lg : 'col-lg-4';
		$column_class[] = $columns_md ? $columns_md : 'col-md-4';
		$column_class[] = $columns_sm ? $columns_sm : 'col-sm-6';
		$column_class[] = $columns_xs ? $columns_xs : 'col-xs-12';
	}

	if ( ! empty( $column_class ) ) {
		$item_attr[] = 'class="' . esc_attr( implode(' ', $column_class) ) . '"';
	}

	return apply_filters( 'vc_render_grid_item_attr_group', $item_attr, $param );
}

/**
 * Query Group Render
 * @param array $param
 * @param text $posttype
 * @param text $tax
 * @return mixed|void
 */
function vc_render_query_group( $param = array(), $posttype = 'post', $tax = 'category' ) {
	$posts_per_page = isset($param['posts_per_page']) ? $param['posts_per_page'] : 10;
	$orderby = isset($param['orderby']) ? $param['orderby'] : 'none';
	$order = isset($param['order']) ? $param['order'] : 'none';
	$category = isset($param['category']) ? $param['category'] : '';
	$post_ids = isset($param['post_ids']) ? $param['post_ids'] : '';
	
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	
	$args = array(
		'posts_per_page' => $posts_per_page,
		'paged' => $paged,
		'orderby' => $orderby,
		'order' => $order,
		'post_type' => $posttype,
		'post_status' => 'publish');
	if (isset($category) && $category != '') {
		$cats = explode(',', $category);
		$term = array();
		foreach ((array) $cats as $cat){
			$term[] = trim($cat);
		}
		$args['tax_query'] = array(
			array(
				'taxonomy' => $tax,
				'field' => 'slug',
				'terms' => $term
			)
		);
	}
	if (isset($post_ids) && $post_ids != '') {
		$ids = explode(',', $post_ids);
		$p_ids = array();
		foreach ((array) $ids as $id){
			$p_ids[] = trim($id);
		}
		$args['post__in'] = $p_ids;
	}
	$wp_query = new WP_Query($args);

	return apply_filters( 'vc_render_query_group', $wp_query, $param, $posttype, $tax );
}
/**
 * Owl Group Render
 * @param array $param
 * @return mixed|void
 */
function vc_render_owl_group( $param = array() ) {
	$rows = isset($param['rows']) ? $param['rows'] : 1;
	$items = isset($param['items']) ? $param['items'] : 4;
	$margin = isset($param['margin']) ? $param['margin'] : 30;
	$loop = isset($param['loop']) ? true : false;
	$autoplay = isset($param['autoplay']) ? true : false;
	$autoplayHoverPause = isset($param['autoplayHoverPause']) ? true : false;
	$smartspeed = isset($param['smartspeed']) ? $param['smartspeed'] : 500;
	$nav = isset($param['nav']) ? true : false;
	$dots = isset($param['dots']) ? true : false;
	$items_lg = isset($param['items_lg']) ? $param['items_lg'] : 3;
	$items_md = isset($param['items_md']) ? $param['items_md'] : 2;
	$items_sm = isset($param['items_sm']) ? $param['items_sm'] : 2;
	$items_xs = isset($param['items_xs']) ? $param['items_xs'] : 1;
	$nav_xs = isset($param['nav_xs']) ? true : false;
	$dots_xs = isset($param['dots_xs']) ? true : false;
	
	$owl_attributes = array();
	$owl_attributes['rows'] = $rows;
	$owl_attributes['items'] = $items;
	$owl_attributes['margin'] = (int)$margin;
	$owl_attributes['loop'] = $loop;
	$owl_attributes['autoplay'] = $autoplay;
	$owl_attributes['autoplayHoverPause'] = $autoplayHoverPause;
	$owl_attributes['smartSpeed'] = $smartspeed;
	$owl_attributes['nav'] = $nav;
	$owl_attributes['navText'] = array('<i class="arrow_carrot-left"></i>', '<i class="arrow_carrot-right"></i>');
	$owl_attributes['dots']= $dots;
	
	if($items <= 1){
		$items_lg = $items_md = $items_sm = $items_xs = 1;
	}
	
	$owl_attributes['responsive'] = array(
		1200 => array(
			'items' => $items
		),
		992 => array(
			'items' => $items_lg
		),
		768 => array(
			'items' => $items_md
		),
		576 => array(
			'items' => $items_sm
		),
		0 => array(
			'items' => $items_xs,
			'nav' => $nav_xs,
			'dots' => $dots_xs
		),
	);
	
	$owl_json = json_encode($owl_attributes);

	return apply_filters( 'vc_render_owl_group', $owl_json, $param );
}

/**
 * Post Title Group Render
 * @param array $param
 * @return mixed|void
 */
function vc_render_post_title_group( $param = array() ) {
	$font_size = isset($param['title_font_size']) ? $param['title_font_size'] : '';
	$line_height = isset($param['title_line_height']) ? $param['title_line_height'] : '';
	$letter_spacing = isset($param['title_letter_spacing']) ? $param['title_letter_spacing'] : '';
	
	$style = $attr = array();
	
	$attr[] = 'class="bt-title"';
	
	if($font_size) $style[] = 'font-size: '.$font_size.';';
	if($line_height) $style[] = 'line-height: '.$line_height.';';
	if($letter_spacing) $style[] = 'letter-spacing: '.$letter_spacing.';';
	
	if ( ! empty( $style ) ) {
		$attr[] = 'style="' . esc_attr( implode(' ', $style) ) . '"';
	}
	
	$output = '<h3 '.implode(' ', $attr).'><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
	
	return apply_filters( 'vc_render_post_title_group', $output, $param );
}

/**
 * Post Read More Group Render
 * @param array $param
 * @return mixed|void
 */
function vc_render_readmore_group( $param = array() ) {
	$link_text = isset($param['readmore_text']) ? $param['readmore_text'] : '';
	$add_icon = isset($param['readmore_add_icon']) ? $param['readmore_add_icon'] : '';
	$icon_align = isset($param['readmore_icon_align']) ? $param['readmore_icon_align'] : 'left';
	$icon_type = isset($param['readmore_icon_type']) ? $param['readmore_icon_type'] : 'fontawesome';
	$icon_fontawesome = isset($param['readmore_icon_fontawesome']) ? $param['readmore_icon_fontawesome'] : '';
	$icon_openiconic = isset($param['readmore_icon_openiconic']) ? $param['readmore_icon_openiconic'] : '';
	$icon_typicons = isset($param['readmore_icon_typicons']) ? $param['readmore_icon_typicons'] : '';
	$icon_entypo = isset($param['readmore_icon_entypo']) ? $param['readmore_icon_entypo'] : '';
	$icon_linecons = isset($param['readmore_icon_linecons']) ? $param['readmore_icon_linecons'] : '';
	
	if($add_icon){
		vc_icon_element_fonts_enqueue( $icon_type ); 
		$iconClass = ${'icon_' . $icon_type} ? ${'icon_' . $icon_type} : 'fa fa-adjust';
		if($icon_align == 'right'){
			$link_text = $link_text.' <i class="'.esc_attr($iconClass).'"></i>';
		}else{
			$link_text = '<i class="'.esc_attr($iconClass).'"></i> '.$link_text;
		}
	}
	
	$output = $link_text ? '<a class="bt-btn bt-readmore" href="'.get_the_permalink().'">'.$link_text.'</a>': '';
	
	return apply_filters( 'vc_render_readmore_group', $output, $param );
}

