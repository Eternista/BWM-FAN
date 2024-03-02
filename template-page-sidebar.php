<?php
/*
Template Name: Page with Sidebar
*/
?>

<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">
    <?php get_template_part('parts/hero/default-hero', get_post_format()); ?>
    <section class="sec sec--report">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col-lg-9 col-12">
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            ?>
                            <?php the_content(); ?>
                            <?php
                        endwhile;
                    else: ?>
                        <p>Nothing yet to be displayed</p>
                    <?php endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>