<div class="comments-area">
  <h3 id="comments">この記事へのコメント</h3>
  <?php if(have_comments()): //もしコメントが1件以上あったら ?>
    <ol class="commentlist">
      <?php wp_list_comments(); ?>
    </ol>
  <?php else: ?>
    <p>コメントはまだありません。</p>
  <?php endif; ?>

  <?php if(comments_open()): //もしコメントが許可されていたら ?>
    <?php comment_form(); ?>
  <?php else: ?>
    <p>現在、コメントは受け付けていません。</p>
  <?php endif; ?>
</div>