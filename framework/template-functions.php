<?php
if ( ! isset( $content_width ) ) $content_width = 900;
if ( is_singular() ) wp_enqueue_script( "comment-reply" );

if ( ! function_exists( 'asata_setup' ) ) {
	function asata_setup() {
		/* Load textdomain */
		load_theme_textdomain( 'asata', get_template_directory() . '/languages' );

		/* Add custom header */
		add_theme_support('custom-header');

		/* Add RSS feed links to <head> for posts and comments. */
		add_theme_support( 'automatic-feed-links' );

		/* Enable support for Post Thumbnails, and declare sizes. */
		add_theme_support( 'post-thumbnails' );

		/* Enable support for Title Tag */
		 add_theme_support( "title-tag" );

		/* This theme uses wp_nav_menu() in locations. */
		register_nav_menus( array(
			'main_navigation'   => esc_html__( 'Main Navigation','asata' ),
			'mobile_navigation'   => esc_html__( 'Mobile Navigation','asata' ),
		) );

		/* This theme styles the visual editor to resemble the theme style, specifically font, colors, icons, and column width. */
		add_editor_style('editor-style.css');

		/* Switch default core markup for search form, comment form, and comments to output valid HTML5. */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/* Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats */
		add_theme_support( 'post-formats', array(
			'video', 'audio', 'quote', 'link', 'gallery',
		) );

		/* This theme allows users to set a custom background. */
		add_theme_support( 'custom-background', apply_filters( 'asata_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );

		/* Add support for featured content. */
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'asata_get_featured_posts',
			'max_posts' => 6,
		) );

		/* This theme uses its own gallery styles. */
		add_filter( 'use_default_gallery_style', '__return_false' );

		/* Add support for portfolio. */
		add_post_type_support( 'fw-portfolio', array('excerpt') );

		/* Add support woocommerce */
		add_theme_support( 'woocommerce' );
	}
}
add_action( 'after_setup_theme', 'asata_setup' );

/* Custom Site Title */
if ( ! function_exists( 'asata_wp_title' ) ) {
	function asata_wp_title( $title, $sep ) {
		global $paged, $page;
		if ( is_feed() ) {
			return $title;
		}
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = sprintf( esc_html__( 'Page %s', 'asata' ), max( $paged, $page ) ) . " $sep $title";
		}
		return $title;
	}
	add_filter( 'wp_title', 'asata_wp_title', 10, 2 );
}

/* Filter body class */
if (!function_exists('asata_body_classes')) {
	function asata_body_classes($classes) {
		global $asata_options;
		$page_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'page_options'):array();

		$classes[] = (isset($asata_options["site_layout"])&&$asata_options["site_layout"])?$asata_options["site_layout"]:'wide';

		$header_layout = (isset($asata_options["header_layout"])&&$asata_options["header_layout"])?$asata_options["header_layout"]:'1';
		$page_header_layout = (isset($page_options['header_layout'])&&$page_options['header_layout'])?$page_options['header_layout']:'default';
		$classes[] = $page_header_layout=='default'?'header-'.$header_layout:'header-'.$page_header_layout;

		return $classes;
	}
	add_filter('body_class', 'asata_body_classes');
}

/* Header */
function asata_header() {
    global $asata_options;
	$page_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'page_options'):array();

    $header_layout =isset($asata_options["header_layout"]) ? $asata_options["header_layout"] : '-1';
	$page_header_layout = (isset($page_options['header_layout'])&&$page_options['header_layout'])?$page_options['header_layout']:'default';
	if(is_search() || is_404()){
		$page_header_layout = 'default';
	}
	$header_layout = $page_header_layout=='default'?$header_layout:$page_header_layout;

	switch ($header_layout) {
		case '1':
            get_template_part('framework/headers/header', 'v1');
            break;
        case '2':
            get_template_part('framework/headers/header', 'v2');
            break;
		case '3':
            get_template_part('framework/headers/header', 'v3');
            break;
		case 'popup':
            get_template_part('framework/headers/header', 'popup');
            break;
		case 'onepage':
            get_template_part('framework/headers/header', 'onepage');
            break;
		case 'onepagescroll':
            get_template_part('framework/headers/header', 'onepagescroll');
            break;
		case 'vertical':
            get_template_part('framework/headers/header', 'vertical');
            break;
		case 'minivertical':
            get_template_part('framework/headers/header', 'minivertical');
            break;
		default :
			get_template_part('framework/headers/header', 'default');
			break;
    }
}

/* Title Bar */
if ( ! function_exists( 'asata_titlebar' ) ) {
	function asata_titlebar() {
		global $asata_options;
		$page_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'page_options'):array();

		$titlebar_layout =isset($asata_options["titlebar_layout"]) ? $asata_options["titlebar_layout"] : '1';
		$page_titlebar_layout = isset($page_options['titlebar_layout'])?$page_options['titlebar_layout']:'default';
		$titlebar_layout = ($page_titlebar_layout=='default')?$titlebar_layout:$page_titlebar_layout;
		switch ($titlebar_layout) {
			case '1':
				get_template_part('framework/titlebars/titlebar', 'v1');
				break;
			case '2':
				get_template_part('framework/titlebars/titlebar', 'v2');
				break;
			case '3':
				get_template_part('framework/titlebars/titlebar', 'v3');
				break;
			default :
				get_template_part('framework/titlebars/titlebar', 'v1');
				break;
		}
	}
}

/* Footer */
function asata_footer() {
    global $asata_options;
	$page_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'page_options'):array();

    $footer_layout =isset($asata_options["footer_layout"]) ? $asata_options["footer_layout"] : '-1';
	$page_footer_layout = isset($page_options['footer_layout'])?$page_options['footer_layout']:'default';
	$footer_layout = $page_footer_layout=='default'?$footer_layout:$page_footer_layout;
    switch ($footer_layout) {
        case '1':
            get_template_part('framework/footers/footer', 'v1');
            break;
		case '2':
            get_template_part('framework/footers/footer', 'v2');
            break;
		default :
			get_template_part('framework/footers/footer', 'default');
			break;
    }
}

/* Logo */
if (!function_exists('asata_logo')) {
	function asata_logo($url = '', $height = 30) {
		if(!$url){
			$url = get_template_directory_uri().'/assets/images/logo.png';
		}
		echo '<a href="'.home_url('/').'"><img class="logo" style="height: '.esc_attr($height).'px; width: auto;" src="'.esc_url($url).'" alt="'.esc_attr__('Logo', 'asata').'"/></a>';
	}
}

/* Nav Menu */
if (!function_exists('asata_nav_menu')) {
	function asata_nav_menu($menu_slug = '', $theme_location = '', $container_class = '') {
		if (has_nav_menu($theme_location) || $menu_slug) {
			wp_nav_menu(array(
				'menu'				=> $menu_slug,
				'container_class' 	=> $container_class,
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'theme_location'  	=> $theme_location
			));
		}else{
			wp_page_menu(array(
				'menu_class'  => $container_class
			));
		}
	}
}

/* Page title */
if (!function_exists('asata_page_title')) {
    function asata_page_title() {
		ob_start();
		if(is_front_page()){
			esc_html_e('Home', 'asata');
		}elseif(is_home()){
			esc_html_e('Blog', 'asata');
		}elseif(is_search()){
			esc_html_e('Search', 'asata');
		}elseif(is_404()){
			esc_html_e('404', 'asata');
		}elseif(is_page()){
			echo get_the_title();
		}elseif (is_archive()) {
			if (is_category()){
				single_cat_title();
			}elseif(get_post_type() == 'fw-portfolio'||get_post_type() == 'bt_team'){
				single_term_title();
			}elseif (get_post_type() == 'product'){
				if(wc_get_page_id( 'shop' )){
					echo get_the_title( wc_get_page_id( 'shop' ) );
				}else{
					single_term_title();
				}
			}elseif (is_tag()){
				single_tag_title();
			}elseif (is_author()){
				printf(__('Author: %s', 'asata'), '<span class="vcard">' . get_the_author() . '</span>');
			}elseif (is_day()){
				printf(__('Day: %s', 'asata'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
			}elseif (is_month()){
				printf(__('Month: %s', 'asata'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
			}elseif (is_year()){
				printf(__('Year: %s', 'asata'), '<span>' . get_the_date(get_option('date_format')) . '</span>');
			}elseif (is_tax('post_format', 'post-format-aside')){
				esc_html_e('Aside', 'asata');
			}elseif (is_tax('post_format', 'post-format-gallery')){
				esc_html_e('Gallery', 'asata');
			}elseif (is_tax('post_format', 'post-format-image')){
				esc_html_e('Image', 'asata');
			}elseif (is_tax('post_format', 'post-format-video')){
				esc_html_e('Video', 'asata');
			}elseif (is_tax('post_format', 'post-format-quote')){
				esc_html_e('Quote', 'asata');
			}elseif (is_tax('post_format', 'post-format-link')){
				esc_html_e('Link', 'asata');
			}elseif (is_tax('post_format', 'post-format-status')){
				esc_html_e('Status', 'asata');
			}elseif (is_tax('post_format', 'post-format-audio')){
				esc_html_e('Audio', 'asata');
			}elseif (is_tax('post_format', 'post-format-chat')){
				esc_html_e('Chat', 'asata');
			}else{
				esc_html_e('Archive', 'asata');
			}
		}else {
			esc_html_e('Detail', 'asata');
		}
		
		return ob_get_clean();
    }
}

/* Page breadcrumb */
if (!function_exists('asata_page_breadcrumb')) {
    function asata_page_breadcrumb($home_text = 'Home', $delimiter = '-') {
		global $post;
		
		if(is_front_page()){
			echo '<a class="bt-home" href="' . esc_url(home_url('/')) . '">' . $home_text . '</a> <span class="bt-deli first">' . $delimiter . '</span> ' . esc_html('Front Page', 'asata');
		}elseif(is_home()){
			echo  '<a class="bt-home" href="' . esc_url(home_url('/')) . '">' . $home_text . '</a> <span class="bt-deli first">' . $delimiter . '</span> ' . esc_html('Blog', 'asata');
		}else{
			echo '<a class="bt-home" href="' . esc_url(home_url('/')) . '">' . $home_text . '</a> <span class="bt-deli first">' . $delimiter . '</span> ';
		}

		if(is_category()){
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' <span class="bt-deli">' . $delimiter . '</span> ');
			echo '<span class="current">' . single_cat_title(esc_html__('Archive by category: ', 'asata'), false) . '</span>';
		}elseif ( is_tag() ) {
			echo '<span class="current">' . single_tag_title(esc_html__('Posts tagged: ', 'asata'), false) . '</span>';
		}elseif(is_tax()){
			echo '<span class="current">' . single_term_title(esc_html__('Archive by taxonomy: ', 'asata'), false) . '</span>';
		}elseif(is_search()){
			echo '<span class="current">' . esc_html__('Search results for: ', 'asata') . get_search_query() . '</span>';
		}elseif(is_day()){
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> <span class="bt-deli">' . $delimiter . '</span> ';
			echo '<span class="current">' . get_the_time('d') . '</span>';
		}elseif(is_month()){
			echo '<span class="current">' . get_the_time('F'). ' '. get_the_time('Y') . '</span>';
		}elseif(is_single() && !is_attachment()){
			if(get_post_type() != 'post'){
				if(get_post_type() == 'fw-portfolio'){
					$terms = get_the_terms(get_the_ID(), 'fw-portfolio-category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'fw-portfolio-category', '' , ', ' );
						echo ' <span class="bt-deli">' . $delimiter . '</span> ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'bt_team'){
					$terms = get_the_terms(get_the_ID(), 'bt_team_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'bt_team_category', '' , ', ' );
						echo ' <span class="bt-deli">' . $delimiter . '</span> ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'bt_testimonial'){
					$terms = get_the_terms(get_the_ID(), 'bt_testimonial_category', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'bt_testimonial_category', '' , ', ' );
						echo ' <span class="bt-deli">' . $delimiter . '</span> ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}elseif(get_post_type() == 'product'){
					$terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
					if(!empty($terms) && !is_wp_error($terms)) {
						the_terms(get_the_ID(), 'product_cat', '' , ', ' );
						echo ' <span class="bt-deli">' . $delimiter . '</span> ' . '<span class="current">' . get_the_title() . '</span>';
					}else{
						echo '<span class="current">' . get_the_title() . '</span>';
					}
				}else{
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . esc_url(home_url('/')) . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					echo ' <span class="bt-deli">' . $delimiter . '</span> ' . '<span class="current">' . get_the_title() . '</span>';
				}
			}else{
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, ' <span class="bt-deli">' . $delimiter . '</span> ');
				echo ''.$cats;
				echo '<span class="current">' . get_the_title() . '</span>';
			}
		}elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if($post_type) echo '<span class="current">' . $post_type->labels->singular_name . '</span>';
		}elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			echo ' <span class="bt-deli">' . $delimiter . '</span> ' . '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_page() && !is_front_page() && !$post->post_parent ) {
			echo '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_page() && !is_front_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo ''.$breadcrumbs[$i];
				if ($i != count($breadcrumbs) - 1)
					echo ' <span class="bt-deli">' . $delimiter . '</span> ';
			}
			echo ' <span class="bt-deli">' . $delimiter . '</span> ' . '<span class="current">' . get_the_title() . '</span>';
		}elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo '<span class="current">' . esc_html__('Articles posted by ', 'asata') . $userdata->display_name . '</span>';
		}elseif ( is_404() ) {
			echo '<span class="current">' . esc_html__('Error 404', 'asata') . '</span>';
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo ' <span class="bt-deli">' . $delimiter . '</span> ' . esc_html__('Page', 'asata') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
    }
}

/* Display navigation to next/previous post */
if ( ! function_exists( 'asata_post_nav' ) ) {
	function asata_post_nav() {
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="bt-blog-article-nav clearfix">
			<?php
				previous_post_link('<div class="bt-prev">'.esc_html__('Previous Post', 'asata').'<h3>%link</h3></div>');
				next_post_link('<div class="bt-next">'.esc_html__('Next Post', 'asata').'<h3>%link</h3></div>');
			?>
		</nav>
		<?php
	}
}

/* Display paginate links */
if ( ! function_exists( 'asata_paginate_links' ) ) {
	function asata_paginate_links($wp_query) {
		global $asata_options;
		$pagination_style = (isset($asata_options['pagination_style'])&&$asata_options['pagination_style'])?'bt-style'.$asata_options['pagination_style']:'bt-style0';
		$prev_text = (isset($asata_options['pagination_prev_text'])&&$asata_options['pagination_prev_text'])?'<span>'.$asata_options['pagination_prev_text'].'</span>':'';
		$next_text = (isset($asata_options['pagination_next_text'])&&$asata_options['pagination_next_text'])?'<span>'.$asata_options['pagination_next_text'].'</span>':'';
		
		?>
		<nav class="bt-pagination <?php echo esc_attr($pagination_style); ?>" role="navigation">
			<?php
				$big = 999999999; // need an unlikely integer
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'prev_text' => '<i class="arrow_carrot-left"></i>'.$prev_text,
					'next_text' => $next_text.'<i class="arrow_carrot-right"></i>',
				) );
			?>
		</nav>
		<?php
	}
}

/* Display navigation to next/previous set of posts */
if ( ! function_exists( 'asata_paging_nav' ) ) {
	function asata_paging_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		?>
		<nav class="bt-pagination" role="navigation">
			<?php 
				echo paginate_links( array(
					'base'     => $pagenum_link,
					'format'   => $format,
					'total'    => $GLOBALS['wp_query']->max_num_pages,
					'current'  => $paged,
					'mid_size' => 1,
					'add_args' => array_map( 'urlencode', $query_args ),
					'prev_text' => '<i class="arrow_carrot-left"></i>',
					'next_text' => '<i class="arrow_carrot-right"></i>',
				) ); 
			?>
		</nav>
		<?php
	}
}

/**
 * Get Image Type
 * @param text $imageType: thumbnail | attachment
 * @param text $id: post_id | attachment id
 * @param text $type: auto | ratio
 * @param number $ratio: 66
 * @param text $size: thumbnail | medium | medium_large | large | full | width x height
 * @return mixed|void
 */
if(!function_exists('asata_get_image_type')) {
	function asata_get_image_type($imageType = 'thumbnail', $id, $type = 'auto', $ratio = 66 , $size = 'full') {
		$img = '';
		$sizes = array( 'thumbnail', 'medium', 'medium_large', 'large', 'full' );
		if($imageType == 'thumbnail'){
			$attach_id = get_post_thumbnail_id( $id );
		}else{
			$attach_id = $id;
		}
		
		if(function_exists('wpb_getImageBySize')){
			$data = wpb_getImageBySize( array(
				'attach_id' => $attach_id,
				'thumb_size' => $size
			) );
			if(!empty($data)){
				$reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
				preg_match($reg_exUrl, $data['thumbnail'], $url);
				
				if($type == 'ratio'){
					$img = '<div class="bt-image-ratio" style="padding-bottom: '.esc_attr($ratio).'%">
								<div style="background-image: url('.esc_url($url[0]).')"></div>
							</div>';
				}else{
					$img = $data['thumbnail'];
				}
			}
		}else{
			if(!in_array($size, $sizes)) $size = explode('x', $size);
			$data = wp_get_attachment_image_src($attach_id, $size, false);
			if(!empty($data)){
				if($type == 'ratio'){
					$img = '<div class="bt-image-ratio" style="padding-bottom: '.esc_attr($ratio).'%">
								<div style="background-image: url('.esc_url($data[0]).')"></div>
							</div>';
				}else{
					$img = get_the_post_thumbnail($id, $size);
				}
			}
		}
		
		return apply_filters( 'asata_get_image_type', $img, $imageType, $id, $type, $ratio , $size );
	}
}

/**
 * Get Image Url
 * @param text $imageType: thumbnail | attachment
 * @param text $id: post_id | attachment id
 * @param text $size: thumbnail | medium | medium_large | large | full | width x height
 * @return mixed|void
 */
if(!function_exists('asata_get_image_url')) {
	function asata_get_image_url($imageType = 'thumbnail', $id, $size = 'full') {
		
		$img_url = '';
		$sizes = array( 'thumbnail', 'medium', 'medium_large', 'large', 'full' );
		if($imageType == 'thumbnail'){
			$attach_id = get_post_thumbnail_id( $id );
		}else{
			$attach_id = $id;
		}
		
		if(function_exists('wpb_getImageBySize')){
			$data = wpb_getImageBySize( array(
				'attach_id' => $attach_id,
				'thumb_size' => $size
			) );
			if(!empty($data)){
				$reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
				preg_match($reg_exUrl, $data['thumbnail'], $url);
				$img_url = $url[0];
			}
		}else{ echo 'testing...';
			if(!in_array($size, $sizes)) $size = explode('x', $size);
			$data = wp_get_attachment_image_src($attach_id, $size, false);
			if(!empty($data)){
				$img_url = $data[0];
			}
		}
		
		return apply_filters( 'asata_get_image_url', $img_url, $imageType, $id, $size );
	}
}

/* Add content before header */
if(!function_exists('asata_add_content_before_header_func')) {
	function asata_add_content_before_header_func() {
		global $asata_options;

		/* Page loading */
		$site_loading = (isset($asata_options['site_loading'])&&$asata_options['site_loading'])?$asata_options['site_loading']: false;
		$site_loading_text = (isset($asata_options['site_loading_text'])&&$asata_options['site_loading_text'])?$asata_options['site_loading_text']: esc_html__('Loading', 'asata');
		
		if($site_loading){
			echo '<div id="site_loading"><div class="loading-text">';
				$char_arr = str_split($site_loading_text);
				foreach($char_arr as $char){
					echo '<span class="loading-text-words">'.$char.'</span>';
				}
			echo '</div></div>';
		}
	}
	add_action( 'asata_add_content_before_header', 'asata_add_content_before_header_func' );
}

/* Add menu canvas, back to top, ... */
if(!function_exists('asata_add_extra_code_wp_footer')) {
	function asata_add_extra_code_wp_footer() {
		global $asata_options;
		
		/* Search Popup */
		echo '<div id="bt_search_popup">
				<div class="bt-search-form">'.get_search_form(false).'</div>
				<a href="#" class="bt-close"><i class="icon_close"></i></a>
			</div>';
		
		/* Cart Popup */
		$mini_cart_content = '';
		if (class_exists('Woocommerce')) {
			ob_start();
				woocommerce_mini_cart();
			$mini_cart_content = ob_get_clean();
		}
		
		echo '<div id="bt_cart_popup">
			<div class="bt-cart-wrap bt-nice-scroll">
				<div class="bt-cart-content">
					<h3 class="bt-title">'.__('My Shopping Cart', 'asata').'</h3>
					<div class="widget_shopping_cart_content">' . $mini_cart_content . '</div>
				</div>
			</div>
			<a href="#" class="bt-close"><i class="icon_close"></i></a>
		</div>';
		
		/*Menu Canvas*/
		if(isset($asata_options['menu_canvas_element'])&&$asata_options['menu_canvas_element']){
			echo '<div id="bt_menu_canvas"><div class="bt-overlay"></div><div class="bt-menu-canvas">';
				foreach($asata_options['menu_canvas_element'] as $sidebar_id){
					dynamic_sidebar( $sidebar_id );
				}
			echo '</div></div>';
		}

		/* Back to top */
		$back_to_top = (isset($asata_options['back_to_top'])&&$asata_options['back_to_top'])?$asata_options['back_to_top']: false;
		$back_to_top_style = (isset($asata_options['back_to_top_style'])&&$asata_options['back_to_top_style'])?$asata_options['back_to_top_style']: 'style_1';
		if($back_to_top){
			echo '<div id="site_backtop" class="'.esc_attr($back_to_top_style).'"><i class="arrow_up"></i></div>';
		}
	}
	add_action( 'wp_footer', 'asata_add_extra_code_wp_footer' );
}
// Custom get sidebar function
if(!function_exists('asata_get_sidebars')) {
	function asata_get_sidebars() {
		$sidebars = wp_get_sidebars_widgets( true );
		$result = array();
		foreach($sidebars as $sidebar_id => $sidebar){
			if($sidebar_id != 'wp_inactive_widgets' && $sidebar_id != 'main-sidebar'){
				$result[$sidebar_id] = str_replace('-', ' ', $sidebar_id);
			}
		}
		return $result;
	}
}
