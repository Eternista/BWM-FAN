<article class="single-teaser">
    <div class="single-teaser__image">
        <?php if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail(); ?>
        <?php } else { ?>
            <img src="/wp-content/themes/wp-drivece/assets/images/Font.png" alt="">
        <?php } ?>
    </div>
    <div class="single-teaser__content">
        <h3>
            <?php the_title(); ?>
        </h3>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="wds2-button wds2-button-tertiary-onlight">Read More</a>
    </div>
</article>