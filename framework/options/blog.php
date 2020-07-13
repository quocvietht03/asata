<?php
// Blog
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Archive Blog', 'asata' ),
	'id'               => 'bt_blog',
	'icon'             => 'el el-file-edit',
	'fields'           => array(
		array(
			'id'       => 'blog_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the content area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'blog_fullwidth_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Full Width Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right padding the content area display.', 'asata' ),
			'default'  => '',
			'required' 		=> array('blog_fullwidth' , '=', '1'),
			'output'    => array('.blog.bt-main-content, .category .bt-main-content, .tag .bt-main-content, .search .bt-main-content')
		),
		array(
			'id'            => 'blog_columns',
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
			'id'            => 'blog_sidebar_width',
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
			'id'       => 'blog_titlebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Title Bar', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to display the title bar.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'blog_titlebar_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Title Bar Background', 'asata' ),
			'subtitle' => esc_html__( 'Control the background of the title bar.', 'asata' ),
			'default'  => '',
			'required' 	=> array('blog_titlebar' , '=', '1'),
			'output'    => array('.blog .bt-titlebar .bt-titlebar-inner, .category .bt-titlebar .bt-titlebar-inner, .tag .bt-titlebar .bt-titlebar-inner, .search .bt-titlebar .bt-titlebar-inner'),
		),
		array(
			'id'       => 'blog_content_sapce',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Main Content Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the content.', 'asata' ),
			'default'  => '',
			'output'   => array('.category .bt-main-content, .tag .bt-main-content, .search .bt-main-content')
		),
		array(
			'id'    => 'blog_post_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Post Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change the post on the blog page or archive pages.', 'asata' )
		),
		array(
			'id'       => 'post_title',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Title', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to display the post title.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'post_title_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Title Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography post title.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('post_title' , '=', '1'),
			'output'   => array('.category .bt-post-item .bt-title, .tag .bt-post-item .bt-title, .search .bt-post-item .bt-title')
		),
		array(
			'id'       => 'post_featured',
			'type'     => 'switch',
			'title'    => esc_html__( 'Featured Image / Video', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the image / video.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'post_image_size',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Size', 'asata' ),
			'subtitle' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'asata' ),
			'default'  => 'full',
			'required' 		=> array('post_featured' , '=', '1')
		),
		array(
			'id'       => 'post_image_type',
			'type'     => 'select',
			'title'    => esc_html__( 'Image Type', 'asata' ),
			'subtitle' => esc_html__( 'Select image type.', 'asata' ),
			'options'  => array(
				'auto' => esc_html__( 'Auto', 'asata' ),
				'ratio' => esc_html__( 'Ratio', 'asata' )
			),
			'default'  => 'auto',
			'required' 		=> array('post_featured' , '=', '1')
		),
		array(
			'id'       => 'post_image_ratio',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Ratio', 'asata' ),
			'subtitle' => esc_html__( 'Enter number for image ratio.', 'asata' ),
			'default'  => '66',
			'required' 		=> array('post_image_type' , '=', 'ratio')
		),
		array(
			'id'       => 'post_meta',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'post_meta_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Meta Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography post meta.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('post_meta' , '=', '1'),
			'output'   => array('.blog .bt-post-item .bt-meta > li, .tag .bt-post-item .bt-meta > li, .category .bt-post-item .bt-meta > li, .tag .bt-post-item .bt-meta > li, .search .bt-post-item .bt-meta > li')
		),
		array(
			'id'       => 'post_meta_author',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Author', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field author.', 'asata' ),
			'default'  => true,
			'required' 		=> array('post_meta' , '=', '1'),
		),
		array(
			'id'       => 'post_meta_date',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Date', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field author.', 'asata' ),
			'default'  => true,
			'required' 		=> array('post_meta' , '=', '1'),
		),
		array(
			'id'       => 'post_meta_comment',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Comment', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field comment.', 'asata' ),
			'default'  => true,
			'required' 		=> array('post_meta' , '=', '1'),
		),
		array(
			'id'       => 'post_meta_category',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Category', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field category.', 'asata' ),
			'default'  => true,
			'required' 		=> array('post_meta' , '=', '1'),
		),
		array(
			'id'       => 'post_excerpt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Excerpt', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the excerpt.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'post_excerpt_length',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Excerpt Length', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter excerpt length number. Leave empty to use "55" for excerpt lenght.', 'asata' ),
			'default'  => '55',
			'required' 		=> array('post_excerpt' , '=', '1'),
		),
		array(
			'id'       => 'post_excerpt_more',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Excerpt More', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter excerpt more. Leave empty to use "[...]" for excerpt more.', 'asata' ),
			'default'  => '[...]',
			'required' 		=> array('post_excerpt' , '=', '1'),
		),
		array(
			'id'       => 'post_readmore',
			'type'     => 'switch',
			'title'    => esc_html__( 'Read More button', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the read more button.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'post_readmore_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Meta Field Category Label', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter label of the label read more button. Leave empty to use "Read More" label.', 'asata' ),
			'default'  => esc_html__('Read More', 'asata' ),
			'required' 		=> array('post_readmore' , '=', '1'),
		),
		array(
			'id'       => 'blog_article_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Post Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the bottom margin the post.', 'asata' ),
			'default'  => '',
			'output'    => array('.category .bt-post-item, .tag .bt-post-item, .search .bt-post-item')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Single Post', 'asata' ),
	'id'               => 'bt_post',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'post_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to have the content area display at 100% width according to the window size. Turn off to follow site width.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'post_fullwidth_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Full Width Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the left/right padding the content area display.', 'asata' ),
			'default'  => '',
			'required' 		=> array('post_fullwidth' , '=', '1'),
			'output'    => array('.single-post .bt-main-content')
		),
		array(
			'id'            => 'post_sidebar_width',
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
			'id'       => 'post_titlebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Title Bar', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to display the title bar.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'post_titlebar_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Title Bar Background', 'asata' ),
			'subtitle' => esc_html__( 'Control the background of the title bar.', 'asata' ),
			'default'  => '',
			'required' 	=> array('post_titlebar' , '=', '1'),
			'output'    => array('.single-post .bt-titlebar .bt-titlebar-inner'),
		),
		array(
			'id'       => 'post_content_sapce',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Main Content Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the content.', 'asata' ),
			'default'  => '',
			'output'   => array('.single-post .bt-main-content')
		),
		array(
			'id'       => 'single_table_of_content',
			'type'     => 'switch',
			'title'    => esc_html__( 'Table Of Content', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the table of content.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'single_post_navigation',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Navigation', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the post navigation.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_author',
			'type'     => 'switch',
			'title'    => esc_html__( 'Author', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the author.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_comment',
			'type'     => 'switch',
			'title'    => esc_html__( 'Comment', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the comment.', 'asata' ),
			'default'  => true
		),
		array(
			'id'    => 'single_post_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Post Settings', 'asata' ),
			'desc'  => esc_html__( 'This is the options you can change the post on the blog page or archive pages.', 'asata' )
		),
		array(
			'id'       => 'single_post_title',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Title', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to display the post title.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_post_title_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Title Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography post title.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('single_post_title' , '=', '1'),
			'output'   => array('.single-post .bt-post-item .bt-title')
		),
		array(
			'id'       => 'single_post_featured',
			'type'     => 'switch',
			'title'    => esc_html__( 'Featured Image / Video', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the image / video.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_post_image_size',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Size', 'asata' ),
			'subtitle' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'asata' ),
			'default'  => 'full',
			'required' 		=> array('single_post_featured' , '=', '1')
		),
		array(
			'id'       => 'single_post_image_type',
			'type'     => 'select',
			'title'    => esc_html__( 'Image Type', 'asata' ),
			'subtitle' => esc_html__( 'Select image type.', 'asata' ),
			'options'  => array(
				'auto' => esc_html__( 'Auto', 'asata' ),
				'ratio' => esc_html__( 'Ratio', 'asata' )
			),
			'default'  => 'auto',
			'required' 		=> array('single_post_featured' , '=', '1')
		),
		array(
			'id'       => 'single_post_image_ratio',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Ratio', 'asata' ),
			'subtitle' => esc_html__( 'Enter number for image ratio.', 'asata' ),
			'default'  => '66',
			'required' 		=> array('single_post_image_type' , '=', 'ratio')
		),
		array(
			'id'       => 'single_post_meta',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_post_meta_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Meta Typography', 'asata' ),
			'subtitle' => esc_html__( 'These settings control the typography post meta.', 'asata' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'ext-font-css' => get_template_directory().'/framework/options/fonts.css',
			'fonts'  => $fonts,
			'default'  => '',
			'required' 		=> array('single_post_meta' , '=', '1'),
			'output'   => array('.single-post .bt-post-item .bt-meta > li')
		),
		array(
			'id'       => 'single_post_meta_author',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Author', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field author.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_meta' , '=', '1'),
		),
		array(
			'id'       => 'single_post_meta_date',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Date', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field author.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_meta' , '=', '1'),
		),
		array(
			'id'       => 'single_post_meta_comment',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Comment', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field comment.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_meta' , '=', '1'),
		),
		array(
			'id'       => 'single_post_meta_category',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Category', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field category.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_meta' , '=', '1'),
		),
		array(
			'id'       => 'single_post_content',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Content', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the content.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_post_tag',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Tags', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the tags.', 'asata' ),
			'default'  => true
		),
		array(
			'id'       => 'single_post_tag_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Tags Label', 'asata' ),
			'subtitle' => esc_html__( 'Please, Enter label of the tags. Leave empty to use "Tags:" label.', 'asata' ),
			'default'  => 'Tags:',
			'required' 		=> array('single_post_tag' , '=', '1'),
		),
		array(
			'id'       => 'single_post_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Shares', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the share.', 'asata' ),
			'default'  => false
		),
		array(
			'id'       => 'single_post_share_facebook',
			'type'     => 'switch',
			'title'    => esc_html__( 'Facebook', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the facebook share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_share' , '=', '1'),
		),
		array(
			'id'       => 'single_post_share_twitter',
			'type'     => 'switch',
			'title'    => esc_html__( 'Twitter', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the twitter share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_share' , '=', '1'),
		),
		array(
			'id'       => 'single_post_share_google_plus',
			'type'     => 'switch',
			'title'    => esc_html__( 'Google Plus', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the google plus share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_share' , '=', '1'),
		),
		array(
			'id'       => 'single_post_share_linkedin',
			'type'     => 'switch',
			'title'    => esc_html__( 'Linkedin', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the linkedin share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_share' , '=', '1'),
		),
		array(
			'id'       => 'single_post_share_pinterest',
			'type'     => 'switch',
			'title'    => esc_html__( 'Pinterest', 'asata' ),
			'subtitle' => esc_html__( 'Turn on to show the pinterest share.', 'asata' ),
			'default'  => true,
			'required' 		=> array('single_post_share' , '=', '1'),
		),
		array(
			'id'       => 'single_article_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Post Space', 'asata' ),
			'subtitle' => esc_html__( 'Control the bottom margin the post.', 'asata' ),
			'default'  => '',
			'output'    => array('.single-post .bt-post-item')
		),
		
	)
) );
