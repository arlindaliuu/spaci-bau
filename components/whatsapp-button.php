<?php
// Get the WhatsApp field value
$whatsapp = get_field('whats_app', 'option');
// Check if the field has a value and ensure it's not empty
if ($whatsapp) {

    // Generate the WhatsApp button with the correct URL and text
    echo '<a href="https://api.whatsapp.com/send?phone=' . urlencode($whatsapp['number']) . '" target="_blank" id="whatsapp-button" class="md:w-fit lg:text-md text-xs fixed flex items-center bottom-5 right-5 bg-green-600 text-white lg:py-3 lg:px-5 p-2 rounded-full z-50">';
    echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/whatsapp.webp" alt="whatsapp logo" class="w-8 h-8" />';
    ?><p class="hidden md:block ml-4"><?= $whatsapp['whats_app_text']; ?></p> <?php
    echo '</a>';
}
?>
