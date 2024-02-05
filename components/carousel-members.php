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
        <p class="text-black-700 text-md mt-4 lg:mt-0">Bringen Sie Win-Win-Überlebensstrategien auf den Tisch, um eine proaktive Vorherrschaft sicherzustellen. Letzten Endes ist für die Zukunft eine neue Normalität auf dem Weg zu einer optimierten Cloud-Lösung, die sich aus der Generation X entwickelt hat. Benutzergenerierte Inhalte in Echtzeit werden mehrere Touchpoints für das Offshoring haben.</p>
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
        $product_categories = get_the_terms(get_the_ID(), 'product_category');
        $product_category_slugs = array();
        if ($product_categories) {
          foreach ($product_categories as $category) {
            $product_category_slugs[] = $category->slug;
          }
        }
        ?>
   <div class="card  xl:mx-0 md:mx-20 hidden xl:block p-4 md:max-w-[324px] rounded-lg relative">
            <article class="flex flex-col h-full" id="post-<?php the_ID(); ?>">
              <?php if (has_post_thumbnail()) { ?>
                <div class="mt-6 lg:mt-0 self-center">
                        <?php the_post_thumbnail('full', array('class' => 'object-contain')); ?>
                        <a href="<?php the_permalink(); ?>" class="mt-4 text-xl text-blue-50"><?php the_title(); ?></a>
                    </div>              <?php } ?>
            </article>
            <?php $ribbon =  get_field('ribbon', get_the_ID());
            if($ribbon){ ?> 
            <div class="absolute -top-3 text-[9px] text-white px-2 py-1 rounded-lg right-4 <?php if ($ribbon[0] === "Bestes Produkt"){ ?> bg-blue-800 <?php } elseif($ribbon[0] === "Am billigsten"){ ?> bg-red-600 <?php } elseif($ribbon[0] === "die Bestseller"){ ?> bg-orange-100 <?php } ?> "><?php echo $ribbon[0]; ?></div>
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
