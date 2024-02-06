<?php 
    $modules = get_field('modules');
    for( $i = 0; $i < count($modules); $i++){
        if($modules[$i]['acf_fc_layout'] == 'slider_module'){
            $modules = $modules[$i];
        }
    }
    $module_data = $modules['slider_content'];
?>
<!--- Section Slider ---->
    <section>
        <div id="slider-wrapper" class="slider-wrapper  relative">
        <?php 
        for($i = 0; $i < count($module_data); $i++){ ?>
            <div class="slider_images">
                <img src="<?= $module_data[$i]['slider_image'] ?>" class="max-h-[600px] min-h-[600px] w-full" alt="<?= $module_data[$i]['image_name'] ?>" />
            </div>
        <?php  } ?>
        <button id="prev-button" class="absolute top-1/2 right-2 bg-red-500 rounded-full p-4">next</button>
        <button id="next-button" class="absolute top-1/2 left-2 bg-red-500 rounded-full p-4">previous</button>
        </div>
    </section>
    


