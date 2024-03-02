<?php get_header(); ?>

<!-- ----- HEADER ----- -->

<main class="site">

  <!-- ------ START / Hero Section ----- -->

  <section class="sec sec--hero">
    <?php
    $hero_section = get_field('hero_section');
    if ($hero_section):
      $title = $hero_section['title'];
      $description = $hero_section['description'];
      $hero_background = $hero_section['hero_background'];
      $video = $hero_section['video'];
      $image = $hero_section['image'];

      if ($hero_background == 'Video') { ?>
        <div class="background">
          <video class="background__video" loop autoplay muted>
            <source src="<?php echo $video ?>">
          </video>
        </div>
      <?php } else if ($hero_background == 'Image') { ?>
          <div class="background" style="background-image: url('<?php echo $image ?>')">
          </div>
      <?php } ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-12">
            <h1 class="wds2-type-display-l">
              <?php echo $title; ?>
            </h1>
            <p class="wds2-type-display-s">
              <?php echo $description; ?>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>

  <!-- ------ END / Hero Section ----- -->

  <!-- ------ START / What's New Section ----- -->

  <section class="sec sec--swiper sec--black">
    <div class="container">
      <div class="row row--intro">
        <div class="col-lg-8 col-md-6 col-12">
          <p class="wds2-type-display-s">News</p>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <a href="/whats-new" class="wds2-button wds2-button-secondary-ondark">View All</a>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="swiper whats-news">
            <div class="swiper-wrapper">
              <?php
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'category__in' => array(),
                'category__not_in' => array()
              );
              $postlist = new WP_Query($args);
              if ($postlist->have_posts()):
                while ($postlist->have_posts()):
                  $postlist->the_post();
                  ?>
                  <div class="swiper-slide item">
                    <div class="item__image">
                      <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <div class="item__content">
                      <div class="info">
                        <div class="category">
                          <?php the_category(); ?>
                        </div>
                        <time>
                          <?php echo get_the_date('d/m/Y'); ?>
                        </time>
                      </div>
                      <h3 class="wds2-type-display-xs">
                        <?php the_title(); ?>
                      </h3>
                      <div class="excerpt">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="wds2-button wds2-button-tertiary-ondark">Read More</a>
                      </div>
                    </div>
                  </div>
                  <?php
                endwhile;
                wp_reset_postdata();
              else: ?>
                <p>Nothing yet to be displayed</p>
              <?php endif;
              ?>
            </div>
            <div class="swiper-navigation">
              <div class="swiper-pagination"></div>
              <div class="swiper-arrows">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- ------ END / What's New Section ----- -->

  <!-- ------ START / Latest Reports Section ----- -->

  <?php
  $insights_section = get_field('insights_section');
  if ($insights_section):
    $title = $insights_section['section_title'];
    $description = $insights_section['section_description'];
    ?>
    <section class="sec sec--report sec--grey">
      <div class="container">
        <div class="row row--intro">
          <div class="col-md-8 col-12">
            <h2 class="wds2-type-display-l">
              <?php echo $title; ?>
            </h2>
            <p>
              <?php echo $description; ?>
            </p>
          </div>
          <div class="col-md-4 col-12">
            <a href="/insights/" class="wds2-button wds2-button-secondary-onlight">View All</a>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-lg-12 flex-2"> -->
          <?php
          $args = array(
            'post_type' => 'insights',
            'posts_per_page' => 6,
            'category__in' => array(),
            'category__not_in' => array()
          );
          $postlist = new WP_Query($args);

          if ($postlist->have_posts()):
            while ($postlist->have_posts()):
              ?>
              <div class="col-lg-4 col-12">
                <?php
                $postlist->the_post();
                get_template_part('parts/insights-content-col', get_post_format());
                ?>
              </div>
              <?php
            endwhile;
            wp_reset_postdata();
          else: ?>
            <p>Nothing yet to be displayed</p>
          <?php endif;
          ?>
          <!-- </div> -->
        </div>
      </div>
      <?php wp_reset_postdata();
  endif;
  ?>
  </section>

  <!-- ------ END / Latest Reports Section ----- -->

  <!-- ------ START / Guidelines Section ----- -->

  <?php
  $guidelines_section = get_field('guidelines_section');
  if ($guidelines_section) {
    $title = $guidelines_section['section_title'];
    $description = $guidelines_section['section_description'];
    $pages = $guidelines_section['pages'];
    ?>
    <section class="sec sec--teaser">
      <div class="container">
        <div class="row row--intro">
          <div class="col-lg-8 col-md-6 col-12">
            <h2 class="wds2-type-display-l">
              <?php echo $title; ?>
            </h2>
            <p>
              <?php echo $description; ?>
            </p>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <a href="/guidelines" class="wds2-button wds2-button-secondary-onlight">View All</a>
          </div>
        </div>
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
    <?php
  }
  ?>

  <!-- ------ END / Guidelines Section ----- -->

  <!-- ------ START / About Section ----- -->

  <section class="sec sec--text-image sec--grey">
    <div class="container">
      <div class="row">
        <?php
        $about_section = get_field('about_section');
        if ($about_section):
          $title = $about_section['section_title'];
          $description = $about_section["section_description"];
          $button_text = $about_section["section_button_text"];
          $button_url = $about_section["section_button_url"];
          $image = $about_section["section_image"];
          get_template_part(
            'parts/modules/text-image',
            get_post_format(),
            array(
              'title' => $title,
              'description' => $description,
              'button_text' => $button_text,
              'button_url' => $button_url,
              'image' => $image
            )
          );
          ?>
          <?php
        endif; ?>
      </div>
    </div>
  </section>

  <!-- ------ END / About Section ----- -->

  <!-- ------ START / Quotes Section ----- -->

  <?php
  $quotes_section = get_field('quotes_section');
  if ($quotes_section) {
    $quotes = $quotes_section['quotes'];
    ?>
    <section class="sec sec--quotes">
      <div class="container">
        <div class="row">
          <?php
          if ($quotes):
            foreach ($quotes as $quote_item) {
              $quote = $quote_item['quote'];
              $image = $quote_item['image'];
              $name = $quote_item['name'];
              $role = $quote_item['role'];
              ?>
              <div class="col-lg-6">
                <?php
                get_template_part(
                  'parts/modules/quote',
                  get_post_format(),
                  array(
                    'quote' => $quote,
                    'image' => $image,
                    'name' => $name,
                    'role' => $role
                  )
                );
                ?>
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
  <?php } ?>

</main>

<!-- ----- FOOTER ----- -->

<?php get_footer(); ?>