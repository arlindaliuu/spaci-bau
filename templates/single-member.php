<?php
/*
 * Template Name: Member
 */

get_header(); ?>
<div id="loader">
  <div class="battery-container">
    <div class="battery-fill" id="battery-fill"></div>
  </div>
  <div class="battery-text">Wird geladen...</div>
</div>
<div id="content" class="content-loaded" style="display: none;">
    <?php    
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <div class="max-h-[400px] relative"> 
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/single-article-banner.webp" alt="Single product banner" class="opacity-75 max-h-[400px] w-full object-cover" />
                    <h1 class="absolute top-1/3 -translate-x-1/2 left-1/2 text-white text-4xl "><?php the_title();?> </h1>
                    <p><?php custom_breadcrumbs("absolute top-1/2 w-full text-center -translate-x-1/2 left-1/2 text-lg text-white") ?></p>
                </div>
                    <div class="-mt-10 mb-20 z-10 bg-white relative max-w-screen-xl m-auto rounded-lg shadow-2xl p-20">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="grid lg:grid-cols-2 justify-center">
                            <div class=" mt-4 lg:mt-0 min-h-[350px] min-w-[350px] max-h-[350px] max-w-[350px] overflow-hidden">
                                    <?php the_post_thumbnail(array(350, 350), array('class' => 'min-h-[350px] min-w-[350px] max-h-[350px] max-w-[350px] hover:scale-110 duration-300')); ?>
                                </div>                                <div class="entry-content">
                                    <h2 class="text-3xl text-blue-50 font-bold flex items-center"><?php the_title(); ?> <hr class="ml-5 w-2/12 h-2 border-solid border-t-4 border-orange-600"/></h2>
                                        <?php the_content(); ?>
                                </div>
                            </div>    
                        </article>
                    </div>

                <?php
                get_template_part('/components/carousel-members');
            }
        } else {
            echo 'Product not found.';
        }
    ?>
<?php get_footer(); ?>
