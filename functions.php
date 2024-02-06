<?php 

// Include the file to register menus
require_once get_template_directory() . '/config/Config.php';
require_once get_template_directory() . '/config/register-menu.php';
require_once get_template_directory() . '/config/PostType.php';
require_once get_template_directory() . '/config/breadcrumbs.php';

add_theme_support( 'post-thumbnails' );

function unique_baulemente_theme_enqueue_scripts() {
  // Tailwind custom style
  wp_enqueue_style( 'tailwind-custom-styles', get_stylesheet_directory_uri() . '/assets/dist/output.css', array(), '1.1.1' );
  // Sass custom style
  wp_enqueue_style( 'sass-custom-styles', get_stylesheet_directory_uri() . '/assets/dist/style.css', array(), '1.1.1' );
  // Enqueue custom script
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/assets/js/header.js', array( 'jquery' ), '1.1.0', false );
  wp_enqueue_script( 'custom-modal-script', get_stylesheet_directory_uri() . '/assets/js/modal.js', array( 'jquery' ), '1.1.0', false );
  wp_enqueue_script( 'custom-scroll-script', get_stylesheet_directory_uri() . '/assets/js/scrollPosition.js', array( 'jquery' ), '1.1.0', false );
  wp_enqueue_script( 'slider-script', get_stylesheet_directory_uri() . '/assets/js/slider.js', array( 'jquery' ), '1.1.0', false );
}
add_action( 'wp_enqueue_scripts', 'unique_baulemente_theme_enqueue_scripts' );

  
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
  if ( is_singular( 'product' ) ) {
      $template = get_template_directory() . '/templates/single-product.php';
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

 //Unique Baulemente insert function post view count 
 function unique_baulemente_insert_views_post($post_id){
  $meta_key = 'unique_baulemente_post_views_count';

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
 //Unique Baulemente getCount number
 function unique_baulemente_get_views_post_count($post_id){
  $meta_key = 'unique_baulemente_post_views_count';

  $count = get_post_meta($post_id, $meta_key, true);

  if($count == ''){
    $count = 0;

    delete_post_meta($post_id, $meta_key);

    add_post_meta($post_id, $meta_key, $count);

    return "0";
  }
  return $count;
 }
 function custom_why_us_shortcode() {
  ob_start();
  include 'components/why-us.php'; // Path to why-us.php file
  return ob_get_clean();
}
function custom_carousel_team_shortcode() {
  ob_start();
  include 'components/carousel-members.php'; // Path to carousel-members.php file
  return ob_get_clean();
}
function custom_carousel_shortcode($atts) {
  $atts = shortcode_atts(array(
      'category' => '', // Default to empty category
      'title' => 'Unsere Produkte', // Default title
  ), $atts);

  ob_start();
  include 'components/carousel.php'; // Path to carousel.php file
  return ob_get_clean();
}
add_shortcode('carousel', 'custom_carousel_shortcode');
function custom_contact_us_shortcode() {
  ob_start();
  include 'components/contact-us.php'; // Path to contact-us.php file
  return ob_get_clean();
}
function custom_services_shortcode() {
  ob_start();
  include 'components/services.php'; // Path to services.php file
  return ob_get_clean();
}
add_shortcode('contact-us', 'custom_contact_us_shortcode');
add_shortcode('carousel', 'custom_carousel_shortcode');
add_shortcode('carousel-ourteam', 'custom_carousel_team_shortcode');
add_shortcode('why-us', 'custom_why_us_shortcode');
add_shortcode('services', 'custom_services_shortcode');

?>