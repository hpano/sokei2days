<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="wrapper" class="kolc">
<!-- ▼ヘッダー開始 -->
    <header class="header">
      <!-- ▼ロゴ -->
      <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">早慶2Days in茅野</a>
      </div>
      <!-- ▼グローバルナビゲーション -->
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

      <nav class="guide">
        <ul>
          <li><a class="mainGuide" href="<?php echo esc_url(home_url('/kolc/')); ?>">10 KOLC大会</a></li>
          <li><a class="rightGuide" href="<?php echo esc_url(home_url('/oc/')); ?>">11 早大OC大会</a></li>
        </ul>
      </nav>
    </header>
<!-- ▲ヘッダー終了 -->