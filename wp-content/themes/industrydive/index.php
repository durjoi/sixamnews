<?php 
    get_header();
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
        <section class="featured_banner" style="background-image: url(<?php echo get_template_directory_uri().'/img/banner.jpg' ?>)">
        
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-md-8 col-12 h-100 d-flex flex-column justify-content-center pe-md-5">
                        <h2 class="featured_title">Featured</h2>
                        <div class="slider-for slider">
                            <?php
                                $args = array(
                                        'posts_per_page' => 10,
                                        'meta_key' => 'meta-checkbox',
                                        'meta_value' => 'yes'
                                    );
                                    $featured = new WP_Query($args);
                                
                                if ($featured->have_posts()): 
                                    while($featured->have_posts()): 
                                        $featured->the_post(); 
                            ?>
                                <div class="featured_banner_content">
                                    <h3 class="featured_banner_content_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                    <p class="mb-3"><?php the_category(', '); ?></p>
                                    <p><?php the_excerpt();?></p>
                                    <p class="mt-3"><?php the_author(); ?> / <?php echo reading_time(get_the_id()); ?></p>

                                </div>
                            <?php 
                                    endwhile; 
                                endif;
                            ?>
                        </div>
                    </div>
                    <div class="slider-nav-wrapper col-md-4 h-100 d-flex justify-content-center align-items-center">
                        <div class="slider slider-nav">
                        <?php
                            $args = array(
                                    'posts_per_page' => 10,
                                    'meta_key' => 'meta-checkbox',
                                    'meta_value' => 'yes',
                                    'offset' => 1,
                                );
                                $featured = new WP_Query($args);
                            
                            if ($featured->have_posts()): 
                                $i = 1;
                                while($featured->have_posts()): 
                                    // if($i == $featured->found_posts) {
                                    //     $i = 1;
                                    // }
                                    $featured->the_post(); 
                                    
                        ?>
                            <div class="featured_banner_sidebar_item" data="<?php echo $i ?>">
                                <p><?php the_category(', '); ?></p>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_author(); ?> / <?php echo reading_time(get_the_id()); ?></p>

                            </div>
                        <?php 
                                $i++;
                                endwhile; 
                            endif;
                        ?>

<?php
                            $args = array(
                                    'posts_per_page' => 1,
                                    'meta_key' => 'meta-checkbox',
                                    'meta_value' => 'yes',
                                );
                                $featured = new WP_Query($args);
                            
                            if ($featured->have_posts()): 
                                while($featured->have_posts()): 
                                    // if($i == $featured->found_posts) {
                                    //     $i = 1;
                                    // }
                                    $featured->the_post(); 
                                    
                        ?>
                            <div class="featured_banner_sidebar_item" data="<?php echo $i ?>">
                                <p><?php the_category(', '); ?></p>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_author(); ?> / <?php echo reading_time(get_the_id()); ?></p>

                            </div>
                        <?php 
                                $i++;
                                endwhile; 
                            endif;
                        ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="latest_article section-padding">
            <div class="section-header">
                <div class="container">
                    <div class="row">
                        <h2 class="section-title">
                             Latest Article
                        </h2>
                        <div class="section_underline"></div>
                    </div>
                </div>
            </div>
            <div class="latest_article_content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="latest_article_layout">
                                <?php 
                                // Define our WP Query Parameters
                                $the_query = new WP_Query( ['posts_per_page' => 3] ); ?>
                                <?php 
                                    // Start our WP Query
                                    while ($the_query -> have_posts()) : $the_query -> the_post(); 
                                    // Display the Post Title with Hyperlink
                                ?>
                                <div class="latest_article_item">
                                    <?php the_post_thumbnail() ?>
                                    <div class="content">
                                        <?php the_category(', '); ?>
                                        <h3 class="latest_article_item_title">
                                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <span class="mt-2 text-muted author-info"><?php the_author(); ?> / <?php echo reading_time(get_the_id()) ?> </span>

                                        <?php //echo get_the_date('F j, Y'); ?>
                                        <?php the_excerpt('more'); ?>
                                    </div>
                                    
                                </div>

                                <?php 
                                    // Repeat the process and reset once it hits the limit
                                    endwhile;
                                
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="most_viewed section-padding">
            <div class="section-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h2 class="section-title">
                                        Most Viewed
                                    </h2>
                                    <div class="section_underline"></div>
                                </div>
                                <div>
                                    <button class="carousel-control-left" type="button" data-bs-target="#carouselExampleControls" >
                                    <i class="fa fa-arrow-left"></i>
                                    </button>
                                    <button class="carousel-control-right" type="button" data-bs-target="#carouselExampleControls" >
                                    <i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                
                                <?php 
                                $popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
                                while ( $popularpost->have_posts() ) : $popularpost->the_post();
                                ?>
                                <div class="carousel-item">
                                    <div class="card">
                                        <div class="img-wrapper"><?php the_post_thumbnail() ?></div>
                                        <div class="card-body">
                                            <?php the_category(', '); ?>
                                            <h3 class="latest_article_item_title">
                                                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <span class="mt-2 text-muted author-info"><?php the_author(); ?> / <?php echo reading_time(get_the_id()); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-start ps-md-5">
                    <form class="w-100" action="#" onSubmit="submitNewsletter(event)">
                        <div class="email-newsletter newsletter">
                                <p>Subscribe to our newsletter for <br/> the latest update</p>
                                
                                <div class="input-box">
                                    
                                        <input type="hidden" name="industrydive_submit_subscription" value="Submit">
                                        <input type="email" class="subscriber-email" name="subscriber-email" placeholder="Enter your email"> <button type="submit"><i class="fa fa-envelope"></i></button>
                                    
                                    
                                </div>
                                
                                
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding filter-section">
            <div class="container pb-3 pb-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <?php $categories = get_categories(); ?>
                        <div class="select-box">
                            <label for="category_filter"><i class="fa fa-filter"></i> Filter - </label>
                            <select name="category" id="category_filter">
                                <option value="all">All</option>
                                <?php foreach($categories as $category) : ?>
                                    <option value="<?php echo $category->slug ?>">
                                        <?php echo $category->name ?>
                                    </option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container filter-section_posts">
                <div class="row">
                    <div class="col-md-12">
                        <div id="ajax-posts" class="latest_article_layout">
                            <?php 
                                $posts = new WP_Query([
                                    'posts_per_page' => 9,
                                    'post_type' => 'post',
                                    'orderby' => 'date', 
                                    'order' => 'desc',
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
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button id="more_posts"><i class="fa fa-th me-2"></i> Load More</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    get_footer();
?>