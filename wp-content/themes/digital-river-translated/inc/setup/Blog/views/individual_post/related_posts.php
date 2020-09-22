<section class="related-posts">
  <div class="container">
    <div class="bg-white">
      <div class="slide option bottom-zero">
        <div class="h2 eng text-center option no-top-margin">Related Posts</div>
          <div class="grid clearfix">
            <?
              foreach ($posts as $post) {
                $item = new BlogItem($post);
                $item->display();
              }
            ?>
        </div>
      </div>
    </div>
  </div>
</section>