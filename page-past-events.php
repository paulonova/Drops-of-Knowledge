<?php get_header(); ?>
<?php pageBanner() ?>

<?php $pastEventsPosts = new WP_Query(array(
  'paged' => get_query_var('paged', 1),
  'post_type' => 'events',
  'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',
  'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'event_date',
      'compare' => '<',
      'value' => date('Ymd'),
      'type' => 'NUMERIC'
    )
  )
)); ?>

<div class="container container--narrow page-section container--margin-top-medium">
  <h2 class="headline headline--small-plus-condensed"><i class="fa-regular fa-calendar-days icon-orange"></i> Vi ser fram emot nästa tillfälle tillsammans</h2>
  <?php while ($pastEventsPosts->have_posts()) {
    $pastEventsPosts->the_post();
    get_template_part('template-parts/content', 'event');
  }
  ?>


  <!-- Need to define the total number of pages -->
  <?php echo paginate_links(array(
    'total' => $pastEventsPosts->max_num_pages
  )) ?>

</div>

<?php get_footer(); ?>