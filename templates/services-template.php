<?php
$services = get_field('field_services', 'option');
$sevices_main_title = get_field('service_main_title', 'option');
$sevices_main_content = get_field('service_main_content', 'option');
/* Template Name: Services */
get_header();
get_template_part('components/loader');  
?>
  <div class="parallax" data-speed="0.5">
      <div class="parallax-content w-full">
          <h1 class="text-3xl text-white font-bold">Dienstleistungen</h1>
          <p><?php custom_breadcrumbs("absolute top-1/2 w-full text-center -translate-x-1/2 left-1/2 text-lg text-white mt-10") ?></p>
      </div>
  </div>
  <div class="grid gap-4 mt-6 max-w-5xl mx-auto my-10">
            <p class="text-3xl font-bold"><?= $sevices_main_title ?></p>
            <p><?= $sevices_main_content ?></p>
            <hr class="w-full border">
            <?php
            if ($services && is_array($services)) {
                foreach ($services as $service) { ?>
                    <div class="p-4 bg-white flex lg:flex-row flex-col">
                        <div class="grid">
                            <h4 class="text-xl text-blue-50 font-bold"><?= $service["service_title"] ?></h4>
                            <p class="mt-2 text-black-700 text-md"><?= $service["service_description"] ?></p>
                        </div>
                    </div>
                    <?php
                }
            } ?>
        </div>

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

<?php get_footer(); ?>
