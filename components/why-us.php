<?php 
    $data = get_field('why_us', 'option');
    $first_answer = $data['first_answer'];    
    $second_answer = $data['second_answer'];    
    $third_answer = $data['third_answer'];    
?>
<div class="bg-orange-500">
        <div class="grid lg:grid-cols-2 max-w-7xl gap-x-16 m-auto px-10 py-16 lg:p-16">
            <div class="grid">
                <h2 class="text-3xl text-white font-bold flex items-center">Warum uns wählen <hr class="ml-5 w-2/12 h-2 border-solid border-t-4 border-white"/></h2>
                <div class="flex mt-6 lg:flex-row flex-col">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-choose-1.webp" alt="Logo" class="self-center z-10 h-16 w-16 mr-6 object-contain"/>
                    <div class="text-white text-center mt-4 lg:mt-0 lg:text-left">
                        <h1 class="text-xl font-semibold"><?= $first_answer['first_title']; ?></h1>
                        <p class="mt-3"><?= $first_answer['first_content']; ?></p>
                    </div>
                </div>
                <div class="flex mt-6 lg:flex-row flex-col">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-choose-2.webp" alt="Logo" class="self-center z-10 h-16 w-16 mr-6 object-contain"/>
                    <div class="text-white text-center mt-4 lg:mt-0 lg:text-left">
                        <h1 class="text-xl font-semibold"><?= $second_answer['second_title']; ?></h1>
                        <p class="mt-3"><?= $second_answer['second_content']; ?></p>
                    </div>
                </div>
                <div class="flex mt-6 lg:flex-row flex-col">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-choose-3.webp" alt="Logo" class="self-center z-10 h-16 w-16 mr-6 object-contain"/>
                    <div class="text-white text-center mt-4 lg:mt-0 lg:text-left">
                        <h1 class="text-xl font-semibold"><?= $third_answer['third_title']; ?></h1>
                        <p class="mt-3"><?= $third_answer['third_content']; ?></p>
                    </div>
                </div>
            </div>
            <div class="m-auto">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/aboutus.webp" alt="Logo" class="object-contain"/>
            </div>
        </div>
</div>