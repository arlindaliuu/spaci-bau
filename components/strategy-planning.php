<?php 
    $strategy_title_1 = get_field('strategy_title_1');
    $strategy_content_1 = get_field('strategy_content_1');
    $strategy_button_1 = get_field('strategy_button_1');
    $strategy_title_2 = get_field('strategy_title_2');
    $strategy_content_2 = get_field('strategy_content_2');
    $strategy_title_3 = get_field('strategy_title_3');
    $strategy_content_3 = get_field('strategy_content_3');
    $strategy_and_planning_title = get_field('strategy_and_planning_title');
    $strategy_and_planning_content = get_field('strategy_and_planning_content');
    $client_satisfaction_title = get_field('client_satisfaction_title');
    $client_satisfaction_content = get_field('client_satisfaction_content');

?>
<section class="bg-blue-50 min-h-[500px] w-full">
    <div class="targetDiv animate-duration-[3000ms] rounded-lg overflow-hidden -mt-10 z-20 min-h-[500px] mx-10 relative max-w-mdm lg:mx-auto grid grid-cols-1 lg:grid-cols-3 shadow-2xl">
        <div class="lg:col-span-1 bg-orange-500 py-20 px-4 lg:px-12 grid gap-4 justify-items-center">
            <h2 class="text-white text-3xl font-bold"><?php echo $strategy_title_1 ? $strategy_title_1  : "15 Years of undefeated success" ?></Label> </h2>
            <p class="text-white text-md lg:text-lg"><?php echo $strategy_content_1 ?></p>
            <a href="/uber-uns" class="border rounded-full border-black-800 duration-300 hover:scale-110 font-semibold bg-black-800 text-white px-4 py-2"><?php echo $strategy_button_1 ?></a>
        </div>
        <div class="lg:col-span-2 bg-white p-4 lg:p-14 flex flex-col">
            <span class="text-black-700 italic font-extrabold text-xl">-Unsere Geschichte</span>
            <h1 class="text-blue-50 text-3xl font-bold"><?php echo $strategy_title_2 ?></h1>
            <p class="text-blue-50 text-md lg:text-lg mt-4"><?php echo $strategy_content_2 ?></p>
        </div>
    </div>
    <div class="max-w-7xl m-auto grid grid-cols-1 lg:grid-cols-2 p-10 targetDiv animate-duration-[3000ms]">
        <div class="lg:col-span-2">
            <h1 class="text-center text-2xl lg:text-3xl text-white font-bold"><?php echo $strategy_title_3 ?></h1>
            <p class="text-center text-md lg:text-lg text-black-700 font-bold max-w-xl m-auto mt-4"><?php echo $strategy_content_3 ?></p>
        </div>
        <div class="grid lg:grid-cols-2 lg:col-span-2 max-w-xl m-auto mt-4">
            <div class="strategy_planning p-5 grid">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon1.webp" alt="Logo" class="z-10 w-24 h-24 object-contain  animate-duration-[3000ms] justify-self-center" />
                <h2 class="text-white text-lg lg:text-xl"><?php echo $strategy_and_planning_title ?></h2>
                <p class="text-black-700 text-md lg:text-lg mt-2">
                <?php echo $strategy_and_planning_content ?>
                </p>
            </div>
            <div class="p-5 grid">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon2.webp" alt="Logo" class="z-10 w-24 h-24 object-contain  animate-duration-[3000ms] justify-self-center" />
                <h2 class="text-white text-lg lg:text-xl"><?php echo $client_satisfaction_title ?></h2>
                <p class="text-black-700 text-md lg:text-lg mt-2">
                <?php echo $client_satisfaction_content ?>
                </p>
            </div>
        </div>
    </div>
</section>