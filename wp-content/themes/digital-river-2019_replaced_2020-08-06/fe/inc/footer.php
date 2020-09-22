</div>
   <script>
        $("#submitSalesOption").prop("disabled", true);

        $('.radio').click(function () {
            $("#submitSalesOption").prop("disabled", false);
        });
    </script>
    <div class="modal fade videos-modal" tabindex="-1" role="dialog" aria-labelledby="videosModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border: none;">
                <div class="pull-right h1 txt-white close-video">×</div>
                <div class="embed-responsive embed-responsive-16by9" id="videosWrapper"></div>
            </div>
        </div>
    </div>
    <script>
        dataLayer.push({
            'resource_type': 'resource',
            'resource_name': '',
        });
    </script>
    <!-- <script>
        function getCookie(name) {
            var re = new RegExp(name + "=([^;]+)");
            var value = re.exec(document.cookie);
            return (value != null) ? unescape(value[1]) : null;
        }
        if (getCookie("drtarg") === null) {
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
    </script> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/js/bootstrap-select.min.js"></script>
    
<script src='bundle/bundle.js?ver=5.2.2'></script>
<!-- <script src='http://digitalriver.local/wp-content/themes/digital-river-2019/dist/bundle.js?ver=5.2.2'></script> -->
    <script>$('.selectpicker').selectpicker();</script>

<script src="js/modernizr.custom.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only

			})();
		</script>






    </body>

    </html>