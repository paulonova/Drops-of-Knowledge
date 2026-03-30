# Drops of Knowledge

- To run SCSS only:

```
`npm run watch-css`
```

### EVENT CARDS

- `meta-key` para conectar com o ACF field
- `meta_value_num` Que faz o orderby as datas dos eventos do ACF

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
