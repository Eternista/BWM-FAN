<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">
    <?php get_template_part('parts/hero/default-hero', get_post_format()); ?>
    <section class="sec sec--teaser sec--grey">
        <div class="container">
            <div class="row row--intor">
                <div class="col-lg-8 col-12">
                    <h2 class="wds2-type-display-l">Foundations</h2>
                    <p>We have created three foundational frameworks that help enable us deliver experiences that,
                        beyond
                        the
                        vehicle, give customers even more reasons to fall in love with Font.</p>
                </div>
            </div>
            <div class="row">
                <?php if (have_posts()): ?>

                    <!-- Add the pagination functions here. -->

                    <!-- Start of the main loop. -->
                    <?php while (have_posts()):
                        the_post(); ?>
                        <div class="col-lg-4 col-md-6 col-12">

                            <!-- the rest of your theme's main loop -->

                            <?php get_template_part('parts/content-archive', get_post_format()); ?>

                        </div>
                    <?php endwhile; ?>
                    <!-- End of the main loop -->
                </div>

                <!-- Add the pagination functions here. -->

                <div class="nav-previous alignleft">
                    <?php previous_posts_link('Older posts >>'); ?>
                </div>
                <div class="nav-next alignright">
                    <?php next_posts_link('<< Newer posts'); ?>
                </div>

            <?php else: ?>
                <p>
                    <?php _e('Sorry, no posts matched your criteria.'); ?>
                </p>
            <?php endif; ?>

        </div>
    </section>
</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>