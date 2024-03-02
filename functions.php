<?php

// ------ START / Register Styles & Scripts -----

function wp_drivece_load_scripts()
{
    wp_enqueue_style('wp_drivece-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
    wp_enqueue_style("bs_css", "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css");
    wp_enqueue_style("swipper_css", "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css");
    wp_enqueue_script('swiper_js', "https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js", array(), '1.0', true);
    wp_enqueue_script('script', get_template_directory_uri() . "/script.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'wp_drivece_load_scripts');

// ------ END / Register Styles & Scripts -----

// ------ START / Register Menus -----

function wp_drivece_config()
{

    // Featured image

    add_theme_support('post-thumbnails');

    // Register menus
    register_nav_menus(
        array(
            'wp_drivece_main_menu' => 'Main Menu',
            'wp_drivece_footer_menu' => 'Footer Menu'
        )
    );
}

add_action('after_setup_theme', 'wp_drivece_config');

// ------ END / Register Menus -----

// ------ START / Add Custom Light & Dark Logo -----
function custom_theme_customize_register($wp_customize)
{
    // Add Light Logo
    $wp_customize->add_setting('custom_logo_light');
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'custom_logo_light',
            array(
                'label' => __('Light Logo', 'custom-theme'),
                'description' => __('Choose a logo for the light version.', 'custom-theme'),
                'section' => 'title_tagline',
                'mime_type' => 'image',
            )
        )
    );

    // Add Dark Logo
    $wp_customize->add_setting('custom_logo_dark');
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'custom_logo_dark',
            array(
                'label' => __('Dark Logo', 'custom-theme'),
                'description' => __('Choose a logo for the dark version.', 'custom-theme'),
                'section' => 'title_tagline',
                'mime_type' => 'image',
            )
        )
    );
}
add_action('customize_register', 'custom_theme_customize_register');


// ------ START / Register Sidebar -----

add_action('widgets_init', 'wp_drivece_sidebars');

function wp_drivece_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => "sidebar-blog",
            'description' => ' This is the Blog Sidebar',
            'class' => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => "</li>\n",
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => "</h2>\n",
            'before_sidebar' => '',
            'after_sidebar' => '',
            'show_in_rest' => false,
        )
    );

    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => "sidebar-page",
            'description' => ' This is the Page Sidebar',
            'class' => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => "</li>\n",
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => "</h2>\n",
            'before_sidebar' => '',
            'after_sidebar' => '',
            'show_in_rest' => false,
        )
    );
}

// ------ END / Register Sidebar -----

// ------ START / Filter the excerpt length to 30 words -----
function wp_example_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'wp_example_excerpt_length');

// ------ END / Filter the excerpt length to 30 words -----

// ------ START / Hide Elements on Pages -----

// Editor
function hide_editor_by_id()
{
    $pages = array(7, 11, 13, 19); // tablica z ID stron, na których chcesz ukryć edytor
    $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : false);
    if (in_array($post_id, $pages)) {
        remove_post_type_support('page', 'editor');
    }
}
add_action('init', 'hide_editor_by_id');

// Featured Image
function hide_featured_image_metabox()
{
    global $post;

    // Wymień ID strony, dla której chcesz ukryć pole Featured Image
    $page_id = 7;

    if ($post && $post->ID == $page_id) {
        remove_meta_box('postimagediv', 'page', 'side');
    }
}
add_action('do_meta_boxes', 'hide_featured_image_metabox');

// ------ END / Hide Elements on Pages -----

// ------ START / Add Custom Buttons In Text Editor -----
function add_custom_buttons($buttons)
{
    array_push($buttons, 'customButton');
    return $buttons;
}

function add_custom_plugins($plugin_array)
{
    $plugin_array['customButtons'] = get_template_directory_uri() . '/js/custom-buttons.js';
    return $plugin_array;
}

add_filter('mce_buttons', 'add_custom_buttons');
add_filter('mce_external_plugins', 'add_custom_plugins');

// ------ END / Add Custom Buttons In Text Editor -----

// ------ START / Seach In PDFs -----
function my_searchwp_xpdf_path($path)
{
    // Replace "/usr/bin/pdftotext" with the path to your pdftotext binary
    return '/usr/bin/pdftotext';
}
add_filter('searchwp_xpdf_path', 'my_searchwp_xpdf_path');

// ------ END / Seach In PDFs -----

// ------ START / If Find PDF Show Report Which Include IT -----
add_filter('searchwp\source\post\attributes\meta\document', function ($meta_value, $args) {

    if ('insights' !== get_post_type($args['post_id'])) {
        return $meta_value;
    }

    $document_file = get_field('document', $args['post_id']);
    $doc_post_id = isset($document_file['ID']) ? absint($document_file['ID']) : false;

    if (empty($doc_post_id)) {
        return $meta_value;
    }

    $document = get_post($doc_post_id);

    return \SearchWP\Document::get_content($document);

}, 20, 2);

// ------ END / If Find PDF Show Report Which Include IT -----

// ------ START / Custom Modal Search Template -----

add_filter('searchwp_modal_form_template_dir', function ($dir) {
    return 'my-searchwp-modal-forms';
});

// ------ END / Custom Modal Search Template -----

// ------ START / Add Labales to Facet Filters -----
function fwp_add_facet_labels()
{
    ?>
    <script>     (function ($) { $(document).on('facetwp-loaded', function () { $('.facetwp-facet').each(function () { var facet = $(this); var facet_name = facet.attr('data-name'); var facet_type = facet.attr('data-type'); var facet_label = FWP.settings.labels[facet_name]; if (facet_type !== 'pager' && facet_type !== 'sort') { if (facet.closest('.facet-wrap').length < 1 && facet.closest('.facetwp-flyout').length < 1) { facet.wrap('<div class="facet-wrap"></div>'); facet.before('<label class="facet-label">' + facet_label + '</label>'); } } }); }); })(jQuery);
    </script>
    <?php
}

add_action('wp_head', 'fwp_add_facet_labels', 100);

// ------ END / Add Labales to Facet Filters -----

// ------ START / Fix Menu Text Encoding -----

function fix_menu_text_encoding($text)
{
    $text = htmlspecialchars_decode($text);
    $text = mb_convert_encoding($text, 'UTF-8', 'HTML-ENTITIES');
    return $text;
}

add_filter('wp_nav_menu', 'fix_menu_text_encoding');

// ------ START / Fix Menu Text Encoding -----


?>