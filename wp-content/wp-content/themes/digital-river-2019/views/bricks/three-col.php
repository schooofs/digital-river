<div class="brick-three-col" style="background-color: white;" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color:white;">
    <div class="container">
        <div class="row three-col">
            <?php foreach ($cards as $key => $card) { ?>
                <div class="col-md-4">
                    <div class="flex-wrap">
                        <div class="image-container">
                            <a href="<?= $card['link'] ?>"><img src="<?= $card['image'] ?>" class="icon wow fadeIn"
                                                                data-wow-delay="" alt="ico"></a>
                        </div>
                        <div class="content-container wow fadeIn" data-wow-delay="<?= ($key + 1) / 10 ?>s">
                            <h3><?= $card['heading'] ?></h3>
                            <p><?= $card['body'] ?></p>
                        </div>
                    </div>
                    <?php
                        switch ( get_current_blog_id() ) {
                            case '12': // German
                                echo '<a href="'. $card['link'] .'" class="btn de-btn">WEITERE INFORMATIONEN</a>';
                                break;

                            case '14': // China
                                echo '<a href="'. $card['link'] .'" class="btn">了解详情</a>';
                                break;

                            case '16': // Japan
                                echo '<a href="'. $card['link'] .'" class="btn">詳細をご覧ください。</a>';
                                break;

                            default:
                                echo '<a href="'. $card['link'] .'" class="btn">Learn more</a>';
                                break;
                        }
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
