<?php
global $asata_options;
$post_title = isset($asata_options['single_portfolio_title']) ? $asata_options['single_portfolio_title']: false;
$post_image_size = isset($asata_options['single_portfolio_image_size']) ? $asata_options['single_portfolio_image_size']: 'full';
$post_image_type = isset($asata_options['single_portfolio_image_type']) ? $asata_options['single_portfolio_image_type']: 'auto';
$post_image_ratio = isset($asata_options['single_portfolio_image_ratio']) ? $asata_options['single_portfolio_image_ratio']: 66;

$portfolio_options = function_exists('fw_get_db_post_option')?fw_get_db_post_option(get_the_ID(), 'portfolio_options'):array();

$gallery_type = isset($portfolio_options['gallery-type'])?$portfolio_options['gallery-type']:'grid';
$gallery_column = isset($portfolio_options['gallery-column'])?$portfolio_options['gallery-column']:'col-md-12';
$gallery_space = isset($portfolio_options['gallery-space'])?(int)$portfolio_options['gallery-space']:0;
$gallery_space_style = 'margin-bottom: '.$gallery_space.'px; padding: 0 '.($gallery_space/2).'px;';

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

<article <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-12 col-lg-7">
			<?php
				$project_gallery = function_exists('fw_ext_portfolio_get_gallery_images')?fw_ext_portfolio_get_gallery_images():array();
				if(!empty($project_gallery)){
					if($gallery_type == 'grid'){
						?>
							<div class="bt-gallery">
								<div class="row">
									<?php 
										foreach($project_gallery as $attachment){
											$thumbnail = asata_get_image_type('attachment', $attachment['attachment_id'], $post_image_type, $post_image_ratio , $post_image_size);
											echo '<div class="'.esc_attr($gallery_column).'" style="'.esc_attr($gallery_space_style).'">
													<div class="bt-item">'.$thumbnail.'</div>
												</div>';
										}
									?>
								</div>
							</div>
						<?php
					}else{
						$date = time() . '_' . uniqid(true);
						?>
							<div class="bt-slider">
								<div id="<?php echo esc_attr( 'carousel-generic'.$date ) ?>" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
									<?php
										foreach($project_gallery as $key => $attachment){
											$itemClass = ($key == 0) ? 'carousel-item active' : 'carousel-item';
											$thumbnail = asata_get_image_type('attachment', $attachment['attachment_id'], $post_image_type, $post_image_ratio , $post_image_size);
												
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
							</div>
						<?php
					}
				}else{
					?>
						<div class="bt-thumbnail">
							<?php echo asata_get_image_type('thumbnail', get_the_ID(), $post_image_type, $post_image_ratio , $post_image_size); ?>
						</div>
					<?php
				}
			?>
		</div>
		<div class="col-md-12 col-lg-5">
				<div class="bt-info-holder">
					<div class="bt-info-sticky">
						<?php if($post_title){ ?>
							<h3 class="bt-title"><?php the_title(); ?></h3>
						<?php } ?>
						<?php the_terms( get_the_ID(), 'fw-portfolio-category', '<div class="bt-term"><i class="icon_ribbon_alt"></i> ', ', ', '</div>' ); ?>
						<div class="bt-desc"><?php the_content(); ?></div>
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
</article>
