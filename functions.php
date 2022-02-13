<?php 

// include the search route file
require get_theme_file_path('inc/search-route.php');

function tea_custom_rest(){

  register_rest_field('page', 'authorName', array(
    'get_callback' => function(){
      return get_the_author();
    }
  ) );
}
add_action('rest_api_init', 'tea_custom_rest');
  

// Load necessary styles and scripts for our theme.
function tea_files(){
  
    // font-awesome css
  wp_enqueue_style('font-awesome-css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
  wp_enqueue_script('font-awesome-js', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js', NULL, '1.0', true);

  if (strstr($_SERVER['SERVER_NAME'], 'tea.local')) {
    wp_enqueue_script('main-tea-js', 'http://localhost:3000/bundled.js', NULL, '1.0', true);
  } else {
    wp_enqueue_script('our-vendor-js', get_theme_file_uri('/bundled-assets/vendors~scripts.879f16c7e0623731c063.js'), NULL, '1.0', true);
    wp_enqueue_script('main-tea-js', get_theme_file_uri('/bundled-assets/scripts.72ef95d21469251208a0.js'), NULL, '1.0', true);
    wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.72ef95d21469251208a0.css'));
  }

    wp_localize_script('main-tea-js', 'teaData', array(
      'root_url' => get_site_url()
    ));

}
add_action( 'wp_enqueue_scripts', 'tea_files');

// Include necessary theme features
function tea_features(){

  // page title support
  add_theme_support('title-tag');

  // featured image support for non-custom posts (posts and pages) alone. To enable this on custom post types, you must add "thumbnail" to the supports key in the post type decalration file : mu-plugins/tea-post-types.php
  add_theme_support('post-thumbnails');

  // associate an image size with a name
  add_image_size( 'img_300_200', 300, 200, true);
  add_image_size( 'img_465_310', 465, 310, true);
  add_image_size( 'img_328_272', 328, 272, true);
  add_image_size( 'img_341_272', 341, 272, true);
  add_image_size( 'img_352_264', 352, 264, true);

}
add_action('after_setup_theme', 'tea_features');

?>
