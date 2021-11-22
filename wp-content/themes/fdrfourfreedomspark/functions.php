<?php
define( 'CSS_JS_VERSION', "1.20");
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
  wp_dequeue_style( 'sb_instagram_styles' );
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
  if (!$result) {
    if (is_singular('event')) {
      $result = (strpos($nav_item->url, '/visit') !== FALSE);
    }
  }
  return $result;
}

function ffp_create_taxonomy() {
  $labels = array(
    'name' => _x( 'Event Types', 'taxonomy general name' ),
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
    'menu_name' => __( 'Event Types' ),
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
  $str = get_the_excerpt($post);
  if (!$str) {
    $str = get_field('intro', $post->ID);
  }
  if (!$str) {
    $str = $post->post_content;									
    $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
    $str = strip_tags($str, '<a><strong><em>');
    $pos = strpos($str, '.');
    $str = substr($str, 0, $pos+1);
  }

  return '<p>' . $str . '</p>';
}

function ffp_get_post_categ_urls($post, $tax_name, $post_type, $array = FALSE) {
  $cat = get_the_terms($post->ID, $tax_name);
  $cat_name = '';
  $cat_slugs = '';
  $cat_array = [];
  switch ($post_type) {
    case 'events':
      $url_head = '/visit/events-calendar';
      break;
    default:
      $url_head = '/learn/blog';
  }
  if (is_array($cat)) {
    foreach ($cat as $cat_key => $cat_item) {
      $cat_entry = '<a href="'.$url_head.'?tax='.$cat_item->slug.'" alt="View '.$post_type.' categorized under '.$cat_item->name.'">'.$cat_item->name.'</a>';
      $cat_array[] = array(
        'url' => $url_head.'?tax='.$cat_item->slug,
        'label' => $cat_item->name,
        'alt' => 'View '.$post_type.' categorized under '.$cat_item->name,
      );
      if ($cat_key == 0) {
        $cat_name = $cat_entry;
        $cat_slugs = $cat_item->slug;
      } else {
        $cat_name .= ', '.$cat_entry;
        $cat_slugs .= ','.$cat_item->slug;
      }
    }
  }
  if ($array) {
    return $cat_array;
  } else {
    return array(
      'names' => $cat_name,
      'slugs' => $cat_slugs,
    );  
  }
}

function ffp_get_array_timeline_text() {
  $arr = array(
    '1882' => array(
      'text1' => '<strong>January 30</strong>—Franklin Roosevelt (FDR) was born at Hyde Park',
      'text2' => '',
    ),
    '1884' => array(
      'text1' => '<strong>October 11</strong>—Eleanor Roosevelt (ER) was born in New York City',
      'text2' => '',
    ),
    '1905' => array(
      'text1' => '<strong>March 17</strong>—Franklin and Eleanor are married',
      'text2' => '',
    ),
    '1910' => array(
      'text1' => 'Franklin was elected to New York State Senate',
      'text2' => '',
    ),
    '1912' => array(
      'text1' => 'Eleanor attends her first Democratic Party Convention',
      'text2' => '',
    ),
    '1913' => array(
      'text1' => '<strong>April</strong>—Franklin was appointed as Assistant Secretary of the Navy',
      'text2' => '',
    ),
    '1918' => array(
      'text1' => 'Eleanor works with the Red Cross, the Navy Department to help American Servicemen in WWI',
      'text2' => '',
    ),
    '1920' => array(
      'text1' => 'Franklin is nominated for Vice President on ticket with James N. Cox, but lost to Coolidge and Harding',
      'text2' => 'Eleanor joins League of Women Voters and works for womens’ political gains following the successful movement',
    ),
    '1921' => array(
      'text1' => '<strong>August</strong>—Franklin is stricken with poliomyelitis at Campobello, New Brunswick, Canada',
    ),
    '1922' => array(
      'text1' => 'Eleanor writes <span class="font-heading-italic">“Why I Am a Democrat,”</span> crystallizing her ideals and commitment to the Democratic Party',
    ),
    '1927' => array(
      'text1' => 'Franklin founded the Georgia Warm Springs Foundation therapy center for the treatment of polio victims',
    ),
    '1928' => array(
      'text1' => '<strong>November 6</strong>—Franklin was elected as Governor of New York',
    ),
    '1932' => array(
      'text1' => '<strong>November 8</strong>—Franklin was elected as President',
      'text2' => 'Eleanor states that the country should not expect the new First Lady to be a symbol of elegance but rather, “plain, ordinary Mrs. Roosevelt.”',
    ),
    '1933' => array(
      'text1' => '<strong>March 4</strong>—Franklin was inaugurated as 32nd President',
      'text2' => '<strong>March 6</strong>—Eleanor becomes the 1st First Lady to hold a press conference where only female reporters are admitted',
      'text3' => '<strong>June 16</strong>—Franklin signs the National Industrial Recovery Act, part of his “New Deal” platform',
    ),
    '1936' => array(
      'text1' => '<strong>November 3</strong>—Franklin was Reelected as President',
    ),
    '1940' => array(
      'text1' => '<strong>November 5</strong>—Franklin was reelected as President',
    ),
    '1941' => array(
      'text1' => '<strong>December 8</strong>—U.S. declares war on Japan<br><br><strong>December 11</strong>—U.S. declares war on Germany',
    ),
    '1942' => array(
      'text1' => '<strong>January 6</strong>—Franklin Gives State of the Union speech popularly known as the <span class="font-heading-italic"><strong>“Four Freedoms”</strong></span>',
    ),
    '1945' => array(
      'text1' => '<strong>April 12</strong>—Franklin died in Warm Springs, Georgia<br><br><strong>April 15</strong>—Franklin buried in Hyde Park, New York',
      'text2' => 'Regarding Franklin’s death, Eleanor says “ The story is over,” and returns to private life at her beloved Val-Kill cottage in Hyde Park',
      'text3' => 'Eleanor accepts President Harry Truman’s offer to serve as a US delegate to the United Nations',
    ),
    '1947' => array(
      'text1' => 'Eleanor begins work on drafting the Declaration of Human Rights',
    ),
    '1952' => array(
      'text1' => 'Eleanor resigns from the UN delegation after the election of Republican President Eisenhower',
    ),
    '1960' => array(
      'text1' => 'Eleanor meets with John F. Kennedy at Val-Kill',
    ),
    '1961' => array(
      'text1' => 'President Kennedy reappoints Eleanor to the UN and appoints her as the first chairperson of the President’s Commission on the Status of Women',
    ),
    '1962' => array(
      'text1' => '<strong>November 10</strong>—Eleanor dies in NYC from disseminated tuberculosis, aplastic anemia and heart failure',
    ),
  );
 
  return $arr;
}

function ffp_get_array_timeline_image() {
  $arr = array(
    '1882' => TEMPLATE_IMAGE_PATH."/1882_img.png",
    '1884' => TEMPLATE_IMAGE_PATH."/1884_img.png",
    '1910' => TEMPLATE_IMAGE_PATH."/1910_img.png",
    '1913' => TEMPLATE_IMAGE_PATH."/1913_img.png",
    '1921' => TEMPLATE_IMAGE_PATH."/1921_img.png",
    '1928' => TEMPLATE_IMAGE_PATH."/1928_img.png",
    '1933' => TEMPLATE_IMAGE_PATH."/1933_img.png",
    '1940' => TEMPLATE_IMAGE_PATH."/1940_img.png",
    '1942' => TEMPLATE_IMAGE_PATH."/1942_img.png",
    // image for plain timeline 
    '1905' => TEMPLATE_IMAGE_PATH."/1905_img.png",
    '1918' => TEMPLATE_IMAGE_PATH."/1918_img.png",
    '1927' => TEMPLATE_IMAGE_PATH."/1927_img.png",
    '1932' => TEMPLATE_IMAGE_PATH."/1932_img.png",
    '1945' => TEMPLATE_IMAGE_PATH."/1945_img.png",
    '1962' => TEMPLATE_IMAGE_PATH."/1962_img.png",
    '1947' => TEMPLATE_IMAGE_PATH."/1947_img.png",
  );
  return $arr;
}

function ffp_get_array_timeline_image_background() {
  $arr = array(
    '1884' => TEMPLATE_IMAGE_PATH."/1884_bg.png",
    '1912' => TEMPLATE_IMAGE_PATH."/1912_bg.png",
    '1918' => TEMPLATE_IMAGE_PATH."/1918_bg.png",
    '1920' => TEMPLATE_IMAGE_PATH."/1920_bg.png",
    '1927' => TEMPLATE_IMAGE_PATH."/1927_bg.png",
    '1932' => TEMPLATE_IMAGE_PATH."/1932_bg.png",
    '1932_2' => TEMPLATE_IMAGE_PATH."/1932_2_bg.png",
    '1936' => TEMPLATE_IMAGE_PATH."/1936_bg.png",
    '1941' => TEMPLATE_IMAGE_PATH."/1941_bg.png",
    '1945' => TEMPLATE_IMAGE_PATH."/1945_bg.png",
    '1947' => TEMPLATE_IMAGE_PATH."/1947_bg.png",
    '1960' => TEMPLATE_IMAGE_PATH."/1960_bg.png",
    '1962' => TEMPLATE_IMAGE_PATH."/1962_bg.png",
    // image for plain timeline 
    '1921' => TEMPLATE_IMAGE_PATH."/1921_bg.png",
    '1933' => TEMPLATE_IMAGE_PATH."/1933_bg.png",
    '1942' => TEMPLATE_IMAGE_PATH."/1942_bg.png"
  );
  return $arr;
}

function ffp_get_text_by_year($year, $type = 1) {
  $arr = ffp_get_array_timeline_text();
  return $arr[$year]['text'.$type];
}

function ffp_get_img_by_year($year) {
  $arr = ffp_get_array_timeline_image();
  return $arr[$year];
}

function ffp_get_img_bg_by_year($year) {
  $arr = ffp_get_array_timeline_image_background();
  return $arr[$year];
}


require_once(__DIR__.'/shortcodes.php');