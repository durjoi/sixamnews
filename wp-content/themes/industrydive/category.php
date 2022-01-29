<?php

    get_header();

    $currCat = get_category(get_query_var('cat'));
    $cat_name = $currCat->name;
    $cat_id   = get_cat_ID( $cat_name );
?>

    <main>
        <section class="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><?php get_breadcrumb(); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="category_page pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="category_post">
                        <?php

$posts = new WP_Query([
    'posts_per_page' => 9,
    'post_type' => 'post',
    'orderby' => 'date', 
    'order' => 'desc',
    'category_name' => $cat_name,
  ]);

  if($posts->have_posts()) {
    while($posts->have_posts()) : $posts->the_post();
      get_template_part('template_part/post_item');
    endwhile;
  }
                        ?>
                    </div>
                </div>
            </div>

            <!-- <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button id="category_load_more" data="<?php //echo $cat_name?>"><i class="fa fa-th me-2"></i> Load More</button>
                    </div>
                </div>
            </div> -->
        </section>
        
        
    </main>

<?php 
    get_footer();
?>
