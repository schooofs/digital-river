<?php
	$site_id = get_current_blog_id();
	if ( 1 == $site_id ){?>
	<div id="cookie-banner" class="alert alert-dismissible text-center cookiealert" role="alert">
		<div class="cookiealert-container">This website uses cookies to offer you a better user experience. By continuing to browse the site you agree to the use of cookies.
			<div class="cookie-cta">
				<a target="_blank" class="learn-more" href="https://store.digitalriver.com/store/defaults/en_IE/DisplayDRCookiesPolicyPage">Find out how cookies work.</a>
				<button type="button" class="btn btn-primary btn-xs acceptcookies" aria-label="Close">OK</button>
			</div>
		</div>
	</div>
	<?php } elseif ( 2 == $site_id ){?>
	<div id="cookie-banner" class="alert alert-dismissible text-center cookiealert" role="alert">
		<div class="cookiealert-container">Diese Website verwendet Cookies, um Ihnen ein besseres Benutzererlebnis anzubieten. Indem Sie weiter auf der Seite browsen, stimmen Sie der Verwendung von Cookies zu.
			<div class="cookie-cta">
				<a target="_blank" class="learn-more" href="https://store.digitalriver.com/store/defaults/en_IE/DisplayDRCookiesPolicyPage">Erfahren Sie, wie Cookies funktionieren.</a>
				<button type="button" class="btn btn-primary btn-xs acceptcookies" aria-label="Close">OK</button>
			</div>
		</div>
	</div>
	<?php } elseif ( 3 == $site_id ){?>
	<div id="cookie-banner" class="alert alert-dismissible text-center cookiealert" role="alert">
		<div class="cookiealert-container">网站使用Cookie为您提供更好的用户体验。继续浏览网站即表示您同意使用Cookie
			<div class="cookie-cta">
				<a target="_blank" class="learn-more" href="https://store.digitalriver.com/store/defaults/en_IE/DisplayDRCookiesPolicyPage">确定</a>
				<button type="button" class="btn btn-primary btn-xs acceptcookies" aria-label="Close">OK</button>
			</div>
		</div>
	</div>
	<?php } elseif ( 6 == $site_id ){?>
	<div id="cookie-banner" class="alert alert-dismissible text-center cookiealert" role="alert">
		<div class="cookiealert-container">このウェブサイトでは、お客様のユーザー体験を向上させる目的でクッキーを使用します。本サイトの利用を続けることにより、お客様はクッキーの使用に同意することになります
			<div class="cookie-cta">
				<a target="_blank" class="learn-more" href="https://store.digitalriver.com/store/defaults/en_IE/DisplayDRCookiesPolicyPage">クッキーの動作について確認する</a>
				<button type="button" class="btn btn-primary btn-xs acceptcookies" aria-label="Close">OK</button>
			</div>
		</div>
	</div>
	<?php } elseif ( 8 == $site_id ){?>
	<div id="cookie-banner" class="alert alert-dismissible text-center cookiealert" role="alert">
		<div class="cookiealert-container">This website uses cookies to offer you a better user experience. By continuing to browse the site you agree to the use of cookies. 
			<div class="cookie-cta">
				<a target="_blank" class="learn-more" href="https://store.digitalriver.com/store/defaults/en_IE/DisplayDRCookiesPolicyPage">Find out how cookies work.</a>
				<button type="button" class="btn btn-primary btn-xs acceptcookies" aria-label="Close">OK</button>
			</div>
		</div>
	</div>
<?php } ?>