<?php 
/* Count post view. */
function asata_set_count_view(){
    $post_id = get_the_ID();
	if(is_single() && !empty($post_id) && !isset($_COOKIE['asata_post_view_'. $post_id])){

        $views = get_post_meta($post_id , '_asata_post_views', true);

        $views = $views ? $views : 0 ;

        $views++;

        update_post_meta($post_id, '_asata_post_views' , $views);

        /* set cookie. */
        setcookie('asata_post_view_'. $post_id, $post_id, time() * 20, '/');
    }
}

add_action( 'wp', 'asata_set_count_view' );

/* Get Post view */
function asata_get_count_view() {
	$post_id = get_the_ID();
    $views = get_post_meta($post_id , '_asata_post_views', true);

    $views = $views ? $views : 0 ;
    return $views;
}

/* Post Title */
if ( ! function_exists( 'asata_post_title_render' ) ) {
	function asata_post_title_render() {
		global $asata_options;
		
		ob_start();
		if(is_single()){
			$post_title = isset($asata_options['single_post_title']) ? $asata_options['single_post_title']: false;
			if($post_title){
				?>
					<h3 class="bt-title"><?php the_title(); ?></h3>
				<?php
			}
		}else{
			$post_title = isset($asata_options['post_title']) ? $asata_options['post_title']: true;
			if($post_title){
				?>
					<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php
			}
		}
		
		return ob_get_clean();
	} 
}

/* Post Featured */
if ( ! function_exists( 'asata_post_featured_render' ) ) {
	function asata_post_featured_render($image_size) {
		ob_start();
		if(function_exists('wpb_getImageBySize')){
			$thumbnail = wpb_getImageBySize( array(
				'post_id' => get_the_ID(),
				'attach_id' => null,
				'thumb_size' => $image_size,
				'class' => ''
			) );
			echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
		}else{
			if (has_post_thumbnail()) the_post_thumbnail('full');
		}
		return ob_get_clean();
	}
}

/* Post Media */
if ( ! function_exists( 'asata_post_media_render' ) ) {
	function asata_post_media_render() {
		global $asata_options;
		
		if(is_single()){
			$post_featured = isset($asata_options['single_post_featured']) ? $asata_options['single_post_featured']: true;
			$post_image_size = isset($asata_options['single_post_image_size']) ? $asata_options['single_post_image_size']: 'full';
			$post_image_type = isset($asata_options['single_post_image_type']) ? $asata_options['single_post_image_type']: 'auto';
			$post_image_ratio = isset($asata_options['single_post_image_ratio']) ? $asata_options['single_post_image_ratio']: 66;
		}else{
			$post_featured = isset($asata_options['post_featured']) ? $asata_options['post_featured']: true;
			$post_image_size = isset($asata_options['post_image_size']) ? $asata_options['post_image_size']: 'full';
			$post_image_type = isset($asata_options['post_image_type']) ? $asata_options['post_image_type']: 'auto';
			$post_image_ratio = isset($asata_options['post_image_ratio']) ? $asata_options['post_image_ratio']: 66;
		}
		
		$thumbnail = asata_get_image_type('thumbnail', get_the_ID(), $post_image_type, $post_image_ratio , $post_image_size);
		
		$format = get_post_format() ? get_post_format() : 'standard';
		$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
		
		ob_start();
		switch ($format) {
			case 'audio':
				if($post_featured){
					$audio_type = isset($post_options['audio_type']['type'])?$post_options['audio_type']['type']:'';
					
					?>
						<div class="bt-media <?php echo esc_attr($format); ?>">
							<?php
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
							?>
						</div>
					<?php
				}
			break;
			case 'gallery':
				if($post_featured){
					$gallery_images = isset($post_options['gallery_images'])?$post_options['gallery_images']:array();
					
					?>
						<div class="bt-media <?php echo esc_attr($format); ?>">
							<?php
								
								if(!empty($gallery_images)){
									$date = time() . '_' . uniqid(true);
									?>
										<div id="<?php echo esc_attr( 'carousel-generic'.$date ) ?>" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner">
											<?php
												foreach($gallery_images as $key => $gallery_image){
													$itemClass = ($key == 0) ? 'carousel-item active' : 'carousel-item';
													$thumbnail = asata_get_image_type('attachment', $gallery_image['attachment_id'], $post_image_type, $post_image_ratio , $post_image_size);
													
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
							?>
						</div>
					<?php
				}
			break;
			case 'link':
				if($post_featured){
					$title = isset($post_options['link_title'])?$post_options['link_title']:'';
					$url = isset($post_options['link_url'])?$post_options['link_url']:'#';
					$name = isset($post_options['link_name'])?$post_options['link_name']:'';
					
					?>
						<div class="bt-media <?php echo esc_attr($format); ?>">
							<?php
								if($title){ 
									echo '<div class="bt-link">
										<a href="'.esc_url($url).'" target="_blank">'.$title.'</a>
										<h4 class="bt-name">'.$name.'</h4>
										<i class="icon_link"></i>
									</div>';
								}else{
									if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
								}
							?>
						</div>
					<?php
				}
			break;
			case 'quote':
				if($post_featured){
					$text = isset($post_options['quote_text'])?$post_options['quote_text']:'';
					$name = isset($post_options['quote_name'])?$post_options['quote_name']:'';
					$position = isset($post_options['quote_position'])?$post_options['quote_position']:'';
					
					?>
						<div class="bt-media <?php echo esc_attr($format); ?>">
							<?php
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
							?>
						</div>
					<?php
				}
			break;
			case 'video':
				if($post_featured){
					$iframe = isset($post_options['video_iframe'])?$post_options['video_iframe']:'';
					?>
						<div class="bt-media <?php echo esc_attr($format); ?>">
							<?php
								if(!empty($iframe)){
									echo '<div class="bt-video">'.$iframe.'</div>';
								}else{
									if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';
								}
							?>
						</div>
					<?php
				}
			break;
			default:
				if($post_featured && has_post_thumbnail()){
					?>
						<div class="bt-media <?php echo esc_attr($format); ?>">
							<?php if($thumbnail) echo '<div class="bt-image">'.$thumbnail.'</div>';; ?>
						</div>
					<?php
				}
		
		}
		return ob_get_clean();
	}
}

/* Post Meta */
if ( ! function_exists( 'asata_post_meta_render' ) ) {
	function asata_post_meta_render() {
		global $asata_options;
		
		if(is_single()){
			$post_meta = isset($asata_options['single_post_meta']) ? $asata_options['single_post_meta']: true;
			$post_meta_author = isset($asata_options['single_post_meta_author']) ? $asata_options['single_post_meta_author']: true;
			$post_meta_date = isset($asata_options['single_post_meta_date']) ? $asata_options['single_post_meta_date']: true;
			$post_meta_comment = isset($asata_options['single_post_meta_comment']) ? $asata_options['single_post_meta_comment']: true;
			$post_meta_category = isset($asata_options['single_post_meta_category']) ? $asata_options['single_post_meta_category']: true;
		}else{
			$post_meta = isset($asata_options['post_meta']) ? $asata_options['post_meta']: true;
			$post_meta_author = isset($asata_options['post_meta_author']) ? $asata_options['post_meta_author']: true;
			$post_meta_date = isset($asata_options['post_meta_date']) ? $asata_options['post_meta_date']: true;
			$post_meta_comment = isset($asata_options['post_meta_comment']) ? $asata_options['post_meta_comment']: true;
			$post_meta_category = isset($asata_options['post_meta_category']) ? $asata_options['post_meta_category']: true;
		}
		ob_start();
		if($post_meta){
			?>
				<ul class="bt-meta">
					<?php if($post_meta_author){ ?>
						<li><?php echo '<i class="icon_pencil-edit"></i> '.esc_html__('by ', 'asata'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
					<?php } ?>
					<?php if($post_meta_date){ ?>
						<li><?php echo '<i class="icon_calendar"></i> '; ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></li>
					<?php } ?>
					<?php if($post_meta_comment && comments_open()){ ?>
						<li><i class="icon_comment_alt"></i> <a href="<?php comments_link(); ?>"><?php comments_number( esc_html__('0 Comments', 'asata'), esc_html__('1 Comment', 'asata'), esc_html__('% Comments', 'asata') ); ?></a></li>
					<?php } ?>
					<?php if($post_meta_category){ ?>
						<?php the_terms( get_the_ID(), 'category', '<li class="bt-term"><i class="icon_ribbon_alt"></i> ', ', ', '</li>' ); ?>
					<?php } ?>
				</ul>
			<?php
		}
		return ob_get_clean();
	} 
}

/* Tag & Share */
if ( ! function_exists( 'asata_tag_share_render' ) ) {
	function asata_tag_share_render() {
		global $asata_options;
		
		$post_tag = isset($asata_options['single_post_tag']) ? $asata_options['single_post_tag']: true;
		$post_tag_label = isset($asata_options['single_post_tag_label'])&&$asata_options['single_post_tag_label'] ? $asata_options['single_post_tag_label']: esc_html__('Tags:', 'asata');
		$post_share = isset($asata_options['single_post_share']) ? $asata_options['single_post_share']: false;
		$post_share_label = isset($asata_options['single_post_share_label'])&&$asata_options['single_post_share_label'] ? $asata_options['single_post_share_label']: esc_html__('Share:', 'asata');
		
		$social_item = array();
		$share_facebook = isset($asata_options['single_post_share_facebook']) ? $asata_options['single_post_share_facebook']: true;
		if($share_facebook){
			$social_item[] = '<li><a target="_blank" data-btIcon="fa fa-facebook" data-toggle="tooltip" title="'.esc_attr__('Facebook', 'asata').'" href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'"><i class="fa fa-facebook"></i></a></li>';
		}
		$share_twitter = isset($asata_options['single_post_share_twitter']) ? $asata_options['single_post_share_twitter']: true;
		if($share_twitter){
			$social_item[] = '<li><a target="_blank" data-btIcon="fa fa-twitter" data-toggle="tooltip" title="'.esc_attr__('Twitter', 'asata').'" href="https://twitter.com/share?url='.get_the_permalink().'"><i class="fa fa-twitter"></i></a></li>';
		}
		$share_google_plus = isset($asata_options['single_post_share_google_plus']) ? $asata_options['single_post_share_google_plus']: true;
		if($share_google_plus){
			$social_item[] = '<li><a target="_blank" data-btIcon="fa fa-google-plus" data-toggle="tooltip" title="'.esc_attr__('Google Plus', 'asata').'" href="https://plus.google.com/share?url='.get_the_permalink().'"><i class="fa fa-google-plus"></i></a></li>';
		}
		$share_linkedin = isset($asata_options['single_post_share_linkedin']) ? $asata_options['single_post_share_linkedin']: true;
		if($share_linkedin){
			$social_item[] = '<li><a target="_blank" data-btIcon="fa fa-linkedin" data-toggle="tooltip" title="'.esc_attr__('Linkedin', 'asata').'" href="https://www.linkedin.com/shareArticle?url='.get_the_permalink().'"><i class="fa fa-linkedin"></i></a></li>';
		}
		$share_pinterest = isset($asata_options['single_post_share_pinterest']) ? $asata_options['single_post_share_pinterest']: true;
		if($share_pinterest){
			$social_item[] = '<li><a target="_blank" data-btIcon="fa fa-pinterest" data-toggle="tooltip" title="'.esc_attr__('Pinterest', 'asata').'" href="https://pinterest.com/pin/create/button/?url='.get_the_permalink().'"><i class="fa fa-pinterest"></i></a></li>';
		}
		
		ob_start();
		if(has_tag() && $post_tag || $post_share){
			?>
				<div class="bt-tag-share">
					<?php if($post_tag){ ?>
						<div class="bt-tag">
						<?php
							if(has_tag()){
								the_tags( '<span>'.$post_tag_label.'</span>', '', '' );
							}
						?>
						</div>
					<?php } ?>
					<?php if($post_share){ ?>
						<div class="bt-share">
							<?php
								if(!empty($social_item)){
									echo '<a class="bt-btn-share" href="javascript:void(0)"><i class="social_share"></i></a><ul>'.implode(' ', $social_item).'</ul>';
								}
							?>
						</div>
					<?php } ?>
				</div>
			<?php
		}
		return ob_get_clean();
	} 
}

/* Post Content */
if ( ! function_exists( 'asata_post_content_render' ) ) {
	function asata_post_content_render() {
		global $asata_options;
		
		ob_start();
		if(is_single()){
			$post_content = isset($asata_options['single_post_content']) ? $asata_options['single_post_content']: true;
			if($post_content){
				?>
					<div class="bt-desc clearfix">
						<?php
							the_content();
							wp_link_pages(array(
								'before' => '<div class="page-links">' . esc_html__('Pages:', 'asata'),
								'after' => '</div>',
							));
						?>
					</div>
				<?php
			}
			echo asata_tag_share_render();
		}else{
			$post_excerpt = isset($asata_options['post_excerpt']) ? $asata_options['post_excerpt']: true;
			$post_excerpt_length = (int) isset($asata_options['post_excerpt_length']) ? $asata_options['post_excerpt_length']: 55;
			$post_excerpt_more = isset($asata_options['post_excerpt_more']) ? $asata_options['post_excerpt_more']: '[...]';
			$post_readmore = isset($asata_options['post_readmore']) ? $asata_options['post_readmore']: true;
			$post_readmore_label = isset($asata_options['post_readmore_label'])&&$asata_options['post_readmore_label'] ? $asata_options['post_readmore_label']: esc_html__('Read More', 'asata');
			if($post_excerpt){
				?>
					<div class="bt-excerpt">
						<?php echo wp_trim_words(get_the_excerpt(), $post_excerpt_length, $post_excerpt_more); ?>
					</div>
				<?php
			}
			if($post_readmore){
				?>
					<a class="bt-btn bt-readmore" href="<?php the_permalink(); ?>"><?php echo esc_html($post_readmore_label); ?></a>
				<?php
			}
			
		}
		
		return ob_get_clean();
	} 
}

/* Author */
if ( ! function_exists( 'asata_author_render' ) ) {
	function asata_author_render() {
		ob_start();
		?>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<span class="featured-post"> <?php esc_html_e( 'Sticky', 'asata' ); ?></span>
		<?php } ?>
		<div class="bt-about-author clearfix">
			<div class="bt-author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 170 ); ?></div>
			<div class="bt-author-info">
				<h6 class="bt-title"><?php esc_html_e('Author', 'asata'); ?></h6>
				<h4 class="bt-name"><?php the_author(); ?></h4>
				<?php the_author_meta('description'); ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	} 
}

/* Custom comment list */
function asata_custom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? 'bt-comment-item clearfix' : 'bt-comment-item parent clearfix' ) ?> id="comment-<?php comment_ID() ?>">
	<div class="bt-comment">
		<div class="bt-avatar">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="bt-content">
			<h5 class="bt-name"><?php echo get_comment_author( get_comment_ID() ); ?></h5>
			<div class="bt-date"><?php echo get_comment_date(); ?></div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'asata' ); ?></em>
			<?php endif; ?>
			<?php comment_text(); ?>
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>
<?php
}
