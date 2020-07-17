<?php
/*
Template Name: サイドバーなし1カラム
*/
?>
<?php get_header(decide_header()); ?>
<!--▼メインコンテンツ : 開始-->
    <div id="main" class="l-one-column">
      <header class="page-header">
        <h1 class="entry-title"><?php decide_title(get_the_title()); ?></h1>
      </header><!--/.entry-header-->
      <div class="container">
        <!-- ▼メインカラム : 開始-->
        <div id="main-content" class="l-main site-main">
          <!--▼記事コンテンツエリア : 開始-->
          <div id="primary" class="content-area posts">
            <?php if(have_posts()): ?>
              <?php while(have_posts()): the_post(); ?>
                <article <?php post_class(); ?>>
                  <div class="entry-content">
                    <?php the_content(); ?>
                  </div><!--/.entry-content-->
                </article>
              <?php endwhile; //投稿ループ終了 ?>
            <?php endif; //条件分岐終了 ?>
          </div>
          <!--▲記事コンテンツエリア : 終了-->
        </div>
        <!-- ▲メインカラム : 終了-->
      </div><!-- /.container -->
    </div>
<!-- ▲メインコンテンツ終了 -->
<?php get_footer(); ?>