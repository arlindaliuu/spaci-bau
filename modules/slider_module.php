<?php 
    $modules = get_field('field_1', get_the_ID()); 
    for( $i = 0; $i < count($modules) - 1; $i++){
        if($modules[$i]['acf_fc_layout'] == "slider_module"){
            $data = $modules[$i];
        }
    }
?>
    <!--- Section Slider ---->
    <section>
        <div id="slider-wrapper" class="slider-wrapper  relative">
            <?php 
            for($i = 0; $i < count($data['slider_images']); $i++){ ?>
                <div class="slider_images first:block hidden">
                    <img src="<?= $data['slider_images'][$i]['slider_image']['url'] ?>" class="max-h-[600px] min-h-[600px] w-full" alt="<?= $data['slider_images'][$i]['image_name'] ?>" />
                </div>
            <?php  } ?>
            <button id="prev-button" class="absolute top-1/2 right-2 bg-red-500 rounded-full p-4">next</button>
            <button id="next-button" class="absolute top-1/2 left-2 bg-red-500 rounded-full p-4">previous</button>
        </div>
    </section> 


