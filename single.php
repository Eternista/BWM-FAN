<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">
    <?php get_template_part('parts/hero/default-hero', get_post_format()); ?>
    <section class="sec sec--report">
        <div class="container container--narrow">
            <div class="row">
                <div class="col-12">
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            ?>
                            <?php the_content(); ?>
                            <?php
                            $file = get_field('file');
                            $external = get_field('external');
                            $video = get_field('video');
                            if ($file || $external) {
                                ?>
                                <div class="wds-action-strip-button">
                                    <?php
                                    if ($file) {
                                        ?>
                                        <a class="wds2-button wds2-button-primary-onlight" target="_blank"
                                            href="<?php echo $file['url']; ?>">Download PDF</a>
                                        <?php
                                    }
                                    if ($external) {
                                        ?>
                                        <a class="wds2-button wds2-button-primary-onlight" target="_blank"
                                            href="<?php echo $external ?>">View Details</a>
                                        <?php
                                    }
                                    ?>
                                    <?php if (!empty($video)): ?>
                                        <a target="_blank" href="<?php the_field('video'); ?>"
                                            class="wds2-button wds2-button-secondary-onlight">Watch Video</a>
                                    <?php endif; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                        endwhile;
                    else: ?>
                        <p>Nothing yet to be displayed</p>
                    <?php endif;
                    ?>
                </div>
                <div class="nav-previous alignleft col-6">
                    <?php previous_post_link('<strong>%link</strong>'); ?>
                </div>
                <div class="nav-next alignright col-6">
                    <?php next_post_link('<strong>%link</strong>'); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>