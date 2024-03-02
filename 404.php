<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header('dark'); ?>

<!-- ----- HEADER ----- -->

<main class="site">

    <section class="sec sec--text-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-12">
                    <blockquote class="sec--text-image__content">
                        <div class="separator separator--short"></div>
                        <h2 class="wds2-type-display-l">We're sorry, 404 times over.</h2>
                        <p>The page you requested cannot be found.</p>
                        <a href="/home" class="wds2-button wds2-button-primary-onlight">back to homepage</a>
                    </blockquote>
                </div>
                <div class="col-lg-5 col-md-6 col-12 sec--text-image__image"><img
                        src="/wp-content/themes/wp-drivece/assets/images/404-Placeholder.png" alt="">
                </div>
            </div>
        </div>
    </section>

</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>