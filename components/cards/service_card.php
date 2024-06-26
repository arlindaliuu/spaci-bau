<?php
$services = get_field('field_services', 'option');
$sevices_main_title = get_field('service_main_title', 'option');
$sevices_main_content = get_field('service_main_content', 'option');
?>
<!-- Section: Services -->
<section class="my-10">
    <div class="targetDiv animate-duration-[3000ms] max-w-mdm m-auto">
        <div>
            <h2 class="text-xl lg:text-4xl font-semibold text-blue-50"><?= $sevices_main_title ?></h2>
        <div>
        <div>
            <p class="mt-4">
                <?= $sevices_main_content ?>
            </p>
        </div>
        <div class="grid lg:grid-cols-3 gap-4 mt-6">
            <?php
            if ($services && is_array($services)) {
                foreach ($services as $service) { ?>
                    <div class="p-4 shadow-xl bg-white flex hover:scale-105 duration-200 lg:flex-row flex-col rounded-3xl overflow-hidden">
                        <div class="grid">
                            <h3 class="text-lg lg:text-xl text-blue-50 font-bold"><?= $service["service_title"] ?></h3>
                            <p class="mt-2 text-black-700 text-md"><?= $service["service_description"] ?></p>
                            <a href="/dienstleistungen" class="text-red-950 font-bold cursor-pointer hover:underline self-end">Weiterlesen &#x21b7;</a>
                        </div>
                        <img 
                            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/technical-support.png"
                            alt="Service Icon" 
                            class="object-contain p-3 w-20 h-20 self-center" 
                        />
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
</section>