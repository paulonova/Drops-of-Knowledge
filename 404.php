<!-- 404.php
 Page not found error template.
-->

<?php get_header(); ?>

<div class="page-banner page-banner__bg-image-intern-pages">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">404 - Page Not Found</h1>
    <div class="page-banner__intro">
      <p>Sorry, the page you're looking for doesn't exist.</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section container--margin-top-medium">
  <div class="generic-content">
    <p>The page you requested could not be found. It may have been moved or deleted.</p>

    <h2 class="headline headline--medium">What would you like to do?</h2>
    <ul>
      <li><a href="<?php echo site_url() ?>">Return to homepage</a></li>
      <li><a href="<?php echo site_url('/blog') ?>">Visit our blog</a></li>
      <li><a href="<?php echo site_url('/about-the-site') ?>">Learn about us</a></li>
    </ul>

    <h2 class="headline headline--medium">Search our site</h2>
    <?php get_search_form(); ?>
  </div>
</div>

<?php get_footer(); ?>