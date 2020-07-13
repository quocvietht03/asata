<?php
class asata_Mini_Account_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'mini_account_widget', // Base ID
                esc_html__('Mini Account', 'asata'), // Name
                array('description' => esc_html__('Mini Account Widget', 'asata'),) // Args
        );
    }
    function widget($args, $instance) {
        extract($args);
		$login_text = !empty($instance['login_text']) ? esc_attr($instance['login_text']) : '';
		$logout_text = !empty($instance['logout_text']) ? esc_attr($instance['logout_text']) : '';
		$cl_class = !empty($instance['cl_class']) ? $instance['cl_class'] : "";
        
		// no 'class' attribute - add one with the value of width
        if (strpos($before_widget, 'class') === false) {
            $before_widget = str_replace('>', 'class="' . esc_attr($cl_class) . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="' . esc_attr($cl_class) . ' ', $before_widget);
        }
		
        ob_start();
        echo apply_filters('bt_before_widget_filter', $before_widget);
			if(is_user_logged_in()){
				echo '<a class="bt-account-btn" href="'.wp_logout_url().'" title="'.esc_attr($logout_text).'"><i class="icon_lock-open_alt"></i> '.$logout_text.'</a>';
			}else{
				echo '<a class="bt-account-btn" href="'.wp_login_url().'" title="'.esc_attr($login_text).'"><i class="icon_lock_alt"></i> '.$login_text.'</a>';
			}
        echo apply_filters('bt_after_widget_filter', $after_widget);
        echo ob_get_clean();
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
		$instance['login_text'] = $new_instance['login_text'];
		$instance['logout_text'] = $new_instance['logout_text'];
        $instance['cl_class'] = $new_instance['cl_class'];
        return $instance;
    }

    function form($instance) {
		$login_text = isset($instance['login_text']) ? esc_attr($instance['login_text']) : '';
		$logout_text = isset($instance['logout_text']) ? esc_attr($instance['logout_text']) : '';
        $cl_class = isset($instance['cl_class']) ? esc_attr($instance['cl_class']) : '';
		?>
		<p>
			<label for="<?php echo esc_url($this->get_field_id('login_text')); ?>"><?php esc_html_e('Login Text:', 'asata');
		 ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('login_text')); ?>" name="<?php echo esc_attr($this->get_field_name('login_text')); ?>" type="text" value="<?php echo esc_attr($login_text); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_url($this->get_field_id('logout_text')); ?>"><?php esc_html_e('Logout Text:', 'asata');
		 ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('logout_text')); ?>" name="<?php echo esc_attr($this->get_field_name('logout_text')); ?>" type="text" value="<?php echo esc_attr($logout_text); ?>" />
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cl_class')); ?>"><?php esc_html_e('Extra Class:', 'asata'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('cl_class')); ?>" name="<?php echo esc_attr($this->get_field_name('cl_class')); ?>" value="<?php echo esc_attr($cl_class); ?>" />
        </p>
        <?php
    }
}
