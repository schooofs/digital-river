<?php
switch ( get_current_blog_id() ) {
    case '12': // German
        $form_id = 6536;
        break;

    case '14': // China
        $form_id = 6556;
        break;

    case '16': // Japan
        $form_id = 6566;
        break;

    default:
        $form_id = 6297;
        break;
}

if(isset($_GET['aliId'])) {
        header("Location: /thank-you");
    }
?>

<div class="brick-demo-form" data-id="<?= $form_id ?>" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row justify-content-between">
            <div class="schedule-demo-form col-md-5">
                <?php View::make("parts/marketo-form", [
                    "mkto_form_id" => $form_id
                ]); ?>
            </div>
            <div class="demo-text-block col-md-6">
                <h2 style="color: <?= $title_colour ?>;"><?= $title_text ?></h2>
                <?= $body_copy ?>
            </div>
        </div>
    </div>
</div>
