<?php get_header(); ?>

<?php while (have_posts()):
  the_post(); ?>
  <?php pageBanner() ?>

<?php endwhile; ?>

<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>">
        <i class="fa fa-home" aria-hidden="true"></i> Alla Program
      </a>
      <span class="metabox__main"><?php the_title(); ?></span>
    </p>
  </div>
  <div class="generic-content generic-content__extra-spacing"><?php the_content(); ?></div>


  <!-- Related Writers -->
  <?php
  $today = date('Ymd'); // Get today's date in the format used by ACF
  $relatedWriters = new WP_Query(array(
    'posts_per_page' => -1,  // -1 value to show all posts
    'post_type' => 'writers',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'related_programs', // This is the ACF field name for the relationship
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"', // Search for the current program ID in the related_programs field
        // The value is wrapped in quotes to ensure an exact match in the serialized array stored by ACF, the ID saves as a string.
      )
    )
  )); ?>

  <?php if ($relatedWriters->have_posts()): ?>
    <hr class="section-break" />
    <h2 class="headline headline--medium">Writer <?php echo get_the_title(); ?></h2>
    <ul class="professor-cards">
      <?php
      while ($relatedWriters->have_posts()):
        $relatedWriters->the_post(); ?>
        <li class="professor-card__list-item">
          <a class="professor-card" href="<?php the_permalink(); ?>">
            <img class="professor-card__image" src="<?php the_post_thumbnail_url('writerPortraitMedium') ?>" />
            <span class="professor-card__name"><?php the_title(); ?></span>
          </a>
        </li>

      <?php endwhile; ?>
    </ul>

  <?php endif; ?>

  <?php wp_reset_postdata(); ?>


  <!-- Related Events -->
  <?php
  $relatedEventPosts = new WP_Query(array(
    'posts_per_page' => 2,  // -1 value to show all posts
    'post_type' => 'events',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',  // rand to show random posts
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => date('Ymd'),
        'type' => 'NUMERIC'
      ),
      array(
        'key' => 'related_programs', // This is the ACF field name for the relationship
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"', // Search for the current program ID in the related_programs field
        // The value is wrapped in quotes to ensure an exact match in the serialized array stored by ACF, the ID saves as a string.
      )
    )
  )); ?>

  <?php if ($relatedEventPosts->have_posts()): ?>
    <hr class="section-break" />
    <h2 class="headline headline--medium">kommande <?php echo get_the_title(); ?> events</h2>
    <?php
    while ($relatedEventPosts->have_posts()):
      $relatedEventPosts->the_post(); ?>
      <div class="event-summary">
        <a class="event-summary__date t-center" href="#">
          <span class="event-summary__month"><?php $eventDate = new DateTime(get_field('event_date'));
                                              echo $eventDate->format('M'); ?></span>
          <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
        </a>
        <div class="event-summary__content">
          <h5 class="event-summary__title headline headline--tiny"><a
              href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Läs
              mer</a></p>
        </div>
      </div>

    <?php endwhile; ?>

  <?php endif; ?>
  <?php echo paginate_links() ?>


</div>


<?php get_footer(); ?>