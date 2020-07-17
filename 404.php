<?php get_header(); ?>
<!--▼メインコンテンツ : 開始-->
<div id="main" class="l-two-column">
  <header class="page-header">
    <h1 class="entry-title"><span>404 Not Found</span></h1>
  </header><!--/.page-header-->
  <div class="container">
    <!-- ▼メインカラム : 開始-->
    <div id="main-content" class="l-main site-main">
      <!--▼記事コンテンツエリア : 開始-->
      <div class="entry-content">
        <h2>ページが見つかりません</h2>
        <p>大変申し訳ございません。<br>お探しのページは削除されたか、一時的に利用できない可能性があります。</p>
        <p><a href="<?php echo esc_url(home_url()); ?>">&raquo;トップページへ戻る</a></p>
      </div><!--/.entry-content-->
      <!--▲記事コンテンツエリア : 終了-->
    </div>
    <!-- ▲メインカラム : 終了-->
    <?php get_sidebar(); ?>
  </div><!-- /.container -->
</div>
<!-- ▲メインコンテンツ終了 -->
<?php get_footer(); ?>