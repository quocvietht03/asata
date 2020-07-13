<?php
class WPBakeryShortCode_bt_team_grid extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {
		
		extract(shortcode_atts(array_merge(
			array(
				'layout_mode' => 'masonry',
				'columns' =>  4,
				'col_lg' =>  3,
				'col_md' =>  2,
				'col_sm' =>  2,
				'col_xs' =>  1,
				'space' =>  30,
				'show_loadmore' => 0,
				'loadmore_text' => esc_html__('Load More', 'asata'),
				'loadmore_count' => 0,
				'int_show' => 6,
				'int_load' => 3,
				'show_pagination' => 0,
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				
				'layout' => 'default',
				'layout_vertical' => 'vertical-default',
				
				'css' => ''
			),
			vc_attr_add_add_data_group(),
			vc_attr_add_add_post_media_group()
		), $atts));
		
		$rand_class = 'bt_element_'.rand();
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			$rand_class,
			'bt-element bt-team-grid-element bt-iso-grid',
			$layout_mode,
			$layout,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrap_attr = array();
		$wrap_attr[] = 'class="' . esc_attr( implode(' ', $css_class) ) . '"';
		if ( ! empty( $el_id ) ) {
			$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		/* Isotope */
		$iso_attr = array();
		$iso_attr['itemSelector'] = '.grid-item';
		$iso_attr['percentPosition'] = true;
		$iso_attr['layoutMode'] = $layout_mode;
		$iso_attr[$layout_mode] = array(
			'columnWidth' => '.grid-sizer',
			'gutter' => '.gutter-sizer'
		);
		
		$iso_json = json_encode($iso_attr);
		
		if ( ! empty( $iso_json ) ) {
			$wrap_attr[] = 'data-iso="' . esc_attr( $iso_json ) . '"';
		}
		
		/* Load More */
		$loadmore_attr = array();
		$loadmore_attr['show_loadmore'] = $show_loadmore;
		$loadmore_attr['initShow'] = $int_show;
		$loadmore_attr['initLoad'] = $int_load;
		$loadmore_json = json_encode($loadmore_attr);
		
		if ( ! empty( $loadmore_json ) ) {
			$wrap_attr[] = 'data-loadmore="' . esc_attr( $loadmore_json ) . '"';
		}
		
		$wp_query = vc_render_query_group($atts, 'bt_team', 'bt_team_category');
		
		$custom_css = '
					.'.$rand_class.' .grid-sizer, 
					.'.$rand_class.' .grid-item { max-width: 100%; width: calc((100% - '. $space .'px * ('. $columns .' - 1)) / '. $columns .'); }
					.'.$rand_class.' .gutter-sizer { width: '. $space .'px; }
					.'.$rand_class.' .grid-item { margin-bottom: '. $space .'px; }
					.'.$rand_class.'.vertical .grid-sizer, 
					.'.$rand_class.'.vertical .grid-item{ width: 100%; }
					@media(max-width: 1199px){
						.'.$rand_class.' .grid-sizer, 
						.'.$rand_class.' .grid-item { width: calc((100% - '. $space .'px * ('. $col_lg .' - 1)) / '. $col_lg .'); }
					}
					@media(max-width: 991px){
						.'.$rand_class.' .grid-sizer, 
						.'.$rand_class.' .grid-item { width: calc((100% - '. $space .'px * ('. $col_md .' - 1)) / '. $col_md .'); }
					}
					@media(max-width: 767px){
						.'.$rand_class.' .grid-sizer, 
						.'.$rand_class.' .grid-item { width: calc((100% - '. $space .'px * ('. $col_sm .' - 1)) / '. $col_sm .'); }
					}
					@media(max-width: 575px){
						.'.$rand_class.' .grid-sizer, 
						.'.$rand_class.' .grid-item { width: calc((100% - '. $space .'px * ('. $col_xs .' - 1)) / '. $col_xs .'); }
					}
					';
					
        wp_add_inline_style( 'asata-isogrid', $custom_css );
		
		wp_enqueue_script('isotope');
		wp_enqueue_script('asata-isogrid');
		wp_enqueue_style('asata-isogrid');
		
		ob_start();
		if ( $wp_query->have_posts() ) {
		?>
			<div <?php echo implode(' ', $wrap_attr); ?>>
				<div class="bt-isotope">
					<div class="grid-sizer"></div>
					<div class="gutter-sizer"></div>
					<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
						<div class="grid-item">
							<?php require get_template_directory().'/framework/elements/team_layouts/'.$layout.'.php'; ?>
						</div>
					<?php } ?>
				</div>
				<?php
					if($show_loadmore) {
						$count_html = $loadmore_count ? '<span class="bt-count"></span>' : '';
						echo '<div class="bt-load-more-wrap"><a href="#" class="bt-btn bt-load-more">'.$loadmore_text.$count_html.'</a></div>'; 
					}
					if($show_pagination) asata_paginate_links($wp_query);
				?>
			</div>
		<?php
		} else {
			esc_html_e('Post not found!', 'asata');
		}
		wp_reset_query();
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Team Grid', 'asata'),
	'base' => 'bt_team_grid',
	'category' => esc_html__('BT Elements', 'asata'),
	'icon' => 'bt-icon',
	'params' => array_merge(
		array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Layout Mode', 'asata'),
				'param_name' => 'layout_mode',
				'value' => array(
					esc_html__('masonry', 'asata') => 'masonry',
					esc_html__('fitRows', 'asata') => 'fitRows',
					esc_html__('vertical', 'asata') => 'vertical'
				),
				'description' => esc_html__('Select layout mode display.', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns', 'asata'),
				'param_name' => 'columns',
				'value' => 4,
				'dependency' => array(
					'element'=>'layout_mode',
					'value'=> array('masonry', 'fitRows')
				),
				'description' => esc_html__('Enter number.', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Item Space', 'asata'),
				'param_name' => 'space',
				'value' => 30,
				'description' => esc_html__('Enter number.', 'asata')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show Load More?', 'asata'),
				'param_name' => 'show_loadmore',
				'value' => '',
				'description' => esc_html__('Show load more.', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Load More Text', 'asata'),
				'param_name' => 'loadmore_text',
				'value' => esc_html__('Load More', 'asata'),
				'dependency' => array(
					'element'=>'show_loadmore',
					'value'=> 'true'
				),
				'description' => esc_html__('Enter text.', 'asata')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show Count?', 'asata'),
				'param_name' => 'loadmore_count',
				'value' => '',
				'dependency' => array(
					'element'=>'show_loadmore',
					'value'=> 'true'
				),
				'description' => esc_html__('Show count result.', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Item Start', 'asata'),
				'param_name' => 'int_show',
				'value' => 6,
				'dependency' => array(
					'element'=>'show_loadmore',
					'value'=> 'true'
				),
				'description' => esc_html__('Enter number.', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Item Added', 'asata'),
				'param_name' => 'int_load',
				'value' => 3,
				'dependency' => array(
					'element'=>'show_loadmore',
					'value'=> 'true'
				),
				'description' => esc_html__('Enter number.', 'asata')
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_html__('Show Pagination?', 'asata'),
				'param_name' => 'show_pagination',
				'value' => '',
				'description' => esc_html__('Show or not pagination.', 'asata')
			),
			vc_map_add_css_animation(),
			array(
				'type' => 'textfield',
				'class' => '',
				'heading' => esc_html__('Element ID', 'asata'),
				'param_name' => 'el_id',
				'value' => '',
				'description' => esc_html__( 'Enter element ID (Note: make sure it is unique and valid).', 'asata' )
			),
			array(
				'type' => 'textfield',
				'class' => '',
				'heading' => esc_html__('Extra Class', 'asata'),
				'param_name' => 'el_class',
				'value' => '',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'asata' )
			)
		),
		vc_map_add_data_group('bt_team_category', 'Data'),
		array(
			array(
				'type' => 'bt_layout',
				'folder' => 'team',
				'heading' => esc_html__('Layout', 'asata'),
				'param_name' => 'layout',
				'value' => array(
					esc_html__('Default', 'asata') => 'default',
					esc_html__('Layout 1', 'asata') => 'layout1',
					esc_html__('Layout 2', 'asata') => 'layout2',
					esc_html__('Layout 3', 'asata') => 'layout3',
					esc_html__('Layout 4', 'asata') => 'layout4',
					esc_html__('Layout 5', 'asata') => 'layout5',
					esc_html__('Layout 6', 'asata') => 'layout6',
					esc_html__('Layout 7', 'asata') => 'layout7'
				),
				'group' => esc_html__('Item', 'asata'),
				'description' => esc_html__('Select layout of items display in this element.', 'asata')
			)
		),
		vc_map_add_image_size_group( 'image', 'Item', array() ),
		array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns Large Screen', 'asata'),
				'param_name' => 'col_lg',
				'value' => 3,
				'dependency' => array(
					'element'=>'layout_mode',
					'value'=> array('masonry', 'fitRows')
				),
				'group' => esc_html__('Responsive', 'asata'),
				'description' => esc_html__('Enter columns display (Screen width >=992px and <1199px).', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns Medium Screen', 'asata'),
				'param_name' => 'col_md',
				'value' => 2,
				'dependency' => array(
					'element'=>'layout_mode',
					'value'=> array('masonry', 'fitRows')
				),
				'group' => esc_html__('Responsive', 'asata'),
				'description' => esc_html__('Enter columns display (Screen width >=768px and <992px).', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns Small Screen', 'asata'),
				'param_name' => 'col_sm',
				'value' => 2,
				'dependency' => array(
					'element'=>'layout_mode',
					'value'=> array('masonry', 'fitRows')
				),
				'group' => esc_html__('Responsive', 'asata'),
				'description' => esc_html__('Enter columns display (Screen width >=576px and <768px).', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns Extra Screen', 'asata'),
				'param_name' => 'col_xs',
				'value' => 1,
				'dependency' => array(
					'element'=>'layout_mode',
					'value'=> array('masonry', 'fitRows')
				),
				'group' => esc_html__('Responsive', 'asata'),
				'description' => esc_html__('Enter columns display (Screen <576px).', 'asata')
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__( 'CSS box', 'asata' ),
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'asata' ),
			)
		)
	)
));
