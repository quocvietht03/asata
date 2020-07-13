<?php
require_once get_template_directory().'/framework/widgets/socials.php';
require_once get_template_directory().'/framework/widgets/post_list.php';
require_once get_template_directory().'/framework/widgets/portfolio_list.php';
require_once get_template_directory().'/framework/widgets/news_tabs.php';
require_once get_template_directory().'/framework/widgets/icon_info.php';
require_once get_template_directory().'/framework/widgets/mini_account.php';
require_once get_template_directory().'/framework/widgets/mini_search.php';
if (class_exists('Woocommerce')) {
	require_once get_template_directory().'/framework/widgets/mini_cart.php';
}


function asata_register_widgets() {
	global $wp_widget_factory;
	
	$wp_widget_factory->register( 'asata_Social_Widget' );
	$wp_widget_factory->register( 'asata_Post_List_Widget' );
	$wp_widget_factory->register( 'asata_Portfolio_List_Widget' );
	$wp_widget_factory->register( 'asata_New_Tabs_Widget' );
	$wp_widget_factory->register( 'asata_Widget_Mini_Search' );
	$wp_widget_factory->register( 'asata_Mini_Account_Widget' );
	$wp_widget_factory->register( 'asata_Icon_Info_Widget' );
	if (class_exists('Woocommerce')) {
		$wp_widget_factory->register( 'asata_Widget_Mini_Cart' );
	}
}
add_action('widgets_init', 'asata_register_widgets');
