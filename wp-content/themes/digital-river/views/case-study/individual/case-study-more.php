<div class="pad-t-xxs-6 pad-b-xxs-6">
    <div class="row">
        <div class="col-md-5 col-md-offset-1 pad-t-sm-6">
            <h2 class="tag">More Case Studies</h2>
        </div>
    </div>
</div>
<div class="client-features-slider owl-carousel owl-theme">
	<?php foreach($clients as $client): ?>
	<div class="client-feature-wrapper">
		<?= $client; ?>
	</div>
	<?php endforeach; ?>
</div>