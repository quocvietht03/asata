<?php
class asata_Social_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'social_widget', // Base ID
                esc_html__('Socials', 'asata'), // Name
                array('description' => esc_html__('Social Widget', 'asata'),) // Args
        );
    }
    function widget($args, $instance) {
        extract($args);
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        $el_class = !empty($instance['el_class']) ? $instance['el_class'] : "";
        $icon_social_ = array();
        $link_social_ = array();
        $title_social_ = array();
        for ($i = 1; $i <= 6; $i++) {
            $icon_social[$i] = !empty($instance['icon_social_' . $i]) ? esc_attr($instance['icon_social_' . $i]) : '';
            $link_social[$i] = !empty($instance['link_social_' . $i]) ? esc_url($instance['link_social_' . $i]) : '';
            $title_social[$i] = !empty($instance['title_social_' . $i]) ? esc_attr($instance['title_social_' . $i]) : '';
        }
        
		// no 'class' attribute - add one with the value of width
        if (strpos($before_widget, 'class') === false) {
            $before_widget = str_replace('>', 'class="' . esc_attr($el_class) . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="' . esc_attr($el_class) . ' ', $before_widget);
        }
		
        ob_start();
		
        echo apply_filters('bt_before_widget_filter', $before_widget);
		
		echo !empty($title) ? $before_title . $title . $after_title : ''; 
        ?>
        <div class="bt-social-wrap">
            <?php
				for ($i = 1; $i <= 6; $i++) {
					if($icon_social[$i]){
						echo '<a data-btIcon="'.esc_attr($icon_social[$i]).'" href="'.esc_url($link_social[$i]).'" data-toggle="tooltip" title="'.esc_attr($title_social[$i]).'" >
								<i class="'.esc_attr($icon_social[$i]).'"></i>
							</a>';
					} 
				}
			?>
        </div>
        <?php
        echo apply_filters('bt_after_widget_filter', $after_widget);
        echo ob_get_clean();
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        for ($i = 1; $i <= 6; $i++) {
            $instance['icon_social_' . $i] = $new_instance['icon_social_' . $i];
            $instance['link_social_' . $i] = $new_instance['link_social_' . $i];
            $instance['title_social_' . $i] = $new_instance['title_social_' . $i];
        }
        $instance['title'] = $new_instance['title'];
        $instance['el_class'] = $new_instance['el_class'];
        return $instance;
    }

    function form($instance) {
        $icon_social = array();
        $link_social = array();
        $title_social = array();
        for ($i = 1; $i <= 6; $i++) {
           $icon_social[$i] = isset($instance['icon_social_' . $i]) ? esc_attr($instance['icon_social_' . $i]) : '';
            $link_social[$i] = isset($instance['link_social_' . $i]) ? esc_attr($instance['link_social_' . $i]) : '';
            $title_social[$i] = isset($instance['title_social_' . $i]) ? esc_attr($instance['title_social_' . $i]) : '';
        }
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Social';
        $el_class = isset($instance['el_class']) ? esc_attr($instance['el_class']) : '';
		?>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'asata'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
        for ($i = 1; $i <= 6; $i++) {
            ?>
            <p>
                <label for="<?php echo esc_url($this->get_field_id('icon_social_' . $i)); ?>"><?php echo esc_html__('Icon', 'asata').$i; ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('icon_social_' . $i)); ?>" name="<?php echo esc_attr($this->get_field_name('icon_social_' . $i)); ?>" type="text" value="<?php echo esc_attr($icon_social[$i]); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_url($this->get_field_id('link_social_' . $i)); ?>"><?php echo esc_html__('Link', 'asata').$i; ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_social_' . $i)); ?>" name="<?php echo esc_attr($this->get_field_name('link_social_' . $i)); ?>" type="text" value="<?php echo esc_attr($link_social[$i]); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_url($this->get_field_id('title_social_' . $i)); ?>"><?php echo esc_html__('Title', 'asata').$i; ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title_social_' . $i)); ?>" name="<?php echo esc_attr($this->get_field_name('title_social_' . $i)); ?>" type="text" value="<?php echo esc_attr($title_social[$i]); ?>" />
            </p>
        <?php } ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('el_class')); ?>"><?php esc_html_e('Extra Class', 'asata'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('el_class')); ?>" name="<?php echo esc_attr($this->get_field_name('el_class')); ?>" value="<?php echo esc_attr($el_class); ?>" />
        </p>
        <?php
    }
}