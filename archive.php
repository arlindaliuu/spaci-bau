<?php
/*
 * Template Name: Product Archive
 */
get_header(); 
get_template_part('components/loader');  
?>
<div class="grid grid-cols-1 lg:grid-cols-2 "> 
    <div class="col-span-2">
        <div class="parallax parallax-projects">
            <div class="parallax-content bg-black-700 w-96 top-1/2 bg-opacity-75 p-6">
            <p class="text-3xl text-white font-bold capitalize">
                <?php
                $url = $_SERVER['REQUEST_URI'];
                $urlParts = explode('/', rtrim($url, '/'));
                $categoryIndex = array_search('projektekategorie', $urlParts);

                if ($categoryIndex !== false && isset($urlParts[$categoryIndex + 1])) {
                    $category = $urlParts[$categoryIndex + 1];
                    echo urldecode($category);
                } else {
                    echo 'Alle Spaci Bau Projekte';
                }
                ?>
            </p>
    </div>
    </div>
    <div class="max-w-mdm mx-10 lg:m-auto grid lg:grid-cols-3 py-20 gap-10">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-6 border hover:shadow-lg'); ?>>
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="h-64 bg-gray-300 bg-cover bg-center" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
                    <?php } ?>
                    <div class="p-4 product-content">
                        <h2 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="text-gray-700 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a class="flex items-center svg-link" href="<?php the_permalink(); ?>">
                            Weiterlesen
                            <span class="icon-container ml-2">
                                <svg class="icon" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="icon-path" d="M7 17L17 7M17 7H8M17 7V16" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                </article>
            <?php
        }
    } else {
        echo 'Keine Einträge gefunden.';
    }
    ?>         
    </div>
    <div class="pagination-archive max-w-mdm m-auto p-10 lg:px-0 "> 
    <?php
    // Display pagination links
        the_posts_pagination();
    ?>
    </div>
    <?php
    get_footer();
    ?>
