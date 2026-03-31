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

- ACF
- Image regenerate

### IMAGE OPTIMIZER

```
** Add_image_size gera uma nova imagem com um tamanho especifico otimizando assim o tamanho das imagens do WP.

function knowledge_features() {
  add_image_size('writerLandscape', 400, 260, true); // No lugar do true, pode se usar array('left', 'top') para controlar o crop da imagem
  add_image_size('writerPortraitMedium', 200, 200, true);
  add_image_size('writerPortrait', 480, 650, true);
}

add_action('after_setup_theme', 'knowledge_features');


```
