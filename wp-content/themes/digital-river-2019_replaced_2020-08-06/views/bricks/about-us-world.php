<div class="brick-about-us-world" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="office-locations"
         style="background-image: url(http://digitalriver.local/wp-content/uploads/sites/8/bg-triangle-blue-left.svg);">
        <div class="container">
            <h2><?php echo $title; ?></h2>
            <h3 class="regions"><?php echo $subtitle; ?></h3>
        </div>
        <div class="container office-locations--cols showregion" id="americas">
            <div class="row">
                <?php foreach ($locations as $key => $locationValues): ?>
                    <?php if ($locationValues['region'] == "Americas") { ?>
                        <div class="col-md-4">
                            <img src="<?php echo $locationValues['image'] ?>" alt="">
                            <h3><?php echo $locationValues['name'] ?></h3>
                            <address>
                                <p>
                                    <?php echo $locationValues['address'] ?>
                                </p>
                                <a href="tel:<?php echo $locationValues['tel'] ?>"><?php echo $locationValues['tel'] ?></a>
                            </address>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="container office-locations--cols showregion" id="emea" style="display:none;">
            <div class="row">
                <?php foreach ($locations as $key => $locationValues): ?>
                    <?php if ($locationValues['region'] == "EMEA") { ?>
                        <div class="col-md-4">
                            <img src="<?php echo $locationValues['image'] ?>" alt="">
                            <h3><?php echo $locationValues['name'] ?></h3>
                            <address>
                                <p>
                                    <?php echo $locationValues['address'] ?>
                                </p>
                                <a href="tel:<?php echo $locationValues['tel'] ?>"><?php echo $locationValues['tel'] ?></a>
                            </address>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="container office-locations--cols showregion" id="apac" style="display:none;">
            <div class="row">
                <?php foreach ($locations as $key => $locationValues): ?>
                    <?php if ($locationValues['region'] == "APAC") { ?>
                        <div class="col-md-4">
                            <img src="<?php echo $locationValues['image'] ?>" alt="">
                            <h3><?php echo $locationValues['name'] ?></h3>
                            <address>
                                <p>
                                    <?php echo $locationValues['address'] ?>
                                </p>
                                <a href="tel:<?php echo $locationValues['tel'] ?>"><?php echo $locationValues['tel'] ?></a>
                            </address>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>