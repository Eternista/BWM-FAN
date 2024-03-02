<?php
/*
Template Name: Template External Pages
*/
?>

<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">
    <?php get_template_part('parts/hero/default-hero', get_post_format()); ?>
    <?php
    $repeater = get_field('external_pages_sections');
    if ($repeater):
        foreach ($repeater as $row):
            $title = $row['section_title'];
            $description = $row['section_description'];
            $pages = $row['section_pages'];
            ?>
            <section class="sec sec--teaser">
                <div class="container">
                    <?php if ($title): ?>
                        <div class="row row--intro">
                            <div class="col-lg-8 col-md-6 col-12">
                                <h2 class="wds2-type-display-l">
                                    <?php echo $title; ?>
                                </h2>
                                <?php if ($description): ?>
                                    <p>
                                        <?php echo $description; ?>
                                    </p>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <?php
                        if ($pages):
                            foreach ($pages as $page) {
                                $page_featured_image = $page['page_featured_image'];
                                $page_title = $page['page_title'];
                                $page_excerpt = $page['page_excerpt'];
                                $page_link = $page['page_link'];
                                ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <?php get_template_part(
                                        'parts/modules/teaser-cf',
                                        get_post_format(),
                                        array(
                                            'page_featured_image' => $page_featured_image,
                                            'page_title' => $page_title,
                                            'page_excerpt' => $page_excerpt,
                                            'page_link' => $page_link
                                        )
                                    ); ?>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
                </div>
            </section>
            <div class="divider"></div>
        <?php endforeach;
    endif;
    ?>
</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>