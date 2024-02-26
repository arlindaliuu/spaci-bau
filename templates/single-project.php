<?php
/*
 * Template Name: Project
 */
get_header(); ?>
<div id="loader">
  <div class="battery-container">
    <div class="battery-fill" id="battery-fill"></div>
  </div>
  <div class="battery-text">Wird geladen...</div>
</div>
<div id="content" class="content-loaded" style="display: none;">
    <?php    
        if (have_posts()) {
            while (have_posts()) {
                aa_insert_views_post(get_the_ID());
                the_post();
                ?>
                <div class="max-h-[400px] relative"> 
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/single-article-banner.webp" alt="Single project banner" class="opacity-75 max-h-[400px] w-full object-cover" />
                    <h1 class="absolute top-[16%] -translate-x-1/2 left-1/2 text-blue-50 lg:text-white text-2xl lg:text-4xl w-full font-bold text-center"><?php the_title();?> </h1>
                    <p><?php custom_breadcrumbs("absolute top-1/2 w-full text-center -translate-x-1/2 left-1/2 text-lg text-blue-50 lg:text-white ") ?></p>
                </div>
                    <div class="-mt-10 mb-20 z-10 bg-white relative max-w-screen-xl m-auto rounded-lg shadow-2xl p-10 lg:p-20">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="grid grid-cols-1 lg:grid-cols-2 justify-items-center lg:justify-items-stretch">
                                <div class="order-2 lg:order-1 mt-4 lg:mt-0 min-h-[350px] min-w-[350px] max-h-[350px] max-w-[350px] lg:min-h-[450px] lg:min-w-[450px] lg:max-h-[450px] lg:max-w-[450px] overflow-hidden">
                                    <?php the_post_thumbnail('full', array('class' => 'min-h-[350px] min-w-[350px] max-h-[350px] max-w-[350px] lg:min-h-[450px] lg:min-w-[450px] lg:max-h-[450px] lg:max-w-[450px] object-cover hover:scale-110 duration-300')); ?>
                                </div>
                                <div class="entry-content order-1 lg:order-2">
                                    <h2 class="text-2xl lg:text-3xl text-blue-50 font-bold flex items-center"><?php the_title(); ?> <hr class="ml-5 w-2/12 h-2 border-solid border-t-4 border-orange-600"/></h2>
                                        <?php the_content(); ?>
                                </div>  
                                <div class="lg:col-span-2 order-3 grid grid-cols-1 lg:grid-cols-3 mt-10 justify-items-center">
                                    <?php $product_characteristics = get_field('product_characteristics', get_the_ID()); 
                                    if($product_characteristics){ ?>
                                    <h2 class="lg:col-span-3 text-4xl font-semibold justify-self-start mb-10 text-blue-50">Eigenschaften</h2>
                                    <?php
                                        // Create an array to map sub-field names to labels
                                        $field_labels = array(
                                            'heat_loss' => 'U-Wert',
                                            'overall_depth' => 'Bautiefe',
                                            'security' => 'Sicherheit',
                                            // Add more entries if needed for other sub-fields
                                        );
                                        
                                        // Check if the repeater field has values
                                        if ($product_characteristics) {
                                            foreach ($product_characteristics as $characteristic) {
                                                // Loop through the sub-fields and get their labels and values
                                                foreach ($characteristic as $field_name => $value) {
                                                    // Check if the field name exists in the label mapping array
                                                    if (isset($field_labels[$field_name])) {
                                                        // Get the corresponding label
                                                        $label = $field_labels[$field_name];
                                                    } else {
                                                        // If the field name is not found in the mapping array, use the field name as the label
                                                        $label = $field_name;
                                                    }
                                
                                                    echo '<div class="mt-2 lg:mt-0">
                                                        <img src="' . get_stylesheet_directory_uri() . '/assets/images/characteristics.svg" class="w-14 h-14 m-auto"/>
                                                        <p class="text-xl font-light text-blue-50 mt-4 text-center">'. $label . '</p>
                                                        <p class="text-lg font-light text-black-700 mt-4 text-center">'. $value . '</p>
                                                    </div>';
                                                }
                                            }
                                        }
                                    }
                                        ?>
                                </div>
                                <div class="lg:col-span-2 order-4 grid mt-10">
                                <?php
                                $product_more_characteristics = get_field('more_characteristics', get_the_ID());
                                if ($product_more_characteristics) { ?>
                                    <p class="text-3xl font-semibold mb-10 text-blue-50">Weitere Eigenschaften</p>
                                    <?php
                                        // Assuming you are inside the WordPress loop
                                        // Get the product_characteristics repeater field
                                        // Check if the repeater field has values
                                        
                                            // Start the <ul> tag
                                            echo '<ul>';

                                            // Loop through the repeater field values
                                            foreach ($product_more_characteristics as $characteristic) {
                                                // Get the values of the sub-fields for each repeater instance
                                                $weitere_eigenschaften = $characteristic['weitere_eigenschaften'];

                                                // Display the values in the <li> tags
                                                echo '<li class="text-black-700 font-light text-lg mt-1 flex items-center gap-2">
                                                <div class="rounded-check">
                                                    <div class="checkmark"></div>
                                                </div>
                                                ' . esc_html($weitere_eigenschaften) . '</li>';
                                            }

                                            // Close the <ul> tag
                                            echo '</ul>';
                                        }
                                        ?>
                                </div>
                            </div>   
                            <div class="modal-overlay z-20" id="modalOverlay">
                                <div class="modal z-20 mt-6 max-w-4xl">
                                    <button class="close-button w-9 h-9" id="closeModalBtn">×</button>
                                        <p class="mt-4">Sie haben sich für den Kauf eines <?php the_title(); ?> entschieden, bitte fahren Sie mit der Bestelloption fort..</p>
                                        <div class="grid grid-cols-2 justify-between gap-2 lg:gap-10 mt-2">
                                            <div class="border-2 hover:shadow-2xl rounded-md w-full h-full">
                                            <?php 
                                            $whatsapp = get_field('whats_app', 'option');
                                            $whatsapp_number = $whatsapp['number'];
                                            $current_page_title = get_the_title();
                                            $additional_text = "Hallo, ich interessiere mich für '{$current_page_title}'. Können Sie mir weitere Informationen zu diesem Produkt geben?";
                                            $encoded_message = urlencode($additional_text);
                                            $whatsapp_link = "https://api.whatsapp.com/send?phone={$whatsapp_number}&text={$encoded_message}";

                                            ?>
                                            <a href="<?= $whatsapp_link ?>" target="_blank" id="whatsapp-button">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/whatsapp-second.webp" alt="Logo whatsapp" class="max-w-[160px] max-h-[160px] lg:p-16 object-contain" />
                                            </a>
                                            </div>
                                            <div class="border-2 hover:shadow-2xl rounded-md h-full">
                                                <a href="/kontakt">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mail.webp" alt="Logo mail" class="max-w-[160px] max-h-[160px] lg:p-16 object-contain" />
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="the-content max-w-mdm m-auto pb-20 xl:px-0 px-10">
                    <?php 
                        $more_content = get_field('more_content', get_the_ID());
                        echo do_shortcode($more_content);
                    ?>
                    </div>
                    <?php
                        $shortcode_content = get_field('page_content', get_the_ID());
                        echo do_shortcode($shortcode_content);
                    ?> 
                <?php
            }
        } else {
            echo 'Project not found.';
        }
    ?>
    
<?php get_footer(); ?>
