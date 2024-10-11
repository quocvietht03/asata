<?php
class asata_Widget_Mini_Cart extends WC_Widget {
	
	function __construct() {
		$this->widget_cssclass    = 'woocommerce asata_widget_mini_cart';
		$this->widget_description = esc_html__( "Display the user's Cart in the sidebar.", 'asata' );
		$this->widget_id          = 'asata_widget_mini_cart';
		$this->widget_name        = esc_html__( 'Mini Cart', 'asata' );
		$this->settings           = array(
			'type' => array(
				'type'  => 'select',
				'std'   => 'mini',
				'label' => esc_html__( 'Type', 'asata' ),
				'options' => array(
					'mini'  => esc_html__( 'Mini', 'asata' ),
					'popup'  => esc_html__( 'Popup', 'asata' )
				)
			),
			'el_class'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => esc_html__( 'Extra Class', 'asata' )
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => esc_html__( 'Hide if cart is empty', 'asata' )
			)
		);

		parent::__construct();
	}
	
	function widget( $args, $instance ) {
		$type = sanitize_title( $instance['type'] );
		$el_class = sanitize_title( $instance['el_class'] );
		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
		
		$wg_class = 'widget bt-mini-cart '.$type;
		
		if(!empty($instance['el_class'])){
			$wg_class .= ' '.$instance['el_class'];
		}
		
		if ( $hide_if_empty && WC()->cart->is_empty() ) {
			$wg_class .= ' hide_cart_widget_if_empty';
		}

		ob_start();
			woocommerce_mini_cart();
		$mini_cart_content = ob_get_clean();
		
		ob_start();
		?>
			<div class="<?php echo esc_attr($wg_class); ?>">
				<a class="bt-toggle-btn" href="#"><i class="icon_bag_alt"></i><span class="cart_total" ><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
				<?php if($type == 'mini') echo '<div class="bt-cart-content"><h3 class="bt-title">'.esc_html__('My Shopping Cart', 'asata').'</h3><div class="widget_shopping_cart_content">' . $mini_cart_content . '</div></div>'; ?>
			</div>
		<?php
		echo ob_get_clean();
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_icon_add_to_cart_fragment');
if(!function_exists('woocommerce_icon_add_to_cart_fragment')){
	function woocommerce_icon_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?>
		<span class="cart_total"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span>
		<?php
		$fragments['span.cart_total'] = ob_get_clean();
		return $fragments;
	}
}
