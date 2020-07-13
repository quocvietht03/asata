<div class="bt-price-wrap">
	<?php if($icon) echo '<div class="bt-icon" '.implode(' ', $icon_attributes).'>'.$icon.'</div>'; ?>
	<h4 class="bt-price">
		<?php
			if($unit) echo '<span class="bt-unit" '.implode(' ', $unit_attributes).'>'.$unit.'</span>';
			if($price) echo '<span class="bt-number" '.implode(' ', $price_attributes).'>'.$price.'</span>';
			if($time) echo '<span class="bt-time" '.implode(' ', $time_attributes).'>'.$time.'</span>';
		?>
	</h4>
</div>
<div class="bt-content">
	<?php
		if($title) echo '<h3 class="bt-title" '.implode(' ', $title_attributes).'>'.$title.'</h3>';
		if(!empty($options_value)){
			echo '<ul class="bt-options" '.implode(' ', $options_attributes).'>'.implode(' ', $options_value).'</ul>';
		}
		if($button_text) echo '<a class="bt-btn bt-btn-order" '.implode(' ', $button_attributes).'>'.$button_text.'</a>';
	?>
</div>