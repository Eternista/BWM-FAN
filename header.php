<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>
    <meta http-equiv=" X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <?php wp_head(); ?>
  <title>
    <?php bloginfo('name'); ?>
  </title>
</head>

<body <?php body_class(); ?>>
  <?php
  if (function_exists('wp_body_open')) {
    wp_body_open();
  }
  ?>
  <?php global $wp;
  $loginUrl = $wp->request;
  if ($loginUrl != "login") {
    ?>
    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-5 header__logo">
            <?php
            if (function_exists('the_custom_logo')) {
              if (get_theme_mod('custom_logo_light')) {
                $logo_light_id = get_theme_mod('custom_logo_light');
                $logo_light = wp_get_attachment_image_src($logo_light_id, 'full');
                echo '<a href="/" class="logo"><img class="site-logo-light" src="' . esc_url($logo_light[0]) . '" alt="' . get_bloginfo('name') . '"></a>';
              }
            }
            ?>
          </div>
          <nav class="col-lg-9 header__menu">
            <?php wp_nav_menu(array('theme_location' => 'wp_drivece_main_menu', 'depth' => '0')); ?>
          </nav>
          <div class="burger-container">
            <a class="burger" role="button" aria-expanded="false"> <span>Open/Close
                menu</span>
            </a>
          </div>
          <aside class="mobile-menu">
            <nav class="mobile-menu__nav">
              <?php get_search_form(); ?>
              <?php wp_nav_menu(array('theme_location' => 'wp_drivece_main_menu', 'depth' => '0')); ?>
            </nav>
          </aside>
        </div>
      </div>
    </header>
    <?php
  }
  ?>