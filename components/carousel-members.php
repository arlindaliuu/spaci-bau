<?php
// Query all members
$args = array(
    'post_type' => 'member',
    'posts_per_page' => -1,
);
$products_query = new WP_Query($args);
?>
<div class="carousel m-auto p-10">
  <div class="grid lg:grid-cols-3">
    <div>
        <h1 class="text-3xl text-blue-50 font-bold flex items-center">Unsere Team</h1>
        <hr class="ml-5 w-2/12 h-2 border-solid border-t-4 border-orange-500"/>
    </div>
    <div class="col-span-2">
        <p class="text-black-700 text-md mt-4 lg:mt-0">Lernen Sie unser Team kennen – die engagierten Fachkräfte hinter unserem Erfolg. Mit jahrelanger Erfahrung im Bauwesen sorgt unser qualifiziertes Team für höchste Qualität, Präzision und Zuverlässigkeit in jedem Projekt. Lernen Sie die Experten kennen, die Ihre Visionen verwirklichen!</p>
    </div>
  </div>
  <div class="flex justify-end gap-10">
    <button class="carousel-arrow-prev p-3 border-2 rounded-sm hover:bg-blue-400">&lt;</button>
    <button class="carousel-arrow-next p-3 border-2 rounded-sm hover:bg-blue-400">&gt;</button>
  </div>
  <div class="carousel-wrapper pt-5 justify-center">
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
        <div class="card xl:-mx-2 md:mx-20 hidden xl:block p-4 md:max-w-[324px] rounded-lg relative select-none">
            <article class="flex flex-col h-full" id="post-<?php the_ID(); ?>">
              <?php if (has_post_thumbnail()) { ?>
                <div class="mt-6 lg:mt-0 self-center grid gap-4">
                    <?php the_post_thumbnail('150, 150', array('class' => 'object-contain min-h-[150px] min-w-[150px] max-h-[150px] max-w-[150px] rounded-full')); ?>
                    <a href="<?php the_permalink(); ?>" class="mt-4 text-xl text-blue-50 text-center font-bold"><?php the_title(); ?></a>
                </div>              
              <?php } ?>
            </article>
            <?php $ribbon =  get_the_excerpt();
              if($ribbon){ ?> 
                <div class="absolute -top-3 text-[9px] text-white px-2 py-1 rounded-lg right-4 bg-orange-100"><?php echo $ribbon; ?></div>
              <?php } ?>
          </div>
        <?php
      }
      wp_reset_postdata();
    } else {
      echo 'Keine Einträge gefunden.';
    }
    ?>
  </div>
</div>
