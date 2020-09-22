<div class="widget featured_content <?php echo ($hide_on_responsive)? 'hide_on_mobile': ''; ?>">
  <?php if ($header_text) : ?>
    <div class="fc_header"><?php echo $header_text; ?></div>
  <?php endif; ?>
  <?php if ($intro_text) : ?>
    <div class="intro"><?php echo $intro_text; ?></div>
  <?php endif; ?>
  <?php foreach ($content as $row) : ?>
  <div class="container clearfix">
    <?php if ($row['feature_page_image']) : ?>
      <span class="hide_on_mobile">
        <a href="<?php echo $row['page']; ?>" class="image">
          <span></span>
          <img src="<?php echo $row['feature_page_image']; ?>" alt="">
        </a>
        <img src="<?php echo get_image_path('icon_shadow.png'); ?>" alt="">
      </span>
    <?php endif; ?>
    <div class="content">
      <a class="header" href="<?php echo $row['page']; ?>"><?php echo $row['page_title']; ?></a>
      <?php if ($row['page_intro']) : ?>
      <div class="body"><?php echo $row['page_intro']; ?></div>
      <?php endif; ?>
      <a class="link" href="<?php echo $row['page']; ?>">Read full article</a>
    </div>
  </div>
  <div class="dotted_splitter"></div>
  <?php endforeach; ?>
</div>