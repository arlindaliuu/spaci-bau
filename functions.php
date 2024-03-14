<?php 

// Include the file to register menus
require_once get_template_directory() . '/config/PostType.php';
require_once get_template_directory() . '/config/ACF.php';
require_once get_template_directory() . '/config/OptionsACF.php';
require_once get_template_directory() . '/config/Config.php';
require_once get_template_directory() . '/config/register-menu.php';
require_once get_template_directory() . '/config/breadcrumbs.php';

add_theme_support( 'post-thumbnails' );

function aa_theme_enqueue_scripts() {
  // Tailwind custom style
  wp_enqueue_style( 'tailwind-custom-styles', get_stylesheet_directory_uri() . '/assets/dist/output.css', array(), '1.2.2' );
  // Sass custom style
  wp_enqueue_style( 'sass-custom-styles', get_stylesheet_directory_uri() . '/assets/dist/style.css', array(), '1.1.2' );
  // Enqueue custom script
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/assets/js/header.js', array( 'jquery' ), '1.1.0', false );
  wp_enqueue_script( 'scroll-to-top-script', get_stylesheet_directory_uri() . '/assets/js/scrollToTop.js', array( 'jquery' ), '1.0.0', false );
  wp_enqueue_script( 'custom-modal-script', get_stylesheet_directory_uri() . '/assets/js/modal.js', array( 'jquery' ), '1.1.0', false );
  wp_enqueue_script( 'custom-scroll-script', get_stylesheet_directory_uri() . '/assets/js/scrollPosition.js', array( 'jquery' ), '1.1.0', false );
  wp_enqueue_script( 'slider-script', get_stylesheet_directory_uri() . '/assets/js/slider.js', array( 'jquery' ), '1.1.0', false );
  wp_enqueue_script( 'faq-script', get_stylesheet_directory_uri() . '/assets/js/faq.js', array( 'jquery' ), '1.1.0', false );
  wp_enqueue_script( 'who-we-are-script', get_stylesheet_directory_uri() . '/assets/js/who-we-are.js', array( 'jquery' ), '1.1.0', false );
}
add_action( 'wp_enqueue_scripts', 'aa_theme_enqueue_scripts' );

  
class Custom_Walker_Class extends Walker_Nav_Menu {
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      $attributes = $item->attr_title ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= $item->target ? ' target="' . esc_attr( $item->target ) .'"' : '';
      $attributes .= $item->xfn ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
      $attributes .= $item->url ? ' href="' . esc_attr( $item->url ) .'"' : '';

      $output .= '<li class="text-black-700 hover:text-white hover:underline">'; // Add your custom class here
      $output .= $args->before;
      $output .= '<a' . $attributes . '>';
      $output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $output .= '</a>';
      $output .= $args->after;
  }
}

function custom_template_folder( $template ) {
  if ( is_singular( 'project' ) ) {
      $template = get_template_directory() . '/templates/single-project.php';
  } 
  if ( is_singular( 'member' ) ) {
      $template = get_template_directory() . '/templates/single-member.php';
  }
    elseif ( is_post_type_archive( 'product' ) ) {
      $template = get_template_directory() . '/templates/template-products.php';
  }

  return $template;
}
add_filter( 'template_include', 'custom_template_folder' );

 //AA insert function post view count 
 function aa_insert_views_post($post_id){
  $meta_key = 'aa_post_views_count';

  $count = get_post_meta($post_id, $meta_key, true);

  if($count == ''){
    $count = 0;

    delete_post_meta($post_id, $meta_key);

    add_post_meta($post_id, $meta_key, $count);
  }else{
    $count++;
    update_post_meta($post_id, $meta_key, $count);
  }
 }
 //AA getCount number
 function aa_get_views_post_count($post_id){
  $meta_key = 'aa_post_views_count';

  $count = get_post_meta($post_id, $meta_key, true);

  if($count == ''){
    $count = 0;

    delete_post_meta($post_id, $meta_key);

    add_post_meta($post_id, $meta_key, $count);

    return "0";
  }
  return $count;
 }

function custom_contact_us_shortcode() {
  ob_start();
  include 'components/contact-us.php'; // Path to contact-us.php file
  return ob_get_clean();
}
function custom_services_shortcode() {
  ob_start();
  include 'components/cards/service_card.php'; // Path to services.php file
  return ob_get_clean();
}

function custom_map_shortcode() {
  ob_start();
  include 'components/map.php'; // Path to services.php file
  return ob_get_clean();
}

function custom_who_we_are_shortcode() {
  ob_start();
  include 'components/who-we-are.php'; // Path to services.php file
  return ob_get_clean();
}

add_shortcode('map','custom_map_shortcode');
add_shortcode('contact-us', 'custom_contact_us_shortcode');
add_shortcode('carousel', 'custom_carousel_shortcode');
add_shortcode('who-we-are', 'custom_who_we_are_shortcode');
add_shortcode('services', 'custom_services_shortcode');



?>