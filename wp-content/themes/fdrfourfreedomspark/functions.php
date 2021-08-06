<?php
define( 'CSS_JS_VERSION', 1.00);
define( 'TEMPLATE_PATH', get_bloginfo('stylesheet_directory'));
define( 'TEMPLATE_IMAGE_PATH', get_bloginfo('stylesheet_directory') . '/assets/img');

function pr($r) {
  echo '<pre>';
  print_r($r);
  echo '</pre>';
}

function pd($r) {
  echo '<pre>';
  print_r($r);
  echo '</pre>';
  die();
}

/**
 * Custom body classes.
 */
function fdrfourfreedomspark_body_class($classes) {
  global $post;
  $post_slug = $post->post_name;
  if (is_front_page() == FALSE) {
    $classes[] = 'not-home';
  }
  $classes[] = sprintf('post-type-%s', $post->post_type);
  $classes[] = sprintf('page-%s', $post_slug);
  if (is_user_logged_in()) {
    $classes[] = 'logged-in';
  }
  $current_user = wp_get_current_user();
  if ($current_user && in_array('administrator', $current_user->roles)) {
    $classes[] = 'is-admin';
  }
  return $classes;
}
add_filter('body_class', 'fdrfourfreedomspark_body_class');

// add css and javascript
function fdrfourfreedomspark_css_js() {
  wp_enqueue_script( 'flickity-js', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array());
  wp_enqueue_script( 'flickity-js-fade', 'https://unpkg.com/flickity-fade@1/flickity-fade.js', array());
  wp_enqueue_script( 'headroom-js', 'https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js', array(), '', true );
  wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.min.js', array(), CSS_JS_VERSION, true );
  wp_enqueue_script( 'pages', get_template_directory_uri() . '/assets/js/pages.min.js', array(), CSS_JS_VERSION, true );
  // css
  wp_enqueue_style( 'flickity-css', 'https://unpkg.com/flickity@2/dist/flickity.min.css', array(), '', 'all' );
  wp_enqueue_style( 'flickity-css-fade', 'https://unpkg.com/flickity-fade@1/flickity-fade.css', array(), '', 'all' );
  wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/css/app.css', array(), CSS_JS_VERSION, 'all' );
}
add_action('wp_enqueue_scripts', 'fdrfourfreedomspark_css_js');

// disable emojis
function fdrfourfreedomspark_disable_wp_emoji() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'fdrfourfreedomspark_disable_emoji_tinymce' );
}

function fdrfourfreedomspark_disable_emoji_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_action( 'init', 'fdrfourfreedomspark_disable_wp_emoji' );

add_filter( 'emoji_svg_url', '__return_false' );

// add title tag
function fdrfourfreedomspark_theme_support() {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'fdrfourfreedomspark_theme_support' );

add_theme_support('post-thumbnails');
// add_image_size( 'press_image', 610, 740, TRUE);
// add_image_size( 'person_image', 610, 480, TRUE);

add_theme_support( 'menus' );

// add acf global content page
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title'  => 'Global Content',
    'menu_title'  => 'Global Content',
  ));
}

function ffp_is_current_navigation($nav_item) {
  global $post;
  $current_permalink = get_permalink($post->ID);
  $result = ($nav_item->url == $current_permalink);

  if (!$result) {
    $main_nav = wp_get_nav_menu_items( 'Main Nav' );
    foreach ($main_nav as $item) {
      if ($item->menu_item_parent == $nav_item->ID) {
        if (($current_permalink == $item->url) && (!$result)) {
          $result = true;
        }
      }
    }
  }
  return $result;
}

function ffp_create_taxonomy() {
  $labels = array(
    'name' => _x( 'Events Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Event Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Event Type' ),
    'popular_items' => __( 'Popular Event Type' ),
    'all_items' => __( 'All Event Type' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Event Type' ), 
    'update_item' => __( 'Update Event Type' ),
    'add_new_item' => __( 'Add New Event Type' ),
    'new_item_name' => __( 'New Event Type Name' ),
    'separate_items_with_commas' => __( 'Separate event type with commas' ),
    'add_or_remove_items' => __( 'Add or remove event type' ),
    'choose_from_most_used' => __( 'Choose from the most used event type' ),
    'menu_name' => __( 'Event Type' ),
  ); 
 
  register_taxonomy('event_type', 'event_type', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event_type' ),
  ));
}
add_action( 'init', 'ffp_create_taxonomy', 0 );

function ffp_create_posttype() {
  register_post_type( 'event',
    array(
      'labels'        => array(
        'name'          => __( 'Events' ),
        'singular_name' => __( 'Event' )
      ),
      'public'        => true,
      'has_archive'   => true,
      'rewrite'       => array('slug' => 'event'),
      'show_in_rest'  => true,
      'supports'      => array('title', 'editor', 'thumbnail'),
      'taxonomies'    => array( 'event_type'),
      'menu_icon'     => 'dashicons-calendar-alt',
    )
  );
}
add_action( 'init', 'ffp_create_posttype' );

function ffp_get_first_sentence_of_content($post){
  $str = $post->post_content;									
  $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
  $str = strip_tags($str, '<a><strong><em>');
  $pos = strpos($str, '.');
  $str = substr($str, 0, $pos+1);

  return '<p>' . $str . '</p>';
}

require_once(__DIR__.'/shortcodes.php');