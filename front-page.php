<?php get_header(decide_header()); ?>
<!-- ▼メインコンテンツ開始 -->
    <div class="topContent">
      <img class="topPC" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/topPC.jpg" alt="">
      <img class="topSP" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/topSP-1.jpg" alt="">
      <img class="topSP" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/topSP-2.jpg" alt="">

      <div class="topKOLC">
        <a href="<?php echo esc_url(home_url('/kolc/')); ?>"></a>
        <p><span class="topDate">10 </span><span class="topDay">Sat.</span><br><br><span class="topName">第8回KOLC大会</span><br><span class="topPlace">2018/11/10（土）<br>長野県茅野市 千駄刈の森</span></p>
      </div>

      <div class="topOC">
        <a href="<?php echo esc_url(home_url('/oc/')); ?>"></a>
        <p><span class="topDay">Sun.</span><span class="topDate"> 11</span><br><br><span class="topName">第39回早大OC大会</span><br><span class="topPlace">2018/11/11（日）<br>長野県茅野市 市民の森</span></p>
      </div>
    </div>
<!-- ▲メインコンテンツ終了 -->
<?php get_footer(); ?>