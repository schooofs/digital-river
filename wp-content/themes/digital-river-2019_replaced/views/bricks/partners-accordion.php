<div class="brick-partners-accordion" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row">
            <dl class="js-badger-accordion partners-accordion col">
                <dt>
                    <button class="js-badger-accordion-header card-header">
                        <span class="open-close-circle" data-toggle="collapse" data-target="#collapseOne"></span>

                        <h2> <?php echo $accordion_title_one; ?></h2>
                    </button>
                </dt>
                <dd class="badger-accordion__panel js-badger-accordion-panel">
                    <div class="js-badger-accordion-panel-inner">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <p><?php echo $accordion_copy_one; ?></p>
                                <?php if ($cta_text_one != "") { ?>
                                    <a href="<?php echo $cta_url_one; ?>" class="btn"><?php echo $cta_text_one; ?></a>
                                <?php } ?>
                            </div>
                            <div class="col-md-6 container">
                                <div class="row">
                                    <?php foreach ($accordion_one_image as $key => $logo) { ?>
                                        <?php if ($key < 3) { ?>
                                            <div class="col-sm-12 col-md-6 col-lg-4  m-auto">
                                                <a href="<?php echo ( $logo['link'] !== '' ) ? $logo['link'] : 'javascript:void(0)'; ?>">
                                                    <img src="<?= $logo['logo'] ?>" alt="logo" class="img-fluid mb-2">
                                                </a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php foreach ($accordion_one_image as $key => $logo) { ?>
                                        <?php if ($key > 2) { ?>
                                            <div class="col-sm-12 col-md-6 col-lg-4  m-auto">
                                                <a href="<?php echo ( $logo['link'] !== '' ) ? $logo['link'] : 'javascript:void(0)'; ?>">
                                                    <img src="<?= $logo['logo'] ?>" alt="logo" class="img-fluid mb-2">
                                                </a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </dd>
                <dt>
                    <button class="js-badger-accordion-header card-header">
                        <span class="open-close-circle" data-toggle="collapse" data-target="#collapseTwo"></span>
                        <h2> <?php echo $accordion_title_two; ?></h2>
                    </button>
                </dt>
                <dd class="badger-accordion__panel js-badger-accordion-panel">
                    <div class="js-badger-accordion-panel-inner">
                        <div class="card-body row">

                            <div class="col-md-6">
                                <p><?php echo $accordion_copy_two; ?></p>
                                <?php if ($cta_text != "") { ?>
                                    <a href="<?php echo $cta_url; ?>" class="btn"><?php echo $cta_text; ?></a>
                                <?php } ?>
                            </div>
                            <div class="col-md-6 container">
                                <div class="row">
                                    <?php foreach ($accordion_two_image as $key => $logo) { ?>
                                        <?php if ($key < 3) { ?>
                                            <div class="col-sm-12 col-md-6 col-lg-4 m-auto">
                                                <a href="<?php echo ( $logo['link'] !== '' ) ? $logo['link'] : 'javascript:void(0)'; ?>">
                                                    <img src="<?= $logo['logo'] ?>" alt="logo" class="img-fluid mb-2">
                                                </a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <div class="row">
                                    <?php foreach ($accordion_two_image as $key => $logo) { ?>
                                        <?php if ($key > 2) { ?>
                                            <div class="col-sm-12 col-md-6 col-lg-4 m-auto">
                                                <a href="<?php echo ( $logo['link'] !== '' ) ? $logo['link'] : 'javascript:void(0)'; ?>">
                                                    <img src="<?= $logo['logo'] ?>" alt="logo" class="img-fluid mb-2">
                                                </a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </dd>
            </dl>
        </div>
    </div>
</div>
