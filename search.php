<?php get_header('dark'); ?>

<!-- ----- HEADER ----- -->

<section class="sec sec--report">
    <div class="container">
        <div class="row row--intro">
            <div class="col-12">
                <h1>Search Results for:
                    <?php echo get_search_query(); ?>
                </h1>
                <?php
                get_search_form();
                ?>
            </div>
        </div>
        <div id="main" class="row">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    ?>
                    <div class="col-12">
                        <article class="single-report">
                            <div class="single-report__text">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="wds2-button wds2-button-tertiary-onlight">Read
                                    More</a>
                            </div>
                        </article>
                        <!-- <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                        <a href="<?php get_permalink(); ?>">Read More</a> -->
                    </div>
                    <div class="divider col-12"></div>
                <?php endwhile; ?>
                <?php
                the_posts_pagination(
                    array(
                        'prev_text' => _x('Previous', 'previous set of posts'),
                        'next_text' => _x('Next', 'next set of posts'),
                        'screen_reader_text' => __('Posts navigation'),
                        'aria_label' => __('Posts'),
                    )
                );
                ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>No search results found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>