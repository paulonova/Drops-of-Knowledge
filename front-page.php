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
            <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Läs mer</a></p>
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
            <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
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

<div class="hero-slider">
  <div data-glide-el="track" class="glide__track">
    <div class="glide__slides">
      <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bibleApp.jpg'); ?>)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Scripture Alone</h2>
            <p class="t-center">Sola Scriptura affirms that the Holy Scriptures are the only infallible and sufficient authority for Christian faith and practice.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/oldBible.jpg'); ?>)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Faith Alone</h2>
            <p class="t-center">Sola Fide teaches that sinners are justified before God by faith alone, apart from works.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/supper.jpg'); ?>)">
        <div class="hero-slider__interior container">
          <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Christ Alone</h2>
            <p class="t-center">Solus Christus declares that Jesus Christ is the only mediator between God and humanity.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
  </div>
</div>

<?php get_footer(); ?>