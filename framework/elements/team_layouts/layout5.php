<?php
$team_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'team_options'):array();
$img = asata_get_image_type('thumbnail', get_the_ID(), $image_type, $image_ratio , $image_size);

$positon = isset($team_options['position'])?$team_options['position']:'';
$email = isset($team_options['email'])?$team_options['email']:'';
$phone = isset($team_options['phone'])?$team_options['phone']:'';
$social = isset($team_options['social'])?$team_options['social']:array();

$social_item = array();
if(!empty($social)){
	foreach($social as $item){
		$social_item[] = '<li><a data-btIcon="'.esc_attr($item['icon']).'" data-toggle="tooltip" title="'.esc_attr($item['title']).'" href="'.esc_url($item['link']).'"><i class="'.esc_attr($item['icon']).'"></i></a></li>';
	}
}
?>

<div class="bt-item">
	<div class="bt-thumb">
		<?php if($img) echo '<div class="bt-image">'.$img.'</div>'; ?>
		<div class="bt-overlay">
			<div class="bt-content">
				<?php if(!empty($social_item)) echo '<ul class="bt-socials">'.implode(' ', $social_item).'</ul>'; ?>
				<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php if($positon) echo '<div class="bt-position">'.$positon.'</div>'; ?>
			</div>
		</div>
	</div>
</div>
