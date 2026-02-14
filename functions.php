<?php

// Create theme support for post thumbnails (featured images) in the editor.
add_theme_support('post-thumbnails');

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
}

add_action('after_setup_theme', 'knowledge_features');


function knoledge_post_types() {
  register_post_type('events', array(
    'public' => true,
    'menu_icon' => 'dashicons-calendar',
    'taxonomies' => array('category'),
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
  ));

  register_post_type('history', array(
    'public' => true,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'taxonomies' => array('category'),
    'labels' => array(
      'name' => 'History',
      'add_new_item' => 'Add New History Item',
      'edit_item' => 'Edit History Item',
      'all_items' => 'All History Items',
      'singular_name' => 'History Item'
    ),
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'rewrite' => array('slug' => 'history'),
    'has_archive' => true,
  ));
  register_post_type('books', array(
    'public' => true,
    'menu_icon' => 'dashicons-book-alt',
    'taxonomies' => array('category'),
    'labels' => array(
      'name' => 'Book',
      'add_new_item' => 'Add New Book Item',
      'edit_item' => 'Edit Book Item',
      'all_items' => 'All Book Items',
      'singular_name' => 'Book Item'
    ),
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'rewrite' => array('slug' => 'history'),
    'has_archive' => true,
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
