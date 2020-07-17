<!-- ▼サイドカラム : 開始-->
<aside id="secondary" class="l-sidebar">

  <?php if (is_active_sidebar(decide_sidebar())) : ?>
    <?php dynamic_sidebar(decide_sidebar()); ?>
  <?php endif; ?>

</aside>
<!-- ▲サイドカラム : 終了-->