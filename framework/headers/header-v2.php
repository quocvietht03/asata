<?php 
	global $asata_options;
	$page_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'page_options'):array();
	
	$container_class = (isset($asata_options['h2_fullwidth'])&&$asata_options['h2_fullwidth'])?'container-fluid':'bt-container';
	if(isset($page_options['header_fullwidth'])&&$page_options['header_fullwidth']){ $container_class = 'bt-container'; }
	
	$header_class = 'bt-header bt-header-v2';
	$header_ab_style = array();
	if(!(isset($page_options['header_absolute'])&&$page_options['header_absolute'])){
		if(isset($asata_options['h2_header_absolute'])&&$asata_options['h2_header_absolute']){
			$header_class .= ' bt-header-absolute';
			if(isset($asata_options['h2_max_width'])&&$asata_options['h2_max_width']){
				$header_ab_style[] = 'max-width: '.$asata_options['h2_max_width'].'px';
			};
			if(isset($asata_options['h2_margin_top']['margin-top'])&&$asata_options['h2_margin_top']['margin-top']){
				$header_ab_style[] = 'margin-top: '.$asata_options['h2_margin_top']['margin-top'];
			};
		}
	}
	
	$header_top = (isset($asata_options['h2_header_top'])&&$asata_options['h2_header_top'])?$asata_options['h2_header_top']:'';
	if(isset($page_options['header_top'])&&$page_options['header_top']){ $header_top = ''; }
	
	if(isset($asata_options['h2_header_bottom_absolute'])&&$asata_options['h2_header_bottom_absolute']){
		$header_class .= ' bt-absolute';
	}
	
	$menu_assign = isset($asata_options['h2_menu_assign'])&&($asata_options['h2_menu_assign'] != 'auto')?$asata_options['h2_menu_assign']:'';
	if(isset($page_options['header_menu_assign'])&&$page_options['header_menu_assign'] != 'auto'){ $menu_assign = $page_options['header_menu_assign']; }
	
	$header_stick = (isset($asata_options['h2_header_stick'])&&$asata_options['h2_header_stick'])?$asata_options['h2_header_stick']:'';
	if(isset($page_options['header_stick'])&&$page_options['header_stick']){ $header_stick = ''; }
	if($header_stick){
		$header_class .= ' bt-stick';
	}
	
?>
<header id="bt_header" class="<?php echo esc_attr($header_class); ?>">
	<div class="bt-header-desktop" style="<?php echo esc_attr( implode('; ', $header_ab_style) ); ?>">
		<?php if($header_top){ ?>
			<div class="bt-subheader bt-top">
				<div class="bt-subheader-inner <?php echo esc_attr($container_class); ?>">
					<div class="bt-subheader-cell bt-left">
						<div class="bt-content text-left">
							<?php
								if(isset($asata_options['h2_header_top_left'])&&$asata_options['h2_header_top_left']){
									foreach($asata_options['h2_header_top_left'] as $sidebar_id){
										?>
											<div class="<?php echo 'bt-'.esc_attr(strtolower($sidebar_id)); ?>">
												<?php dynamic_sidebar( $sidebar_id ); ?>
											</div>
										<?php
									}
								}
							?>
						</div>
					</div>
					<div class="bt-subheader-cell bt-right">
						<div class="bt-content text-right">
							<?php
								if(isset($asata_options['h2_header_top_right'])&&$asata_options['h2_header_top_right']){
									foreach($asata_options['h2_header_top_right'] as $sidebar_id){
										?>
											<div class="<?php echo 'bt-'.esc_attr(strtolower($sidebar_id)); ?>">
												<?php dynamic_sidebar( $sidebar_id ); ?>
											</div>
										<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
		<div class="bt-subheader bt-middle">
			<div class="bt-subheader-inner <?php echo esc_attr($container_class); ?>">
				<div class="bt-subheader-cell bt-left">
					<div class="bt-content text-left">
						<?php
							if(isset($asata_options['h2_header_middle_left'])&&$asata_options['h2_header_middle_left']){
								foreach($asata_options['h2_header_middle_left'] as $sidebar_id){
									?>
										<div class="<?php echo 'bt-'.esc_attr(strtolower($sidebar_id)); ?>">
											<?php dynamic_sidebar( $sidebar_id ); ?>
										</div>
									<?php
								}
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-center">
					<div class="bt-content text-center">
						<?php
							$logo = isset($asata_options['h2_logo']['url'])?$asata_options['h2_logo']['url']:'';
							if(isset($page_options['header_logo']['url'])&&$page_options['header_logo']['url']){
								$logo = $page_options['header_logo']['url'];
							}
							
							$logo_height = (isset($asata_options['h2_logo_height'])&&$asata_options['h2_logo_height'])?$asata_options['h2_logo_height']:'30';
							if(isset($page_options['header_logo_height'])&&$page_options['header_logo_height']){
								$logo_height = $page_options['header_logo_height'];
							}
							
							asata_logo($logo, $logo_height); 
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-right">
					<div class="bt-content text-right">
						<?php
							if(isset($asata_options['h2_header_middle_right'])&&$asata_options['h2_header_middle_right']){
								foreach($asata_options['h2_header_middle_right'] as $sidebar_id){
									?>
										<div class="<?php echo 'bt-'.esc_attr(strtolower($sidebar_id)); ?>">
											<?php dynamic_sidebar( $sidebar_id ); ?>
										</div>
									<?php
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="bt-subheader bt-bottom">
			<div class="bt-subheader-inner  <?php echo esc_attr($container_class); ?>">
				<div class="bt-subheader-cell bt-left">
					<div class="bt-content text-left">
						<?php
							if(isset($asata_options['h2_menu_align'])&&$asata_options['h2_menu_align']=='left') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
							
							if(isset($asata_options['h2_menu_align'])&&$asata_options['h2_menu_align']=='left'&&isset($asata_options['h2_menu_after_content_auto'])&&$asata_options['h2_menu_after_content_auto']){
								if(isset($asata_options['h2_menu_content_right'])&&$asata_options['h2_menu_content_right']&&isset($asata_options['h2_menu_content_right_element'])&&$asata_options['h2_menu_content_right_element']){
									echo '<div class="bt-menu-content-right">';
										foreach($asata_options['h2_menu_content_right_element'] as $sidebar_id){
											dynamic_sidebar( $sidebar_id );
										}
									echo '</div>';
								}
								
								if(isset($asata_options['h2_menu_canvas'])&&$asata_options['h2_menu_canvas']){
									echo '<a href="#" class="bt-menu-canvas-toggle"><i class="icon_menu"></i></a>';
								}
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-center">
					<div class="bt-content text-center">
						<?php
							if(isset($asata_options['h2_menu_align'])&&$asata_options['h2_menu_align']=='center') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
							
							if(isset($asata_options['h2_menu_align'])&&$asata_options['h2_menu_align']=='center'&&isset($asata_options['h2_menu_after_content_auto'])&&$asata_options['h2_menu_after_content_auto']){
								if(isset($asata_options['h2_menu_content_right'])&&$asata_options['h2_menu_content_right']&&isset($asata_options['h2_menu_content_right_element'])&&$asata_options['h2_menu_content_right_element']){
									echo '<div class="bt-menu-content-right">';
										foreach($asata_options['h2_menu_content_right_element'] as $sidebar_id){
											dynamic_sidebar( $sidebar_id );
										}
									echo '</div>';
								}
								
								if(isset($asata_options['h2_menu_canvas'])&&$asata_options['h2_menu_canvas']){
									echo '<a href="#" class="bt-menu-canvas-toggle"><i class="icon_menu"></i></a>';
								}
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-right">
					<div class="bt-content text-right">
						<?php
							if(isset($asata_options['h2_menu_align'])&&$asata_options['h2_menu_align']=='right') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
							
							if(isset($asata_options['h2_menu_align'])&&$asata_options['h2_menu_align']=='right'&&isset($asata_options['h2_menu_after_content_auto'])&&$asata_options['h2_menu_after_content_auto'] || !$asata_options['h2_menu_after_content_auto']){
								if(isset($asata_options['h2_menu_content_right'])&&$asata_options['h2_menu_content_right']&&isset($asata_options['h2_menu_content_right_element'])&&$asata_options['h2_menu_content_right_element']){
									echo '<div class="bt-menu-content-right">';
										foreach($asata_options['h2_menu_content_right_element'] as $sidebar_id){
											dynamic_sidebar( $sidebar_id );
										}
									echo '</div>';
								}
								
								if(isset($asata_options['h2_menu_canvas'])&&$asata_options['h2_menu_canvas']){
									echo '<a href="#" class="bt-menu-canvas-toggle"><i class="icon_menu"></i></a>';
								}
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
							$logo_stick = isset($asata_options['h2_logo_stick']['url'])?$asata_options['h2_logo_stick']['url']:'';
							if(isset($page_options['header_logo_stick']['url'])&&$page_options['header_logo_stick']['url']){
								$logo_stick = $page_options['header_logo_stick']['url'];
							}
							
							$logo_stick_height = isset($asata_options['h2_logo_stick_height'])?$asata_options['h2_logo_stick_height']:'30';
							if(isset($page_options['header_logo_stick_height'])&&$page_options['header_logo_stick_height']){
								$logo_stick_height = $page_options['header_logo_stick_height'];
							}
							
							asata_logo($logo_stick, $logo_stick_height); 
							
							if(isset($asata_options['h2_menu_align_stick'])&&$asata_options['h2_menu_align_stick']=='left') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-center">
					<div class="bt-content text-center">
						<?php
							if(isset($asata_options['h2_menu_align_stick'])&&$asata_options['h2_menu_align_stick']=='center') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
						?>
					</div>
				</div>
				<div class="bt-subheader-cell bt-right">
					<div class="bt-content text-right">
						<?php
							if(isset($asata_options['h2_menu_align_stick'])&&$asata_options['h2_menu_align_stick']=='right') {
								asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-desktop text-left');
							}
							
							if(isset($asata_options['h2_menu_content_right'])&&$asata_options['h2_menu_content_right']&&isset($asata_options['h2_menu_content_right_element'])&&$asata_options['h2_menu_content_right_element']){
								echo '<div class="bt-menu-content-right">';
									foreach($asata_options['h2_menu_content_right_element'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								echo '</div>';
							}
							
							if(isset($asata_options['h2_menu_canvas'])&&$asata_options['h2_menu_canvas']){
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
			$mobile_header_top = (isset($asata_options['h2_mobile_header_top'])&&$asata_options['h2_mobile_header_top'])?$asata_options['h2_mobile_header_top']:'';
			if(isset($page_options['mobile_header_top'])&&$page_options['mobile_header_top']){ $mobile_header_top = ''; }
			
			if($mobile_header_top){ 
		?>
			<div class="bt-subheader bt-top">
				<div class="bt-subheader-inner container-fluid">
					<div class="bt-subheader-cell bt-left">
						<div class="bt-content text-left">
							<?php
								if(isset($asata_options['h2_header_top_left'])&&$asata_options['h2_header_top_left']){
									foreach($asata_options['h2_header_top_left'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								}
							?>
						</div>
					</div>
					<div class="bt-subheader-cell bt-center">
						<div class="bt-content text-center">
							<?php
								if(isset($asata_options['h2_header_top_center'])&&$asata_options['h2_header_top_center']){
									foreach($asata_options['h2_header_top_center'] as $sidebar_id){
										dynamic_sidebar( $sidebar_id );
									}
								}
							?>
						</div>
					</div>
					<div class="bt-subheader-cell bt-right">
						<div class="bt-content text-right">
							<?php
								if(isset($asata_options['h2_header_top_right'])&&$asata_options['h2_header_top_right']){
									foreach($asata_options['h2_header_top_right'] as $sidebar_id){
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
			<div class="bt-subheader-inner container-fluid">
				<div class="bt-subheader-cell bt-left">
					<div class="bt-content text-left">
						<?php
							$logo_mobile = isset($asata_options['h2_logo_mobile']['url'])?$asata_options['h2_logo_mobile']['url']:'';
							if(isset($page_options['logo_mobile']['url'])&&$page_options['logo_mobile']['url']){
								$logo_mobile = $page_options['logo_mobile']['url'];
							}
							
							$logo_mobile_height = isset($asata_options['h2_logo_mobile_height'])?$asata_options['h2_logo_mobile_height']:'30';
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
							if(isset($asata_options['h2_menu_content_right'])&&$asata_options['h2_menu_content_right']&&isset($asata_options['h2_menu_content_right_element'])&&$asata_options['h2_menu_content_right_element']){
								echo '<div class="bt-menu-content-right">';
									foreach($asata_options['h2_menu_content_right_element'] as $sidebar_id){
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
				<?php asata_nav_menu('', 'mobile_navigation', 'bt-menu-mobile'); ?>
			</div>
		</div>
	</div>
</header>
