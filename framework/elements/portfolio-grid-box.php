<?php
class WPBakeryShortCode_bt_portfolio_grid_box extends WPBakeryShortCode {
	
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
				'css_animation' => '',
				'el_id' => '',
				'el_class' => '',
				
				'overlay_color' => '',
				
				'image_size' => 'full',
				'image_type' => 'auto',
				'image_ratio' => '66',
				
				'css' => ''
				
			),
			vc_attr_add_icon_select( 'overlay' ),
			vc_attr_add_font_style( 'number' ),
			vc_attr_add_font_style( 'title' ),
			vc_attr_add_font_style( 'category' ),
			vc_attr_add_add_responsive_group()
		), $atts));
		
		$content = wpb_js_remove_wpautop($content, true);
		
		$rand_class = 'bt_element_'.rand();
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			$rand_class,
			'bt-element bt-portfolio-grid-box-element bt-iso-grid',
			$layout_mode,
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
		
		$portfolio_data = vc_param_group_parse_atts( $atts['portfolio_data'] );
		
		/* Number */
		$style_number = array();
		if($number_font_size) $style_number[] = 'font-size: '.$number_font_size.';';
		if($number_line_height) $style_number[] = 'line-height: '.$number_line_height.';';
		if($number_letter_spacing) $style_number[] = 'letter-spacing: '.$number_letter_spacing.';';
		if($number_color) $style_number['color'] = 'color: '.$number_color.';';
		
		/* Title Style */
		$style_title = array();
		if($title_font_size) $style_title[] = 'font-size: '.$title_font_size.';';
		if($title_line_height) $style_title[] = 'line-height: '.$title_line_height.';';
		if($title_letter_spacing) $style_title[] = 'letter-spacing: '.$title_letter_spacing.';';
		if($title_color) $style_title[] = 'color: '.$title_color.';';
		
		$title_attributes = array();
		if ( ! empty( $style_title ) ) {
			$title_attributes[] = 'style="' . esc_attr( implode(' ', $style_title) ) . '"';
		}
		
		/* Category Style */
		$style_category = array();
		if($category_font_size) $style_category[] = 'font-size: '.$category_font_size.';';
		if($category_line_height) $style_category[] = 'line-height: '.$category_line_height.';';
		if($category_letter_spacing) $style_category[] = 'letter-spacing: '.$category_letter_spacing.';';
		if($category_color) $style_category[] = 'color: '.$category_color.';';
		
		$category_attributes = array();
		if ( ! empty( $style_category ) ) {
			$category_attributes[] = 'style="' . esc_attr( implode(' ', $style_category) ) . '"';
		}
		
		$custom_css = '
					.'.$rand_class.' .grid-sizer, 
					.'.$rand_class.' .grid-item { max-width: 100%; width: calc((100% - '. $space .'px * ('. $columns .' - 1)) / '. $columns .'); }
					.'.$rand_class.' .gutter-sizer { width: '. $space .'px; }
					.'.$rand_class.' .grid-item { margin-bottom: '. $space .'px; }
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
		?>
		<div <?php echo implode(' ', $wrap_attr); ?>>
			<div class="bt-isotope">
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
				<?php
					if(!empty($portfolio_data)){
						foreach($portfolio_data as $portfolio){
							$post_link = isset($portfolio['post_link'])?vc_build_link( $portfolio['post_link'] ):array();
							$post_link_attributes = vc_render_link_attr( $post_link );
							?>
							<div class="grid-item">
								<div class="bt-item">
									<div class="bt-image-wrap">
										<?php
										/* Image */
										$img = asata_get_image_type('attachment', $portfolio['image'], $image_type, $image_ratio , $image_size);
										if($img) echo '<div class="bt-image">'.$img.'</div>';
										
										/* Overlay */
										if(isset($portfolio['main_color'])){
											$style_overlay = 'background: '.$portfolio['main_color'].';';
										}elseif($overlay_color){
											$style_overlay = 'background: '.$overlay_color.';';
										}else{
											$style_overlay = '';
										}
										?>
										<div class="bt-overlay" <?php if($style_overlay) echo 'style="'.esc_attr($style_overlay).'"'; ?>></div>
										<?php
											if(!empty($post_link_attributes)){
												vc_icon_element_fonts_enqueue( $overlay_icon_type ); 
												$iconClass = ${'overlay_icon_' . $overlay_icon_type} ? ${'overlay_icon_' . $overlay_icon_type} : 'fa fa-adjust';
												echo '<a class="bt-link" '.implode(' ', $post_link_attributes).'><i class="'.esc_attr($iconClass).'"></i></a>';
											} 
										?>
									</div>
									<div class="bt-content">
										<?php
											/* Order Number */
											if(isset($portfolio['number'])){
												if(isset($portfolio['main_color'])) $style_number['color'] = 'color: '.$portfolio['main_color'].';';
											
												$number_attributes = array();
												if ( ! empty( $style_number ) ) {
													$number_attributes[] = 'style="' . esc_attr( implode(' ', $style_number) ) . '"';
												}
												
												echo '<h2 class="bt-number" '.implode(' ', $number_attributes).'>'.$portfolio['number'].'</h2>';
											}
											/* Title */
											if($portfolio['title']){
												if(!empty($post_link_attributes)){
													echo '<h3 class="bt-title"><a '.implode(' ', $title_attributes).' '.implode(' ', $post_link_attributes).'>'.$portfolio['title'].'</a></h3>';
												}else{
													echo '<h3 class="bt-title" '.implode(' ', $title_attributes).'>'.$portfolio['title'].'</h3>';
												}
											}
											/* Category */
											if($portfolio['category']){
												$category_link = isset($portfolio['category_link'])?vc_build_link( $portfolio['category_link'] ):array();
												$category_link_attributes = vc_render_link_attr( $category_link );
												
												if(!empty($category_link_attributes)){
													echo '<h4 class="bt-category"><a '.implode(' ', $category_attributes).' '.implode(' ', $category_link_attributes).'>'.$portfolio['category'].'</a></h4>';
												}else{
													echo '<h4 class="bt-category" '.implode(' ', $category_attributes).'>'.$portfolio['category'].'</h4>';
												}
											}
										?>
									</div>
								</div>
							</div>
							<?php
						}
					}
				?>
			</div>
			<?php
				if($show_loadmore) {
					$count_html = $loadmore_count ? '<span class="bt-count"></span>' : '';
					echo '<div class="bt-load-more-wrap"><a href="#" class="bt-btn bt-load-more">'.$loadmore_text.$count_html.'</a></div>'; 
				}
			?>
		</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Portfolio Grid Box', 'asata'),
	'base' => 'bt_portfolio_grid_box',
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
					esc_html__('fitRows', 'asata') => 'fitRows'
				),
				'description' => esc_html__('Select layout mode display.', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns', 'asata'),
				'param_name' => 'columns',
				'value' => 4,
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
			vc_map_add_css_animation(),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Element ID', 'asata'),
				'param_name' => 'el_id',
				'value' => '',
				'description' => esc_html__('Enter element ID (Note: make sure it is unique and valid).', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Extra Class', 'asata'),
				'param_name' => 'el_class',
				'value' => '',
				'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'asata')
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Portfolio Data', 'asata'),
				'param_name' => 'portfolio_data',
				'value' => '',
				'group' => esc_html__('Data', 'asata'),
				'description' => esc_html__('Add data for option - portfolio_data.', 'asata'),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Number', 'asata'),
						'param_name' => 'number',
						'value' => '',
						'description' => esc_html__('Enter number.', 'asata')
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image', 'asata'),
						'param_name' => 'image',
						'value' => '',
						'group' => esc_html__('Image', 'asata'),
						'description' => esc_html__('Select image.', 'asata')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'asata'),
						'param_name' => 'title',
						'value' => '',
						'admin_label' => true,
						'description' => esc_html__('Enter text.', 'asata')
					),
					array(
						'type' => 'vc_link',
						'heading' => esc_html__('Post URL (Link)', 'asata'),
						'param_name' => 'post_link',
						'description' => esc_html__('Add custom link.', 'asata')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Category', 'asata'),
						'param_name' => 'category',
						'value' => '',
						'admin_label' => true,
						'description' => esc_html__('Enter text.', 'asata')
					),
					array(
						'type' => 'vc_link',
						'heading' => esc_html__('Category URL (Link)', 'asata'),
						'param_name' => 'category_link',
						'description' => esc_html__('Add custom link.', 'asata')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Main Color', 'asata'),
						'param_name' => 'main_color',
						'value' => '',
						'description' => esc_html__('Select color.', 'asata')
					)
				)
			),
			array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Color', 'asata'),
				'param_name' => 'overlay_color',
				'value' => '',
				'group' => esc_html__('Overlay', 'asata'),
				'description' => esc_html__('Select color.', 'asata')
			)
		),
		vc_map_add_icon_select( 'overlay', 'Overlay', array() ),
		vc_map_add_image_size_group( 'image', 'Image', array() ),
		vc_map_add_font_style( 'number', 'Number', array() ),
		vc_map_add_font_style( 'title', 'Title', array() ),
		vc_map_add_font_style( 'category', 'Category', array() ),
		array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns Large Screen', 'asata'),
				'param_name' => 'col_lg',
				'value' => 3,
				'group' => esc_html__('Responsive', 'asata'),
				'description' => esc_html__('Enter columns display (Screen width >=992px and <1199px).', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns Medium Screen', 'asata'),
				'param_name' => 'col_md',
				'value' => 2,
				'group' => esc_html__('Responsive', 'asata'),
				'description' => esc_html__('Enter columns display (Screen width >=768px and <992px).', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns Small Screen', 'asata'),
				'param_name' => 'col_sm',
				'value' => 2,
				'group' => esc_html__('Responsive', 'asata'),
				'description' => esc_html__('Enter columns display (Screen width >=576px and <768px).', 'asata')
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Columns Extra Screen', 'asata'),
				'param_name' => 'col_xs',
				'value' => 1,
				'group' => esc_html__('Responsive', 'asata'),
				'description' => esc_html__('Enter columns display (Screen <576px).', 'asata')
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__('CSS box', 'asata'),
				'param_name' => 'css',
				'group' => esc_html__('Design Options', 'asata'),
			)
		)
	)
));
