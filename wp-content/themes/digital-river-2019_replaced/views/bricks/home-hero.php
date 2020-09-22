<div class="brick-home-hero" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="background-pattern" style="background-image: url(<?= get_stylesheet_directory_uri() .
    '/assets/images/pattern-5.png' ?>);"></div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1><?= $heading ?></h1>
                <p><?= $subheading ?></p>

                <div class="form-row">
                    <div class="col-7">
                        <input type="email" class="form-control" name="email" placeholder="<?= $input_placeholder ?>">
                    </div>
                    <div class="col-5">
                        <button class="btn" id="home-hero-button"><?= $button_text ?></button>
                    </div>
                </div>

                <a href="/benefits" class="link--fancy"><?= $benefits_text ?> <i
                            class="material-icons">arrow_forward</i>
                </a>
            </div>
            <div class="col-md-6">
                <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
            </div>
        </div>
    </div>
</div>
