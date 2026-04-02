<?php get_header(); ?>
<?php $image = get_field('page_banner_background_image'); ?>
<div class="page-banner page-banner__bg-image-intern-pages">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/banner-all-books.jpg') ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Rekommenderade Böcker</h1>
    <div class="page-banner__intro">
      <p>Läsning som uppmuntrar, undervisar och utmanar.</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section container--margin-top-medium">
  <?php
  while (have_posts()): the_post(); ?>
    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

      <div class="metabox">
        <p>Book author: Will be set from ACF</p>
      </div>

      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Läs mer &raquo;</a></p>
      </div>
    </div>

  <?php endwhile; ?>
  <?php echo paginate_links() ?>
</div>

<?php get_footer(); ?>