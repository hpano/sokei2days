<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="wrapper" class="common">
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
          <!--
        <ul class="nav-menu">
          <li><a href="bulletin.html">要項</a></li>
          <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">スケジュール</a></li>
          <li>
            <a href="prepar.html">申し込み</a>
            <ul class="sub-menu">
              <li><a href="<?php echo esc_url(home_url('/sample-page/')); ?>">スタッフ募集</a></li>
              <li><a href="recruit/form.html">応募フォーム</a></li>
            </ul>
          </li>
          <li><a href="<?php echo esc_url(home_url('/test/')); ?>">お問合せ</a></li>
        </ul>
      -->
      </nav>

      <nav class="guide">
        <ul>
          <li><a class="leftGuide" href="<?php echo esc_url(home_url('/kolc/')); ?>">10 KOLC大会</a></li>
          <li><a class="rightGuide" href="<?php echo esc_url(home_url('/oc/')); ?>">11 早大OC大会</a></li>
        </ul>
      </nav>
    </header>
<!-- ▲ヘッダー終了 -->