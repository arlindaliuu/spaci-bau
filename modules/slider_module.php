    <!--- Section Slider ---->
    <section class="relative">
        <div id="slider-wrapper" class="slider-wrapper relative z-30 -mt-[70px]">
            <?php 
            for($i = 0; $i < count($data['slider_data']); $i++){ 
                    $isContainer = $data['slider_data'][$i]['text_container'];
                    $sliderPosition = $data['slider_data'][$i]['container_position'];
                    $sliderContainerText= $data['slider_data'][$i]['container_text'];
                    //This variable will be available next version ( 2.0 and above )
                    // $containerColor = $data['slider_data'][$i]['container_bg_color'];
                ?>
                <div class="slider_data first:block relative w-full">
                    <img src="<?= $data['slider_data'][$i]['slider_image']['url'] ?>" class="max-h-[800px] min-h-[800px] w-full object-cover" alt="<?= $data['slider_data'][$i]['image_name'] ?>" />
                    <?php if ($isContainer) : ?>
                        <div class='min-w-[30%] w-full lg:w-min max-h-[50%] absolute top-1/2 lg:-translate-x-1/2 -translate-y-1/2 <?= $sliderPosition === 'left' ? 'lg:left-1/3' : ($sliderPosition === 'middle' ? 'lg:left-1/2' : 'lg:left-[66%]') ?> bg-neutral-500/50 p-6'>
                            <div class="p-6 bg-neutral-500/60 text-white">
                                <?= $sliderContainerText ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php  } ?>
        </div>
     <button id="next-button" class="z-50 absolute top-1/2 right-4 lg:right-6 bg-black-900 hover:bg-transparent duration-300 hover:text-black-900 border-black-900 border rounded-full flex justify-center text-white px-3 py-1"><span>&raquo;</span></button>
     <button id="prev-button" class="z-50 absolute top-1/2 left-4 lg:left-6 bg-black-900 hover:bg-transparent duration-300 hover:text-black-900 border-black-900 border rounded-full flex justify-center text-white px-3 py-1"><span>&laquo;</span></button>
    </section> 
