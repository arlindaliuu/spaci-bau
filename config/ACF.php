<?php 

// Add flexible content field programmatically
function add_custom_flexible_content_field() {
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_1', // Replace 'group_1' with a unique key for your field group
            'title' => 'Flexible Content',
            'fields' => array(
                array(
                    'key' => 'field_1', // Replace 'field_1' with a unique key for your flexible content field
                    'label' => 'Flexible Content',
                    'name' => 'flexible_content_field_name',
                    'type' => 'flexible_content',
                    'layouts' => array(
                        array(
                            'name' => 'slider_module',
                            'label' => 'Slider',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_slider_images', // Repeater field for slider images
                                    'label' => 'Slider Images',
                                    'name' => 'slider_images',
                                    'type' => 'repeater',
                                    'min' => 1, // Minimum rows allowed (optional)
                                    'layout' => 'block', // Set layout to 'block' for a more visually appealing display
                                    'button_label' => 'Add Slider', // Custom button label (optional)
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'field_image_name', // Sub field for image name
                                            'label' => 'Image Name',
                                            'name' => 'image_name',
                                            'type' => 'text',
                                            'wrapper' => array(
                                                'width' => '50%', // Set the width to 50%
                                            ),
                                        ),
                                        array(
                                            'key' => 'field_slider_image', // Sub field for slider image
                                            'label' => 'Slider Image',
                                            'name' => 'slider_image',
                                            'type' => 'image',
                                            'wrapper' => array(
                                                'width' => '50%', // Set the width to 50%
                                            ),
                                        )
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name' => 'layout2',
                            'label' => 'Layout 2',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_layout2_image_name',
                                    'label' => 'Image Name',
                                    'name' => 'image_name2',
                                    'type' => 'text',
                                    'wrapper' => array(
                                        'width' => '50%', // Set the width to 50%
                                    ),
                                ),
                            ),
                        ),
                        // Add more layouts as needed
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page', // Adjust post type if needed
                    ),
                ),
            ),
        ));
        
    endif;
}

// Hook to add custom flexible content field
add_action('acf/init', 'add_custom_flexible_content_field');

?>
