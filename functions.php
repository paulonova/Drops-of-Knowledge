<?php

// Create theme support for post thumbnails (featured images) in the editor.
// add_theme_support('post-thumbnails');

function pageBanner($args = NULL) {
  if (!isset($args['title'])) {
    $args['title'] = get_the_title() ? get_the_title() : 'Ingen titel beskrevs';
  }
  if (!isset($args['subtitle'])) {
    $args['subtitle'] = get_field('page_banner_subtitle') ? get_field('page_banner_subtitle') : 'Ingen undertitel beskrevs';
  }
  $image = get_field('page_banner_background_image'); ?>
  <div class="page-banner page-banner__bg-image-intern-pages">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $image ? esc_url($image['sizes']['pageBanner']) : get_theme_file_uri('/images/ocean.jpg'); ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle'] ?></p>
      </div>
    </div>
  </div>
<?php
}

function knowledge_files() {
  wp_enqueue_script('main-knowledge-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('parisienne-font', '//fonts.googleapis.com/css2?family=Parisienne&display=swap');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('knowledge_main_styles', get_theme_file_uri('/build/style.css'));
}

// Hook the knowledge_files function to the wp_enqueue_scripts action to load scripts and styles properly.
add_action('wp_enqueue_scripts', 'knowledge_files');

// This function adds theme support for title tags, allowing WordPress to manage the document title for each page.
function knowledge_features() {
  register_nav_menu('headerMenu', 'Header Menu Location');
  register_nav_menu('footerMenuOne', 'Footer Menu Location One');
  register_nav_menu('footerMenuTwo', 'Footer Menu Location Two');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('writerLandscape', 400, 260, true);
  add_image_size('writerPortraitMedium', 200, 200, true);
  add_image_size('writerPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'knowledge_features');


function knoledge_post_types() {
  // Events Post types
  register_post_type('events', array(
    // 'rewrite' => array('slug' => 'events'),  => This is optional, WordPress will automatically generate the slug I wrote here..
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-calendar',
    'taxonomies' => array('category'),
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
  ));

  // Books Post types
  register_post_type('books', array(
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-book-alt',
    'taxonomies' => array('category'),
    'labels' => array(
      'name' => 'Book',
      'add_new_item' => 'Add New Book Item',
      'edit_item' => 'Edit Book Item',
      'all_items' => 'All Book Items',
      'singular_name' => 'Book Item'
    ),
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
  ));

  // Program Post types
  register_post_type('program', array(
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-awards',
    'taxonomies' => array('category'),
    'labels' => array(
      'name' => 'Program',
      'add_new_item' => 'Add New Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
  ));

  // Writers Post types
  register_post_type('writers', array(
    // 'has_archive' => true,  => This is optional, we don't need an archive page for writers.
    'public' => true,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-welcome-write-blog',
    'taxonomies' => array('category'),
    'labels' => array(
      'name' => 'Writers',
      'add_new_item' => 'Add New Writer',
      'edit_item' => 'Edit Writer',
      'all_items' => 'All Writers',
      'singular_name' => 'Writer'
    ),
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
  ));
}

add_action('init', 'knoledge_post_types');



// Customize the search form placeholder text.
add_filter('get_search_form', function ($form) {
  return str_replace(
    '<input type="text"',
    '<input type="text" placeholder="Search for..."',
    $form
  );
});


function knowledge_adjust_queries($query) {
  // To manipulate the default WordPress query for the program post type archive page in the admin area.
  if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() and is_post_type_archive('events') and $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', [
      [
        'key' => 'event_date',
        'value' => $today,
        'compare' => '>=',
        'type' => 'DATE',
      ]
    ]);
  }
}

add_action('pre_get_posts', 'knowledge_adjust_queries');
