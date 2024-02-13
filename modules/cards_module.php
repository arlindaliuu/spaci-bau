<?php

$modules = get_field('field_1', get_the_ID()); 
    for( $i = 0; $i < count($modules); $i++){
        if($modules[$i]['acf_fc_layout'] == "cards_module"){
            $data = $modules[$i];
        }
    }
  $taxonomy = $data['category'] ? $data['category'] : '';
  $title = $data['card_title'];
  $post_type = $data['post_type'];
  $allCategoriesSelected = $data['category_all'];
  // Query all projects
  // Initialize $args array
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => -1,
    );

    if(!$allCategoriesSelected){
      // Conditionally add tax_query for 'project' post type
      if ($post_type === 'project') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'project_category',
                'field'    => 'name',
                'terms'    => $taxonomy,
            ),
        );
      }else{
        $args['tax_query'] = array(
          array(
              'taxonomy' => 'category',
              'field'    => 'name',
              'terms'    => $taxonomy,
          ),
        );
      }
    }
   
  $products_query = new WP_Query($args);
  ?>
    <div class="wrapper-carousel flex justify-center items-center relative flex-wrap flex-col">
      <div class="carousel-bg absolute xl:block hidden right-0 top-0 h-full w-1/4 z-10"></div>
      <div class="carousel pt-20">
        <p class="text-xl lg:text-4xl font-semibold text-white mb-10 px-10 lg:px-0 lg:text-left text-center"><?= $title ?> <hr class="w-full lg:w-2/12 h-2 border-solid border-t-4 border-yellow-600"/></p>
        <div class="carousel-wrapper p-6 gap-x-4">
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
              <div class="card border xl:mx-0 md:mx-20 hidden xl:block bg-gray-200 p-4 md:max-w-[324px] min-h-[503px] rounded-lg relative">
                <article class="flex flex-col h-full" id="post-<?php the_ID(); ?>">
                  <?php if (has_post_thumbnail()) { ?>
                    <div class="md:min-w-[292px] min-h-[225px] max-h-[225px] bg-gray-300 bg-cover bg-center" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
                  <?php } ?>
                  <div class="py-4 h-full">
                    <h2 class="text-lg lg:text-xl font-bold mb-2 title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="text-gray-700 mb-4 text-base content-card"><?php echo get_the_excerpt(); ?></p>
                  </div>
                  <a href="<?php the_permalink(); ?>" class="w-full self-end px-4 py-2 bg-yellow-500 text-black font-bold block text-center rounded-lg hover:bg-blue-50 hover:text-white duration-300 hover:scale-105">
                    Weiterlesen
                  </a>
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
      <div class="flex justify-between lg:justify-start px-10 gap-10 pb-20 w-full max-w-screen-xl	">
          <button class="carousel-arrow-prev bg-white py-3 px-4 hover:bg-blue-400 hover:text-blue-50 hover:scale-110 duration-200 rounded-md">&lt;</button>
          <button class="carousel-arrow-next bg-white py-3 px-4 hover:bg-blue-400 hover:text-blue-50 hover:scale-110 duration-200 rounded-md">&gt;</button>
        </div>
    </div>
