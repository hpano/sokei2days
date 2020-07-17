<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="wrapper" class="top">
<!-- ▼ヘッダー開始 -->
    <header class="header">
      <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">早慶2Days in茅野</a>
      </div>
      <nav class="header-navigation">
        <?php
          /**
           * グローバルナビゲーション
           */
          wp_nav_menu(array(
            'theme_location' => 'header',
          ));
          ?>
      </nav>
    </header>
<!-- ▲ヘッダー終了 -->