<?php
function asata_autoCompileLess($inputFile, $outputFile) {
    require_once ABSPATH.'/wp-admin/includes/file.php';	
	WP_Filesystem();
	if(!class_exists('lessc')){
		require_once get_template_directory().'/framework/inc/lessc.inc.php';
	}
	global $wp_filesystem, $asata_options;
    $less = new lessc();
    $less->setFormatter("classic");
    $less->setPreserveComments(true);
	
	/*Styling Options*/
	$site_width = (isset($asata_options['site_width'])&&$asata_options['site_width'])?$asata_options['site_width'].'vw': '90vw';
	$site_half_width = (isset($asata_options['site_width'])&&$asata_options['site_width'])?($asata_options['site_width']/2).'vw': '45vw';
	$site_space = (isset($asata_options['site_width'])&&$asata_options['site_width'])?((100 - $asata_options['site_width'])/2).'vw': '5vw';
	$mobile_width = (isset($asata_options['mobile_width'])&&$asata_options['mobile_width'])?$asata_options['mobile_width'].'px': '991px';
	
	$main_color = (isset($asata_options['main_color'])&&$asata_options['main_color'])?$asata_options['main_color']: '#ee3364';
	$secondary_color = (isset($asata_options['secondary_color'])&&$asata_options['secondary_color'])?$asata_options['secondary_color']: '#fcc21b';
	
	$base_font = (isset($asata_options['body_font']['font-family'])&&$asata_options['body_font']['font-family'])?$asata_options['body_font']['font-family']: 'Muli';
	$base_font_size = (isset($asata_options['body_font']['font-size'])&&$asata_options['body_font']['font-size'])?$asata_options['body_font']['font-size']: '1rem';
	$base_line_height = (isset($asata_options['body_font']['line-height'])&&$asata_options['body_font']['line-height'])?$asata_options['body_font']['line-height']: '1.5';
	$base_color = (isset($asata_options['body_color'])&&$asata_options['body_color'])?$asata_options['body_color']: '#69707b';
	
	$head_font = (isset($asata_options['h1_font']['font-family'])&&$asata_options['h1_font']['font-family'])?$asata_options['h1_font']['font-family']: 'Montserrat';
	$head_font_weight = (isset($asata_options['h1_font']['font-weight'])&&$asata_options['h1_font']['font-weight'])?$asata_options['h1_font']['font-weight']: '700';
	$head_color = (isset($asata_options['heading_color'])&&$asata_options['heading_color'])?$asata_options['heading_color']: '#283a5e';
	
	$font_size_1 = (isset($asata_options['h1_font']['font-size'])&&$asata_options['h1_font']['font-size'])?$asata_options['h1_font']['font-size']: '36px';
	$font_size_2 = (isset($asata_options['h2_font']['font-size'])&&$asata_options['h2_font']['font-size'])?$asata_options['h2_font']['font-size']: '30px';
	$font_size_3 = (isset($asata_options['h3_font']['font-size'])&&$asata_options['h3_font']['font-size'])?$asata_options['h3_font']['font-size']: '24px';
	$font_size_4 = (isset($asata_options['h4_font']['font-size'])&&$asata_options['h4_font']['font-size'])?$asata_options['h4_font']['font-size']: '18px';
	$font_size_5 = (isset($asata_options['h5_font']['font-size'])&&$asata_options['h5_font']['font-size'])?$asata_options['h5_font']['font-size']: '14px';
	$font_size_6 = (isset($asata_options['h6_font']['font-size'])&&$asata_options['h6_font']['font-size'])?$asata_options['h6_font']['font-size']: '12px';
	
	$line_height_1 = (isset($asata_options['h1_font']['line-height'])&&$asata_options['h1_font']['line-height'])?$asata_options['h1_font']['line-height']: '42px';
	$line_height_2 = (isset($asata_options['h2_font']['line-height'])&&$asata_options['h2_font']['line-height'])?$asata_options['h2_font']['line-height']: '36px';
	$line_height_3 = (isset($asata_options['h3_font']['line-height'])&&$asata_options['h3_font']['line-height'])?$asata_options['h3_font']['line-height']: '30px';
	$line_height_4 = (isset($asata_options['h4_font']['line-height'])&&$asata_options['h4_font']['line-height'])?$asata_options['h4_font']['line-height']: '24px';
	$line_height_5 = (isset($asata_options['h5_font']['line-height'])&&$asata_options['h5_font']['line-height'])?$asata_options['h5_font']['line-height']: '16px';
	$line_height_6 = (isset($asata_options['h6_font']['line-height'])&&$asata_options['h6_font']['line-height'])?$asata_options['h6_font']['line-height']: '14px';
	
	
	$h1_menu_first_level_color_active = (isset($asata_options['h1_menu_first_level_color']['active'])&&$asata_options['h1_menu_first_level_color']['active'])?$asata_options['h1_menu_first_level_color']['active']: '#ee3364';
	$h1_menu_sub_level_color_active = (isset($asata_options['h1_menu_sub_level_color']['active'])&&$asata_options['h1_menu_sub_level_color']['active'])?$asata_options['h1_menu_sub_level_color']['active']: '#ee3364';
	$h1_menu_first_level_color_stick_active = (isset($asata_options['h1_menu_first_level_color_stick']['active'])&&$asata_options['h1_menu_first_level_color_stick']['active'])?$asata_options['h1_menu_first_level_color_stick']['active']: '#ee3364';
	
	$h1_menu_mobile_first_level_color_active = (isset($asata_options['h1_menu_mobile_first_level_color']['active'])&&$asata_options['h1_menu_mobile_first_level_color']['active'])?$asata_options['h1_menu_mobile_first_level_color']['active']: '#ee3364';
	$h1_menu_mobile_sub_level_color_active = (isset($asata_options['h1_menu_mobile_sub_level_color']['active'])&&$asata_options['h1_menu_mobile_sub_level_color']['active'])?$asata_options['h1_menu_mobile_sub_level_color']['active']: '#ee3364';
	
	$h2_menu_first_level_color_active = (isset($asata_options['h2_menu_first_level_color']['active'])&&$asata_options['h2_menu_first_level_color']['active'])?$asata_options['h2_menu_first_level_color']['active']: '#ee3364';
	$h2_menu_sub_level_color_active = (isset($asata_options['h2_menu_sub_level_color']['active'])&&$asata_options['h2_menu_sub_level_color']['active'])?$asata_options['h2_menu_sub_level_color']['active']: '#ee3364';
	$h2_menu_first_level_color_stick_active = (isset($asata_options['h2_menu_first_level_color_stick']['active'])&&$asata_options['h2_menu_first_level_color_stick']['active'])?$asata_options['h2_menu_first_level_color_stick']['active']: '#ee3364';
	
	$h2_menu_mobile_first_level_color_active = (isset($asata_options['h2_menu_mobile_first_level_color']['active'])&&$asata_options['h2_menu_mobile_first_level_color']['active'])?$asata_options['h2_menu_mobile_first_level_color']['active']: '#ee3364';
	$h2_menu_mobile_sub_level_color_active = (isset($asata_options['h2_menu_mobile_sub_level_color']['active'])&&$asata_options['h2_menu_mobile_sub_level_color']['active'])?$asata_options['h2_menu_mobile_sub_level_color']['active']: '#ee3364';
	
	$h3_menu_first_level_color_active = (isset($asata_options['h3_menu_first_level_color']['active'])&&$asata_options['h3_menu_first_level_color']['active'])?$asata_options['h3_menu_first_level_color']['active']: '#ee3364';
	$h3_menu_sub_level_color_active = (isset($asata_options['h3_menu_sub_level_color']['active'])&&$asata_options['h3_menu_sub_level_color']['active'])?$asata_options['h3_menu_sub_level_color']['active']: '#ee3364';
	$h3_menu_first_level_color_stick_active = (isset($asata_options['h3_menu_first_level_color_stick']['active'])&&$asata_options['h3_menu_first_level_color_stick']['active'])?$asata_options['h3_menu_first_level_color_stick']['active']: '#ee3364';

	$h3_menu_mobile_first_level_color_active = (isset($asata_options['h3_menu_mobile_first_level_color']['active'])&&$asata_options['h3_menu_mobile_first_level_color']['active'])?$asata_options['h3_menu_mobile_first_level_color']['active']: '#ee3364';
	$h3_menu_mobile_sub_level_color_active = (isset($asata_options['h3_menu_mobile_sub_level_color']['active'])&&$asata_options['h3_menu_mobile_sub_level_color']['active'])?$asata_options['h3_menu_mobile_sub_level_color']['active']: '#ee3364';	
	
	$hp_menu_first_level_color_active = (isset($asata_options['hp_menu_first_level_color']['active'])&&$asata_options['hp_menu_first_level_color']['active'])?$asata_options['hp_menu_first_level_color']['active']: '#ee3364';
	$hp_menu_sub_level_color_active = (isset($asata_options['hp_menu_sub_level_color']['active'])&&$asata_options['hp_menu_sub_level_color']['active'])?$asata_options['hp_menu_sub_level_color']['active']: '#ee3364';
	
	$hp_menu_mobile_first_level_color_active = (isset($asata_options['hp_menu_mobile_first_level_color']['active'])&&$asata_options['hp_menu_mobile_first_level_color']['active'])?$asata_options['hp_menu_mobile_first_level_color']['active']: '#ee3364';
	$hp_menu_mobile_sub_level_color_active = (isset($asata_options['hp_menu_mobile_sub_level_color']['active'])&&$asata_options['hp_menu_mobile_sub_level_color']['active'])?$asata_options['hp_menu_mobile_sub_level_color']['active']: '#ee3364';
	
	
	$honepage_menu_first_level_color_active = (isset($asata_options['honepage_menu_first_level_color']['active'])&&$asata_options['honepage_menu_first_level_color']['active'])?$asata_options['honepage_menu_first_level_color']['active']: '#ee3364';
	$honepage_menu_sub_level_color_active = (isset($asata_options['honepage_menu_sub_level_color']['active'])&&$asata_options['honepage_menu_sub_level_color']['active'])?$asata_options['honepage_menu_sub_level_color']['active']: '#ee3364';
	$honepage_menu_first_level_color_stick_active = (isset($asata_options['honepage_menu_first_level_color_stick']['active'])&&$asata_options['honepage_menu_first_level_color_stick']['active'])?$asata_options['honepage_menu_first_level_color_stick']['active']: '#ee3364';
	
	$honepage_menu_mobile_first_level_color_active = (isset($asata_options['honepage_menu_mobile_first_level_color']['active'])&&$asata_options['honepage_menu_mobile_first_level_color']['active'])?$asata_options['honepage_menu_mobile_first_level_color']['active']: '#ee3364';
	$honepage_menu_mobile_sub_level_color_active = (isset($asata_options['honepage_menu_mobile_sub_level_color']['active'])&&$asata_options['honepage_menu_mobile_sub_level_color']['active'])?$asata_options['honepage_menu_mobile_sub_level_color']['active']: '#ee3364';
	
	$hvertical_menu_first_level_color = (isset($asata_options['hvertical_menu_first_level_color']['active'])&&$asata_options['hvertical_menu_first_level_color']['active'])?$asata_options['hvertical_menu_first_level_color']['active']: '#ee3364';
	$hvertical_menu_sub_level_color = (isset($asata_options['hvertical_menu_sub_level_color']['active'])&&$asata_options['hvertical_menu_sub_level_color']['active'])?$asata_options['hvertical_menu_sub_level_color']['active']: '#ee3364';
	
	$hminivertical_menu_first_level_color = (isset($asata_options['hminivertical_menu_first_level_color']['active'])&&$asata_options['hminivertical_menu_first_level_color']['active'])?$asata_options['hminivertical_menu_first_level_color']['active']: '#ee3364';
	$hminivertical_menu_sub_level_color = (isset($asata_options['hminivertical_menu_sub_level_color']['active'])&&$asata_options['hminivertical_menu_sub_level_color']['active'])?$asata_options['hminivertical_menu_sub_level_color']['active']: '#ee3364';
	
	$hminivertical_mobile_toggle_button_default = (isset($asata_options['hminivertical_mobile_toggle_button']['regular'])&&$asata_options['hminivertical_mobile_toggle_button']['regular'])?$asata_options['hminivertical_mobile_toggle_button']['regular']: '#171721';
	$hminivertical_mobile_toggle_button_hover = (isset($asata_options['hminivertical_mobile_toggle_button']['hover'])&&$asata_options['hminivertical_mobile_toggle_button']['hover'])?$asata_options['hminivertical_mobile_toggle_button']['hover']: '#ee3364';
	
	$hminivertical_menu_mobile_first_level_color_active = (isset($asata_options['hminivertical_menu_mobile_first_level_color']['active'])&&$asata_options['hminivertical_menu_mobile_first_level_color']['active'])?$asata_options['hminivertical_menu_mobile_first_level_color']['active']: '#ee3364';
	$hminivertical_menu_mobile_sub_level_color_active = (isset($asata_options['hminivertical_menu_mobile_sub_level_color']['active'])&&$asata_options['hminivertical_menu_mobile_sub_level_color']['active'])?$asata_options['hminivertical_menu_mobile_sub_level_color']['active']: '#ee3364';
	
	
    $variables = array(
		"site-width" => $site_width,
		"site-half-width" => $site_half_width,
		"site-space" => $site_space,
		"mobile-width" => $mobile_width,
		
		"main-color" => $main_color,
		"secondary-color" => $secondary_color,
		
		"base-font" => $base_font,
		"base-font-size" => $base_font_size,
		"base-line-height" => $base_line_height,
		"base-color" => $base_color,
		
		"head-font" => $head_font,
		"head-font-weight" => $head_font_weight,
		"head-color" => $head_color,
		
		"font-size-1" => $font_size_1,
		"font-size-2" => $font_size_2,
		"font-size-3" => $font_size_3,
		"font-size-4" => $font_size_4,
		"font-size-5" => $font_size_5,
		"font-size-6" => $font_size_6,
		
		"line-height-1" => $line_height_1,
		"line-height-2" => $line_height_2,
		"line-height-3" => $line_height_3,
		"line-height-4" => $line_height_4,
		"line-height-5" => $line_height_5,
		"line-height-6" => $line_height_6,
		
		"h1-menu-first-level-color-active" => $h1_menu_first_level_color_active,
		"h1-menu-sub-level-color-active" => $h1_menu_sub_level_color_active,
		"h1-menu-first-level-color-stick-active" => $h1_menu_first_level_color_stick_active,
		
		"h1-menu-mobile-first-level-color-active" => $h1_menu_mobile_first_level_color_active,
		"h1-menu-mobile-sub-level-color-active" => $h1_menu_mobile_sub_level_color_active,
		
		"h2-menu-first-level-color-active" => $h2_menu_first_level_color_active,
		"h2-menu-sub-level-color-active" => $h2_menu_sub_level_color_active,
		"h2-menu-first-level-color-stick-active" => $h2_menu_first_level_color_stick_active,
		
		"h2-menu-mobile-first-level-color-active" => $h2_menu_mobile_first_level_color_active,
		"h2-menu-mobile-sub-level-color-active" => $h2_menu_mobile_sub_level_color_active,
		
		"h3-menu-first-level-color-active" => $h3_menu_first_level_color_active,
		"h3-menu-sub-level-color-active" => $h3_menu_sub_level_color_active,
		"h3-menu-first-level-color-stick-active" => $h3_menu_first_level_color_stick_active,
		
		"h3-menu-mobile-first-level-color-active" => $h3_menu_mobile_first_level_color_active,
		"h3-menu-mobile-sub-level-color-active" => $h3_menu_mobile_sub_level_color_active,
		
		"hp-menu-first-level-color-active" => $hp_menu_first_level_color_active,
		"hp-menu-sub-level-color-active" => $hp_menu_sub_level_color_active,
		
		"hp-menu-mobile-first-level-color-active" => $hp_menu_mobile_first_level_color_active,
		"hp-menu-mobile-sub-level-color-active" => $hp_menu_mobile_sub_level_color_active,
		
		"honepage-menu-first-level-color-active" => $honepage_menu_first_level_color_active,
		"honepage-menu-sub-level-color-active" => $honepage_menu_sub_level_color_active,
		"honepage-menu-first-level-color-stick-active" => $honepage_menu_first_level_color_stick_active,
		
		"honepage-menu-mobile-first-level-color-active" => $honepage_menu_mobile_first_level_color_active,
		"honepage-menu-mobile-sub-level-color-active" => $honepage_menu_mobile_sub_level_color_active,
		
		"hvertical-menu-first-level-color" => $hvertical_menu_first_level_color,
		"hvertical-menu-sub-level-color" => $hvertical_menu_sub_level_color,
		
		"hminivertical-menu-first-level-color" => $hminivertical_menu_first_level_color,
		"hminivertical-menu-sub-level-color" => $hminivertical_menu_sub_level_color,
		
		"hminivertical-mobile-toggle-button-default" => $hminivertical_mobile_toggle_button_default,
		"hminivertical-mobile-toggle-button-hover" => $hminivertical_mobile_toggle_button_hover,
		
		"hminivertical-menu-mobile-first-level-color-active" => $hminivertical_menu_mobile_first_level_color_active,
		"hminivertical-menu-mobile-sub-level-color-active" => $hminivertical_menu_mobile_sub_level_color_active,
		
    );
	
    $less->setVariables($variables);
    $cacheFile = $inputFile.".cache";
    if (file_exists($cacheFile)) {
            $cache = unserialize($wp_filesystem->get_contents($cacheFile));
    } else {
            $cache = $inputFile;
    }
    $newCache = $less->cachedCompile($inputFile);
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            $wp_filesystem->put_contents($cacheFile, serialize($newCache));
            $wp_filesystem->put_contents($outputFile, $newCache['compiled']);
    }
}
function asata_addLessStyle() {
	global $asata_options;
	
	$less_design = isset($asata_options['less_design']) ? $asata_options['less_design'] : true; 
	
	if($less_design){
		try {
			$inputFile = get_template_directory().'/assets/css/less/style.less';
			$outputFile = get_template_directory().'/assets/css/mainStyle.css';
			asata_autoCompileLess($inputFile, $outputFile);
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage(), "\n";
		}
	}
	
}
add_action('wp_enqueue_scripts', 'asata_addLessStyle');
/* End less*/