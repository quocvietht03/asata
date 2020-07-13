<?php
	$media_arr = explode(',', $multi_media);
	$thumbnail = asata_get_image_type('thumbnail', get_the_ID(), $image_type, $image_ratio , $image_size);
	
	if($media_type == 'multi' && in_array($format, $media_arr)){
		switch ($format) {
			case 'gallery':
				$gallery_images = isset($post_options['gallery_images'])?$post_options['gallery_images']:array();
				if(!empty($gallery_images)){
					$date = time() . '_' . uniqid(true);
					?>
						<div id="<?php echo esc_attr( 'carousel-generic'.$date ) ?>" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							<?php
								foreach($gallery_images as $key => $gallery_image){
									$itemClass = ($key == 0) ? 'carousel-item active' : 'carousel-item';
									$thumbnail = asata_get_image_type('attachment', $gallery_image['attachment_id'], $image_type, $image_ratio , $image_size);
									
									if($thumbnail) echo '<div class="'.esc_attr($itemClass).'">'.$thumbnail.'</div>';
								}
							?>
						  </div>
							<a class="carousel-control-prev" href="<?php echo '#carousel-generic'.$date; ?>" data-slide="prev">
								<i class="arrow_carrot-left"></i>
							</a>
							<a class="carousel-control-next" href="<?php echo '#carousel-generic'.$date; ?>" data-slide="next">
								<i class="arrow_carrot-right"></i>
							</a>
						</div>
					<?php
				}else{
					if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
				}
			break;
			case 'video':
				$iframe = isset($post_options['video_iframe'])?$post_options['video_iframe']:'';
				if(!empty($iframe)){
					echo '<div class="bt-video">'.$iframe.'</div>';
				}else{
					if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
				}
			break;
			case 'audio':
				$audio_type = isset($post_options['audio_type']['type'])?$post_options['audio_type']['type']:'';
				if($audio_type == 'html5') {
					$audio_format = isset($post_options['audio_type']['html5']['format'])?$post_options['audio_type']['html5']['format']:'';
					$audio_src = isset($post_options['audio_type']['html5']['src'])?$post_options['audio_type']['html5']['src']:'';
					if($audio_src){
						echo '<audio controls>
								<source src="'.esc_url($audio_src).'" type="'.esc_attr($audio_format).'">
							</audio>';
					}else{
						if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
					}
				} else {
					$audio_embed = isset($post_options['audio_type']['embed']['iframe'])?$post_options['audio_type']['embed']['iframe']:'';
					if($audio_embed){
						echo '<div class="bt-soundcluond">'.$audio_embed.'</div>';
					}else{
						if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
					}
				}
			break;
			case 'quote':
				$text = isset($post_options['quote_text'])?$post_options['quote_text']:'';
					$name = isset($post_options['quote_name'])?$post_options['quote_name']:'';
					$position = isset($post_options['quote_position'])?$post_options['quote_position']:'';
				if($text){
					echo '<div class="bt-quote">
						<div class="bt-text">'.$text.'</div>
						<h4 class="bt-name">'.$name.'</h4>
						<div class="bt-position">'.$position.'</div>
						<i class="icon_quotations"></i>
					</div>';
				}else{
					if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
				}
			break;
			case 'link':
				$title = isset($post_options['link_title'])?$post_options['link_title']:'';
				$url = isset($post_options['link_url'])?$post_options['link_url']:'#';
				$name = isset($post_options['link_name'])?$post_options['link_name']:'';
				if($title){ 
					echo '<div class="bt-link">
						<a href="'.esc_url($url).'" target="_blank">'.$title.'</a>
						<h4 class="bt-name">'.$name.'</h4>
						<i class="icon_link"></i>
					</div>';
				}else{
					if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
				}
			break;
			default:
				if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
		}
	}else{
		if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
	}
