<?php get_header(); ?>
<div class="page-banner page-banner__bg-image-intern-pages">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/banner-archive-events.jpg') ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Alla Eventer</h1>
    <div class="page-banner__intro">
      <p>Eventer du inte får missa</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section container--margin-top-medium">
  <?php
  while (have_posts()) {
    the_post();
    get_template_part('template-parts/content', 'event');
  }
  ?>



  <?php echo paginate_links() ?>
  <hr class="section-break" />
  <p>Letar du efter tidigare eventer? <a href="<?php echo site_url('/past-events'); ?>">Alla Tidigare Eventer</a></p>
  <br />
</div>

<?php get_footer(); ?>