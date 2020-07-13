<?php
class asata_Widget_Mini_Search extends asata_Widget {
	
	function __construct() {
		parent::__construct(
			'bt_widget_mini_search', // Base ID
			esc_html__('Mini Search', 'asata'), // Name
			array('description' => esc_html__('Display the mini search in the menu right sidebar.', 'asata'),) // Args
        );
		
		$this->settings = array(
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
			)
		);
	}
	
	function widget( $args, $instance ) {
		extract($args);
		$type = sanitize_title( $instance['type'] );
		$el_class = sanitize_title( $instance['el_class'] );
		
		$wg_class = 'widget bt-mini-search '.$type;
		
		if(!empty($instance['el_class'])){
			$wg_class .= ' '.$instance['el_class'];
		}
		
		ob_start();
		?>
			<div class="<?php echo esc_attr($wg_class); ?>">
				<a class="bt-toggle-btn" href="#"><i class="icon_search"></i></a>
				<?php if($type == 'mini') echo '<div class="bt-search-form">'.get_search_form(false).'</div>'; ?>
			</div>
			
		<?php
		echo ob_get_clean();
	}
}
