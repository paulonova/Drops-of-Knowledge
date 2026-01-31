<!-- single.php  
 Is for a single post view - shows one post at a time. 
-->

<?php get_header();


while (have_posts()): the_post(); ?>
  <h1>This is a post</h1>
  <h2><?php the_title(); ?></h2>
  <p><?php the_content(); ?></p>
  <hr />

<?php endwhile;
get_footer();
?>