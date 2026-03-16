<!-- single-books.php  
 Is for a single post view - shows one books post-type at a time. 
-->

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
  <div class="page-banner page-banner__bg-image-intern-pages">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>This is a Book post type</p>
      </div>
    </div>
  </div>

<?php endwhile; ?>


<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('books') ?>">
        <i class="fa fa-home" aria-hidden="true"></i> Books Home
      </a>
      <span class="metabox__main"><?php the_title(); ?></span>
    </p>
  </div>
  <div class="bookpage">
    <div class="bookpage-book">
      <img class="alignleft" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>">
    </div>

    <div class="generic-content generic-content__extra-spacing"><?php the_content(); ?></div>
  </div>

</div>


<?php get_footer(); ?>