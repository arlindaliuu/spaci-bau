<?php
/*
 * Template Name: Projects
 */
get_header();
get_template_part('components/loader');  

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

// Query all projects
$args = array(
    'post_type' => 'project',
    'posts_per_page' => 9,
    'paged' => $paged,
    
);

// Check if a specific category is selected
if (isset($_GET['category']) && !empty($_GET['category'])) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'project_category',
            'field' => 'slug',
            'terms' => sanitize_text_field($_GET['category']),
        ),
    );
}

$products_query = new WP_Query($args);

// Get all product categories
$product_categories = get_terms(array(
    'taxonomy' => 'project_category',
    'hide_empty' => true,
));
?>
<div class="grid grid-cols-1 lg:grid-cols-2 "> 
    <div class="col-span-2">
        <div class="parallax parallax-projects">
            <div class="parallax-content bg-black-700 w-96 top-1/2 bg-opacity-75 p-6">
                <p class="text-3xl text-white font-bold capitalize"><?php if(empty($_GET['category'])){ echo 'Alle Spaci Bau Projekteaa'; } else{ echo $_GET['category']; } ?></p>
                <?php custom_breadcrumbs("text-white") ?>
            </div>
        </div>
    </div>
    <div class="col-span-2 mt-6 max-w-mdm m-auto px-10">
        <p><?php the_content(); ?></p>
    </div>
    <div class="max-w-mdm col-span-2 lg:m-auto px-10">
        <div class="mb-4">
            <select class="border-2 p-2" onchange="location = this.value;">
                <option value="<?php echo esc_url(add_query_arg('category', '')); ?>" <?php if (empty($_GET['category'])) echo 'selected'; ?>>Alle</option>
                <?php
                $parent_categories = array_filter($product_categories, function ($category) {
                    return $category->parent == 0;
                });

                foreach ($parent_categories as $parent_category) {
                    $child_categories = array_filter($product_categories, function ($category) use ($parent_category) {
                        return $category->parent == $parent_category->term_id;
                    });
                ?>
                    <optgroup label="<?php echo $parent_category->name; ?>">
                        <option value="<?php echo add_query_arg('category', $parent_category->slug); ?>" <?php if (isset($_GET['category']) && $_GET['category'] === $parent_category->slug) echo 'selected'; ?>><?php echo $parent_category->name; ?></option>
                        <?php foreach ($child_categories as $child_category) { ?>
                            <option value="<?php echo add_query_arg('category', $child_category->slug); ?>" <?php if (isset($_GET['category']) && $_GET['category'] === $child_category->slug) echo 'selected'; ?>>&nbsp;&nbsp;<?php echo $child_category->name; ?></option>
                        <?php } ?>
                    </optgroup>
                <?php } ?>
            </select>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 my-10">
            <?php
            if ($products_query->have_posts()) { 
                while ($products_query->have_posts()) {
                    $products_query->the_post();
                    $product_categories = get_the_terms(get_the_ID(), 'project_category');
                    $product_category_slugs = array();
                    if ($product_categories) {
                        foreach ($product_categories as $category) {
                            $product_category_slugs[] = $category->slug;
                        }
                    }
                    ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white border border-black-700 shadow hover:shadow-xl duration-150'); ?>>
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
            wp_reset_postdata();
            ?>
        </div>
        <?php 
              echo '<div class="pagination flex justify-center gap-4 mb-10">';

              $prev_link = get_previous_posts_link(__('&laquo; Vorherige'));
              $next_link = get_next_posts_link(__('Nächste &raquo;'), $products_query->max_num_pages);
              
              echo '<span class="pagination-link pagination-link-prev">' . $prev_link . '</span>';
              
              for ($i = max(1, $paged - 2); $i <= min($paged + 2, $products_query->max_num_pages); $i++) {
                  $current_class = ($i === $paged) ? 'current' : '';
                  echo '<span class="pagination-link ' . $current_class . '"><a href="' . esc_url(get_pagenum_link($i)) . '">' . $i . '</a></span>';
              }
              
              echo '<span class="pagination-link pagination-link-next">' . $next_link . '</span>';
              
              echo '</div>';
        ?>
    </div>
</div>
<?php
get_footer();
?>
