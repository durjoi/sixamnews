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
        <section class="category_page pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            while(have_posts()) : the_post();
                                get_template_part('template_part/post_item');
                            endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        
    </main>

<?php 
    get_footer();
?>
