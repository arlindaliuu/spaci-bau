<?php
/*
Template Name: About Us
*/
get_header();
get_template_part('components/loader');  
?>
    <div class="parallax">
        <div class="parallax-content w-full">
            <p class="text-3xl text-white font-bold">Über uns</p>
            <p><?php custom_breadcrumbs("absolute top-1/2 w-full text-center -translate-x-1/2 left-1/2 text-lg text-white mt-10") ?></p>
        </div>
    </div>
    <div class="my-10">
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
    </div>
  </div>
</div>
<?php get_footer(); ?>
