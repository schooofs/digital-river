<div class="pr-quote" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background:<?= $background_colour; ?>">
    <div class="container">
        <blockquote class="strap">"<?= $quote; ?>"</blockquote>
        <label for="strap" class="client"><?= $person; ?>, <?= $business_title; ?>, <?= $client_name; ?></label>
    </div>
</div>