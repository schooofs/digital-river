<div class="brick-about-us-team" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="team-section container">
        <div class="row">
            <h2 class="title"><?php echo $team_section_title; ?></h2>
        </div>

        <div class="team-flex row grid">
            <?php
            $teamSize = count($team);
            $firstHalf = floor($teamSize / 2) - 1;
            $teamCounter = 0;
            $iterationCount = 0.1;
            ?>

            <?php foreach ($team as $key => $teamValues): ?>
                <figure class="team-hover wow fadeIn" data-wow-delay="<?= $iterationCount; ?>s"
                        id="<?php echo $key; ?>">
                    <img src="<?php echo $teamValues['image'] ?>" alt="Team Member"/>
                    <figcaption>
                        <h2><?php echo $teamValues['name'] ?></h2>
                        <p><?php echo $teamValues['job_title'] ?></p>
                        <?php
                            switch ( get_current_blog_id() ) {
                                case '12': // German
                                    echo '<p class="button">Biografie lesen</p>';
                                    break;

                                case '14': // China
                                    echo '<p class="button">人物履历</p>';
                                    break;

                                case '16': // Japan
                                    echo '<p class="button">経歴を読む</p>';
                                    break;

                                default:
                                    echo '<p class="button">Read Bio</p>';
                                    break;
                            }
                        ?>
                    </figcaption>
                </figure>
                <?php if ($teamCounter == $firstHalf): ?>

                    <?php foreach ($team as $key2 => $teamValues2): ?>
                        <div class="team-content row" id="team-content-<?php echo $key2; ?>" name="content">
                            <div class="close"><img
                                        src="/wp-content/themes/digital-river-2019/assets/images/ico-btn-close.svg"" alt="
                                close">
                            </div>
                            <h2 style="color: #002f57"><?php echo $teamValues2['name'] ?></h2>
                            <p class="strap" style="color: #002f57"><?php echo $teamValues2['job_title'] ?></p>
                            <p><?php echo $teamValues2['description'] ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php $teamCounter++;
                $iterationCount += 0.05;
                ?>
            <?php endforeach; ?>
        </div>

        <!-- team-cta Banner -->
        <div class="team-cta-banner">
            <div class="container">
                <div class="row flex wow fadeIn" data-wow-delay=".6s">
                    <h2 class="strap"><?php echo $strapline; ?></h2>
                    <a href="<?php echo $link; ?>">
                        <div class="cta btn" style="background:#a8c528">
                            <?php echo $cta; ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
