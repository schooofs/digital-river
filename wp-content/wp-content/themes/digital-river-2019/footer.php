<div class="section fp-auto-height">
    <?php
    if (is_page_template('template-commerce-connect.php')) {
        View::make("parts/event-footer-view");
    } else {
        switch ( get_current_blog_id() ) {
        	case '12': // German
        		View::make("parts/main-footer-view-de");
        		break;

        	case '14': // China
        		View::make("parts/main-footer-view-cn");
        		break;

        	case '16': // Japan
        		View::make("parts/main-footer-view-jp");
        		break;

        	default:
        		View::make("parts/main-footer-view");
        		break;
        }
    }
    ?>
</div>

<?php View::make("parts/contact-form"); ?>

<?php wp_footer(); ?>

<?php View::make("parts/videos-overlay"); ?>
<?= isset($GLOBALS['scripts']) ? "<script>" . $GLOBALS['scripts'] . "</script>" : ""; ?>
<script>
	dataLayer.push({
		'resource_type': 'resource',
		'resource_name': '<?= $title ?>',
	});
</script>
<script>
	function getCookie(name) {
		var re = new RegExp(name + '=([^;]+)');
		var value = re.exec(document.cookie);
		return (value != null) ? unescape(value[1]) : null;
	}

	if (getCookie('drtarg') === null) {
		$.ajax({
			url: window.global.rest_root + 'dr/v1/collect',
			method: 'GET',
			cache: false,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-WP-Nonce', window.global.rest_nonce);
			}
		}).done(function (response) {
			dataLayer.push({
				'dr_target': response.drtarg
			});
		});
	}
	$('#requestDemo').click(function () {
		window.location = '/request-demo';
		return false;
	});
</script>

<?php if (is_page_template('template-commerce-connect.php')) { ?>
<script>
	$(function () {
		var $window = $(window),
			$body = $('body'),
			$about = $('#about'),
			$location = $('#location'),
			throttleScroll;
		if (/ThankYou/i.test(location.search)) {
			$('#ccThankYou').modal();
			var uri = window.location.toString();
			if (uri.indexOf('?') > 0) {
				var clean_uri = uri.substring(0, uri.indexOf('?'));
				window.history.replaceState({}, document.title, clean_uri);
			}
		}

		//scroll event
		function navScoll() {
			clearTimeout(throttleScroll);
			throttleScroll = setTimeout(function () {
				if ($window.scrollTop()) {
					if ($body.hasClass('fixed')) {
						return;
					}
					$body.addClass('fixed');
				} else {
					$body.removeClass('fixed');
				}
			}, 10);
		}

		navScoll();
		$window.on('scroll resize', navScoll);
		// anchor scroll
		$('#menu-main > li > a').on('click', function (e) {
			e.preventDefault();
			var targetHREF = $(this).attr('href');
			if ($(targetHREF).length !== 1) {
				return;
			}
			var target = $(targetHREF).offset().top - 60;
			$('html, body').animate({
				scrollTop: target
			}, 500);
			$('button.navbar-toggle:not(.collapsed)').click();
		});
		// speaker bios
		var closing = false;
		var animationTime = 200;

		function removeExpandedSpeaker() {
			var $target = $('#speakers .speaker-row > .speaker-bio');
			if (!$target.length) {
				return;
			}
			closing = true;
			$target.slideUp(animationTime, function () {
				$('#speakers .speaker').removeClass('expanded');
				$target.remove();
				closing = false;
			});
		}

		function addExpandedSpeaker($speaker, insertIndex) {
			if (closing) {
				setTimeout(function () {
					$speaker.addClass('expanded');
					$speaker.find('.speaker-bio').clone().insertAfter('#speakers .speaker:eq(' + insertIndex + ')')
						.slideDown(animationTime);
				}, animationTime + 100);
			} else {
				$speaker.addClass('expanded');
				$speaker.find('.speaker-bio').clone().insertAfter('#speakers .speaker:eq(' + insertIndex + ')')
					.slideDown(animationTime);
			}
		}

		$('#speakers').on('click', '.speaker:not(.expanded) .speaker-info button', function () {
			removeExpandedSpeaker();
			var $this = $(this);
			var $speaker = $this.closest('.speaker');
			if ($speaker.length !== 1) {
				return;
			}
			var index = $speaker.index('.speaker');
			// if breakpoint logic here
			var perRow = (window.matchMedia('(max-width: 450px)').matches) ?
				1 :
				(window.matchMedia('(max-width: 666px)').matches) ?
					2 :
					(window.matchMedia('(max-width: 991px)').matches) ?
						3 :
						4;
			var row = Math.floor(index / perRow);
			var insertIndex = (row * perRow) + (perRow - 1);
			if (!$('#speakers .speaker:eq(' + insertIndex + ')').length) {
				insertIndex = $('.speaker').length - 1;
			}
			// console.log('--------------');
			// console.log('index', index);
			// console.log('perRow', perRow);
			// console.log('row', row);
			// console.log('insertIndex', insertIndex);
			addExpandedSpeaker($speaker, insertIndex);
		});
		$('#speakers').on('click', '.speaker-row > .speaker-bio > button, .speaker.expanded button', function () {
			removeExpandedSpeaker();
		});
		var throttleResize;
		$(window).on('resize orientationchange', function () {
			clearTimeout(throttleResize);
			throttleResize = setTimeout(function () {
				removeExpandedSpeaker();
			}, 100);
		});
	});
</script>
<?php } ?>

</body>
</html>
