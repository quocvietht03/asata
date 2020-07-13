<?php 
	global $asata_options;
	$page_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'page_options'):array();
	
	$container_class = (isset($asata_options['honepage_fullwidth'])&&$asata_options['honepage_fullwidth'])?'container-fluid':'bt-container';
	if(isset($page_options['header_fullwidth'])&&$page_options['header_fullwidth']){ $container_class = 'bt-container'; }
	
	$header_top = (isset($asata_options['honepage_header_top'])&&$asata_options['honepage_header_top'])?$asata_options['honepage_header_top']:'';
	if(isset($page_options['header_top'])&&$page_options['header_top']){ $header_top = ''; }
	
	$header_class = 'bt-header bt-easing-scroll bt-header-onepage';
	
	if(isset($asata_options['honepage_header_bottom_absolute'])&&$asata_options['honepage_header_bottom_absolute']){
		$header_class .= ' bt-absolute';
	}
	
	$menu_assign = isset($asata_options['honepage_menu_assign'])&&($asata_options['honepage_menu_assign'] != 'auto')?$asata_options['honepage_menu_assign']:'';
	if(isset($page_options['header_menu_assign'])&&$page_options['header_menu_assign'] != 'auto'){ $menu_assign = $page_options['header_menu_assign']; }
	
	$header_stick = (isset($asata_options['honepage_header_stick'])&&$asata_options['honepage_header_stick'])?$asata_options['honepage_header_stick']:'';
	if(isset($page_options['header_stick'])&&$page_options['header_stick']){ $header_stick = ''; }
	if($header_stick){
		$header_class .= ' bt-stick';
	}
	
?>
<header id="bt_header" class="<?php echo esc_attr($header_class); ?>">
	<div class="bt-header-desktop">
		<?php if($header_top){ ?>
			<div class="bt-subheader bt-top">
				<div class="bt-subheader-inner <?php echo esc_attr($container_class); ?>">
					<div class="bt-subheader-cell bt-left">
						<div class="bt-content text-left">
							<?php
								if(isset($asata_options['honepage_header_top_left'])&&$asata_options['honepage_header_top_left']){
									foreach($asata_options['honepage_header_top_left'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								}
							?>
						</div>
					</div>
					<div class="bt-subheader-cell bt-center">
						<div class="bt-content text-center">
							<?php
								if(isset($asata_options['honepage_header_top_center'])&&$asata_options['honepage_header_top_center']){
									foreach($asata_options['honepage_header_top_center'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								}
							?>
						</div>
					</div>
					<div class="bt-subheader-cell bt-right">
						<div class="bt-content text-right">
							<?php
								if(isset($asata_options['honepage_header_top_right'])&&$asata_options['honepage_header_top_right']){
									foreach($asata_options['honepage_header_top_right'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<div class="bt-subheader bt-bottom">
			<div class="bt-subheader-inner <?php echo esc_attr($container_class); ?>">
				<div class="bt-subheader-cell bt-left">
					<div class="bt-content text-left">
						<?php
							$logo = isset($asata_options['honepage_logo']['url'])?$asata_options['honepage_logo']['url']:'';
							if(isset($page_options['header_logo']['url'])&&$page_options['header_logo']['url']){
								$logo = $page_options['header_logo']['url'];
							}
							
							$logo_height = (isset($asata_options['honepage_logo_height'])&&$asata_options['honepage_logo_height'])?$asata_options['honepage_logo_height']:'24';
							if(isset($page_options['header_logo_height'])&&$page_options['header_logo_height']){
								$logo_height = $page_options['header_logo_height'];
							}
							
							asata_logo($logo, $logo_height); 
							
							if(isset($asata_options['honepage_menu_align'])&&$asata_options['honepage_menu_align']=='left') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-center">
					<div class="bt-content text-center">
						<?php
							if(isset($asata_options['honepage_menu_align'])&&$asata_options['honepage_menu_align']=='center') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-right">
					<div class="bt-content text-right">
						<?php
							if(isset($asata_options['honepage_menu_align'])&&$asata_options['honepage_menu_align']=='right'||!isset($asata_options['honepage_menu_align'])) {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
							
							if(isset($asata_options['honepage_menu_content_right'])&&$asata_options['honepage_menu_content_right']&&isset($asata_options['honepage_menu_content_right_element'])&&$asata_options['honepage_menu_content_right_element']){
								echo '<div class="bt-menu-content-right">';
									foreach($asata_options['honepage_menu_content_right_element'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								echo '</div>';
							}
							
							if(isset($asata_options['honepage_menu_canvas'])&&$asata_options['honepage_menu_canvas']){
								echo '<a href="#" class="bt-menu-canvas-toggle"><i class="icon_menu"></i></a>';
							}
						?>
					</div>
				</div>
			</div>
		</div>

	</div>
	
	<div class="bt-header-stick">
		
		<div class="bt-subheader">
			<div class="bt-subheader-inner <?php echo esc_attr($container_class); ?>">
				<div class="bt-subheader-cell bt-left">
					<div class="bt-content text-left">
						<?php
							$logo_stick = isset($asata_options['honepage_logo_stick']['url'])?$asata_options['honepage_logo_stick']['url']:'';
							if(isset($page_options['header_logo_stick']['url'])&&$page_options['header_logo_stick']['url']){
								$logo_stick = $page_options['header_logo_stick']['url'];
							}
							
							$logo_stick_height = isset($asata_options['honepage_logo_stick_height'])?$asata_options['honepage_logo_stick_height']:'24';
							if(isset($page_options['header_logo_stick_height'])&&$page_options['header_logo_stick_height']){
								$logo_stick_height = $page_options['header_logo_stick_height'];
							}
							
							asata_logo($logo_stick, $logo_stick_height); 
							
							if(isset($asata_options['honepage_menu_align'])&&$asata_options['honepage_menu_align']=='left') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-center">
					<div class="bt-content text-center">
						<?php
							if(isset($asata_options['honepage_menu_align'])&&$asata_options['honepage_menu_align']=='center') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-right">
					<div class="bt-content text-right">
						<?php
							if(isset($asata_options['honepage_menu_align'])&&$asata_options['honepage_menu_align']=='right') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
							
							if(isset($asata_options['honepage_menu_content_right'])&&$asata_options['honepage_menu_content_right']&&isset($asata_options['honepage_menu_content_right_element'])&&$asata_options['honepage_menu_content_right_element']){
								echo '<div class="bt-menu-content-right">';
									foreach($asata_options['honepage_menu_content_right_element'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								echo '</div>';
							}
							
							if(isset($asata_options['honepage_menu_canvas'])&&$asata_options['honepage_menu_canvas']){
								echo '<a href="#" class="bt-menu-canvas-toggle"><i class="icon_menu"></i></a>';
							}
						?>
					</div>
				</div>
			</div>
		</div>

	</div>
	
	<div class="bt-header-mobile">
		<?php
			$mobile_header_top = (isset($asata_options['honepage_mobile_header_top'])&&$asata_options['honepage_mobile_header_top'])?$asata_options['honepage_mobile_header_top']:'';
			if(isset($page_options['mobile_header_top'])&&$page_options['mobile_header_top']){ $mobile_header_top = ''; }
			
			if($mobile_header_top){ 
		?>
			<div class="bt-subheader bt-top">
				<div class="bt-subheader-inner container">
					<div class="bt-subheader-cell bt-left">
						<div class="bt-content text-left">
							<?php
								if(isset($asata_options['honepage_header_top_left'])&&$asata_options['honepage_header_top_left']){
									foreach($asata_options['honepage_header_top_left'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								}
							?>
						</div>
					</div>
					<div class="bt-subheader-cell bt-center">
						<div class="bt-content text-center">
							<?php
								if(isset($asata_options['honepage_header_top_center'])&&$asata_options['honepage_header_top_center']){
									foreach($asata_options['honepage_header_top_center'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								}
							?>
						</div>
					</div>
					<div class="bt-subheader-cell bt-right">
						<div class="bt-content text-right">
							<?php
								if(isset($asata_options['honepage_header_top_right'])&&$asata_options['honepage_header_top_right']){
									foreach($asata_options['honepage_header_top_right'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<div class="bt-subheader bt-bottom">
			<div class="bt-subheader-inner container">
				<div class="bt-subheader-cell bt-left">
					<div class="bt-content text-left">
						<?php
							$logo_mobile = isset($asata_options['honepage_logo_mobile']['url'])?$asata_options['honepage_logo_mobile']['url']:'';
							if(isset($page_options['logo_mobile']['url'])&&$page_options['logo_mobile']['url']){
								$logo_mobile = $page_options['logo_mobile']['url'];
							}
							
							$logo_mobile_height = isset($asata_options['honepage_logo_mobile_height'])?$asata_options['honepage_logo_mobile_height']:'24';
							if(isset($page_options['logo_mobile_height'])&&$page_options['logo_mobile_height']){
								$logo_mobile_height = $page_options['logo_mobile_height'];
							}
							
							asata_logo($logo_mobile, $logo_mobile_height); 
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-right">
					<div class="bt-content text-right">
						<?php
							if(isset($asata_options['honepage_menu_content_right'])&&$asata_options['honepage_menu_content_right']&&isset($asata_options['honepage_menu_content_right_element'])&&$asata_options['honepage_menu_content_right_element']){
								echo '<div class="bt-menu-content-right">';
									foreach($asata_options['honepage_menu_content_right_element'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								echo '</div>';
							}
						?>
						<div class="bt-menu-toggle"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="bt-menu-mobile-wrap">
			<div class="container">
				<?php asata_nav_menu($menu_assign, 'mobile_navigation', 'bt-menu-mobile'); ?>
			</div>
		</div>
	</div>
</header>
