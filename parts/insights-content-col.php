<article class="single-report">
    <div class="single-report__image"">
        <?php if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail(); ?>
        <?php } else { ?>
            <img src=" /wp-content/themes/wp-drivece/assets/images/Font.png" alt="">
        <?php } ?>
    </div>
    <div class="single-report__text">
        <time>
            Published:
            <?php echo get_the_date('d/m/Y'); ?>
        </time>
        <h3>
            <?php the_title(); ?>
        </h3>
        <?php the_content(); ?>
        <div class="category">
            <?php
            $taxonomies = get_taxonomies();
            foreach ($taxonomies as $taxonomy) {
                $terms = get_the_terms(get_the_ID(), $taxonomy);
                if ($terms && !is_wp_error($terms)) {
                    $term_list = '';
                    foreach ($terms as $term) {
                        $term_list .= $term->name . ', ';
                    }
                    $term_list = rtrim($term_list, ', ');
                    echo '<div class="' . $taxonomy . '"><strong>' . get_taxonomy($taxonomy)->labels->name . ': </strong>' . $term_list . '</div>'
                    ;
                }
            }
            ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="wds2-button wds2-button-primary-onlight">View Offer</a>
    </div>
</article>