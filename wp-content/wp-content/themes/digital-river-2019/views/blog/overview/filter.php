<div class="bg-blue blog-nav text-center hidden-xxs hidden-xs">
	<a class="btn btn-secondary <?= ($_SERVER['REQUEST_URI'] === "/blog/") ? ' active txt-blue ' :'' ?>" href="/blog/">All<br>Posts</a>

    <a  class="btn btn-secondary <?= ($_SERVER['REQUEST_URI'] === "/blog/commerce-conversations/") ? ' active txt-blue ':'' ?>" href="/blog/commerce-conversations/">Commerce<br> Conversations</a>

    <a  class="btn btn-secondary <?= ($_SERVER['REQUEST_URI'] === "/blog/monetization-moments/") ? ' active txt-blue ':'' ?>" href="/blog/monetization-moments/">Monetization<br> Moments</a>

    <a class="btn btn-secondary <?= ($_SERVER['REQUEST_URI'] === "/blog/global-perspectives/") ? ' active txt-blue ':'' ?>" href="/blog/global-perspectives/">Global<br> Perspectives</a>
</div>
<div class="hidden-sm hidden-md hidden-lg">
	<select name="blogSelectMobile" class="form-control blogSelectMobile" id="blogSelectMobile">
		<option class="<?= ($_SERVER['REQUEST_URI'] === "/blog/") ? ' active txt-blue ' :'' ?>" value="/blog/">All Posts</option>

		<option class="<?= ($_SERVER['REQUEST_URI'] === "/blog/commerce-conversations/") ? ' active txt-blue ':'' ?>" value="/blog/commerce-conversations/">Commerce Conversations</option>

		<option class="<?= ($_SERVER['REQUEST_URI'] === "/blog/monetization-moments/") ? ' active txt-blue ':'' ?>" value="/blog/monetization-moments/">Monetization Moments</option>

		<option class="<?= ($_SERVER['REQUEST_URI'] === "/blog/global-perspectives/") ? ' active txt-blue ':'' ?>" value="/blog/global-perspectives/">Global Perspectives</option>
	</select>
</div>

