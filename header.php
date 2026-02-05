<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
</head>

<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container">
      <div class="school-logo-text float-left">
        <a href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('/images/logotype-drops-of-knowledge-300.png') ?>" alt="Logo"></a>
      </div>
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <ul>
            <!-- get_the_ID can oalso evaluated as a 0, because the parent ID is always ZERO -->
            <li <?php if (is_page('about-the-site') || wp_get_post_parent_id(get_the_ID()) == 15) echo 'class="current-menu-item"'; ?>><a href="<?php echo site_url('/about-the-site') ?>">About the Site</a></li>
            <li><a href="#">Programs</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Campuses</a></li>
            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"'; ?>><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
          </ul>
        </nav>
        <div class="site-header__util">
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>

  <!-- <?php
        //  TODO: Dinamically display the navigation menu assigned to the 'headerMenu' location.
        // wp_nav_menu(array(
        //   'theme_location' => 'headerMenu',
        //   'container' => false,
        //   'fallback_cb' => 'wp_page_menu',
        //   'depth' => 2
        // ));
        ?> -->