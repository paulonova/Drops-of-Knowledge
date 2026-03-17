<?php get_header(); ?>



<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/header-drop-of-knowledge.jpg') ?>)"></div>
  <div class="page-banner__content container t-center c-white">
    <h1 class="headline headline--hand_writen">Drops of Knowledge</h1>
    <h3 class="headline headline--small">Dela det levande Ordet med en törstande värld</h3>
    <a href="<?php echo site_url('/blog'); ?>" class="btn btn--medium btn--dark-orange">View All Articles</a>
  </div>
</div>

<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Senaste teologiska artiklar</h2>
      <?php $homepageTheoPosts = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'post',
        'category_name' => 'theology'
      )); ?>

      <?php while ($homepageTheoPosts->have_posts()): $homepageTheoPosts->the_post(); ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="#">
            <span class="event-summary__month"><?php echo the_time('M'); ?></span>
            <span class="event-summary__day"><?php echo the_time('d'); ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php if (has_excerpt()) {
                  echo get_the_excerpt();
                } else echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Läs mer</a></p>
          </div>
        </div>
      <?php endwhile;
      // Always reset post data after custom query
      wp_reset_postdata();
      ?>
      <p class="t-center no-margin positioned"><a href="<?php echo site_url('/category/theology/'); ?>" class="btn btn--blue">Teologiska artiklar</a></p>
    </div>
  </div>


  <div class="full-width-split__two">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Senaste lovsångsartiklar</h2>
      <?php $homepageWorshipPosts = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'post',
        'category_name' => 'worship'
      )); ?>
      <?php while ($homepageWorshipPosts->have_posts()): $homepageWorshipPosts->the_post(); ?>
        <div class="event-summary">
          <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink() ?>">
            <span class="event-summary__month"><?php echo the_time('M'); ?></span>
            <span class="event-summary__day"><?php echo the_time('d'); ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php if (has_excerpt()) {
                  echo get_the_excerpt();
                } else echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Läs mer</a></p>
          </div>
        </div>
      <?php endwhile;
      // Always reset post data after custom query
      wp_reset_postdata();
      ?>

      <p class="t-center no-margin positioned"><a href="<?php echo site_url('/category/worship/'); ?>" class="btn btn--yellow">Lovsångsartiklar</a></p>
    </div>
  </div>
</div>

<!-- EVENT CARDS  -->
<?php $homepageEventPosts = new WP_Query(array(
  'posts_per_page' => 3,
  'post_type' => 'events',
)); ?>
<?php if ($homepageEventPosts->have_posts()) : ?>
  <main class="main-cards-container">
    <section class="event-section">
      <section class="hero">
        <div class="hero__content">
          <h1>Senaste Events</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit nullam nunc
            justo sagittis suscipit ultrices. Images from Freepik
          </p>
          <p class="t-center no-margin positioned"><a href="<?php echo site_url('/events'); ?>" class="btn btn--medium btn--dark-orange">Tidigare Eventer</a></p>
        </div>
      </section>
      <div class="cards-wrapper">
        <div class="cards-container">
          <div class="cards-grid">
            <?php while ($homepageEventPosts->have_posts()): $homepageEventPosts->the_post(); ?>
              <!-- My CARDS  -->
              <article class="card">
                <div class="card__image">
                  <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" />
                  <?php else : ?>
                    <img src="https://images.unsplash.com/photo-1522673607200-164d1b6ce486?auto=format&fit=crop&w=900&q=80" alt="event images" />
                  <?php endif; ?>
                </div>
                <div class="card__content">
                  <h2><a class="cards-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php if (has_excerpt()) {
                        echo get_the_excerpt();
                      } else echo wp_trim_words(get_the_content(), 15); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Läs mer</a></p>

                  <p class="event-date"><i class="fa-regular fa-clock"></i> <strong>Event datum: </strong>
                    <?php $eventDate = new DateTime(get_field('event_date')); ?>
                    <a class="cards-link" href="#"><?php echo $eventDate->format('F j, Y') ?></a>
                  </p>
                </div>
              </article>

            <?php endwhile;
            // Always reset post data after custom query
            wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php endif; ?>


<?php $homepageBooksPosts = new WP_Query(array(
  'posts_per_page' => 3,
  'post_type' => 'books',
)); ?>

<!-- Book Recomendation Slider -->
<div class="hero-slider">
  <div data-glide-el="track" class="glide__track">
    <div class="glide__slides">

      <?php if ($homepageBooksPosts->have_posts()) : ?>
        <?php while ($homepageBooksPosts->have_posts()): $homepageBooksPosts->the_post(); ?>
          <?php if (has_post_thumbnail()) : ?>
            <div class="hero-slider__slide" style="background-image: url(<?php the_post_thumbnail_url('small');  ?>)">
            <?php else: ?>
              <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/book-title-not-available.png')  ?>)">
              <?php endif; ?>

              <div class="hero-slider__interior container">
                <div class="hero-slider__overlay">
                  <h2 class="headline headline--medium t-center"><?php the_title(); ?></h2>
                  <p class="t-center"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                  <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                </div>
              </div>
              </div>


            <?php endwhile; ?>
          <?php endif; ?>

            </div>
            <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
  </div>

  <div><?php get_footer(); ?></div>