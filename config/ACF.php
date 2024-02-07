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
                            'name' => 'cards_module',
                            'label' => 'Cards Module',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_post_type',
                                    'label' => 'Post Type',
                                    'name' => 'post_type',
                                    'type' => 'select', // Select field for choosing post type
                                    'choices' => array('member' => 'Member', 'product' => 'Product', 'post' => 'Post', 'page' => 'Page'),
                                    'wrapper' => array(
                                        'width' => '50%', // Set the width to 50%
                                    ),
                                ),
                                array(
                                    'key' => 'field_category',
                                    'label' => 'Category',
                                    'name' => 'category',
                                    'type' => 'select', // Select field for choosing category
                                    'choices' => array(), // Leave empty for now
                                    'wrapper' => array(
                                        'width' => '50%', // Set the width to 50%
                                    ),
                                ),
                                array(
                                    'key' => 'field_card_title',
                                    'label' => 'Card Title',
                                    'name' => 'card_title',
                                    'type' => 'text', // Text field for entering card title
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
            $options .= '<option value="' . $category->term_id . '" ' . $isSelected . '>' . $category->name . '</option>';
        }

        // Output the options as a string
        echo $options;
    }

    wp_die();
}



add_action('wp_ajax_get_categories_for_post_type', 'get_categories_for_post_type');
add_action('wp_ajax_nopriv_get_categories_for_post_type', 'get_categories_for_post_type');

?>
