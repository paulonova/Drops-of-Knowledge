<!-- single-event.php  
 Is for a single post view - shows one event post-type at a time. 
-->

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
  <?php pageBanner() ?>
<?php endwhile; ?>
<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('events') ?>">
        <i class="fa fa-home" aria-hidden="true"></i> Events Home
      </a>
      <span class="metabox__main"><?php the_title(); ?></span>
    </p>
  </div>
  <div class="generic-content generic-content__extra-spacing"><?php the_content(); ?></div>

  <?php
  $related_programs = get_field('related_programs');
  if ($related_programs): ?>
    <hr class="section-break" />
    <h2 class="headline headline--medium">Related Program(s)</h2>
    <ul class="link-list min-list">
      <?php foreach ($related_programs as $program): ?>
        <li>
          <a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
    <?php
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
  <?php endif; ?>
</div>


<?php get_footer(); ?>