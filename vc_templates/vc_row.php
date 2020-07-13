<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 *
 * @var $row_container
 * @var $columns_no_gap
 *
 * @var $animate_duration
 * @var $animate_delay
 *
 * @var $particles_effect
 * @var $particles_json
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

if ( ! empty( $atts['rtl_reverse'] ) ) {
	$css_classes[] = 'vc_rtl-columns-reverse';
}

$wrap_attr = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrap_attr[] = 'data-vc-full-width="true"';
	$wrap_attr[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrap_attr[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrap_attr[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrap_attr[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrap_attr[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrap_attr[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrap_attr[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
// Custom row
if ( $row_container == 'container' ) {
	$before_container = '<div class="bt-container">';
	$after_container = '</div>';
} elseif ( $row_container == 'container-fluid' ) {
	$before_container = '<div class="container-fluid">';
	$after_container = '</div>';
} else {
	$before_container = '<div class="bt-no-container">';
	$after_container = '</div>';
	if ( ! empty( $row_content_max_width ) ) {
		$css_classes[] = 'vc_row-full-width';
		$wrap_attr[] = 'style="max-width: '.$row_content_max_width.';"';
	}
}

if ( ! empty( $columns_no_gap ) ) {
	$css_classes[] = 'vc_column-no-gap';
}

/*Animation*/
if( $css_animation != 'none' && $css_animation != '' ){
	$duration = ! empty($animate_duration) ? '-webkit-animation-duration: ' . esc_attr( $animate_duration ) . 's; animation-duration: ' . esc_attr( $animate_duration ) . 's;' : '';
	$delay = ! empty($animate_delay) ? '-webkit-animation-delay: ' . esc_attr( $animate_delay ) . 's; animation-delay: ' . esc_attr( $animate_delay ) . 's;' : '';
	if($duration || $delay) $wrap_attr[] = 'style="'.$delay.' '.$duration.'"';
}

/*Particles*/
if ( $particles_effect != 'none' ) {
	if ( $particles_effect != 'custom' ) {
		$css_classes[] = 'vc_particles-effect';
		$config_url = get_template_directory_uri().'/assets/vendors/particles/config/'.$particles_effect.'.json';
		$wrap_attr[] = 'data-partcles-effect="'.esc_url($config_url).'"';
	}else{
		$css_classes[] = 'vc_particles-effect';
		$particles_json = str_replace("<br />", " ", $particles_json );
		$wrap_attr[] = 'data-partcles-json="'.esc_attr($particles_json).'"';
	}
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrap_attr[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= $before_container;
$output .= '<div ' . implode( ' ', $wrap_attr ) . '>';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= $after_container;
$output .= $after_output;

echo "$output";
