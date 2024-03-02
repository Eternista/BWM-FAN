<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">
  <?php get_template_part('parts/hero/default-hero', get_post_format()); ?>
  <section class="sec sec--teaser">
    <div class="container">
      <div class="row row--intro">
        <div class="col-12">
          <?php echo do_shortcode('[facetwp facet="whats_new_categories"]'); ?>
        </div>
      </div>
      <div id="main" class="row">
        <div class="col-12">
          <?php echo do_shortcode('[facetwp template="whats_new_results"]'); ?>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>