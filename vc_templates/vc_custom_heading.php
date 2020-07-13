<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $source
 * @var $text
 * @var $link
 * @var $google_fonts
 * @var $font_container
 * @var $el_class
 * @var $el_id
 * @var $css
 * @var $css_animation
 *
 * @var $second_text
 * @var $second_text_font_size
 * @var $second_text_font_weight
 * @var $second_text_line_height
 * @var $second_text_letter_spacing
 * @var $second_text_color
 *
 * @var $content_with
 * @var $content_alignment
 * @var $custom_style
 *
 * @var $font_container_data - returned from $this->getAttributes
 * @var $google_fonts_data - returned from $this->getAttributes
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Custom_heading
 */
$source = $text = $link = $google_fonts = $font_container = $el_id = $el_class = $css = $css_animation = $font_container_data = $google_fonts_data = '';
// This is needed to extract $font_container_data and $google_fonts_data
extract( $this->getAttributes( $atts ) );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

/**
 * @var $css_class
 */
extract( $this->getStyles( $el_class . $this->getCSSAnimation( $css_animation ), $css, $google_fonts_data, $font_container_data, $atts ) );

$settings = get_option( 'wpb_js_google_fonts_subsets' );
if ( is_array( $settings ) && ! empty( $settings ) ) {
	$subsets = '&subset=' . implode( ',', $settings );
} else {
	$subsets = '';
}

if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && isset( $google_fonts_data['values']['font_family'] ) ) {
	wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
}

/* Second Text */
$second_text_attributes = $style_second_text = array();
if($second_text_font_size) $style_second_text[] = 'font-size: '.$second_text_font_size.';';
if($second_text_font_weight) $style_second_text[] = 'font-weight: '.$second_text_font_weight.';';
if($second_text_line_height) $style_second_text[] = 'line-height: '.$second_text_line_height.';';
if($second_text_letter_spacing) $style_second_text[] = 'letter-spacing: '.$second_text_letter_spacing.';';
if($second_text_color) $style_second_text[] = 'color: '.$second_text_color.';';

if ( ! empty( $style_second_text ) ) {
	$second_text_attributes[] = 'style="' . esc_attr( implode(' ', $style_second_text) ) . '"';
}

//Content Width
if ($content_with != '' ) {
	$styles[] = 'max-width: '.$content_with;
}

//Content Alignment
$css_class .= ' vc_alignment-'.$content_alignment;

//Custom Style
if ($custom_style != '' ) {
	$styles[] = $custom_style;
}

if ( ! empty( $styles ) ) {
	$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
} else {
	$style = '';
}


if ( 'post_title' === $source ) {
	$text = get_the_title( get_the_ID() );
}

if ( ! empty( $link ) ) {
	$link = vc_build_link( $link );
	$text = '<a href="' . esc_url( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . '>' . $text . '</a>';
}
$wrap_attr = array();
if ( ! empty( $el_id ) ) {
	$wrap_attr[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output = '';
if ( apply_filters( 'vc_custom_heading_template_use_wrapper', false ) ) {
	$output .= '<div class="' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrap_attr ) . '>';
	$output .= '<' . $font_container_data['values']['tag'] . ' ' . $style . ' >';
	$output .= '<span>'.$text.'</span>';
	if($second_text) $output .= '<span class="bt-second-text" '.implode(' ', $second_text_attributes).'>'.$second_text.'</span>';
	$output .= '</' . $font_container_data['values']['tag'] . '>';
	$output .= '</div>';
} else {
	$output .= '<' . $font_container_data['values']['tag'] . ' ' . $style . ' class="' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrap_attr ) . '>';
	$output .= '<span>'.$text.'</span>';
	if($second_text) $output .= '<span class="bt-second-text" '.implode(' ', $second_text_attributes).'>'.$second_text.'</span>';
	$output .= '</' . $font_container_data['values']['tag'] . '>';
}

echo "$output";
