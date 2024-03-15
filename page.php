<?php
get_header();
get_template_part('components/loader') ;   
?>

<div class="parallax">
    <div class="parallax-content w-full">
        <p class="text-3xl text-white font-bold"><?php get_title(); ?></p>
        <p><?php custom_breadcrumbs("absolute top-1/2 w-full text-center -translate-x-1/2 left-1/2 text-lg text-white mt-10") ?></p>
    </div>
</div>


</div>
</div>
<?php get_footer(); ?>
