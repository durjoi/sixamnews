<?php

    get_header();
?>

    <main class="category_page">
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
        
    </main>

<?php 
    get_footer();
?>
