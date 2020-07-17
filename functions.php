<?php
//コンテンツ幅をセット
if(!isset($content_width)){
  $content_width = 1600;
}

function custom_theme_setup(){
  //head内にフィードリンクを出力
  add_theme_support('automatic-feed-links');

  //タイトルタグを動的に出力
  add_theme_support('title-tag');

  //アイキャッチ画像を有効化
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(175, 175, false);

  //カスタムメニューを有効化
  add_theme_support('menus');
  //テーマの位置を定義
  register_nav_menus(
    array(
      'header' => 'グローバルナビゲーション',
      'footer' => 'フッターナビゲーション',
    )
  );

  //カスタムヘッダーを有効化
  add_theme_support('custom-header');
}
add_action('after_setup_theme', 'custom_theme_setup');

function add_my_scripts(){
  //スタイルシート読み込み
  wp_enqueue_style(
    'base-style', //cssの識別ID
    esc_url(get_stylesheet_uri()), //cssファイルへのpath
    array(), //先に読み込むcss
    '1.0', //cssファイルのバージョン指定
    'all' //cssのmedia属性
  );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');

function custom_widget_register(){
  //ウィジェットエリアの登録
  register_sidebar(array(
    'name' => 'メインサイドバー',
    'id' => 'sidebar-primary',
    'before_widget' => '<div class="widget widget-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'KOCLサイドバー',
    'id' => 'sidebar-kolc',
    'before_widget' => '<div class="widget widget-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => 'OCサイドバー',
    'id' => 'sidebar-oc',
    'before_widget' => '<div class="widget widget-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => '新着記事',
    'id' => 'new-post',
    'before_widget' => '<div class="widget widget-sidebar">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
}
add_action('widgets_init', 'custom_widget_register');

//ヘッダーテンプレートを決める
function decide_header(){
  $post_data = get_post();
  $slug = $post_data -> post_name;
  switch($slug){
    case 'front':
    case 'oc':
    case 'kolc':
      return ''.$slug.'';
      break;
  }
}

//サイドバーを決める
function decide_sidebar(){
  $post_data = get_post();
  $slug = $post_data -> post_name;
  switch($slug){
    case 'oc':
      return 'sidebar-oc';
      break;
    case 'kolc':
      return 'sidebar-kolc';
      break;
    default:
      return 'sidebar-primary';
      break;
  }
}

//コメント文言を変更
function custom_comment_form($args) {
  $args['comment_notes_before'] = '';
  $args['comment_notes_after'] = '';
  $args['label_submit'] = '送信';
  return $args;
}
add_filter('comment_form_defaults', 'custom_comment_form');

//コメントからウェブサイトを削除
function setup_comment_form_fields( $fields ) {
  // 不要な入力項目を削除
  unset( $fields['url'] );      // ウェブサイト欄を削除

  // コメント欄を一番下に移動
  $comment_field = $fields['comment'];    // コメント欄を退避
  unset( $fields['comment'] );            // コメント欄の配列要素を削除
  $fields['comment'] = $comment_field;    // 退避したコメント欄を追加（配列の末尾の要素になる）

  return $fields;
}
  add_filter( 'comment_form_fields', 'setup_comment_form_fields' );
//ページのh1を画像にするかタイトルにするかの判定
function decide_title($title){
  //$image_src = esc_url('https://kolc.wasedaoc.com/competition/wp-content/uploads/').$title.".png";
  $image_src = esc_url(home_url('wp-content/uploads/')).$title.".png";
  $image_id = get_attachment_id_from_src($image_src);
  if($image_id){
    echo '<img src="'.$image_src.'" alt="'.$title.'" class="alignnone"/>';
  }
  else echo '<span>'.$title.'</span>';
  //echo '<p>'.$image_src.', '.$image_id.'</p>';
}

//画像のURLからidを取得
function get_attachment_id_from_src($image_src){
  global $wpdb;
  $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
  $id = $wpdb->get_var($query);
  return $id;
}

//ホームURL取得のショートコード
function get_hp_url(){
  return esc_url(home_url());
}
add_shortcode('getHomeURL', 'get_hp_url');

//テンプレートURL取得のショートコード
function get_template_url(){
  return esc_url(get_template_directory_uri());
}
add_shortcode('getTmpURL', 'get_template_url');

//Form Email Confirm
function wpcf7_main_validation_filter( $result, $tag ) {
  $type = $tag['type'];
  $name = $tag['name'];
  $_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );
  if ( 'email' == $type || 'email*' == $type ) {
    if (preg_match('/(.*)_confirm$/', $name, $matches)){
      $target_name = $matches[1];
      if ($_POST[$name] != $_POST[$target_name]) {
        if (method_exists($result, 'invalidate')) {
          $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
      } else {
          $result['valid'] = false;
          $result['reason'][$name] = '確認用のメールアドレスが一致していません';
        }
      }
    }
  }
  return $result;
}

add_filter( 'wpcf7_validate_email', 'wpcf7_main_validation_filter', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_main_validation_filter', 11, 2 );

remove_filter('the_content', 'wpautop'); //記事の自動整形を無効にする
remove_filter('the_excerpt', 'wpautop'); // 抜粋の自動整形を無効にする
