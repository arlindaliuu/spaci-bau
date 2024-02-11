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
        <div id="slider-wrapper" class="slider-wrapper relative z-30">
            <?php 
            for($i = 0; $i < count($data['slider_data']); $i++){ 
                    $isContainer = $data['slider_data'][$i]['text_container'];
                    $sliderPosition = $data['slider_data'][$i]['container_position'];
                    $sliderContainerText= $data['slider_data'][$i]['container_text'];
                    $containerColor = $data['slider_data'][$i]['container_bg_color'];
                ?>
                <div class="slider_data first:block hidden duration-300 animate-fade-left">
                    <img src="<?= $data['slider_data'][$i]['slider_image']['url'] ?>" class="max-h-[800px] min-h-[800px] w-full object-cover" alt="<?= $data['slider_data'][$i]['image_name'] ?>" />
                    <?php if ($isContainer) : ?>
                        <div style="background-color:<?= $containerColor ?>;" class='min-w-[30%] max-w-[30%] max-h-[50%] absolute top-1/2 -translate-x-1/2 -translate-y-1/2 <?= $sliderPosition === 'left' ? 'left-1/3' : ($sliderPosition === 'middle' ? 'left-1/2' : 'left-[66%]') ?> bg-green-700/50 p-6'>
                            <?= $sliderContainerText ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php  } ?>
            <button id="next-button" class="absolute top-1/2 right-4 lg:right-6 bg-black-900 hover:bg-transparent duration-300 hover:text-black-900 border-black-900 border rounded-full flex justify-center text-white px-3 py-1"><span>&raquo;</span></button>
            <button id="prev-button" class="absolute top-1/2 left-4 lg:left-6 bg-black-900 hover:bg-transparent duration-300 hover:text-black-900 border-black-900 border rounded-full flex justify-center text-white px-3 py-1"><span>&laquo;</span></button>
        </div>
    </section> 


