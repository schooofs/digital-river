<div class="col-md-6 col-lg-4 resource-card<?php if ($resource->editors_pick) {
    echo ' editors-pick';
} ?>">
    <div class="resource-card--content">
        <?php if ($resource->editors_pick) { ?>
            <span class="resource-card-heading"><i></i> Editor's Pick</span>
        <?php } else { ?>
            <a href="<?= $resource->custom['link'] ?>"<?php if ($resource->custom['link_external']) {
                echo ' target="_blank"';
            } ?>>
                <div class="resource-card-image img-background"
                     style="background-image: url(<?= $resource->custom['image']['url'] ?>)"></div>
            </a>
        <?php } ?>
        <h3>
            <a href="<?= $resource->custom['link'] ?>"<?php if ($resource->custom['link_external']) {
                echo ' target="_blank"';
            } ?>><?= $resource->post_title ?></a>
        </h3>
        <p><?= $resource->post_excerpt ?></p>
    </div>
    <a href="<?= $resource->custom['link'] ?>" class="cta"<?php if ($resource->custom['link_external']) {
        echo ' target="_blank"';
    } ?>>View now <span>&gt;</span></a>
</div>