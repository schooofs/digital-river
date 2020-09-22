<?php
$filter_action = admin_url('admin-ajax.php?action=filter_resources');
$count_action = admin_url('admin-ajax.php?action=count_resources');
?>

<div class="brick-resources-filter resource-hub" data-filter-action="<?= $filter_action ?>"
     data-count-action="<?= $count_action ?>" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color:white;">
    <div class="container">
        <div class="resource-select row">
            <label for="form">Filter by:</label>

            <select class="dr_select" id="resource-topic">
                <option value="">Topic</option>
                <?php foreach ($resource_topics as $term) { ?>
                    <option value="<?= $term->slug ?>"<?php if ((isset($term->dynamic_count) && $term->dynamic_count == 0)) {
                        echo ' disabled';
                    } ?>>
                        <?= $term->name ?> (<?= isset($term->dynamic_count) ? $term->dynamic_count : $term->count ?>)
                    </option>
                <?php } ?>
            </select>

            <select class="dr_select" id="resource-type">
                <option value="">Resource Type</option>
                <?php foreach ($resource_types as $term) { ?>
                    <option value="<?= $term->slug ?>"<?php if ((isset($term->dynamic_count) && $term->dynamic_count == 0)) {
                        echo ' disabled';
                    } ?>>
                        <?= $term->name ?> (<?= isset($term->dynamic_count) ? $term->dynamic_count : $term->count ?>)
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>