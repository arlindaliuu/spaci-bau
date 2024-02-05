<?php get_header(); ?>
<div id="loader">
  <div class="battery-container">
    <div class="battery-fill" id="battery-fill"></div>
  </div>
  <div class="battery-text">Wird geladen...</div>
</div>
<div id="content" class="content-loaded" style="display: none;">


<?php echo do_shortcode('[smartslider3 slider="3"]'); ?>
<?php get_template_part('components/strategy-planning'); ?>
<?php get_template_part('components/services'); ?>
<?php echo do_shortcode('[carousel title="Unsere Produkte"]') ?>

<?php get_template_part('components/map'); ?>
<?php get_template_part('components/whatsapp-button'); ?>
<?php
      $shortcode_content = get_field('page_content', get_the_ID());
      echo do_shortcode($shortcode_content);
?> 
  <?php get_footer(); ?>
</div>
