<?php
      $logo_url = get_field('logo', 'option');
      $data = get_field('whats_app', 'option'); 
?>
<footer class="bg-black-800 text-white pt-8">
   <div class="w-full grid lg:grid-cols-3 pb-10 container mx-auto">
        <div class="lg:border-r lg:border-r-orange-100 flex p-2 lg:justify-center items-center py-6">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/email.webp" alt="Logo" class="h-8 w-10 object-contain  animate-duration-[3000ms]" />
            <p class="ml-3">Schreiben Sie uns eine E-Mail :
            <?= $data['email']; ?>
            </p>
        </div>
        <div class="flex p-2 lg:justify-center items-center py-6">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/telephone.webp" alt="Logo" class="h-8 w-10 object-contain" />
            <p class="ml-3">Rufen Sie uns an unter:
            <?= $data['number']; ?>
        </p>
        </div>
        <div class="lg:border-l lg:border-l-orange-100  flex p-2 lg:justify-center items-center py-6">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/placeholder.webp" alt="Logo" class="h-8 w-10 object-contain" />
            <p class="ml-3">
                <?= $data['adress']; ?>
            </p>
        </div>
    </div>
            <div class="container mx-auto px-4">
                <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">
                    <div class="w-full mb-8 md:mb-0 order-4 md:order-1">
                        <h1 class="text-xl mb-4">Finde uns</h1>
                        <ul class="flex">
                            <?php $social_media = get_field('social_media', 'option'); ?>
                            <li class="footer-social__item w-10 h-10 mr-2 mb-2">
                                <a href="<?= $social_media['instagram']; ?>" target="_blank" rel="noopener noreferrer">
                                    <img
                                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram.webp"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/instagram.webp 18w"
                                        sizes="(max-width: 640px) 18px, 36px"
                                        width="18"
                                        height="18"
                                        alt="Insta icon"
                                    >
                                </a>
                            </li>
                            <li class="footer-social__item w-10 h-10 mr-2 mb-2">
                                <a href="<?= $social_media['facebook']; ?>" target="_blank" rel="noopener noreferrer">
                                    <img
                                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/facebook.webp"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/facebook.webp 18w"
                                        sizes="(max-width: 640px) 18px, 36px"
                                        width="18"
                                        height="18"
                                        alt="Facebook icon"
                                    >
                                </a>
                            </li>
                            <li class="footer-social__item w-10 h-10 mr-2 mb-2">
                                <a href="<?= $social_media['youtube']; ?>" target="_blank" rel="noopener noreferrer">
                                    <img
                                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/youtube.webp"
                                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/youtube.webp 18w"
                                        sizes="(max-width: 640px) 18px, 36px"
                                        width="18"
                                        height="18"
                                        alt="Youtube icon"
                                    >
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php if ( has_nav_menu( 'footer-menu-1' ) ) : ?>
                        <div class="w-full mb-8 md:mb-0 order-2">
                            <h1 class="text-xl mb-4">Service</h1>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-menu-1',
                                    'menu_class'     => 'footer-menu',
                                    'walker'         => new Custom_Walker_Class(),
                                )
                            );
                            ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( has_nav_menu( 'footer-menu-2' ) ) : ?>
                        <div class="w-full mb-8 md:mb-0 order-3">
                            <h1 class="text-xl mb-4">Produkte</h1>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-menu-2',
                                    'menu_class'     => 'footer-menu',
                                    'walker'         => new Custom_Walker_Class(),
                                )
                            );
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="w-full mb-8 md:mb-0 order-1 md:order-4">
            <h1 class="text-xl mb-4">Am häufigsten angesehenes Produkt</h1>
            <?php
            // Query to get the most viewed post
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 1,
                'meta_key'       => 'unique_baulemente_post_views_count',
                'orderby'        => 'meta_value_num',
                'order'          => 'DESC'
            );

            $most_viewed_query = new WP_Query($args);

            if ($most_viewed_query->have_posts()) {
                while ($most_viewed_query->have_posts()) {
                    $most_viewed_query->the_post();
                    $post_id = get_the_ID();
                    $post_title = get_the_title();
                    $post_view_count = unique_baulemente_get_views_post_count($post_id);
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded shadow flex min-w-[100px] min-h-[100px] max-h-[150px] justify-between p-2'); ?>>
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('thumbnail'); // Use the "thumbnail" size, which maintains aspect ratio
                    } ?>
                    <div class="ml-2">
                        <h2 class="text-lg font-bold text-blue-50 mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="text-blue-50 mb-4 text-sm"><?php echo wp_trim_words(get_the_excerpt(), 7); ?></p>
                        <a href="<?php the_permalink(); ?>" class="w-full px-3 py-1 bg-orange-100 text-white block text-sm text-center rounded-lg hover:bg-blue-50 duration-300 hover:scale-105">
                        Weiterlesen
                    </a>
                    </div>
                </article> <?php
                }
            } else {
                echo 'Keine Einträge gefunden.';
            }

            // Reset post data
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
    <div class="h-fit lg:h-20 w-full bg-blue-700 ">
        <div class="container mx-auto mt-8 flex justify-center flex-wrap items-center gap-4 h-full p-4">
            <img class="justify-self-center lg:justify-self-end" src="<?= $logo_url; ?>" alt="Logo" class="z-20 p-4" width="240" height="50" />
            <p class="text-center"><?php echo date("Y"); ?> &copy; Alle Rechte vorbehalten Unique Baulemente.</p>
        </div>
    </div>
</footer>
