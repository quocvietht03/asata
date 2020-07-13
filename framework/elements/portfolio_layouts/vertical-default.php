<?php
	$portfolio_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'portfolio_options'):array();
	$img = asata_get_image_type('thumbnail', get_the_ID(), $image_type, $image_ratio , $image_size);
	
	if(!$zigzag) $count = 0;
	if($count % 2 == 0){
		$type_class = 'bt-odd';
		$img_class = 'col-xl-7 col-lg-6 col-md-12';
	}else{
		$type_class = 'bt-even';
		$img_class = 'col-xl-7 col-lg-6 col-md-12 order-last';
	}
	
	$info_options = isset($portfolio_options['info-option'])?$portfolio_options['info-option']:array();

	$info_item = array();
	if(!empty($info_options)){
		foreach($info_options as $info_option){
			$info_item[] = '<li><span>'.$info_option['title'].'</span>'.$info_option['value'].'</li>';
		}
	}

	$post_share = isset($asata_options['single_portfolio_share']) ? $asata_options['single_portfolio_share']: true;
	$social_item = array();
	$share_facebook = isset($asata_options['single_portfolio_share_facebook']) ? $asata_options['single_portfolio_share_facebook']: true;
	if($share_facebook){
		$social_item[] = '<li><a target="_blank" data-toggle="tooltip" title="'.esc_attr__('Facebook', 'asata').'" href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" data-btIcon="fa fa-facebook"><i class="fa fa-facebook"></i></a></li>';
	}
	$share_twitter = isset($asata_options['single_portfolio_share_twitter']) ? $asata_options['single_portfolio_share_twitter']: true;
	if($share_twitter){
		$social_item[] = '<li><a target="_blank" data-toggle="tooltip" title="'.esc_attr__('Twitter', 'asata').'" href="https://twitter.com/share?url='.get_the_permalink().'" data-btIcon="fa fa-twitter"><i class="fa fa-twitter"></i></a></li>';
	}
	$share_google_plus = isset($asata_options['single_portfolio_share_google_plus']) ? $asata_options['single_portfolio_share_google_plus']: true;
	if($share_google_plus){
		$social_item[] = '<li><a target="_blank" data-toggle="tooltip" title="'.esc_attr__('Google Plus', 'asata').'" href="https://plus.google.com/share?url='.get_the_permalink().'" data-btIcon="fa fa-google-plus"><i class="fa fa-google-plus"></i></a></li>';
	}
	$share_linkedin = isset($asata_options['single_portfolio_share_linkedin']) ? $asata_options['single_portfolio_share_linkedin']: true;
	if($share_linkedin){
		$social_item[] = '<li><a target="_blank" data-toggle="tooltip" title="'.esc_attr__('Linkedin', 'asata').'" href="https://www.linkedin.com/shareArticle?url='.get_the_permalink().'" data-btIcon="fa fa-linkedin"><i class="fa fa-linkedin"></i></a></li>';
	}
	$share_pinterest = isset($asata_options['single_portfolio_share_pinterest']) ? $asata_options['single_portfolio_share_pinterest']: true;
	if($share_pinterest){
		$social_item[] = '<li><a target="_blank" data-toggle="tooltip" title="'.esc_attr__('Pinterest', 'asata').'" href="https://pinterest.com/pin/create/button/?url='.get_the_permalink().'" data-btIcon="fa fa-pinterest"><i class="fa fa-pinterest"></i></a></li>';
	}

	
?>

<div class="bt-item <?php echo esc_attr($type_class); ?>">
	<div class="row align-items-center">
		<div class="<?php echo esc_attr($img_class); ?>">
			<div class="bt-media">
				<?php if($img) echo '<div class="bt-image">'.$img.'</div>'; ?>
			</div>
		</div>
		<div class="col-xl-5 col-lg-6 col-md-12">
			<div class="bt-content">
				<div class="bt-term"><?php the_terms( get_the_ID(), 'fw-portfolio-category', '', ', ' ); ?></div>
				<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="bt-info">
					<?php if(!empty($info_item)) echo '<ul>'.implode(' ', $info_item).'</ul>'; ?>
				</div>
				<?php if($post_share){ ?>
					<div class="bt-social">
						<?php
							if(!empty($social_item)){
								echo '<ul>'.implode(' ', $social_item).'</ul>';
							}
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
