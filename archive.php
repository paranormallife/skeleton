<div class="archives">
  <h2>Archive by Month</h2>
  <ul class="archive" id="archive-month">
    <?php wp_get_archives(); ?>
  </ul>
  
  <h2>Archive by Category</h2>
  <ul class="archive" id="archive-category">
      <?php wp_list_categories( array('use_desc_for_title' => 0, 'title_li' => '' )); ?>
  </ul>
</div>