<?php
/*
Template Name: Contact Us
*/
get_header();
get_template_part('components/loader');  
?>
<?php $data = get_field('contact_details_group', 'option'); ?>
<section class="bg-gray-100 py-16 px-4 contact-page">
    <div class="container max-w-mdm mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left">
                <h1 class="text-3xl md:text-4xl text-blue-800 font-bold mb-4">In Kontakt kommen</h1>
                <p class="text-blue-600 mb-6">Wir schätzen Ihren Beitrag und freuen uns immer, von Ihnen zu hören. Egal, ob Sie eine Frage oder eine Anregung haben, etwas kaufen oder einfach nur Hallo sagen möchten, wir sind für Sie da. Nehmen Sie gerne Kontakt mit uns auf!</p>
                <div class="mb-6">
                    <p class="text-sm text-gray-600">Email: <?= $data['website_email']; ?></p>
                    <p class="text-sm text-gray-600">Telefon: <?= $data['website_phone_no']; ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-600"><?= $data['company_adress']; ?></p>
                </div>
            </div>
            <div>
                <?php echo do_shortcode('[contact-form-7 id="29" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
