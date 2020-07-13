<?php
/* Register Sidebar */
if (!function_exists('asata_register_sidebar')) {
	function asata_register_sidebar(){
		register_sidebar(array(
			'name' => esc_html__('Main Sidebar', 'asata'),
			'id' => 'main-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
	}
	add_action( 'widgets_init', 'asata_register_sidebar' );
}

/* Register Default Fonts */
if (!function_exists('asata_fonts_url')) {
	function asata_fonts_url() {
		global $asata_options;
		$base_font = (isset($asata_options['body_font']['font-family'])&&$asata_options['body_font']['font-family'])?$asata_options['body_font']['font-family']: 'Muli';
		$head_font = (isset($asata_options['h1_font']['font-family'])&&$asata_options['h1_font']['font-family'])?$asata_options['h1_font']['font-family']: 'Montserrat';
		
		$font_url = '';
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'asata' ) ) {
			$font_url = add_query_arg( 'family', urlencode( $base_font.':400,400i,600,700|'.$head_font.':400,400i,500,600,700' ), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	}
}
/* Enqueue Script */
if (!function_exists('asata_enqueue_scripts')) {
	function asata_enqueue_scripts() {
		global $asata_options;
		
		/* Fonts */
		wp_enqueue_style('asata-fonts', asata_fonts_url(), false );
		
		/* Bootstrap */
		wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/vendors/bootstrap/css/bootstrap.min.css', array(), false);
		wp_enqueue_script('popper', get_template_directory_uri().'/assets/vendors/bootstrap/js/popper.min.js', array('jquery'), '', true);
		wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/vendors/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);

		/* Fontawesome */
		$font_awesome = isset($asata_options['font_awesome']) ? $asata_options['font_awesome'] : true;
		if($font_awesome){
			wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/iconfonts/font-awesome/css/font-awesome.min.css', array(), false);
		}
		
		/* Elegant */
		$font_elegant = isset($asata_options['font_elegant']) ? $asata_options['font_elegant'] : true;
		if($font_elegant){
			wp_enqueue_style('font-elegant', get_template_directory_uri().'/assets/iconfonts/elegant/elegant-style.css', array(), false);
		}

		/* Peicon7stroke */
		if(isset($asata_options['font_pe_icon_7_stroke'])&&$asata_options['font_pe_icon_7_stroke']){
			wp_enqueue_style('pe-icon-helper', get_template_directory_uri().'/assets/iconfonts/pe-icon-7-stroke/css/helper.css', array(), false);
			wp_enqueue_style('pe-icon-7-stroke', get_template_directory_uri().'/assets/iconfonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css', array(), false);
		}

		/* Flaticon */
		if(isset($asata_options['flaticon'])&&$asata_options['flaticon']){
			wp_enqueue_style('flaticon', get_template_directory_uri().'/assets/iconfonts/flaticon/font/flaticon.css', array(), false);
		}

		/* Particles Effect */
		if(isset($asata_options['particles_effect'])&&$asata_options['particles_effect']){
			wp_enqueue_script( 'particles', get_template_directory_uri().'/assets/vendors/particles/particles.min.js', array('jquery'), '', true);
			wp_enqueue_script( 'asata-app', get_template_directory_uri().'/assets/vendors/particles/app.min.js', array('jquery'), '', true);
			wp_enqueue_style( 'particles', get_template_directory_uri().'/assets/vendors/particles/particles.css', array(), false);
		}

		/* Smoth Scroll */
		if(isset($asata_options['smooth_scroll'])&&$asata_options['smooth_scroll']){
			wp_enqueue_script( 'SmoothScroll', get_template_directory_uri().'/assets/js/SmoothScroll.js', array('jquery'), '', true);
		}

		/* Nice Scroll Bar */
		if(isset($asata_options['nice_scroll_bar'])&&$asata_options['nice_scroll_bar']){
			wp_enqueue_script( 'NiceScrollBar', get_template_directory_uri().'/assets/js/NiceScrollBar.js', array('jquery'), '', true);
		}
		
		/* Table of Content */
		wp_register_script('toc', get_template_directory_uri().'/assets/vendors/table-of-content/src/toc.jquery.js', array('jquery'), '', true);
		wp_register_style('toc', get_template_directory_uri(). '/assets/vendors/table-of-content/dist/toc.css',array(), false);

		/* OWl Carousel */
		wp_register_script('owl-carousel', get_template_directory_uri().'/assets/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), '', true);
		wp_register_style('owl-carousel', get_template_directory_uri(). '/assets/vendors/owl-carousel/assets/owl.carousel.min.css',array(), false);

		/* Slick Slider */
		wp_register_script('slick-slider', get_template_directory_uri().'/assets/vendors/slick/slick.min.js', array('jquery'), '', true);
		wp_register_style('slick-slider', get_template_directory_uri(). '/assets/vendors/slick/slick.css',array(), false);

		/* Slick Slider */
		wp_register_script('zoom-master', get_template_directory_uri().'/assets/vendors/zoom-master/jquery.zoom.min.js', array('jquery'), '', true);

		/* Isotope */
		wp_register_script('isotope', get_template_directory_uri().'/assets/vendors/isotope.pkgd.min.js', array('jquery'), '', true  );
		wp_register_script('packery-mode', get_template_directory_uri().'/assets/vendors/packery-mode.pkgd.min.js', array('jquery'), '', true  );
		wp_register_script('asata-isogrid', get_template_directory_uri().'/assets/vendors/isogrid.js', array('jquery'), '', true  );
		wp_register_style('asata-isogrid', get_template_directory_uri().'/assets/vendors/isogrid.css', array(), false );
		
		/* html5lightbox */
		wp_enqueue_script( 'html5lightbox', get_template_directory_uri().'/assets/vendors/html5lightbox/html5lightbox.js', array('jquery'), '', true);
		
		/* counterup */
		wp_register_script( 'counterup', get_template_directory_uri().'/assets/vendors/jquery.counterup.min.js', array('jquery'), '', true);

		/* waypoints */
		wp_enqueue_script( 'waypoints', get_template_directory_uri().'/assets/vendors/waypoints.min.js', array('jquery'), '', true);

		/* countdown */
		wp_register_script( 'jquery-plugin', get_template_directory_uri().'/assets/vendors/countdown/jquery.plugin.min.js', array('jquery'), '', true);
		wp_register_script( 'jquery-countdown', get_template_directory_uri().'/assets/vendors/countdown/jquery.countdown.min.js', array('jquery'), '', true);


		wp_enqueue_style( 'asata-mainStyle', get_template_directory_uri().'/assets/css/mainStyle.css',  array(), false );
		wp_enqueue_style( 'asata-style', get_template_directory_uri().'/style.css',  array(), false );
		wp_enqueue_script( 'asata-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '', true);

		/* Load custom style */
		if(function_exists('fw_get_db_post_option')){
			$page_options = fw_get_db_post_option(get_the_ID(), 'page_options');
			$post_options = fw_get_db_post_option(get_the_ID(), 'post_options');
			$portfolio_options = fw_get_db_post_option(get_the_ID(), 'portfolio_options');
			
		}
		
		$custom_style = '';
		
		/* Extra font */
		if(isset($asata_options['extra_font_1']['font-family']) && $asata_options['extra_font_1']['font-family'] && isset($asata_options['extra_element_1']) && $asata_options['extra_element_1']){
			if($asata_options['extra_font_1']['font-family']) $custom_style .= $asata_options['extra_element_1'].'{font-family: '.$asata_options['extra_font_1']['font-family'].'; font-weight: '.$asata_options['extra_font_1']['font-weight'].';}';
		}
		if(isset($asata_options['extra_font_2']['font-family']) && $asata_options['extra_font_2']['font-family'] && isset($asata_options['extra_element_2']) && $asata_options['extra_element_2']){
			if($asata_options['extra_font_2']['font-family']) $custom_style .= $asata_options['extra_element_2'].'{font-family: '.$asata_options['extra_font_2']['font-family'].'; font-weight: '.$asata_options['extra_font_2']['font-weight'].';}';
		}
		if(isset($asata_options['extra_font_3']['font-family']) && $asata_options['extra_font_3']['font-family'] && isset($asata_options['extra_element_3']) && $asata_options['extra_element_3']){
			if($asata_options['extra_font_3']['font-family']) $custom_style .= $asata_options['extra_element_2'].'{font-family: '.$asata_options['extra_font_3']['font-family'].'; font-weight: '.$asata_options['extra_font_3']['font-weight'].';}';
		}
		
		/* Site Container */
		if(isset($page_options['page_container']) && $page_options['page_container']){
			$custom_style .= '.bt-container{max-width: '.$page_options['page_container'].'px;}';
		}else{
			if(isset($asata_options['site_container'])){
				$custom_style .= '.bt-container{max-width: '.$asata_options['site_container'].'px;}';
			}
		}
		
		/* Title Bar */
		if(isset($page_options['page_titlebar_space'])&&$page_options['page_titlebar_space']){
			$custom_style .= '.page .bt-titlebar{padding-bottom: 0;}';
		}

		if(isset($page_options['page_titlebar_background']['url'])&&$page_options['page_titlebar_background']['url']){
			$custom_style .= '.page .bt-titlebar .bt-titlebar-inner{background-image: url('.$page_options['page_titlebar_background']['url'].');}';
		}
		
		if(isset($post_options['titlebar_background']['url'])&&$post_options['titlebar_background']['url']){
			$custom_style .= '.single-post .bt-titlebar .bt-titlebar-inner{background-image: url('.$post_options['titlebar_background']['url'].');}';
		}
		
		if(isset($portfolio_options['titlebar_background']['url'])&&$portfolio_options['titlebar_background']['url']){
			$custom_style .= '.single-fw-portfolio .bt-titlebar .bt-titlebar-inner{background-image: url('.$portfolio_options['titlebar_background']['url'].');}';
		}
		
		/* Footer */
		if(isset($page_options['page_footer_space'])&&$page_options['page_footer_space']){
			$custom_style .= '.page .bt-footer{margin-top: 0;}';
		}
		
		/* Custom style */
		if (isset($asata_options['custom_css_code']) && $asata_options['custom_css_code']) {
			$custom_style .= $asata_options['custom_css_code'];
		}

		if($custom_style){
			wp_add_inline_style( 'asata-style', $custom_style );
		}

		/* Custom script */
		$custom_script = '';
		if (isset($asata_options['custom_js_code']) && $asata_options['custom_js_code']) {
			$custom_script .= $asata_options['custom_js_code'];
		}
		if ($custom_script) {
			wp_add_inline_script( 'asata-main', $custom_script );
		}

		/* Options to script */
		$mobile_width = (isset($asata_options['mobile_width'])&&$asata_options['mobile_width'])?$asata_options['mobile_width']: 991;
		$hvertical_width = (isset($asata_options['hvertical_width'])&&$asata_options['hvertical_width'])?$asata_options['hvertical_width']: 320;
		$hvertical_full_height = (isset($asata_options['hvertical_full_height'])&&$asata_options['hvertical_full_height'])?$asata_options['hvertical_full_height']: '';
		$hvertical_menu_height = (isset($asata_options['hvertical_menu_height'])&&$asata_options['hvertical_menu_height'])?$asata_options['hvertical_menu_height']: 570;
		$nice_scroll_bar = (isset($asata_options['nice_scroll_bar'])&&$asata_options['nice_scroll_bar'])?$asata_options['nice_scroll_bar']: '';
		$nice_scroll_bar_element = (isset($asata_options['nice_scroll_bar_element'])&&$asata_options['nice_scroll_bar_element'])?$asata_options['nice_scroll_bar_element']: '';

		$js_options = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'enable_mobile' => $mobile_width,
			'hvertical_width' => $hvertical_width,
			'hvertical_full_height' => $hvertical_full_height,
			'hvertical_menu_height' => $hvertical_menu_height,
			'nice_scroll_bar' => $nice_scroll_bar,
			'nice_scroll_bar_element' => $nice_scroll_bar_element
		);
		wp_localize_script( 'asata-main', 'option_ob', $js_options );
		wp_enqueue_script( 'asata-main' );

	}
	add_action( 'wp_enqueue_scripts', 'asata_enqueue_scripts' );
}

/* Add Stylesheet And Script Backend */
if (!function_exists('asata_enqueue_admin_scripts')) {
	function asata_enqueue_admin_scripts(){
		wp_enqueue_script( 'asata-scriptAdmin', get_template_directory_uri().'/assets/js/scriptAdmin.js', array('jquery'), '', true);
		wp_enqueue_style( 'asata-styleAdmin', get_template_directory_uri().'/assets/css/styleAdmin.css', array(), false );
	}
	add_action( 'admin_enqueue_scripts', 'asata_enqueue_admin_scripts');
}

/* Add Support Upload Image Type SVG */
function asata_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'asata_mime_types');

/* Visual Composer Post Grid Compatibility Issue With 3rd party Plugin */
add_filter('vc_grid_get_grid_data_access','__return_true');

/* Template functions */
require_once get_template_directory().'/framework/template-functions.php';

/* Less compile functions */
require_once get_template_directory().'/framework/inc/less-compile.php';

/* Post Functions */
require_once get_template_directory().'/framework/templates/post-functions.php';

/* Function framework */
require_once get_template_directory().'/framework/includes.php';

/* Widgets */
require_once get_template_directory().'/framework/widgets/abstract-widget.php';
require_once get_template_directory().'/framework/widgets/widgets.php';

/* Woocommerce functions */
if (class_exists('Woocommerce')) {
    require_once get_template_directory() . '/woocommerce/wc-template-hooks.php';
}
