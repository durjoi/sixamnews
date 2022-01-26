<div class="latest_article_item">
    <?php the_post_thumbnail() ?>
    <div class="content">
        <?php the_category(', '); ?>
        <h3 class="latest_article_item_title">
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </h3>
        <span class="mt-2 text-muted author-info"><?php the_author(); ?> / <?php echo get_the_date('F j, Y'); ?></span>
        <?php the_excerpt('more'); ?>
    </div>
    
</div>