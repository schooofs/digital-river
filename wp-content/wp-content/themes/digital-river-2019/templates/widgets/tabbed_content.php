<div class="tabbed_content">

    <?php if ($header_text) : ?>
        <div class="header_text"><?php echo $header_text; ?></div>
    <?php endif; ?>

    <?php if ($intro_text) : ?>
        <div class="intro_text"><?php echo $intro_text; ?></div>
    <?php endif; ?>

    <?php foreach ($rows as $row) : ?>
        <div class="tab_row container">
            <div class="row">
                <?php
                $tab_count = count($row['tabs']);
                $i = 1;
                foreach ($row['tabs'] as $tab) : ?>
                    <div class="tab col span_6 <?php echo ($i === $tab_count && $tab_count != 1) ? 'last': ''; ?>">
                        <div class="tab_header">
                            <div class="image">
                                <img src="<?php echo $tab['tab_title_image']; ?>" alt="">
                                <div class="overlay"></div>
                            </div>
                            <div class="title">
                                <div class="text"><?php echo $tab['tab_title']; ?></div>
                                <div class="arrow"></div>
                            </div>
							<div class="tab_content_container clearfix"></div>
                        </div>
                        <?php
                        $drawer_open = ($tab['drawer_open']) ? 'true': 'false';
                        if (!$drawer_open) {
                            $drawer_open = (!$tab['tab_title'] && !$tab['tab_title_image'])? 'true': 'false';
                        }
                        ?>
                        <section class="content" data-open="<?php echo $drawer_open; ?>">
                            <a class="content_exit" href="#">X</a>
                            <?php if ($tab['tab_title']) : ?>
                                <h1><?php echo $tab['tab_title']; ?></h1>
                            <?php endif; ?>
                            <?php echo $tab['content']; ?>
                        </section>
                    </div>
                <?php $i++; endforeach; ?>
            </div>
            <div class="clear"></div>
            <div class="tab_content_container clearfix"></div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    jQuery(function($) {
        var open = false,
            tab  = false,
			isMobile = $('.hide_on_mobile:visible').length == 0;

		$(window).load(function() {
			$('#template_b .tabbed_content .tab_header img').greyScale();
		}).resize(function() {
			isMobile = $('.hide_on_mobile:visible').length == 0
		});

        // Stop propogation
        $('.tab_content_container > a').click(function(e) {
            e.stopPropagation();
        });
	
        // Closes the content
        $('.tab_content_container').on('click', function(e) {
            // Catch anchor tags
            var $target = $(e.target);
            if ($target.is('a') && !$target.hasClass('content_exit')) {
                location.href = $target.attr('href');
                return false;
            }

            e.preventDefault();
            var container = $(this);
			
			$('.gsCanvas').stop().animate({'opacity': 1}, 400);
			$('.gsCanvas').data('is-gray', true);

            // Hide content container and change arrow status
            container.slideUp({
				duration: 500,
				complete: function() {
					change_status();
					container.html('');
				}
			});
        });

        // Loop through each row and check drawer status on the first tab
        $('.tab_row').each(function() {
            // Get the first tab
            var first_tab = $(this).children('.tab:first'),
                content   = first_tab.children('.content').html(),
                drawer_status = first_tab.children('.content').data('open');

            // If drawer status is open, display content
            if (drawer_status) {
				$(this).children('.tab_content_container').html(content);
            }
        });

        // Click to show content about current tab
        $('.tab_header').click(function(e) {
			
			var self = $(this);
			var srcElement = $(e.srcElement);

            open = (tab[0] == self[0]) ? true: false;

            change_status();

//			$('.gray_disabled').switchClass('gray_disabled', 'gray');
			
            if (!open) {
                open = true;
                tab = self;
                // Get content
                var content = self.siblings('.content').html();
				
				// Force grayscale
				if ( srcElement.hasClass('text') || srcElement.hasClass('arrow') ) {
					$('canvas', self).fadeOut(500);
				}

                // Change arrow and overlay
                self.find('.arrow').addClass('selected');
                //self.parents('.tab').siblings('.tab').find('.overlay').addClass('selected');
				//self.children('.image').children('img').switchClass('gray', 'gray_disabled', 1000);

                // Display content
				if (isMobile) {
					self.children('.tab_content_container').slideUp(500, function() {
						$('.tab_header').each(function() {
							$(this).children('.tab_content_container').slideUp(500);
						});
						self
							.children('.tab_content_container')
							.html(content)
							.slideDown(1000, function() {
								$('html, body').animate({
									scrollTop: self.offset().top + self.children('.image').height()
								}, 1000);
							});
					});
				} else {
					var myParent = self.parents('.tab_row');
					myParent.children('.tab_content_container').slideUp(500, function() {
						$('.tab_row').each(function() {
							if ($(this) != myParent) {
								$(this).children('.tab_content_container').slideUp(500);
							}
						});
						myParent
							.children('.tab_content_container')
							.html(content)
							.slideDown(1000, function() {
								$('html, body').animate({
									scrollTop: self.offset().top - 60
								}, 1000);
							});
					});
				}
            } else {
                open = false;
                tab = false;
                var container = $(this).parents('.tab_row').children('.tab_content_container');
				var myParent = $(this).parents('.tab_row');
				
				// Hide content container and change arrow status
				if (isMobile) {
					$('.tab_header').each(function() {
						$(this).find('.tab_content_container').slideUp(500);
					});
				} else {
					$('.tab_row').each(function() {
						if ($(this) != myParent) {
							$(this).children('.tab_content_container').slideUp(500);
						}
					});
				}

                container.slideUp(500, function() {
					container.html('');
				});
            }
        });

        function change_status() {
            $('.tab_header').each(function() {
				if ( $(this).find('.arrow').hasClass('selected') ) {
					$(this).find('.arrow').removeClass('selected');
					$(this).find('canvas').fadeIn(500);
				}
            });
        }
    });
</script>