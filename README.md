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

### get_template_part()

- get_template_part('template-parts/event', 'excerpt');

- get_template_part() — WordPress função
  A função get_template_part() carrega e exibe um arquivo de template parcial de seu tema.

* Parâmetros:
  'template-parts/event' → caminho + nome base do arquivo
  'excerpt' → sufixo opcional

- ex:
  get_template_part('template-parts/event', 'excerpt');
  O segundo argumento é o -excerpt: template.parts/event-excerpt

🎯 Vantagem
Reutiliza código: em vez de repetir o HTML do card em vários templates, você carrega sempre o mesmo arquivo
Fácil manutenção: muda uma vez, reflete em todos os lugares que usam

### CHECK DOCUMENTATION

<a href="https://developer.wordpress.org/rest-api/reference/posts/#list-posts">RestAPI References</a>

```
https://developer.wordpress.org/rest-api/reference/posts/#list-posts

```
