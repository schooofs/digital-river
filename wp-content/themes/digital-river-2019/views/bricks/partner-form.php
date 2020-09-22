<?php
switch ( get_current_blog_id() ) {
    case '12': // German
        $form_id = 6546;
        break;

    case '14': // China
        $form_id = 6558;
        break;

    case '16': // Japan
        $form_id = 6568;
        break;

    default:
        $form_id = 6320;
        break;
}

if(isset($_GET['aliId'])) {
    header("Location: /thank-you");
}
?>

<div class="brick-partner-form" data-id="<?= $form_id ?>" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 pb-4">
                <?php View::make("parts/marketo-form", ["mkto_form_id" => $form_id]); ?>
            </div>
        </div>
    </div>
</div>
