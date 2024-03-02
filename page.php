<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">
    <?php get_template_part('parts/hero/default-hero', get_post_format()); ?>
    <section class="sec sec--report">
        <div class="container container--narrow">
            <div class="row">
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        ?>
                        <div class="col-12">
                            <?php the_content(); ?>
                        </div>
                        <?php
                    endwhile;
                else: ?>
                    <p>Nothing yet to be displayed</p>
                <?php endif;
                ?>
            </div>
        </div>
    </section>
</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>