<?php 
	global $asata_options;
	$page_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'page_options'):array();
	
	$container_class = (isset($asata_options['honepage1_fullwidth'])&&$asata_options['honepage1_fullwidth'])?'container-fluid':'bt-container';
	$menu_assign = isset($asata_options['honepage1_menu_assign'])&&($asata_options['honepage1_menu_assign'] != 'auto')?$asata_options['honepage1_menu_assign']:'';
	if(isset($page_options['header_menu_assign'])&&$page_options['header_menu_assign'] != 'auto'){ $menu_assign = $page_options['header_menu_assign']; }
	
?>
<header id="bt_header" class="bt-header bt-easing-scroll bt-header-onepagev1">
		
	<div class="bt-subheader bt-header-inner">
		<div class="bt-subheader-inner <?php echo esc_attr($container_class); ?>">
			<div class="bt-subheader-cell bt-left">
				<div class="bt-content text-left">
					<?php
						$logo = isset($asata_options['honepage1_logo']['url'])?$asata_options['honepage1_logo']['url']:'';
						
						$logo_height = (isset($asata_options['honepage1_logo_height'])&&$asata_options['honepage1_logo_height'])?$asata_options['honepage1_logo_height']:'24';
						
						asata_logo($logo, $logo_height); 
						
						
					?>
				</div>
			</div>
			
			<div class="bt-subheader-cell bt-right">
				<div class="bt-content text-right">
					<?php
						if(isset($asata_options['honepage1_content_right_element'])&&$asata_options['honepage1_content_right_element']&&isset($asata_options['honepage1_content_right_element'])&&$asata_options['honepage1_content_right_element']){
							echo '<div class="bt-menu-content-right">';
								foreach($asata_options['honepage1_content_right_element'] as $sidebar_id){
									dynamic_sidebar( $sidebar_id );
								}
							echo '</div>';
						}
						if(isset($asata_options['honepages_croll_menu_canvas'])&&$asata_options['honepages_croll_menu_canvas']){
							echo '<a href="#" class="bt-menu-canvas-toggle"><i class="icon_menu"></i></a>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="bt-scroll-menu-wrap">
		<?php
			asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-list');
		?>
	</div>
		
</header>