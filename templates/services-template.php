
<div id="loader">
  <div class="battery-container">
    <div class="battery-fill" id="battery-fill"></div>
  </div>
  <div class="battery-text">Wird geladen...</div>
</div>
<div id="content" class="content-loaded" style="display: none;">
<?php
$services = get_field('field_services', 'option');
$sevices_main_title = get_field('service_main_title', 'option');
$sevices_main_content = get_field('service_main_content', 'option');
/* Template Name: Services */
get_header();
?>
  <div class="parallax" data-speed="0.5">
      <div class="parallax-content w-full">
          <p class="text-3xl text-white font-bold">Dienstleistungen</p>
          <p><?php custom_breadcrumbs("absolute top-1/2 w-full text-center -translate-x-1/2 left-1/2 text-lg text-white mt-10") ?></p>
      </div>
  </div>
  <div class="grid gap-4 mt-6 max-w-5xl mx-auto my-10">
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
        
          for( $i = 0; $i < count($modules); $i++){
            getModules($modules[$i]['acf_fc_layout']);
          }
        ?>

<?php get_footer(); ?>
