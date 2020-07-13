<?php
// Return the number of products you wanna show per page.
add_filter( 'loop_shop_per_page', 'asata_loop_shop_per_page', 20 );
function asata_loop_shop_per_page( $cols ) {
	global $asata_options;
	$cols = (int) isset($asata_options['shop_product_per_page']) ? $asata_options['shop_product_per_page']: 10;
	return $cols;
}

// WooCommerce Change Number of Related Product
add_filter( 'woocommerce_output_related_products_args', 'woocommerce_change_number_related_products', 9999 );
function woocommerce_change_number_related_products( $args ) {
 $args['posts_per_page'] = 3;
 return $args;
}

// WooCommerce Change sale flash
add_filter( 'woocommerce_sale_flash', 'woocommerce_percentage_sale', 10, 3 );
function woocommerce_percentage_sale( $html, $post, $product ) {
 
    if( $product->is_type('variable')){
        $percentages = array();

        // Get all variation prices
        $prices = $product->get_variation_prices();

        // Loop through variation prices
        foreach( $prices['price'] as $key => $price ){
            // Only on sale variations
            if( $prices['regular_price'][$key] !== $price ){
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%';
    } elseif( $product->is_type('grouped') ){
		$percentages = array();
		
        foreach ($product->get_children() as $child_id ) {
            $child = wc_get_product( $child_id );
			if(!empty($child->get_sale_price())){
				$regular_price = $child->get_regular_price();
				$sale_price = $child->get_sale_price();
				$percentages[] = round(100 - ($sale_price / $regular_price * 100));
			}
        }
		
        $percentage = max($percentages) . '%';
		
	} else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price = (float) $product->get_sale_price();

        $percentage = round(100 - ($sale_price / $regular_price * 100)) . '%';
    }
    return '<span class="onsale">' . $percentage . '</span>';
 
}

/**
 * Products Loop.
 *
 * @see woocommerce_result_count()
 * @see woocommerce_catalog_ordering()
 */
add_action( 'woocommerce_result_count', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_catalog_ordering', 'woocommerce_catalog_ordering', 30 );

/**
 * Sale flashes.
 *
 * @see woocommerce_show_product_loop_sale_flash()
 * @see woocommerce_show_product_sale_flash()
 */
add_action( 'woocommerce_show_product_loop_sale_flash', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_show_product_sale_flash', 'woocommerce_show_product_sale_flash', 10 );

/**
 * Product Loop Items.
 *
 * @see woocommerce_template_loop_product_link_open()
 * @see woocommerce_template_loop_product_link_close()
 * @see woocommerce_template_loop_add_to_cart()
 * @see woocommerce_template_loop_product_thumbnail()
 * @see woocommerce_template_loop_product_title()
 * @see woocommerce_template_loop_category_link_open()
 * @see woocommerce_template_loop_category_title()
 * @see woocommerce_template_loop_category_link_close()
 * @see woocommerce_template_loop_price()
 * @see woocommerce_template_loop_rating()
 */
add_action( 'woocommerce_template_loop_product_link_open', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_template_loop_product_link_close', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_template_loop_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_template_loop_product_thumbnail', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_template_loop_product_title', 'woocommerce_template_loop_product_title', 10 );

add_action( 'woocommerce_template_loop_category_link_open', 'woocommerce_template_loop_category_link_open', 10 );
add_action( 'woocommerce_template_loop_category_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_template_loop_category_link_close', 'woocommerce_template_loop_category_link_close', 10 );

add_action( 'woocommerce_template_loop_price', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_template_loop_rating', 'woocommerce_template_loop_rating', 5 );

/**
 * Product Summary Box.
 *
 * @see woocommerce_template_single_title()
 * @see woocommerce_template_single_rating()
 * @see woocommerce_template_single_price()
 * @see woocommerce_template_single_excerpt()
 * @see woocommerce_template_single_meta()
 * @see woocommerce_template_single_sharing()
 */
add_action( 'woocommerce_template_single_title', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_template_single_rating', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_template_single_price', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_template_single_excerpt', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_template_single_meta', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_template_single_sharing', 'woocommerce_template_single_sharing', 50 );
