<?php get_header(); ?>
<!-- <div id="loader">
  <div class="battery-container">
    <div class="battery-fill" id="battery-fill"></div>
  </div>
  <div class="battery-text">Wird geladen...</div>
</div>
<div id="content" class="content-loaded" style="display: none;"> -->

<?php 
  $modules = get_field('field_1', get_the_ID()); 
  
  for( $i = 0; $i < count($modules); $i++){
    if($i == 1){
      get_template_part('components/who-we-are');
      get_template_part('components/cards/service_card');
    }
    getModules($modules[$i]['acf_fc_layout']);
  }
   ?>


<?php get_template_part('components/map'); ?>
<?php get_template_part('components/contact-us'); ?>
<?php get_template_part('components/whatsapp-button'); ?>
<?php
      $shortcode_content = get_field('page_content', get_the_ID());
      echo do_shortcode($shortcode_content);
?> 
  <?php get_footer(); ?>
</div>
