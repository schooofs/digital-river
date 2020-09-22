<div class="our-company marg-t-xxs-8 marg-b-xxs-8">
    <div class="row">
        <div class="col-xxs-10 col-xxs-offset-1">
            <?= $title ?> 
        </div>
    </div>
    <?php foreach($flip_flaps as $key => $flip_flap): ?>
    <div class="row <?= (count($flip_flaps) !== ($key+1)) ? 'marg-b-xxs-4':null ?>">
        <div class="col-xxs-10 col-sm-5 col-md-6 col-xl-7 col-xxs-offset-1 <?= $flip_flap['push']; ?> ">
            <?= $flip_flap['content'] ?>
        </div>
        <div class="col-xxs-offset-1 col-xxs-10 col-sm-offset-0 col-sm-5 col-md-4 col-xl-3 <?= $flip_flap['pull']; ?>">
            <?= $flip_flap['resource'] ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>