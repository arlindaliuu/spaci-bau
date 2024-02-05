<?php
function custom_breadcrumbs($class = '') {
  echo '<div class="breadcrumbs ' . esc_attr($class) . '">';
  
  if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
  } else {
      echo '<p id="breadcrumbs" class="lg:text-white">';
      
      echo '<a href="' . esc_url(home_url('/')) . '">Home</a> &raquo; ';
      
      if (is_category()) {
          single_cat_title();
      } elseif (is_tag()) {
          single_tag_title();
      } elseif (is_author()) {
          the_post();
          echo 'Archives by Author: ' . get_the_author();
          rewind_posts();
      } elseif (is_day()) {
          echo 'Archives by Day: ' . get_the_date();
      } elseif (is_month()) {
          echo 'Archives by Month: ' . get_the_date('F Y');
      } elseif (is_year()) {
          echo 'Archives by Year: ' . get_the_date('Y');
      } elseif (is_search()) {
          echo 'Search Results for: ' . get_search_query();
      } elseif (is_404()) {
          echo 'Error 404: Not Found';
      } else {
          the_title();
      }
      
      echo '</p>';
  }
  
  echo '</div>';
}
?>