<?php
/*
Template Name: Account Template
*/
?>

<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">
    <section class="sec sec--single-article sec--hero">
        <div class="background" style="background-image: url('/wp-content/uploads/2024/02/Abou3.jpg')"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            ?>
                            <div class="login-form">
                                <?php
                                if (function_exists('the_custom_logo')) {
                                    if (get_theme_mod('custom_logo_dark')) {
                                        $logo_dark_id = get_theme_mod('custom_logo_dark');
                                        $logo_dark = wp_get_attachment_image_src($logo_dark_id, 'full');
                                        echo '<img src="' . esc_url($logo_dark[0]) . '" alt="' . get_bloginfo('name') . '">';
                                        // echo '<a href="/" class="logo"><img class="site-logo-dark" src="' . esc_url($logo_dark[0]) . '" alt="' . get_bloginfo('name') . '"></a>';
                                    }
                                }
                                ?>
                                <!-- <img src="/wp-content/uploads/2024/01/Logo-Light.svg"> -->
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
        </div>
    </section>
</main>

<!-- ----- FOOTER ----- -->
<?php
get_footer('none'); ?>