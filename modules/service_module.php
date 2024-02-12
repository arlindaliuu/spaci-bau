<?php
$modules = get_field('field_1', get_the_ID()); 
for( $i = 0; $i < count($modules); $i++){
    if($modules[$i]['acf_fc_layout'] == "service_module"){
        $data = $modules[$i];
    }
}
?>
<!-- Section: Services -->
<section class="bg-gray-100">
    <div class="targetDiv animate-duration-[3000ms] max-w-mdm m-auto py-20 xl:px-0 px-10">
        <div>
            <h1 class="text-3xl lg:text-4xl font-semibold text-blue-50"><?= $data['service_main_title']; ?></h1>
        <div>
        <div>
            <p class="text-black-700 mt-4">
                <?= $data['service_main_content']; ?>
            </p>
        </div>
        <div class="grid lg:grid-cols-3 gap-4 mt-6">
            <?php
            $data = $data['services'];
            if ($data && is_array($data)) {
                foreach ($data as $service) { ?>
                    <div class="p-4 shadow-xl bg-white flex hover:scale-105 duration-200 lg:flex-row flex-col">
                        <div class="grid">
                            <h1 class="text-xl text-blue-50 font-bold"><?= $service["single_service_title"] ?></h1>
                            <p class="mt-2 text-black-700 text-md"><?= $service["single_service_content"] ?></p>
                            <a href="/dienstleistungen" class="text-yellow-500 font-bold cursor-pointer hover:underline self-end">Weiterlesen &#x21b7;</a>
                        </div>
                    <?php
                    if($service["single_service_image"]){ ?>
                        <img src="<?= $service["single_service_image"]['url']  ?>" alt="Service Icon" class="object-contain p-3 w-20 h-20 self-center" />
                    <?php } ?>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
</section>