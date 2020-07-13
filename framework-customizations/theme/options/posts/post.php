<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'post_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'post_general' => array(
				'title' => esc_html__('General', 'asata'),
				'type' => 'tab',
				'options' => array(
					'titlebar_background' => array(
						'label' => esc_html__( 'Title Bar Background', 'asata' ),
						'desc'  => esc_html__( 'Upload title bar background image.', 'asata' ),
						'type'  => 'upload',
					),
				),
			),
			'post_gallery' => array(
				'title' => esc_html__('Gallery', 'asata'),
				'type' => 'tab',
				'options' => array(
					'gallery_images' => array(
						'label' => esc_html__( 'Add Images', 'asata' ),
						'desc'  => esc_html__( 'Upload gallery images.', 'asata' ),
						'type'  => 'multi-upload',
					),
				),
			),
			'post_video' => array(
				'title' => esc_html__('Video', 'asata'),
				'type' => 'tab',
				'options' => array(
					'video_iframe' => array(
						'label' => esc_html__( 'Iframe', 'asata' ),
						'desc'  => esc_html__( 'Enter iframe.', 'asata' ),
						'type'  => 'textarea',
					)
				),
			),
			'post_audio' => array(
				'title' => esc_html__('Audio', 'asata'),
				'type' => 'tab',
				'options' => array(
					'audio_type' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'type' => array(
								'type' => 'short-select',
								'label' => esc_html__('Types', 'asata'),
								'desc' => esc_html__('Choose the type.', 'asata'),
								'value' => 'html5',
								'choices' => array(
									'html5' => esc_html__('HTML5', 'asata'),
									'embed' => esc_html__('Embed', 'asata')
								),
							),
						),
						'choices' => array(
							'html5' => array(
								'format' => array(
									'type'  => 'short-select',
									'value' => 'mp3',
									'label' => esc_html__('Format', 'asata'),
									'desc'  => esc_html__('Choose the audio format.', 'asata'),
									'choices' => array(
										'audio/mpeg' => esc_html__('MP3', 'asata'),
										'audio/ogg' => esc_html__('Ogg', 'asata'),
										'audio/wav' => esc_html__('Wav', 'asata')
									)
								),
								'src' => array(
									'label' => esc_html__('Src', 'asata'),
									'desc' => esc_html__('Enter url audio (Ex: http://yourdomain.com/audio.mp3)', 'asata'),
									'type' => 'text',
									'value' => ''
								),
							),
							'embed' => array(
								'iframe' => array(
									'label' => esc_html__('Embed', 'asata'),
									'desc' => esc_html__('Enter embed code(SoundCloud, ...)', 'asata'),
									'type' => 'textarea',
									'value' => '',
								),
							),
							
						),
					),
				),
			) ,
			'post_quote' => array(
				'title' => esc_html__('Quote', 'asata'),
				'type' => 'tab',
				'options' => array(
					'quote_text' => array(
						'label' => esc_html__( 'Text', 'asata' ),
						'desc'  => esc_html__( 'Enter text.', 'asata' ),
						'type'  => 'textarea',
					),
					'quote_name' => array(
						'label' => esc_html__( 'Author', 'asata' ),
						'desc'  => esc_html__( 'Enter name.', 'asata' ),
						'type'  => 'text',
					),
					'quote_position' => array(
						'label' => esc_html__( 'Position', 'asata' ),
						'desc'  => esc_html__( 'Enter position.', 'asata' ),
						'type'  => 'text',
					),
				),
			),
			'post_link' => array(
				'title' => esc_html__('Link', 'asata'),
				'type' => 'tab',
				'options' => array(
					'link_title' => array(
						'label' => esc_html__( 'Title', 'asata' ),
						'desc'  => esc_html__( 'Enter Title.', 'asata' ),
						'type'  => 'text',
					),
					'link_url' => array(
						'label' => esc_html__( 'Url', 'asata' ),
						'desc'  => esc_html__( 'Enter url.', 'asata' ),
						'type'  => 'text',
					),
					'link_name' => array(
						'label' => esc_html__( 'Author', 'asata' ),
						'desc'  => esc_html__( 'Enter name.', 'asata' ),
						'type'  => 'text',
					),
				),
			),
			
		),
	),
	
);
