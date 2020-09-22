    <div class="section fp-auto-height">
      <div class="body-inner-wrapper">
        <div class="footer-callout bg-altGray txt-blue text-center"><span><?php _e('Want to see a full demo? Schedule a meeting now.', 'digital-river') ?></span> <a class="trigger-contact-us h5 btn btn-primary">Contact Us</a></div>
        <?php View::make("parts/main-footer-view"); ?> 
      </div>
    </div>
    <?php wp_footer(); ?>
    <?php if(get_current_blog_id() === 8) : ?>
    <?php View::make("parts/contact-us-tab"); ?>
    <?php else : ?>
    <?php View::make("parts/contact-us-overlay"); ?>
    <?php endif; ?>
    <?php View::make("parts/videos-overlay"); ?> 
    <?= isset($GLOBALS['scripts']) ? "<script>".$GLOBALS['scripts']."</script>":""; ?>
    <script>
      dataLayer.push({
       'resource_type': 'resource',
       'resource_name': '<?= $title ?>',
      });
    </script>
  </div>
</body>
</html>
