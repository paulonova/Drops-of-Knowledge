<!-- single-event.php  
 Is for a single post view - shows one event post-type at a time. 
-->

<?php get_header(); ?>



<?php while (have_posts()): the_post(); ?>
  <?php pageBanner() ?>

<?php endwhile; ?>

<div class="container container--narrow page-section">

  <div class="generic-content generic-content__extra-spacing">
    <div class="row group">
      <div class="one-third">
        <?php the_post_thumbnail('writerPortrait'); ?>
      </div>
      <div class="two-thirds">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <?php $related_programs = get_field('related_programs');
  if ($related_programs): ?>
    <hr class="section-break" />
    <h2 class="headline headline--medium">Subject(s) Taught</h2>
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