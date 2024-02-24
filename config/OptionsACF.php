<?php
// Register ACF Options Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Spaci Bau Options',
        'menu_title'    => 'Spaci Bau Options',
        'menu_slug'     => 'spaci-bau-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Define ACF Field Group for Theme Options
acf_add_local_field_group(array(
    'key' => 'group_theme_options',
    'title' => 'Spaci Bau Options',
    'fields' => array(
        array(
            'key' => 'field_custom_website_name',
            'label' => 'Site Title',
            'name' => 'site_title',
            'type' => 'text',
            'wrapper' => array(
                'width' => '50%',
            ),
        ),
        array(
            'key' => 'field_custom_website_logo',
            'label' => 'Site Logo',
            'name' => 'website_logo',
            'type' => 'image',
            'return_format' => 'url',
            'wrapper' => array(
                'width' => '50%',
            ),
        ),
        // Add more fields for theme options as needed
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'spaci-bau-options',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));

// Define ACF Field Group for Theme Options
acf_add_local_field_group(array(
    'key' => 'field_contact_details',
    'title' => 'Contact Details',
    'fields' => array(
        array(
            'key' => 'field_contact_details_group',
            'label' => 'Contact Details Group',
            'name' => 'contact_details_group',
            'type' => 'group',
            'layout' => 'row', // Set the layout to 'row'
            'sub_fields' => array(
                array(
                    'key' => 'field_custom_website_phone_no',
                    'label' => 'Phone Number',
                    'name' => 'website_phone_no',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_custom_website_whatsapp_text',
                    'label' => 'Whatsapp Text',
                    'description' => "This text will be visible in home page.",
                    'name' => 'website_wh_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_custom_website_email',
                    'label' => 'Site Email',
                    'name' => 'website_email',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_custom_website_adress',
                    'label' => 'Company Adress',
                    'name' => 'company_adress',
                    'type' => 'text',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'spaci-bau-options',
            ),
        ),
    ),
    'menu_order' => 2,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));


// Define ACF Field Group for Services
acf_add_local_field_group(array(
    'key' => 'group_services',
    'title' => 'Services',
    'fields' => array(
        array(
            'key' => 'field_service_main_title', // Service Main Title field
            'label' => 'Service Main Title',
            'name' => 'service_main_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_main_content', // Service Main Content field
            'label' => 'Service Main Content',
            'name' => 'service_main_content',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_services',
            'label' => 'Services',
            'name' => 'services',
            'type' => 'repeater',
            'layout' => 'table', // Change layout to 'table'
            'sub_fields' => array(
                array(
                    'key' => 'field_service_title',
                    'label' => 'Title',
                    'name' => 'service_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_description',
                    'label' => 'Description',
                    'name' => 'service_description',
                    'type' => 'wysiwyg', // Use 'wysiwyg' for a rich text editor
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'spaci-bau-options',
            ),
        ),
    ),
    'menu_order' => 3, 
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));

// Define ACF Field Group for Theme Options
acf_add_local_field_group(array(
    'key' => 'field_social_media',
    'title' => 'Social Media',
    'fields' => array(
        array(
            'key' => 'field_social_media_group',
            'label' => 'Social Media Group',
            'name' => 'social_media_group',
            'type' => 'group',
            'layout' => 'table', 
            'sub_fields' => array(
                array(
                    'key' => 'field_custom_website_instagram',
                    'label' => 'Instagram Link',
                    'placeholder' => 'www.instagram.com',
                    'default_value' => 'www.instagram.com',
                    'name' => 'website_instagram_link',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_custom_website_facebook_link',
                    'label' => 'Facebook Link',
                    'placeholder' => 'www.facebook.com',
                    'default_value' => 'www.facebook.com',
                    'name' => 'website_facebook_link',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_custom_website_youtube_link',
                    'label' => 'Youtube Link',
                    'placeholder' => 'www.youtube.com',
                    'default_value' => 'www.youtube.com',
                    'name' => 'website_youtube_link',
                    'type' => 'text',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'spaci-bau-options',
            ),
        ),
    ),
    'menu_order' => 4,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => '',
));