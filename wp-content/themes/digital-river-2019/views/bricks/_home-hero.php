<div class="brick-home-hero" id="<?= $anchor ?>" <?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="background-pattern" style="background-image: url(<?= get_stylesheet_directory_uri() .
    '/assets/images/pattern-5.png' ?>);"></div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-lg-9 col-xl-7">
                <h1><?= $heading ?></h1>
                <p><?= $subheading ?></p>

                <div class="form-row">
                    <div class="col-md-7">
                        <form id="mktoForm_6700"></form>
                        <script>
                        MktoForms2.loadForm("//app-sj03.marketo.com", "348-QUY-258", 6700, function(form) {
                            form.onSuccess(function(values, followUpUrl) {
                                if (followUpUrl) {
                                    window.location.href = "request-demo/?e=" + values.Email;
                                }
                                return false;
                            });
                        });
                        </script>

                    </div>
                    <div class="col-md-5">
                        <button class="btn" id="home-hero-button"><?= $button_text ?></button>
                    </div>
                </div>
                <a href="/benefits" class="link--fancy"><?= $benefits_text ?> <i
                        class="material-icons">arrow_forward</i>
                </a>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-5">
                <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
            </div>
        </div>
    </div>
</div>