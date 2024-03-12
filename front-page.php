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
  
  foreach ($modules as $index => $module) { ?> 
    <div class="module-<?= $module['acf_fc_layout'] ?>">
      <?php
        getModules($module['acf_fc_layout'], $module);
      ?>
    </div>
  <?php
  } ?>

<?php get_template_part('components/contact-us'); ?>
<?php get_template_part('components/whatsapp-button'); ?>

  <?php get_footer(); ?>
</div>
