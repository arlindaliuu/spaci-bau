<!DOCTYPE html>
<html lang="de">
  <title> Spaci Bau - Experten für Bauarbeiten und Gartengestaltung</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#ff7523"/>
<meta name="description" content="Entdecken Sie Handwerkskunst und Zuverlässigkeit mit Spaci Bau, unserer Bauunternehmung. Von der Errichtung von Häusern und Wohnungen bis zur Umgestaltung von Gärten setzen wir Visionen präzise und sorgfältig um. Entdecken Sie unser Leistungsspektrum und lassen Sie uns Ihre Bau-Träume wahr werden lassen.">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preload" href="<?= get_bloginfo('url')?>/wp-content/uploads/2024/02/paral-11.webp" as="image" />
<link rel="preload" href="<?= get_stylesheet_directory_uri() ?>/assets/icons/preloader.svg" as="image" type="image/svg+xml" crossorigin="anonymous" />
<?php wp_head(); ?>
</head>
<body>
<?php
      $logo_url = get_field('website_logo', 'option');
?>
<header id="main-header" class="z-40 w-full">
  <div class="header min-h-[70px] lg:max-h-[90px] w-full grid lg:grid-cols-2 bg-white lg:bg-transparent shadow-lg z-40 relative backdrop-blur-2xl">
    <div class="sticky sticky__header bg-yellow-500 lg:bg-none">
      <a class="lg:pl-6 lg:pt-6 p-4 pl-0 block w-9/12" href="/">
        <img src="<?= $logo_url; ?>" alt="Logo" class="max-h-[50px] max-w-[240px] object-contain" width="240" height="50" />
      </a>
    </div>
    <div class="burger">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <?php get_template_part('loading-screen'); ?>
    <div class="lg:flex gap-2 justify-end lg:mr-10 ml-0 pt-3 lg:pt-0 nav_header hidden">
    <?php
    // Display the "primary-menu" navigation menu
    wp_nav_menu(array(
      'theme_location' => 'primary-menu',
      'container' => 'nav',
      'container_class' => 'lg:flex min-h-[70px] lg:max-h-[90px] justify-start items-center gap-x-4 animate-fade-up',
      'fallback_cb' => false, // Disable fallback menu
      'walker' => new Custom_Nav_Walker()
    ));

    class Custom_Nav_Walker extends Walker_Nav_Menu {
      // Add the dropdown toggle for menu items that have children
      function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<li class="relative group m-2 mx-4';
    
        // Check if the menu item has children
        $has_children = !empty($item->classes) && in_array('menu-item-has-children', $item->classes);
    
        if ($has_children) {
          $output .= ' has-children';
        }
    
        $output .= '">';
    
        $attributes = $this->getAttributes($item, $args);

        $output .= '<a' . $attributes . '>';
        $output .= $args->link_before . $item->title . $args->link_after;
    
        // Check if the menu item has children
        if ($has_children) {
          $output .= '<img src="' . get_stylesheet_directory_uri() . '/assets/images/down-arrow.webp" alt="Dropdown Icon" class="ml-2 flex self-center h-3 w-3 dropdown__arrow duration-200" />';
        }
    
        $output .= '</a>';
    
        // If the menu item has children, open the sub-menu (dropdown) container
        if ($has_children) {
          $output .= '<ul class="sub_item lg:absolute mt-2 py-2 bg-blue-700 opacity-90 text-white rounded-md shadow-lg lg:w-max hidden">';
        }
      }
    
    // Get the attributes for the menu item's <a> tag
    function getAttributes($item, $args) {
      $attributes = '';

      // Check if the menu item has children
      $has_children = !empty($item->classes) && in_array('menu-item-has-children', $item->classes);

      if (!empty($item->attr_title)) {
        $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
      }

      if (!empty($item->target)) {
        $attributes .= ' target="' . esc_attr($item->target) . '"';
      }

      if (!empty($item->xfn)) {
        $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
      }

      if ($has_children) {
        $attributes .= ' class="has-children flex"';
      }

      if ($has_children && $args->depth === 1) {
        $attributes .= ' aria-haspopup="true"';
      }

      if ($has_children && $args->depth === 0) {
        $attributes .= ' aria-expanded="false"';
      }

      if (!empty($item->url)) {
        $attributes .= ' href="' . esc_attr($item->url) . '"';
      }

      return $attributes;
    }

    
      // Close the menu item and sub-menu (dropdown) containers
      function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '</li>';
    
        // If the menu item has children, close the sub-menu (dropdown) container
        if (in_array('menu-item-has-children', $item->classes)) {
          $output .= '</ul>';
        }
      }
    }
    $whatsapp = get_field('whats_app', 'option');

    ?>
    <div class="lg:border-l-2 my-2 p-2 flex justify-center items-center lg:border-l-yellow-500">
      <a href="tel:<?= urlencode($whatsapp['number']) ?>" class="uppercase font-bold text-center bg-yellow-500 mx-2 shadow-lg rounded-3xl border px-3 hover:scale-110 hover:shadow-2xl py-2 text-white duration-200">Jetzt anrufen!</a>
    </div>
    </div>
  </div>
  <div id="progress-container" class="fixed top-[82px] lg:top-[90px] left-0 w-full z-[9999] h-1 bg-transparent">
    <div id="progress-bar"></div>
  </div>
  </header>
  <?php wp_footer(); ?>