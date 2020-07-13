<?php
// Portfolio
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Portfolio', 'asata' ),
	'id'               => 'bt_portfolio',
	'icon'             => 'el el-folder-open',
	'fields'           => array(
		array(
			'id'       => 'portfolio_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the content area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'portfolio_fullwidth_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Full Width Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right padding the content area display.', 'asata' ),
			'default'  => '',
			'required' 		=> array('portfolio_fullwidth' , '=', '1'),
			'output'    => array('.tax-fw-portfolio-category .bt-main-content')
		),
		array(
			'id'            => 'portfolio_columns',
			'type'          => 'slider',
			'title'         => esc_html__( 'Columns', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the number columns of list items.', 'asata' ),
			'default'       => 1,
			'min'           => 1,
			'step'          => 1,
			'max'           => 4,
			'display_value' => 'text'
		),
		array(
			'id'            => 'portfolio_sidebar_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Sidebar Width', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the width of the left/right sidebar.', 'asata' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 5,
			'display_value' => 'text'
		),
		array(
			'id'       => 'portfolio_titlebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Title Bar', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to display the title bar.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_titlebar_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Title Bar Background', 'asata' ),
			'subtitle' => esc_html__( 'Control the background of the title bar.', 'asata' ),
			'default'  => '',
			'required' 	=> array('portfolio_titlebar' , '=', '1'),
			'output'    => array('.tax-fw-portfolio-category .bt-titlebar .bt-titlebar-inner'),
		),
		array(
			'id'       => 'portfolio_content_sapce',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Main Content Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the content.', 'asata' ),
			'default'  => '',
			'output'   => array('.tax-fw-portfolio-category .bt-main-content')
		),
		array(
			'id'    => 'portfolio_post_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Post Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change the post on the portfolio page.', 'asata' )
		),
		array(
			'id'       => 'portfolio_title',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Title', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to display the post title.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_title_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Title Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography post title.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts, 'google' => false,
			'default'  => '',
			'required' 		=> array('portfolio_title' , '=', '1'),
			'output'   => array('.tax-fw-portfolio-category .bt-post-item .bt-title')
		),
		array(
			'id'       => 'portfolio_featured',
			'type'     => 'switch',
			'title'    => esc_html__( 'Featured Image / Video', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the image / video.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_image_size',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Size', 'asata' ),
			'subtitle' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'asata' ),
			'default'  => 'full',
			'required' 		=> array('portfolio_featured' , '=', '1')
		),
		array(
			'id'       => 'portfolio_image_type',
			'type'     => 'select',
			'title'    => esc_html__( 'Image Type', 'asata' ),
			'subtitle' => esc_html__( 'Select image type.', 'asata' ),
			'options'  => array(
				'auto' => esc_html__( 'Auto', 'asata' ),
				'ratio' => esc_html__( 'Ratio', 'asata' )
			),
			'default'  => 'auto',
			'required' 		=> array('portfolio_featured' , '=', '1')
		),
		array(
			'id'       => 'portfolio_image_ratio',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Ratio', 'asata' ),
			'subtitle' => esc_html__( 'Enter number for image ratio.', 'asata' ),
			'default'  => '66',
			'required' 		=> array('portfolio_image_type' , '=', 'ratio')
		),
		array(
			'id'       => 'portfolio_meta',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_meta_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Meta Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography post meta.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts, 'google' => false,
			'default'  => '',
			'required' 		=> array('portfolio_meta' , '=', '1'),
			'output'   => array('.tax-fw-portfolio-category .bt-post-item .bt-meta > li')
		),
		array(
			'id'       => 'portfolio_meta_date',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Date', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field author.', 'asata' ),
			'default'  => true,
			'required' 		=> array('portfolio_meta' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_meta_category',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Category', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field category.', 'asata' ),
			'default'  => true,
			'required' 		=> array('portfolio_meta' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_excerpt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Excerpt', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the excerpt.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_excerpt_length',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Excerpt Length', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter excerpt length number. Leave empty to use "55" for excerpt lenght.', 'asata' ),
			'default'  => '55',
			'required' 		=> array('portfolio_excerpt' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_excerpt_more',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Excerpt More', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter excerpt more. Leave empty to use "[...]" for excerpt more.', 'asata' ),
			'default'  => '[...]',
			'required' 		=> array('portfolio_excerpt' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_readmore',
			'type'     => 'switch',
			'title'    => esc_html__( 'Read More button', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the read more button.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_readmore_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Meta Field Category Label', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter label of the label read more button. Leave empty to use "Read More" label.', 'asata' ),
			'default'  => esc_html__('Read More', 'asata'),
			'required' 		=> array('portfolio_readmore' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_article_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Post Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the bottom margin the post.', 'asata' ),
			'default'  => array(
				'margin-bottom' => '40px'
			),
			'output'    => array('.tax-fw-portfolio-category .bt-post-item')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Single Portfolio', 'asata' ),
	'id'               => 'bt_single_portolio',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'single_portolio_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the content area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'single_portolio_fullwidth_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Full Width Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right padding the content area display.', 'asata' ),
			'default'  => '',
			'required' 		=> array('single_portolio_fullwidth' , '=', '1'),
			'output'    => array('.single-fw-portfolio .bt-main-content')
		),
		array(
			'id'            => 'single_portolio_sidebar_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Sidebar Width', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the width of the left/right sidebar.', 'asata' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 5,
			'display_value' => 'text'
		),
		array(
			'id'       => 'single_portfolio_titlebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Title Bar', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to display the title bar.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_portolio_titlebar_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Title Bar Background', 'asata' ),
			'subtitle' => esc_html__( 'Control the background of the title bar.', 'asata' ),
			'default'  => '',
			'required' 	=> array('single_portfolio_titlebar' , '=', '1'),
			'output'    => array('.single-fw-portfolio .bt-titlebar .bt-titlebar-inner'),
		),
		array(
			'id'       => 'single_portfolio_content_sapce',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Main Content Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the content.', 'asata' ),
			'default'  => '',
			'output'   => array('.single-fw-portfolio .bt-main-content')
		),
		array(
			'id'    => 'single_portfolio_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Post Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change the post on the blog page or archive pages.', 'asata' )
		),
		array(
			'id'       => 'single_portfolio_title',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Title', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to display the post title.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_portfolio_title_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Title Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography post title.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts, 'google' => false,
			'default'  => '',
			'required' 		=> array('single_portfolio_title' , '=', '1'),
			'output'   => array('.single-fw-portfolio .fw-portfolio .bt-title')
		),
		array(
			'id'       => 'single_portfolio_image_size',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Size', 'asata' ),
			'subtitle' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'asata' ),
			'default'  => 'full'
		),
		array(
			'id'       => 'single_portfolio_image_type',
			'type'     => 'select',
			'title'    => esc_html__( 'Image Type', 'asata' ),
			'subtitle' => esc_html__( 'Select image type.', 'asata' ),
			'options'  => array(
				'auto' => esc_html__( 'Auto', 'asata' ),
				'ratio' => esc_html__( 'Ratio', 'asata' )
			),
			'default'  => 'auto'
		),
		array(
			'id'       => 'single_portfolio_image_ratio',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Ratio', 'asata' ),
			'subtitle' => esc_html__( 'Enter number for image ratio.', 'asata' ),
			'default'  => '66',
			'required' 		=> array('single_portfolio_image_type' , '=', 'ratio')
		),
		array(
			'id'       => 'single_portfolio_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Shares', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the share.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_portfolio_share_facebook',
			'type'     => 'switch',
			'title'    => esc_html__( 'Facebook', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the facebook share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_twitter',
			'type'     => 'switch',
			'title'    => esc_html__( 'Twitter', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the twitter share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_google_plus',
			'type'     => 'switch',
			'title'    => esc_html__( 'Google Plus', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the google plus share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_linkedin',
			'type'     => 'switch',
			'title'    => esc_html__( 'Linkedin', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the linkedin share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_pinterest',
			'type'     => 'switch',
			'title'    => esc_html__( 'Pinterest', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the pinterest share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portolio_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Post Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the bottom margin the post.', 'asata' ),
			'default'  => '',
			'output'    => array('.single-fw-portfolio .fw-portfolio')
		),
		array(
			'id'       => 'single_portfolio_related_post',
			'type'     => 'switch',
			'title'    => esc_html__( 'Related Post', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the related post.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_portfolio_related_post_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Related Post Label', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter label of the related post. Leave empty to use "Portfolio Related" label.', 'asata' ),
			'default'  => 'Portfolio Related',
			'required' 		=> array('single_portfolio_related_post' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_related_post_count',
			'type'     => 'text',
			'title'    => esc_html__( 'Related Post Count', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter post count of the related post. Leave empty to use "3" for post count.', 'asata' ),
			'default'  => 3,
			'required' 		=> array('single_portfolio_related_post' , '=', '1'),
		),
		array(
			'id'            => 'single_portfolio_related_post_per_row',
			'type'          => 'slider',
			'title'         => esc_html__( 'Related Post Per Row', 'asata' ),
			'subtitle'      => esc_html__( 'Controls the post per row of the related post.', 'asata' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 4,
			'display_value' => 'text',
			'required' 		=> array('single_portfolio_related_post' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_related_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Related Post Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the bottom margin the related post.', 'asata' ),
			'default'  => '',
			'output'    => array('.single-fw-portfolio .bt-related')
		),
	)
) );
