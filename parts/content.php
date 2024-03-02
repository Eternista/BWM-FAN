<article class="single-teaser">
    <div class="single-teaser__image">
        <?php the_post_thumbnail('medium'); ?>
    </div>
    <div class="single-teaser__content">
        <div class="info">
            <div class="category">
                <?php the_category(); ?>
            </div>
            <time>
                <?php echo get_the_date('d/m/Y'); ?>
            </time>
        </div>
        <h3>
            <?php the_title(); ?>
        </h3>
        <p>
            <?php the_excerpt(); ?>
        </p>
        <a href="<?php the_permalink(); ?>" class="wds2-button wds2-button-tertiary-onlight">Read More</a>
    </div>
</article>