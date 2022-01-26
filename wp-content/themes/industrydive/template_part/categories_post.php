<?php

if(have_posts()):
    while(have_posts()): the_post();
?>
<section class="single-post section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-post-thumbnail">
                    <?php the_post_thumbnail() ?>
                </div>
                
                <h3><?php the_title(); ?></h3>
                <div class="post-info w-100 text-center">
                        <p class="mt-2"><?php the_category(', '); ?></p>
                        

                        <p class="mt-2 text-muted author-info"><?php the_author(); ?> / <?php echo get_the_date('F j, Y'); ?></p>
                    
                </div>
                
                <div class="single-post-content">
                    <?php the_excerpt(); ?>
                </div>
                
            </div>
        </div>
    </div>
</section>

    
</div>

<?php
endwhile;

endif;

?>