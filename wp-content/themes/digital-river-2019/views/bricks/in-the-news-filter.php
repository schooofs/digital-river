<?php
$link = admin_url('admin-ajax.php?action=filter_news');
?>

<div class="brick-in-the-news-filter" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> data-action="<?= $link ?>">
    <div class="container">
        <div class="in-the-news-header">
            <h2 style="color: <?= $heading_colour ?>"><?= $heading ?></h2>

            <div class="article-filter">
                View by year:
                <select class="dr_select" id="news-year-filter">
                    <option value="">All</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                </select>
            </div>
        </div>
    </div>
</div>