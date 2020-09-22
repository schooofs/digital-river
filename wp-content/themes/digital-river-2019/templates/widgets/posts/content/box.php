<?php foreach ($posts as $post) : ?>
  <?php $permalink = get_permalink($post->ID); ?>
  <div class="posts_box clearfix">
    <?php if ($post->fields->image) : ?>
      <a href="<?php echo $permalink; ?>"><img src="<?php echo $post->fields->image; ?>" alt=""></a>
    <?php endif; ?>
    <div class="content">
      <div class="header_text">Header: <?php echo $post->post_title; ?></div>
      <div class="description">Description: <?php echo $post->fields->intro_text; ?></div>
      <div class="posted_date">Posted: <?php echo $post->post_date; ?></div>
      <a href="<?php echo $permalink; ?>" class="view">View</a>
    </div>
  </div>
<?php endforeach; ?>

<style>
  .posts_box {
    float: left;
    width: 400px;
    padding: 5px;
    border: 1px solid #dfdfdf;
  }

  .posts_box img {
    float: left;
  }

  .posts_box .content {
    float: left;
    width: 245px;
    margin-left: 5px;
  }
</style>