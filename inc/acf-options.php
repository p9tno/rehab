<?php

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Content Settings',
		'menu_title'	=> 'Content Settings',
		'menu_slug' 	=> 'theme-global-content',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
        'icon_url' => 'dashicons-text',
	));

}

function my_template_acf_mataboxes(){
    // BEGIN GLOBAL CONTENT
    acf_add_local_field_group(array(
        'key' => 'acf_global_content',
        'title' => 'Content Settings',
        'fields' => array(
            // ------------------------------- tab_header
            array (
                'key' => 'tab_header',
                'label' => 'Header', 
                'type' => 'tab',
            ),
            array(
                'key' => 'header_logo',
                'label' => 'Heder logo',
                'name' => 'header_logo',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url'
                'preview_size' => 'full',
            ),
            // array(
            //     'key' => 'header_logo_quiz',
            //     'label' => 'Heder logo quiz',
            //     'name' => 'header_logo_quiz',
            //     'type' => 'image',
            //     'return_format' => 'id',  // 'id' || 'url'
            //     'preview_size' => 'full',
            // ),
            array(
                'key' => 'header_btn',
                'label' => 'Button',
                'name' => 'header_btn',
                'type' => 'link',
                'return_format' => 'array',
            ),
            // ------------------------------- tab_footer
            array (
                'key' => 'tab_footer',
                'label' => 'Footer', 
                'type' => 'tab',
            ),
            array(
                'key' => 'footer_img',
                'label' => 'Footer top image',
                'name' => 'footer_img',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url'
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'footer_wp_form_relations',
                'label' => 'Choose a form',
                'name' => 'footer_wp_form_relations',
                'type' => 'post_object',
                'allow_null' => 1,
                'multiple' => 0,
                'return_format' => 'id',  // 'id' || 'object'
                'post_type' => 'wpforms',  // or array of post types e.g. ['post', 'page']
                'taxonomy' => '',  // or array of terms e.g. ['category:term-slug']
            ),
            array(
                'key' => 'footer_logo',
                'label' => 'Footer logo',
                'name' => 'footer_logo',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url'
                'preview_size' => 'full',
            ),
            array(
                'key' => 'nmls_logo',
                'label' => 'NMLS logo',
                'name' => 'nmls_logo',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url'
                'preview_size' => 'full',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'nmls_text',
                'label' => 'NMLS text',
                'name' => 'nmls_text',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            // ------------------------------- Preloader
            array (
                'key' => 'tab_content_preloader',
                'label' => 'Preloader', 
                'type' => 'tab',
            ),
            array(
                'key' => 'preloader_boolean',
                'name' => 'preloader_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            // ------------------------------- contact
            array (
                'key' => 'tab_contact',
                'label' => 'Contact Us', 
                'type' => 'tab',
            ),
            array(
                'key' => 'address',
                'label' => 'Address',
                'name' => 'address',
                'type' => 'text',
            ),
            array(
                'key' => 'mail',
                'label' => 'Email',
                'name' => 'mail',
                'type' => 'email',
            ),
            array(
                'key' => 'phone',
                'label' => 'Phone 1',
                'name' => 'phone',
                'type' => 'text',
            ),
            array(
                'key' => 'phone_2',
                'label' => 'Phone 2',
                'name' => 'phone_2',
                'type' => 'text',
            ),
            // ------------------------------- tab_aside
            array (
                'key' => 'tab_aside',
                'label' => 'Aside', 
                'type' => 'tab',
            ),
            array(
                'key' => 'aside_items',
                'label' => 'Aside items',
                'name' => 'aside_items',
                'type' => 'repeater',
                'layout' => 'block',  // 'block' || 'row' || 'table'
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'aside_color',
                        'label' => 'Color',
                        'name' => 'aside_color',
                        'type' => 'radio',
                        'layout' => 'horizontal', // horizontal   ||   vertical
                        'choices' => array(
                            'info' => 'light',
                            'info_dark' => 'dark',
                        ),
                        'default_value' => 'light',
                        'return_format' => 'value',  // 'array' || 'label'
                    ),
                    array(
                        'key' => 'aside_title',
                        'label' => 'Title',
                        'name' => 'aside_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'aside_text',
                        'label' => 'Text',
                        'name' => 'aside_text',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'aside_btn_first_btn',
                        'label' => 'First button',
                        'name' => 'aside_btn_first_btn',
                        'type' => 'link',
                        'return_format' => 'array',
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'aside_btn_second_btn',
                        'label' => 'Second button',
                        'name' => 'aside_btn_second_btn',
                        'type' => 'link',
                        'return_format' => 'array',
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                ),
            ),
            // ------------------------------- mailto
            array (
                'key' => 'tab_logos',
                'label' => 'Logos', 
                'type' => 'tab',
            ),
            array(
                'key' => 'logos_list',
                'label' => 'Logos',
                'name' => 'logos_list',
                'type' => 'repeater',
                'layout' => 'block',  // 'block' || 'row' || 'table'
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'logos_img_id',
                        'label' => 'Logo',
                        'name' => 'logos_img_id',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'logos_img_url',
                        'label' => 'Url',
                        'name' => 'logos_img_url',
                        'type' => 'link',
                        'return_format' => 'url',  // 'array' || 'url'
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                ),
            ),
            // ------------------------------- mail_quiz
            array (
                'key' => 'tab_mail_quiz',
                'label' => 'Email quiz', 
                'type' => 'tab',
            ),
            array(
                'key' => 'mail_quiz_list',
                'label' => 'Email',
                'name' => 'mail_quiz_list',
                'type' => 'repeater',
                'layout' => 'block',  // 'block' || 'row' || 'table'
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'mail_quiz_to',
                        'label' => 'Email quiz',
                        'name' => 'mail_quiz_to',
                        'type' => 'email',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-global-content',
                )
            )
        ),
    ));
    // END GLOBAL CONTENT

    // BEGIN head section
    acf_add_local_field_group(array(
        'key' => 'acf_head_settings',
        'title' => 'Settings head',
        'fields' => array(
            // ------------------------------- tab_head_content
            array (
                'key' => 'tab_head_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'head_label',
                'label' => 'Label',
                'name' => 'head_label',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '100',
                ),
            ),
            array(
                'key' => 'head_title',
                'label' => 'Title',
                'name' => 'head_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'head_desc',
                'label' => 'Description',
                'name' => 'head_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'head_btn',
                'label' => 'Button',
                'name' => 'head_btn',
                'type' => 'link',
                'return_format' => 'array',
            ),
            array(
                'key' => 'head_scroll_text',
                'label' => 'Scroll text',
                'name' => 'head_scroll_text',
                'type' => 'text',
                'default_value' => 'Here’s an overview of the choices you’ll explore with your Lendevity advisor',
            ),
            // ------------------------------- tab_head_list
            array (
                'key' => 'tab_head_list',
                'label' => 'List', 
                'type' => 'tab',
            ),
            array(
                'key' => 'head_list',
                'label' => 'List',
                'name' => 'head_list',
                'type' => 'repeater',
                'layout' => 'block',  // 'block' || 'row' || 'table'
                'min' => 0,
                'max' => 6,
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'head_list_title',
                        'label' => 'Title',
                        'name' => 'head_list_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'head_list_text',
                        'label' => 'Text',
                        'name' => 'head_list_text',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                ),
            ),
        ),
        'menu_order' => 5,
    ));
    // END head section
    // ---------------------------------------------------------

    // BEGIN headAbout section
    acf_add_local_field_group(array(
        'key' => 'acf_headAbout_settings',
        'title' => 'Settings head',
        'fields' => array(
            // ------------------------------- tab_headAbout_content
            array (
                'key' => 'tab_headAbout_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'headAbout_label',
                'label' => 'Label',
                'name' => 'headAbout_label',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '100',
                ),
            ),
            array(
                'key' => 'headAbout_title',
                'label' => 'Title',
                'name' => 'headAbout_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'headAbout_desc',
                'label' => 'Description',
                'name' => 'headAbout_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'headAbout_btn',
                'label' => 'Button',
                'name' => 'headAbout_btn',
                'type' => 'link',
                'return_format' => 'array',
            ),
            // ------------------------------- tab_story
            array (
                'key' => 'tab_story',
                'label' => 'Story', 
                'type' => 'tab',
            ),
            array(
                'key' => 'story_top',
                'label' => 'Label',
                'name' => 'story_top',
                'type' => 'text',
            ),
            array(
                'key' => 'story_main',
                'label' => 'Content',
                'name' => 'story_main',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'story_img_id',
                'label' => 'Image',
                'name' => 'story_img_id',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'story_text_bold',
                'label' => 'Text bold',
                'name' => 'story_text_bold',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'story_text',
                'label' => 'Text',
                'name' => 'story_text',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                )
            ),
        ),
        'menu_order' => 5,
    ));
    // END headAbout section
    // ---------------------------------------------------------

    // BEGIN mediaSwiper section
    acf_add_local_field_group(array(
        'key' => 'acf_mediaSwiper_settings',
        'title' => 'Settings media-slider',
        'fields' => array(
            // ------------------------------- tab_mediaSwiper_content
            array (
                'key' => 'tab_mediaSwiper_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'mediaSwiper_boolean',
                'label' => 'Display section?',
                'name' => 'mediaSwiper_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'mediaSwiper_label',
                'label' => 'Label',
                'name' => 'mediaSwiper_label',
                'type' => 'text',
            ),
            array(
                'key' => 'mediaSwiper_title',
                'label' => 'Title',
                'name' => 'mediaSwiper_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'mediaSwiper_desc',
                'label' => 'Description',
                'name' => 'mediaSwiper_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'mediaSwiper_first_btn',
                'label' => 'First button',
                'name' => 'mediaSwiper_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'mediaSwiper_second_btn',
                'label' => 'Second button',
                'name' => 'mediaSwiper_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            // ------------------------------- tab_mediaSwiper_slider
            array (
                'key' => 'tab_mediaSwiper_slider',
                'label' => 'Slider', 
                'type' => 'tab',
            ),
            array(
                'key' => 'mediaSwiper_slider',
                'label' => 'Slider',
                'name' => 'mediaSwiper_slider',
                'type' => 'repeater',
                'layout' => 'block',  // 'block' || 'row' || 'table'
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'mediaSwiper_img_id',
                        'label' => 'Image',
                        'name' => 'mediaSwiper_img_id',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                        'required' => 1,
                        'wrapper' => array (
                            'width' => '33',
                        ),
                    ),
                    array(
                        'key' => 'mediaSwiper_text_bold',
                        'label' => 'Text bold',
                        'name' => 'mediaSwiper_text_bold',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => '33',
                        ),
                    ),
                    array(
                        'key' => 'mediaSwiper_text',
                        'label' => 'Text',
                        'name' => 'mediaSwiper_text',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => '33',
                        ),
                    ),
                ),
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
        'menu_order' => 10,
    ));
    // END mediaSwiper section
    // ---------------------------------------------------------

    // BEGIN media section
    acf_add_local_field_group(array(
        'key' => 'acf_media_settings',
        'title' => 'Settings media',
        'fields' => array(
            // ------------------------------- tab_media_content
            array (
                'key' => 'tab_media_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'media_boolean',
                'label' => 'Display section?',
                'name' => 'media_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'media_label',
                'label' => 'Label',
                'name' => 'media_label',
                'type' => 'text',
            ),
            array(
                'key' => 'media_title',
                'label' => 'Title',
                'name' => 'media_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'media_desc',
                'label' => 'Description',
                'name' => 'media_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'media_first_btn',
                'label' => 'First button',
                'name' => 'media_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'media_second_btn',
                'label' => 'Second button',
                'name' => 'media_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            // ------------------------------- tab_media_image
            array (
                'key' => 'tab_media_image',
                'label' => 'Image', 
                'type' => 'tab',
            ),
            array(
                'key' => 'media_img_id',
                'label' => 'Image',
                'name' => 'media_img_id',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'preview_size' => 'medium', // (thumbnail, medium, large, full or custom size)
                'wrapper' => array (
                    'width' => '100',
                ),
            ),
            array(
                'key' => 'media_text_bold',
                'label' => 'Text bold',
                'name' => 'media_text_bold',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'media_text',
                'label' => 'Text',
                'name' => 'media_text',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
        ),
        'menu_order' => 20,
    ));
    // END media section
    // ---------------------------------------------------------

    // BEGIN twins section
    acf_add_local_field_group(array(
        'key' => 'acf_twins_settings',
        'title' => 'Settings twins',
        'fields' => array(
            array(
                'key' => 'twins_boolean',
                'label' => 'Display section?',
                'name' => 'twins_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'twins_label',
                'label' => 'Label',
                'name' => 'twins_label',
                'type' => 'text',
            ),
            array(
                'key' => 'twins_title',
                'label' => 'Title',
                'name' => 'twins_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'twins_items',
                'label' => 'Items',
                'name' => 'twins_items',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add item',
                'max' => 2,
                'sub_fields' => array(
                    array(
                        'key' => 'twins_item_title',
                        'label' => 'Item title',
                        'name' => 'twins_item_title',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'twins_item_desc',
                        'label' => 'Item description',
                        'name' => 'twins_item_desc',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'twins_list',
                        'label' => 'Item list',
                        'name' => 'twins_list',
                        'type' => 'repeater',
                        'layout' => 'table',  // 'block' || 'row' || 'table'
                        'button_label' => 'Add row',
                        'wrapper' => array (
                            'width' => '100',
                        ),
                        'sub_fields' => array(
                            array(
                                'key' => 'twins_text_bold',
                                'label' => 'Text bold',
                                'name' => 'twins_text_bold',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'twins_text',
                                'label' => 'Text',
                                'name' => 'twins_text',
                                'type' => 'text',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'twins_item_btn',
                        'label' => 'Item button',
                        'name' => 'twins_item_btn',
                        'type' => 'link',
                        'return_format' => 'array',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                )
            ),
        ),
        'menu_order' => 30,
    ));
    // END twins section
    // ---------------------------------------------------------

    // BEGIN details section
    acf_add_local_field_group(array(
        'key' => 'acf_details_settings',
        'title' => 'Settings details',
        'fields' => array(
            array(
                'key' => 'details_boolean',
                'label' => 'Display section?',
                'name' => 'details_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'details_counter_radio',
                'label' => 'Counter',
                'name' => 'details_counter_radio',
                'type' => 'radio',
                'layout' => 'horizontal', // horizontal   ||   vertical
                'choices' => array(
                    'false' => 'No',   
                    'true' => 'Yes',
                ),
                'default_value' => 'false',
                'return_format' => 'value',  // 'array' || 'label'
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'details_label',
                'label' => 'Label',
                'name' => 'details_label',
                'type' => 'text',
            ),
            array(
                'key' => 'details_title',
                'label' => 'Title',
                'name' => 'details_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'details_desc',
                'label' => 'Description',
                'name' => 'details_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'details_items',
                'label' => 'Items',
                'name' => 'details_items',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add item',
                'sub_fields' => array(
                    array(
                        'key' => 'details_img_id',
                        'label' => 'Image',
                        'name' => 'details_img_id',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'details_counter_radio',
                                    'operator' => '==',
                                    'value' => 'false',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'details_subtitle',
                        'label' => 'Subtitle',
                        'name' => 'details_subtitle',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'details_content',
                        'label' => 'Content',
                        'name' => 'details_content',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
            array(
                'key' => 'details_first_btn',
                'label' => 'First button',
                'name' => 'details_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'details_second_btn',
                'label' => 'Second button',
                'name' => 'details_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                )
            ),
            // array(
            //     array(
            //         'param' => 'page_template',
            //         'operator' => '==',
            //         'value' => 'template-partners.php',
            //     ),
            // ),
        ),
        'menu_order' => 40,
    ));
    // END details section
    // ---------------------------------------------------------

    // BEGIN details-copy section
    acf_add_local_field_group(array(
        'key' => 'acf_details-copy_settings',
        'title' => 'Settings details-copy',
        'fields' => array(
            array(
                'key' => 'details-copy_boolean',
                'label' => 'Display section?',
                'name' => 'details-copy_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'details-copy_counter_radio',
                'label' => 'Counter',
                'name' => 'details-copy_counter_radio',
                'type' => 'radio',
                'layout' => 'horizontal', // horizontal   ||   vertical
                'choices' => array(
                    'false' => 'No',   
                    'true' => 'Yes',
                ),
                'default_value' => 'false',
                'return_format' => 'value',  // 'array' || 'label'
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'details-copy_label',
                'label' => 'Label',
                'name' => 'details-copy_label',
                'type' => 'text',
            ),
            array(
                'key' => 'details-copy_title',
                'label' => 'Title',
                'name' => 'details-copy_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'details-copy_desc',
                'label' => 'Description',
                'name' => 'details-copy_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'details-copy_items',
                'label' => 'Items',
                'name' => 'details-copy_items',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add item',
                'sub_fields' => array(
                    array(
                        'key' => 'details-copy_img_id',
                        'label' => 'Image',
                        'name' => 'details-copy_img_id',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'details-copy_counter_radio',
                                    'operator' => '==',
                                    'value' => 'false',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'details-copy_subtitle',
                        'label' => 'Subtitle',
                        'name' => 'details-copy_subtitle',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'details-copy_content',
                        'label' => 'Content',
                        'name' => 'details-copy_content',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
            array(
                'key' => 'details-copy_first_btn',
                'label' => 'First button',
                'name' => 'details-copy_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'details-copy_second_btn',
                'label' => 'Second button',
                'name' => 'details-copy_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                )
            ),
            // array(
            //     array(
            //         'param' => 'page_template',
            //         'operator' => '==',
            //         'value' => 'template-partners.php',
            //     ),
            // ),
        ),
        'menu_order' => 41,
    ));
    // END details-copy section
    // ---------------------------------------------------------

    // BEGIN logos section
    acf_add_local_field_group(array(
        'key' => 'acf_logos_settings',
        'title' => 'Settings logos',
        'fields' => array(
            array(
                'key' => 'logos_boolean',
                'label' => 'Display section?',
                'name' => 'logos_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-mortgage-calculator.php',
                ),
            ),
        ),
        'menu_order' => 50,
    ));
    // END logos section
    // ---------------------------------------------------------

    // BEGIN heading section
    acf_add_local_field_group(array(
        'key' => 'acf_heading_settings',
        'title' => 'Settings heading',
        'fields' => array(
            array(
                'key' => 'heading_boolean',
                'label' => 'Display section?',
                'name' => 'heading_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'heading_title',
                'label' => 'Title',
                'name' => 'heading_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),

            array(
                'key' => 'heading_first_btn',
                'label' => 'First button',
                'name' => 'heading_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'heading_second_btn',
                'label' => 'Second button',
                'name' => 'heading_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                )
            ),
        ),
        'menu_order' => 60,
    ));
    // END heading section
    // ---------------------------------------------------------

    // BEGIN steps section
    acf_add_local_field_group(array(
        'key' => 'acf_steps_settings',
        'title' => 'Settings steps',
        'fields' => array(
            // ------------------------------- tab_steps_content
            array (
                'key' => 'tab_steps_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'steps_boolean',
                'label' => 'Display section?',
                'name' => 'steps_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'steps_label',
                'label' => 'Label',
                'name' => 'steps_label',
                'type' => 'text',
            ),
            array(
                'key' => 'steps_title',
                'label' => 'Title',
                'name' => 'steps_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'steps_desc',
                'label' => 'Description',
                'name' => 'steps_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'steps_first_btn',
                'label' => 'First button',
                'name' => 'steps_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'steps_second_btn',
                'label' => 'Second button',
                'name' => 'steps_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            // ------------------------------- tab_steps_list
            array (
                'key' => 'tab_steps_list',
                'label' => 'Steps', 
                'type' => 'tab',
            ),
            array(
                'key' => 'steps_list',
                'label' => 'Step',
                'name' => 'steps_list',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add step',
                'sub_fields' => array(
                    array(
                        'key' => 'steps_list_title',
                        'label' => 'Step title',
                        'name' => 'steps_list_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'steps_list_desc',
                        'label' => 'Step description',
                        'name' => 'steps_list_desc',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                ),
            ),
        ),
        'menu_order' => 25,
    ));
    // END steps section
    // ---------------------------------------------------------

    // BEGIN steps-copy section
    acf_add_local_field_group(array(
        'key' => 'acf_steps-copy_settings',
        'title' => 'Settings steps-copy',
        'fields' => array(
            // ------------------------------- tab_steps-copy_content
            array (
                'key' => 'tab_steps-copy_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'steps-copy_boolean',
                'label' => 'Display section?',
                'name' => 'steps-copy_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'steps-copy_label',
                'label' => 'Label',
                'name' => 'steps-copy_label',
                'type' => 'text',
            ),
            array(
                'key' => 'steps-copy_title',
                'label' => 'Title',
                'name' => 'steps-copy_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'steps-copy_desc',
                'label' => 'Description',
                'name' => 'steps-copy_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'steps-copy_first_btn',
                'label' => 'First button',
                'name' => 'steps-copy_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'steps-copy_second_btn',
                'label' => 'Second button',
                'name' => 'steps-copy_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            // ------------------------------- tab_steps-copy_list
            array (
                'key' => 'tab_steps-copy_list',
                'label' => 'Steps', 
                'type' => 'tab',
            ),
            array(
                'key' => 'steps-copy_list',
                'label' => 'Step',
                'name' => 'steps-copy_list',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add step',
                'sub_fields' => array(
                    array(
                        'key' => 'steps-copy_list_title',
                        'label' => 'Step title',
                        'name' => 'steps-copy_list_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'steps-copy_list_desc',
                        'label' => 'Step description',
                        'name' => 'steps-copy_list_desc',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                )
            ),
            // array(
            //     array(
            //         'param' => 'page_template',
            //         'operator' => '==',
            //         'value' => 'template-servicepage.php',
            //     ),
            // ),
        ),
        'menu_order' => 26,
    ));
    // END steps-copy section
    // ---------------------------------------------------------
    
    // BEGIN testimonials section
    acf_add_local_field_group(array(
        'key' => 'acf_testimonials_settings',
        'title' => 'Settings testimonials',
        'fields' => array(
            array(
                'key' => 'testimonials_boolean',
                'label' => 'Display section?',
                'name' => 'testimonials_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'testimonials_label',
                'label' => 'Label',
                'name' => 'testimonials_label',
                'type' => 'text',
            ),
            array(
                'key' => 'testimonials_title',
                'label' => 'Title',
                'name' => 'testimonials_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'testimonials_desc',
                'label' => 'Description',
                'name' => 'testimonials_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'testimonials_relations',
                'label' => 'Select',
                'name' => 'testimonials_relations',
                'type' => 'post_object',
                'allow_null' => 1,
                'multiple' => 1,
                'return_format' => 'id',  // 'id' || 'object'
                'post_type' => 'testimonials',  // or array of post types e.g. ['post', 'page']
                'taxonomy' => '',  // or array of terms e.g. ['category:term-slug']
            ),
            array(
                'key' => 'testimonials_first_btn',
                'label' => 'First button',
                'name' => 'testimonials_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'testimonials_second_btn',
                'label' => 'Second button',
                'name' => 'testimonials_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                ),
            ),
        ),
        'menu_order' => 70,
    ));
    // END testimonials section
    // ---------------------------------------------------------

    // BEGIN fullvideo section
    acf_add_local_field_group(array(
        'key' => 'acf_fullvideo_settings',
        'title' => 'Settings video',
        'fields' => array(
            array(
                'key' => 'fullvideo_boolean',
                'label' => 'Display section?',
                'name' => 'fullvideo_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'fullvideo_short_video_id',
                'label' => 'Short video',
                'name' => 'fullvideo_short_video_id',
                'type' => 'file',
                'return_format' => 'id',
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'fullvideo_video_id',
                'label' => 'Full video',
                'name' => 'fullvideo_video_id',
                'type' => 'file',
                'return_format' => 'id',
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'fullvideo_poster_id',
                'label' => 'Poster',
                'name' => 'fullvideo_poster_id',
                'type' => 'image',
                'preview_size' => 'thumbnail',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'fullvideo_first_btn',
                'label' => 'First button',
                'name' => 'fullvideo_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'fullvideo_second_btn',
                'label' => 'Second button',
                'name' => 'fullvideo_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                ),
            ),
        ),
        'menu_order' => 80,
    ));
    // END fullvideo section
    // ---------------------------------------------------------

    // BEGIN team section
    acf_add_local_field_group(array(
        'key' => 'acf_team_settings',
        'title' => 'Settings team',
        'fields' => array(
            array(
                'key' => 'team_boolean',
                'label' => 'Display section?',
                'name' => 'team_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'team_label',
                'label' => 'Label',
                'name' => 'team_label',
                'type' => 'text',
            ),
            array(
                'key' => 'team_title',
                'label' => 'Title',
                'name' => 'team_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'team_relations',
                'label' => 'Select',
                'name' => 'team_relations',
                'type' => 'post_object',
                'allow_null' => 1,
                'multiple' => 1,
                'return_format' => 'id',  // 'id' || 'object'
                'post_type' => 'employees',  // or array of post types e.g. ['post', 'page']
                'taxonomy' => '',  // or array of terms e.g. ['category:term-slug']
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                )
            ),
            // array(
            //     array(
            //         'param' => 'page_template',
            //         'operator' => '==',
            //         'value' => 'template-servicepage.php',
            //     ),
            // ),
        ),
        'menu_order' => 21,
    ));
    // END team section
    // ---------------------------------------------------------

    // BEGIN blog_slider section
    acf_add_local_field_group(array(
        'key' => 'acf_blog_slider_settings',
        'title' => 'Settings blog slider',
        'fields' => array(
            array(
                'key' => 'blog_slider_boolean',
                'label' => 'Display section?',
                'name' => 'blog_slider_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
     
            array(
                'key' => 'blog_slider_title',
                'label' => 'Title',
                'name' => 'blog_slider_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
                'default_value' => 'Knowledge Base',
            ),
            array(
                'key' => 'blog_slider_relations',
                'label' => 'Select',
                'name' => 'blog_slider_relations',
                'type' => 'post_object',
                'allow_null' => 1,
                'multiple' => 1,
                'return_format' => 'id',  // 'id' || 'object'
                'post_type' => 'blog',  // or array of post types e.g. ['post', 'page']
                'taxonomy' => '',  // or array of terms e.g. ['category:term-slug']
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-mortgage-calculator.php',
                ),
            ),
        ),
        'menu_order' => 200,
    ));
    // END blog_slider section
    // ---------------------------------------------------------

    // BEGIN hscroll section
    acf_add_local_field_group(array(
        'key' => 'acf_hscroll_settings',
        'title' => 'Settings hscroll',
        'fields' => array(
            array(
                'key' => 'hscroll_boolean',
                'label' => 'Display section?',
                'name' => 'hscroll_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'hscroll_images',
                'label' => 'Images',
                'name' => 'hscroll_images',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'min' => 6,
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'hscroll_img_id',
                        'label' => 'Image',
                        'name' => 'hscroll_img_id',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
        ),
        'menu_order' => 7,
    ));
    // END hscroll section
    // ---------------------------------------------------------

    // BEGIN advantages section
    acf_add_local_field_group(array(
        'key' => 'acf_advantages_settings',
        'title' => 'Settings advantages',
        'fields' => array(
            // ------------------------------- tab_advantages_content
            array (
                'key' => 'tab_advantages_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'advantages_boolean',
                'label' => 'Display section?',
                'name' => 'advantages_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'advantages_label',
                'label' => 'Label',
                'name' => 'advantages_label',
                'type' => 'text',
            ),
            array(
                'key' => 'advantages_title',
                'label' => 'Title',
                'name' => 'advantages_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'advantages_desc',
                'label' => 'Description',
                'name' => 'advantages_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'advantages_first_btn',
                'label' => 'First button',
                'name' => 'advantages_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'advantages_second_btn',
                'label' => 'Second button',
                'name' => 'advantages_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            // ------------------------------- tab_advantages_list
            array (
                'key' => 'tab_advantages_list',
                'label' => 'List', 
                'type' => 'tab',
            ),
            array(
                'key' => 'advantages_list',
                'label' => 'List',
                'name' => 'advantages_list',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'advantages_list_img_id',
                        'label' => 'List image',
                        'name' => 'advantages_list_img_id',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                    ),
                    array(
                        'key' => 'advantages_list_item',
                        'label' => 'List title',
                        'name' => 'advantages_list_item',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'advantages_list_desc',
                        'label' => 'List description',
                        'name' => 'advantages_list_desc',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-homepage.php',
                )
            ),
        ),
        'menu_order' => 8,
    ));
    // END advantages section
    // ---------------------------------------------------------

    // BEGIN compare section
    acf_add_local_field_group(array(
        'key' => 'acf_compare_settings',
        'title' => 'Settings compare',
        'fields' => array(
            // ------------------------------- tab_compare_content
            array (
                'key' => 'tab_compare_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'compare_boolean',
                'label' => 'Display section?',
                'name' => 'compare_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'compare_label',
                'label' => 'Label',
                'name' => 'compare_label',
                'type' => 'text',
            ),
            array(
                'key' => 'compare_title',
                'label' => 'Title',
                'name' => 'compare_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'compare_img_id',
                'label' => 'Image',
                'name' => 'compare_img_id',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'preview_size' => 'medium', // (thumbnail, medium, large, full or custom size)
            ),
            array(
                'key' => 'compare_first_btn',
                'label' => 'First button',
                'name' => 'compare_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'compare_second_btn',
                'label' => 'Second button',
                'name' => 'compare_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            // ------------------------------- tab_table_content
            array (
                'key' => 'tab_table_content',
                'label' => 'Table', 
                'type' => 'tab',
            ),
            array(
                'key' => 'compare_table',
                'label' => 'Table',
                'name' => 'compare_table',
                'type' => 'repeater',
                'layout' => 'block',  // 'block' || 'row' || 'table'
                'button_label' => 'Add row',
                'sub_fields' => array(
                    array(
                        'key' => 'table_criteria',
                        'label' => 'Criteria',
                        'name' => 'table_criteria',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'table_img_id_d',
                        'label' => 'Image criteria desktop',
                        'name' => 'table_img_id_d',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                        'wrapper' => array (
                            'width' => '25',
                        ),
                    ),
                    array(
                        'key' => 'table_img_id_m',
                        'label' => 'Image criteria mobile',
                        'name' => 'table_img_id_m',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                        'wrapper' => array (
                            'width' => '25',
                        ),
                    ),
                    array(
                        'key' => 'table_lendevity',
                        'label' => 'Lendevity',
                        'name' => 'table_lendevity',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'table_direct_lender',
                        'label' => 'Direct Lender',
                        'name' => 'table_direct_lender',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-about.php',
                )
            ),
        ),
        'menu_order' => 190,
    ));
    // END compare section
    // ---------------------------------------------------------

    // BEGIN tabs section
    acf_add_local_field_group(array(
        'key' => 'acf_tabs_settings',
        'title' => 'Settings tabs',
        'fields' => array(
            // ------------------------------- tab_tabs_content
            array (
                'key' => 'tab_tabs_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'tabs_boolean',
                'label' => 'Display section?',
                'name' => 'tabs_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'tabs_title',
                'label' => 'Title',
                'name' => 'tabs_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'tabs_desc',
                'label' => 'Description',
                'name' => 'tabs_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'tabs_img_id',
                'label' => 'Image',
                'name' => 'tabs_img_id',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'preview_size' => 'medium', // (thumbnail, medium, large, full or custom size)
                'required' => 1,
                'wrapper' => array (
                    'width' => '20',
                ),
            ),
            array(
                'key' => 'tabs_title_image',
                'label' => 'Title (image)',
                'name' => 'tabs_title_image',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
                'required' => 0,
                'wrapper' => array (
                    'width' => '40',
                ),
            ),
            array(
                'key' => 'tabs_desc_image',
                'label' => 'Description (image)',
                'name' => 'tabs_desc_image',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
                'wrapper' => array (
                    'width' => '40',
                ),
            ),

            // ------------------------------- tab_tabs
            array (
                'key' => 'tab_tabs',
                'label' => 'Tabs', 
                'type' => 'tab',
            ),
            array(
                'key' => 'tabs_list',
                'label' => 'Tabs',
                'name' => 'tabs_list',
                'type' => 'repeater',
                'layout' => 'block',  // 'block' || 'row' || 'table'
                // 'min' => 0,
                // 'max' => 0,
                'button_label' => 'ADD TAB',
                'sub_fields' => array(
                    array(
                        'key' => 'tabs_tab_title',
                        'label' => 'Tab title',
                        'name' => 'tabs_tab_title',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'tabs_details_counter_radio',
                        'label' => 'Counter',
                        'name' => 'tabs_details_counter_radio',
                        'type' => 'radio',
                        'layout' => 'horizontal', // horizontal   ||   vertical
                        'choices' => array(
                            'false' => 'No',   
                            'true' => 'Yes',
                        ),
                        'default_value' => 'false',
                        'return_format' => 'value',  // 'array' || 'label'
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'tabs_details_items',
                        'label' => 'Items',
                        'name' => 'tabs_details_items',
                        'type' => 'repeater',
                        'layout' => 'row',  // 'block' || 'row' || 'table'
                        'button_label' => 'Add item',
                        'wrapper' => array (
                            'width' => '100',
                        ),
                        'sub_fields' => array(
                            array(
                                'key' => 'tabs_details_img_id',
                                'label' => 'Image',
                                'name' => 'tabs_details_img_id',
                                'type' => 'image',
                                'return_format' => 'id',  // 'id' || 'url' || 'array'
                                'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'tabs_details_counter_radio',
                                            'operator' => '==',
                                            'value' => 'false',
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'tabs_details_subtitle',
                                'label' => 'Subtitle',
                                'name' => 'tabs_details_subtitle',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'tabs_details_content',
                                'label' => 'Content',
                                'name' => 'tabs_details_content',
                                'type' => 'wysiwyg',
                                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                                'toolbar' => 'full',  // 'basic' \\ 'full'
                                'media_upload' => 0,
                                'delay' => 0,
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                )
            ),
            // array(
            //     array(
            //         'param' => 'page_template',
            //         'operator' => '==',
            //         'value' => 'template-servicepage.php',
            //     ),
            // ),
        ),
        'menu_order' => 5,
    ));
    // END tabs section
    // ---------------------------------------------------------

    // BEGIN img_grid section
    acf_add_local_field_group(array(
        'key' => 'acf_img_grid_settings',
        'title' => 'Settings img-grid',
        'fields' => array(
            // ------------------------------- tab_img_grid_content
            array (
                'key' => 'tab_img_grid_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'img_grid_boolean',
                'label' => 'Display section?',
                'name' => 'img_grid_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'img_grid_img_id',
                'label' => 'Image',
                'name' => 'img_grid_img_id',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'preview_size' => 'medium', // (thumbnail, medium, large, full or custom size)
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'img_grid_title',
                'label' => 'Title',
                'name' => 'img_grid_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'img_grid_first_btn',
                'label' => 'First button',
                'name' => 'img_grid_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'img_grid_second_btn',
                'label' => 'Second button',
                'name' => 'img_grid_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            // ------------------------------- tab_img_grid
            array (
                'key' => 'tab_img_grid',
                'label' => 'Grid', 
                'type' => 'tab',
            ),
            array(
                'key' => 'img_grid_list',
                'label' => 'List',
                'name' => 'img_grid_list',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'img_grid_list_title',
                        'label' => 'List item',
                        'name' => 'img_grid_list_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'img_grid_list_desc',
                        'label' => 'Description',
                        'name' => 'img_grid_list_desc',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                )
            ),
            // array(
            //     array(
            //         'param' => 'page_template',
            //         'operator' => '==',
            //         'value' => 'template-servicepage.php',
            //     ),
            // ),
        ),
        'menu_order' => 51,
    ));
    // END img_grid section
    // ---------------------------------------------------------

    // BEGIN text_grid section
    acf_add_local_field_group(array(
        'key' => 'acf_text_grid_settings',
        'title' => 'Settings text-grid',
        'fields' => array(
            // ------------------------------- tab_text_grid_content
            array (
                'key' => 'tab_text_grid_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'text_grid_boolean',
                'label' => 'Display section?',
                'name' => 'text_grid_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'text_grid_title',
                'label' => 'Title',
                'name' => 'text_grid_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'text_grid_desc',
                'label' => 'Description',
                'name' => 'text_grid_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            // ------------------------------- tab_text_grid
            array (
                'key' => 'tab_text_grid',
                'label' => 'Grid', 
                'type' => 'tab',
            ),
            array(
                'key' => 'text_grid_list',
                'label' => 'Grid',
                'name' => 'text_grid_list',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'text_grid_img_id',
                        'label' => 'Image',
                        'name' => 'text_grid_img_id',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                    ),
                    array(
                        'key' => 'text_grid_subtitle',
                        'label' => 'Title',
                        'name' => 'text_grid_subtitle',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'text_grid_content',
                        'label' => 'Content',
                        'name' => 'text_grid_content',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                )
            ),
        ),
        'menu_order' => 60,
    ));
    // END text_grid section
    // ---------------------------------------------------------

    // BEGIN accent section
    acf_add_local_field_group(array(
        'key' => 'acf_accent_settings',
        'title' => 'Settings accent',
        'fields' => array(
            // ------------------------------- tab_accent_content
            array (
                'key' => 'tab_accent_content',
                'label' => 'Content', 
                'type' => 'tab',
            ),
            array(
                'key' => 'accent_boolean',
                'label' => 'Display section?',
                'name' => 'accent_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'accent_img_id',
                'label' => 'Image',
                'name' => 'accent_img_id',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'preview_size' => 'medium', // (thumbnail, medium, large, full or custom size)
            ),
            array(
                'key' => 'accent_title',
                'label' => 'Title',
                'name' => 'accent_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),
            array(
                'key' => 'accent_desc',
                'label' => 'Description',
                'name' => 'accent_desc',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            // ------------------------------- tab_accent_cols
            array (
                'key' => 'tab_accent_cols',
                'label' => 'Cols', 
                'type' => 'tab',
            ),
            array(
                'key' => 'accent_row',
                'label' => 'Cols',
                'name' => 'accent_row',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add col',
                'sub_fields' => array(
                    array(
                        'key' => 'accent_col_title',
                        'label' => 'Col title',
                        'name' => 'accent_col_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'accent_col_content',
                        'label' => 'Content',
                        'name' => 'accent_col_content',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'accent_logos',
                        'label' => 'Logos',
                        'name' => 'accent_logos',
                        'type' => 'repeater',
                        'layout' => 'block',  // 'block' || 'row' || 'table'
                        'button_label' => 'Add logo',
                        'sub_fields' => array(
                            array(
                                'key' => 'accent_logo_img_id',
                                'label' => 'Image',
                                'name' => 'accent_logo_img_id',
                                'type' => 'image',
                                'return_format' => 'id',  // 'id' || 'url' || 'array'
                                'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                            ),

                        ),
                    ),
                ),
            ),
            // ------------------------------- tab_accent_grid
            array (
                'key' => 'tab_accent_grid',
                'label' => 'Grid', 
                'type' => 'tab',
            ),
            array(
                'key' => 'accent_grid',
                'label' => 'Grid',
                'name' => 'accent_grid',
                'type' => 'repeater',
                'layout' => 'block',  // 'block' || 'row' || 'table'
                'button_label' => 'Add item',
                'sub_fields' => array(
                    array(
                        'key' => 'accent_item_title',
                        'label' => 'Tittle',
                        'name' => 'accent_item_title',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'accent_item_desc',
                        'label' => 'Description',
                        'name' => 'accent_item_desc',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => '50',
                        ),
                    ),
                ),
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                )
            ),
        ),
        'menu_order' => 70,
    ));
    // END accent section
    // ---------------------------------------------------------

    // BEGIN offers section
    acf_add_local_field_group(array(
        'key' => 'acf_offers_settings',
        'title' => 'Settings offers',
        'fields' => array(
            array(
                'key' => 'offers_boolean',
                'label' => 'Display section?',
                'name' => 'offers_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'offers_title',
                'label' => 'Title',
                'name' => 'offers_title',
                'type' => 'text',
            ),
            array(
                'key' => 'offers_list',
                'label' => 'List',
                'name' => 'offers_list',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add',
                'sub_fields' => array(
                    array(
                        'key' => 'offers_list_title',
                        'label' => 'List title',
                        'name' => 'offers_list_title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'offers_list_subtitle',
                        'label' => 'List subtitle',
                        'name' => 'offers_list_subtitle',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'offers_list_content',
                        'label' => 'List content',
                        'name' => 'offers_list_content',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                )
            ),
        ),
        'menu_order' => 80,
    ));
    // END offers section
    // ---------------------------------------------------------

    // BEGIN feedback section
    acf_add_local_field_group(array(
        'key' => 'acf_feedback_settings',
        'title' => 'Settings feedback',
        'fields' => array(
            array(
                'key' => 'feedback_boolean',
                'label' => 'Display section?',
                'name' => 'feedback_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'feedback_title',
                'label' => 'Title',
                'name' => 'feedback_title',
                'type' => 'text',
                'instructions' => 'Add a <b>br</b> tag to break text on a new line',
            ),

            array(
                'key' => 'feedback_list',
                'label' => 'List',
                'name' => 'feedback_list',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add item',
                'sub_fields' => array(
                    array(
                        'key' => 'feedback_img_id',
                        'label' => 'Image',
                        'name' => 'feedback_img_id',
                        'type' => 'image',
                        'return_format' => 'id',  // 'id' || 'url' || 'array'
                        'preview_size' => 'thumbnail', // (thumbnail, medium, large, full or custom size)
                    ),
                    array(
                        'key' => 'feedback_link',
                        'label' => 'Link',
                        'name' => 'feedback_link',
                        'type' => 'link',
                        'return_format' => 'array',  // 'array' || 'url'
                        'instructions' => 'For phone, add tel:number, for mail add mailto:email',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-partners.php',
                )
            ),
            // array(
            //     array(
            //         'param' => 'page_template',
            //         'operator' => '==',
            //         'value' => 'template-servicepage.php',
            //     ),
            // ),
        ),
        'menu_order' => 90,
    ));
    // END feedback section
    // ---------------------------------------------------------

    // BEGIN thank section
    acf_add_local_field_group(array(
        'key' => 'acf_thank_settings',
        'title' => 'Settings thank',
        'fields' => array(
            array(
                'key' => 'thank_img_id',
                'label' => 'Image',
                'name' => 'thank_img_id',
                'type' => 'image',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'preview_size' => 'medium', // (thumbnail, medium, large, full or custom size)
            ),
            array(
                'key' => 'thank_title',
                'label' => 'Title',
                'name' => 'thank_title',
                'type' => 'text',
            ),
            array(
                'key' => 'thank_desc',
                'label' => 'Description',
                'name' => 'thank_desc',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-thank.php',
                )
            ),

        ),
        'menu_order' => 200,
    ));
    // END thank section
    // ---------------------------------------------------------

    // BEGIN faq
    acf_add_local_field_group(array(
        'key' => 'acf_faq_settings',
        'title' => 'Settings faq',
        'fields' => array(
            array(
                'key' => 'faq_boolean',
                'label' => 'Display section?',
                'name' => 'faq_boolean',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'faq_list',
                'label' => 'List faq',
                'name' => 'faq_list',
                'type' => 'repeater',
                'layout' => 'row',  // 'block' || 'row' || 'table'
                'button_label' => 'Add item',
                'sub_fields' => array(
                    array(
                        'key' => 'faq_question',
                        'label' => 'Question',
                        'name' => 'faq_question',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'faq_answer',
                        'label' => 'Answer',
                        'name' => 'faq_answer',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',  // 'visual' || 'text' || 'all'
                        'toolbar' => 'full',  // 'basic' \\ 'full'
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-mortgage-calculator.php',
                )
            ),
            // array(
            //     array(
            //         'param' => 'page_template',
            //         'operator' => '==',
            //         'value' => 'template-servicepage.php',
            //     ),
            // ),
        ),
        'menu_order' => 100,
    ));
    // END faq
    // ---------------------------------------------------------

    // BEGIN mortgageCalculator section
    acf_add_local_field_group(array(
        'key' => 'acf_mortgageCalculator_settings',
        'title' => 'Settings mortgage сalculator',
        'fields' => array(
            array(
                'key' => 'mortgageCalculator_top_content',
                'label' => 'Top content',
                'name' => 'mortgageCalculator_top_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'mortgageCalculator_first_btn',
                'label' => 'First button',
                'name' => 'mortgageCalculator_first_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'mortgageCalculator_second_btn',
                'label' => 'Second button',
                'name' => 'mortgageCalculator_second_btn',
                'type' => 'link',
                'return_format' => 'array',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'mortgageCalculator_left_content',
                'label' => 'Left content',
                'name' => 'mortgageCalculator_left_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'mortgageCalculator_right_content',
                'label' => 'Right content',
                'name' => 'mortgageCalculator_right_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-mortgage-calculator.php',
                )
            ),
        ),
        'menu_order' => 20,
    ));
    // END mortgageCalculator section
    // ---------------------------------------------------------
    

    // ********************* start POST TYPE *********************
    
    // BEGIN POST TYPE employees_pt
    acf_add_local_field_group(array(
        'key' => 'acf_employees_pt_settings',
        'title' => 'Team settings',
        'fields' => array(
            array(
                'key' => 'employees_pt_img_id',
                'label' => 'Image',
                'name' => 'employees_pt_img_id',
                'type' => 'image',
                'preview_size' => 'thumbnail',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'required' => 1,
                'wrapper' => array (
                    'width' => '100',
                ),
            ),
            array(
                'key' => 'employees_pt_name',
                'label' => 'Name',
                'name' => 'employees_pt_name',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'employees_pt_status',
                'label' => 'Status',
                'name' => 'employees_pt_status',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'employees_pt_phone',
                'label' => 'Phone (direct)',
                'name' => 'employees_pt_phone',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'employees_pt_phone_2',
                'label' => 'Phone (cell)',
                'name' => 'employees_pt_phone_2',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),
            array(
                'key' => 'employees_pt_email',
                'label' => 'Email',
                'name' => 'employees_pt_email',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'employees',
                )
            ),
        ),
        'menu_order' => 1,
    ));
    // END POST TYPE employees_pt

    // BEGIN POST TYPE testimonials_pt
    acf_add_local_field_group(array(
        'key' => 'acf_testimonials_pt_settings',
        'title' => 'Testimonials settings',
        'fields' => array(
            array(
                'key' => 'testimonials_pt_short_video_id',
                'label' => 'Short video',
                'name' => 'testimonials_pt_short_video_id',
                'type' => 'file',
                'return_format' => 'id',
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'testimonials_pt_video_id',
                'label' => 'Full video',
                'name' => 'testimonials_pt_video_id',
                'type' => 'file',
                'return_format' => 'id',
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'testimonials_pt_poster_id',
                'label' => 'Poster',
                'name' => 'testimonials_pt_poster_id',
                'type' => 'image',
                'preview_size' => 'thumbnail',
                'return_format' => 'id',  // 'id' || 'url' || 'array'
                'wrapper' => array (
                    'width' => '33',
                ),
            ),
            array(
                'key' => 'testimonials_pt_content',
                'label' => 'Content',
                'name' => 'testimonials_pt_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',  // 'visual' || 'text' || 'all'
                'toolbar' => 'full',  // 'basic' \\ 'full'
                'media_upload' => 0,
                'delay' => 0,
            ),
            array(
                'key' => 'testimonials_pt_text',
                'label' => 'Text',
                'name' => 'testimonials_pt_text',
                'type' => 'text',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'testimonials',
                )
            ),
        ),
        'menu_order' => 1,
    ));
    // END POST TYPE testimonials_pt

    
    // ********************* start SORT SECTIONS *********************

    acf_add_local_field_group( array(
        'key' => 'acf_sort_sections_servicepage',
        'title' => 'SORT SECTIONS SERVICE PAGE',
        'fields' => array(
            array(
                'key' => 'template_servicepage_sort',
                'label' => 'SORT SECTIONS SERVICE PAGE',
                'name' => 'template_servicepage_sort',
                'type' => 'flexible_content',
                'wrapper' => array(
                    'class' => 'sort_sections_page',
                ),
                'layouts' => array(
                    'media-swiper' => array(
                        'key' => 'media-swiper',
                        'name' => 'media-swiper',
                        'label' => 'Media swiper',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'media' => array(
                        'key' => 'media',
                        'name' => 'media',
                        'label' => 'Media',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'twins' => array(
                        'key' => 'twins',
                        'name' => 'twins',
                        'label' => 'Twins',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'details' => array(
                        'key' => 'details',
                        'name' => 'details',
                        'label' => 'Details',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'details-copy' => array(
                        'key' => 'details-copy',
                        'name' => 'details-copy',
                        'label' => 'Details-copy',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'testimonials' => array(
                        'key' => 'testimonials',
                        'name' => 'testimonials',
                        'label' => 'Testimonials',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'logos' => array(
                        'key' => 'logos',
                        'name' => 'logos',
                        'label' => 'Logos',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'heading' => array(
                        'key' => 'heading',
                        'name' => 'heading',
                        'label' => 'Heading',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'blog-slider' => array(
                        'key' => 'blog-slider',
                        'name' => 'blog-slider',
                        'label' => 'Blog slider',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'steps' => array(
                        'key' => 'steps',
                        'name' => 'steps',
                        'label' => 'Steps',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    'fullvideo' => array(
                        'key' => 'fullvideo',
                        'name' => 'fullvideo',
                        'label' => 'Full video',
                        'sub_fields' => array(),
                        'max' => '1',
                    ),
                    // 'TEST' => array(
                    //     'key' => 'TEST',
                    //     'name' => 'TEST',
                    //     'label' => 'TEST',
                    //     'sub_fields' => array(),
                    //     'max' => '1',
                    // ),
                ),
                'button_label' => 'Add section',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'template-servicepage.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'active' => true,
        'description' => ' description description',
        'show_in_rest' => 0,
    ) );

    // ********************* end SORT SECTIONS *********************

}
add_action('acf/init', 'my_template_acf_mataboxes');

// https://awhitepixel.com/blog/advanced-custom-fields-complete-reference-adding-fields-groups-by-code/
