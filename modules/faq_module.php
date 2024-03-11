<?php 
    $data = $data['faq'];
?>
<div class="mx-auto my-10">
    <div class="max-w-mdm lg:mx-auto mx-6 relative">
        <h3 class="text-4xl font-bold mb-6 relative z-20">Häufig gestellte Fragen</h3>
        <img class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/faq_background.png" alt="FAQ Image"/>
        <?php 
            if ($data && is_array($data)) {
                foreach ($data as $index => $faq) { ?>
                    <div class="bg-white shadow-md rounded-md mb-6 relative">
                        <div class="p-4 border-b border-gray-200 cursor-pointer flex justify-between">
                            <h3 class="text-lg font-semibold"><?= $faq['faq_question'] ?></h3>
                            <span class="arrow duration-300">&#11165;</span>
                        </div>
                        <div class="p-4 border-b border-gray-200 hidden animate-fade-down">
                            <p><?= $faq['faq_answer'] ?></p>
                        </div>
                    </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
