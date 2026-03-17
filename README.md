# Drops of Knowledge

- To run SCSS only: `npm run watch-css`

\*\* EVENT CARDS

```
<?php $homepageEventPosts = new WP_Query(array(
  'posts_per_page' => 3,  // -1 value to show all posts
  'post_type' => 'events',
  'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',  // rand to show random posts
  'order' => 'ASC'
)); ?>

```

### PLUGINS:

\*\* ACF
