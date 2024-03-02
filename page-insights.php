<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">
  <?php get_template_part('parts/hero/default-hero', get_post_format()); ?>
  <section class="sec sec--report sec--teaser">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="filter-column">
            <?php echo do_shortcode('[facetwp facet="search" label="Kolor"]'); ?>
            <?php echo do_shortcode('[facetwp facet="bmw_model" label="Kolor"]'); ?>
            <?php echo do_shortcode('[facetwp facet="year_of_manufacture" label="Kolor"]'); ?>
            <?php echo do_shortcode('[facetwp facet="body_type" label="Kolor"]'); ?>
            <?php echo do_shortcode('[facetwp facet="fuel_type" label="Kolor"]'); ?>
            <?php echo do_shortcode('[facetwp facet="mileage" label="Kolor"]'); ?>
            <?php echo do_shortcode('[facetwp facet="price" label="Kolor"]'); ?>
            <?php echo do_shortcode('[facetwp facet="reset_insights_filters"]'); ?>
          </div>
        </div>
        <div class="col-lg-8 col-12">
          <?php echo do_shortcode('[facetwp template="insights_results"]'); ?>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>