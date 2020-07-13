<?php 
	global $asata_options;
	
?>
<div class="bt-menu-toggle"></div>
<header id="bt_header" class="bt-header bt-header-vertical">
	
	<div class="bt-header-inner">
		<div class="bt-logo">
			<?php
				$logo = isset($asata_options['hvertical_logo']['url'])?$asata_options['hvertical_logo']['url']:'';
				
				$logo_height = (isset($asata_options['hvertical_logo_height'])&&$asata_options['hvertical_logo_height'])?$asata_options['hvertical_logo_height']:'24';
				
				asata_logo($logo, $logo_height); 
			?>
		</div>
		
		<div class="bt-vertical-menu-wrap">
			<?php
				$menu_assign = isset($asata_options['hvertical_menu_assign'])&&($asata_options['hvertical_menu_assign'] != 'auto')?$asata_options['hvertical_menu_assign']:'';
				asata_nav_menu($menu_assign, 'main_navigation', 'bt-menu-list');
			?>
		</div>
		
		<div class="bt-sidebar">
			<?php
				if(isset($asata_options['hvertical_content_bottom_element'])&&$asata_options['hvertical_content_bottom_element']&&isset($asata_options['hvertical_content_bottom_element'])&&$asata_options['hvertical_content_bottom_element']){
					echo '<div class="bt-menu-content-right">';
						foreach($asata_options['hvertical_content_bottom_element'] as $sidebar_id){
							dynamic_sidebar( $sidebar_id );
						}
					echo '</div>'; 
				}
			?>
		</div>
		
	</div>
		
</header>