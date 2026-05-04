<?php

function knowledgeRegisterSearch() {
  register_rest_route('knoledge/v1', 'search', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'knowledgeSearchResults',
  ));
}

function knowledgeSearchResults(WP_REST_Request $data) {
  $mainQuery = new WP_Query(array(
    'post_type' => array('post', 'page', 'books', 'events', 'program', 'writers'),
    's' => sanitize_text_field($data['term']), // s is the search parameter for WP_Query and search?term=
  ));

  $results = array(
    'posts' => array(),
    'pages' => array(),
    'events' => array(),
    'books' => array(),
    'program' => array(),
    'writers' => array(),
  );

  while ($mainQuery->have_posts()) {
    $mainQuery->the_post();
    $post_id = get_the_ID(); // Get current post ID for ACF

    if (get_post_type() == 'post') {
      array_push($results['posts'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'acf_field_subtitle' => get_field('page_banner_subtitle', $post_id), // Add ACF field
        'acf_field_image' => get_field('page_banner_background_image', $post_id), // Add ACF field
      ));
    }

    if (get_post_type() == 'page') {
      array_push($results['pages'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
      ));
    }

    if (get_post_type() == 'events') {
      array_push($results['events'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
        'acf_event_date' => get_field('event_date', $post_id), // Add ACF field
        'acf_event_related' => get_field('related_programs', $post_id),
        'acf_field_subtitle' => get_field('page_banner_subtitle', $post_id),
        'acf_field_image' => get_field('page_banner_background_image', $post_id),
      ));
    }

    if (get_post_type() == 'books') {
      array_push($results['books'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
      ));
    }

    if (get_post_type() == 'program') {
      array_push($results['program'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
      ));
    }

    if (get_post_type() == 'writers') {
      array_push($results['writers'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType' => get_post_type(),
      ));
    }
  }

  return $results;
}

add_action('rest_api_init', 'knowledgeRegisterSearch');
