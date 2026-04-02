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
  <?php while ($pastEventsPosts->have_posts()): $pastEventsPosts->the_post(); ?>
    <div class="event-summary">
      <a class="event-summary__date t-center" href="#">
        <span class="event-summary__month"><?php $eventDate = new DateTime(get_field('event_date'));
                                            echo $eventDate->format('M'); ?></span>
        <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Läs mer</a></p>
      </div>
    </div>

  <?php endwhile; ?>
  <!-- Need to define the total number of pages -->
  <?php echo paginate_links(array(
    'total' => $pastEventsPosts->max_num_pages
  )) ?>

</div>

<?php get_footer(); ?>