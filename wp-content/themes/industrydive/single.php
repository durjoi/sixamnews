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
        <?php get_template_part('template_part/post_setup') ?>
    </main>

<?php 
    get_footer();
?>
