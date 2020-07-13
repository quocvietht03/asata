<?php
/*
Template Name: 404 Template
*/
?>
<?php get_header(); asata_titlebar(); ?>
	<div class="bt-main-content">
		<h2><?php esc_html_e('404 Error', 'asata'); ?></h2>
		<h3><?php esc_html_e('Sorry! The Page Not Found ;(', 'asata'); ?></h3>
		<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'asata'); ?></p>
		<?php get_search_form(); ?>
	</div>
<?php get_footer(); ?>