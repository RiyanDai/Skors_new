<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <!-- Hapus versi text logo -->
        <!-- <h1><a href="#intro" class="scrollto">SKORS</a></h1> -->

        <!-- Gunakan image logo -->
        <a href="<?php echo home_url(); ?>">
          <img src="<?php echo get_theme_file_uri('/img/Logo-SKOR.png'); ?>" alt="SKORS" class="img-fluid">
        </a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">


          <?php
          $menu_items = wp_get_nav_menu_items('Menu Atas');

          if ($menu_items) {
            foreach ($menu_items as $item) {
              $active_class = '';
              if ($item->url == get_permalink()) {
                $active_class = 'menu-active';
              }
              echo '<li class="' . $active_class . '"><a href="' . $item->url . '">' . $item->title . '</a></li>';
            }
          }
          ?>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->