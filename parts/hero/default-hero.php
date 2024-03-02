<section class="sec sec--hero sec--hero--small">
    <?php if (has_post_thumbnail()) { ?>
        <div class="background" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
        <?php } else { ?>
            <div class="background"
                style='background-image: url("<?php bloginfo('template_directory'); ?>/assets/images/Fallback-Image.jpg")'>
            <?php } ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <?php
                    $custom_title = get_field('custom_title');
                    $hero_description = get_field('hero_description');
                    $primary_button_text = get_field('primary_button_text');
                    $primary_button_url = get_field('primary_button_url');
                    $secondary_button_text = get_field('secondary_button_text');
                    $secondary_button_url = get_field('secondary_button_url');
                    ?>
                    <h1 class="wds2-type-display-l">
                        <?php
                        if ($custom_title) {
                            echo $custom_title;
                        } else {
                            wp_title('');
                        }
                        ?>
                    </h1>
                    <?php
                    if ($hero_description) {
                        echo '<p class="wds2-type-display-s">' . $hero_description . '</p>';
                    }
                    ?>
                    <?php if ($primary_button_text & $primary_button_url) { ?>
                        <div class="wds-action-strip-button">
                            <a class="wds2-button wds2-button-primary-ondark" s target="_blank"
                                href="<?php $primary_button_url; ?>"><?php echo $primary_button_text; ?></a>
                            <a target="_blank" href="<?php $secondary_button_url; ?>"
                                class="wds2-button wds2-button-secondary-ondark"><?php echo $secondary_button_text; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</section>