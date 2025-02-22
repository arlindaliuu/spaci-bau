<?php 
get_header();
get_template_part('components/loader');   

  $modules = get_field('field_1', get_the_ID()); 
  foreach ($modules as $index => $module) { ?> 
  <?php $module_type = $module['acf_fc_layout']; ?>
    <div class="module-<?= $module_type; ?>
      <?= $module_type == 'cards_module' ? 'overflow-hidden' : '';  ?>"
    >
      <?php
        getModules($module['acf_fc_layout'], $module);
      ?>
    </div>
  <?php
  } ?>
<?php get_template_part('components/scroll-to-top'); ?>
<?php get_template_part('components/contact-us'); ?>
<?php get_template_part('components/whatsapp-button'); ?>

  <?php get_footer(); ?>
</div>
