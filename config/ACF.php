<?php

// Add flexible content field programmatically
function add_custom_flexible_content_field() {
    if (function_exists('acf_add_local_field_group')) :

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
                                    'key' => 'field_slider_data', // Repeater field for slider images
                                    'label' => 'Slider Images',
                                    'name' => 'slider_data',
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
                                        ),
                                        array(
                                            'key' => 'field_slider_text_container',
                                            'label' => 'Show container',
                                            'name' => 'text_container',
                                            'type' => 'true_false', 
                                            'choices' => array(
                                                1 => 'Show container', 
                                            ),
                                            'default_value' => 0, 
                                            'layout' => 'horizontal',
                                            'wrapper' => array(
                                                'width' => '33%', 
                                            ),
                                        ),
                                        array(
                                            'key' => 'field_slider_text_tab',
                                            'label' => 'Place Container in:',
                                            'name' => 'container_position',
                                            'type' => 'button_group', // Use button_group field type
                                            'choices' => array(
                                                'left' => 'Left',
                                                'middle' => 'Middle',
                                                'right' => 'Right',
                                            ),
                                            'conditional_logic' => array(
                                                array(
                                                    array(
                                                        'field' => 'field_slider_text_container',
                                                        'operator' => '==',
                                                        'value' => '1', 
                                                    ),
                                                ),
                                            ),
                                            'wrapper' => array(
                                                'width' => '33%',
                                            ),
                                        ),
                                        array(
                                            'key' => 'field_slider_container_color',
                                            'label' => 'Container Background Color',
                                            'name' => 'container_bg_color',
                                            'type' => 'color_picker',
                                            'return_format' => 'rgba',
                                            'conditional_logic' => array(
                                                array(
                                                    array(
                                                        'field' => 'field_slider_text_container',
                                                        'operator' => '==',
                                                        'value' => '1', 
                                                    ),
                                                ),
                                            ),
                                            'wrapper' => array(
                                                'width' => '33%', 
                                            ),
                                        ),
                                        array(
                                            'key' => 'field_slider_text_editor',
                                            'label' => 'Container text',
                                            'name' => 'container_text',
                                            'type' => 'wysiwyg',
                                            'conditional_logic' => array(
                                                array(
                                                    array(
                                                        'field' => 'field_slider_text_container',
                                                        'operator' => '==',
                                                        'value' => '1', 
                                                    ),
                                                ),
                                            ),
                                            'wrapper' => array(
                                                'width' => '100%', 
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name' => 'cards_module',
                            'label' => 'Cards Module',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_post_type',
                                    'label' => 'Post Type',
                                    'name' => 'post_type',
                                    'type' => 'select', // Select field for choosing post type
                                    'default'=> 'page',
                                    'choices' => array('member' => 'Member', 'product' => 'Product', 'post' => 'Post', 'page' => 'Page'),
                                    'wrapper' => array(
                                        'width' => '40%', 
                                    ),
                                ),
                                array(
                                    'key' => 'field_category_all',
                                    'label' => 'Select All Categories',
                                    'name' => 'category_all',
                                    'type' => 'true_false', // Use true/false field for on/off option
                                    'default_value' => 1, // Default value is true (checked)
                                    'wrapper' => array(
                                        'width' => '20%',
                                    ),
                                ),
                                array(
                                    'key' => 'field_category',
                                    'label' => 'Category',
                                    'name' => 'category',
                                    'type' => 'select', 
                                    'choices' => array(),
                                    'conditional_logic' => array(
                                        array(
                                            array(
                                                'field' => 'field_category_all',
                                                'operator' => '==',
                                                'value' => '0', 
                                            ),
                                        ),
                                    ),
                                    'wrapper' => array(
                                        'width' => '40%', 
                                    ),
                                ),
                                array(
                                    'key' => 'field_card_title',
                                    'label' => 'Card Title',
                                    'name' => 'card_title',
                                    'type' => 'text',
                                    'wrapper' => array(
                                        'width' => '50%', 
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name' => 'service_module',
                            'label' => 'Services',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_service_main_title', // Service Main Title field
                                    'label' => 'Service Main Title',
                                    'name' => 'service_main_title',
                                    'type' => 'text',
                                    'wrapper' => array(
                                        'width' => '50%', 
                                    ),
                                ),
                                array(
                                    'key' => 'field_service_main_content', // Service Main Content field
                                    'label' => 'Service Main Content',
                                    'name' => 'service_main_content',
                                    'type' => 'wysiwyg',
                                    'wrapper' => array(
                                        'width' => '50%', 
                                    ),
                                ),
                                array(
                                    'key' => 'field_services', // Repeater field for slider images
                                    'label' => 'Services',
                                    'name' => 'services',
                                    'type' => 'repeater',
                                    'min' => 1, // Minimum rows allowed (optional)
                                    'layout' => 'block', // Set layout to 'block' for a more visually appealing display
                                    'button_label' => 'Add Services', 
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'field_service_title45123',
                                            'label' => 'Single Service Title',
                                            'name' => 'single_service_title',
                                            'type' => 'text',
                                            'wrapper' => array(
                                                'width' => '50%', 
                                            ),
                                        ),
                                        array(
                                            'key' => 'field_service_image192', 
                                            'label' => 'Single Service Image',
                                            'name' => 'single_service_image',
                                            'type' => 'image',
                                            'wrapper' => array(
                                                'width' => '50%',
                                            ),
                                        ),
                                        array(
                                            'key' => 'field_service_content223', 
                                            'label' => 'Single Service Content',
                                            'name' => 'single_service_content',
                                            'type' => 'wysiwyg',
                                            'wrapper' => array(
                                                'width' => '100%',
                                            ),
                                        ),
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

// Add JavaScript to handle category population based on post type selection
function custom_acf_admin_footer() {
    ?>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                // Event listener for changes in the post type select field
                $('#acf-field_1-row-1-field_post_type').on('change', function() {
                    var postType = $(this).val();
                    var $categoryField = $('#acf-field_1-row-1-field_category');
                    var selectedCategory = $categoryField.val(); // Get currently selected category

                    // Make AJAX request to fetch categories for the selected post type
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'get_categories_for_post_type',
                            post_type: postType,
                            selected_category: selectedCategory // Pass currently selected category
                        },
                        success: function(response) {
                            // Populate category select field with fetched categories
                            $categoryField.empty().html(response);

                            // Set the selected category if it was previously selected
                            $categoryField.val(selectedCategory);

                            // Add 'selected' attribute to the selected option
                            $categoryField.find('option[value="' + selectedCategory + '"]').attr('selected', 'selected');
                        }
                    });
                });

                // Event listener for changes in the category select field
                $('#acf-field_1-row-1-field_category').on('change', function() {
                    // Add 'selected' attribute to the selected option
                    $(this).find('option:selected').attr('selected', 'selected');
                });
            });
        })(jQuery);
    </script>
    <?php
}


add_action('acf/input/admin_footer', 'custom_acf_admin_footer');

// AJAX handler to fetch categories for the selected post type
function get_categories_for_post_type() {
    $postType = isset($_POST['post_type']) ? $_POST['post_type'] : '';
    $selectedCategory = isset($_POST['selected_category']) ? $_POST['selected_category'] : '';

    if (!empty($postType)) {
        // Define the taxonomy name based on the selected post type
        $taxonomy = ($postType == 'product') ? 'product_category' : 'category';

        // Fetch categories for the selected post type
        $categories = get_categories(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ));

        // Generate options for the select field as a string
        $options = '';
        foreach ($categories as $category) {
            $isSelected = ($category->term_id == $selectedCategory) ? 'selected' : ''; // Check if category is selected
            $options .= '<option value="' . $category->name . '" ' . $isSelected . '>' . $category->name . '</option>';
        }

        // Output the options as a string
        echo $options;
    }

    wp_die();
}



add_action('wp_ajax_get_categories_for_post_type', 'get_categories_for_post_type');
add_action('wp_ajax_nopriv_get_categories_for_post_type', 'get_categories_for_post_type');

?>

