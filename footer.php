<footer class="site-footer">
  <div class="site-footer__inner container container--narrow">
    <div class="group">
      <div class="site-footer__col-one">
        <div class="school-logo-text school-logo-text--alt-color">
          <a href="<?php echo site_url() ?>"><img src="<?php echo get_theme_file_uri('/images/logotype-drops-of-knowledge-300.png') ?>" alt="Logo"></a>
        </div>
      </div>

      <div class="site-footer__col-two-three-group">
        <div class="site-footer__col-two">
          <h3 class="headline headline--small">Explore</h3>
          <nav class="nav-list">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'footerMenuOne',
              'container' => false,
              'fallback_cb' => 'wp_page_menu',
              'depth' => 2
            ));
            ?>
          </nav>
        </div>

        <div class="site-footer__col-three">
          <h3 class="headline headline--small">Learn</h3>
          <nav class="nav-list">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'footerMenuTwo',
              'container' => false,
              'fallback_cb' => 'wp_page_menu',
              'depth' => 2
            ));
            ?>
          </nav>
        </div>
      </div>

      <div class="site-footer__col-four">
        <h3 class="headline headline--small">Connect With Us</h3>
        <nav>
          <ul class="min-list social-icons-list group">
            <li>
              <a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>