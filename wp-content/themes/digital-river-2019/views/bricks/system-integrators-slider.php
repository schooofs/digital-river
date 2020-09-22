<div class="brick-partners-slider" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color:white;">
    <div class="partners">
        <div class="container">
            <div class="row" style="margin-top: 2rem;">
                <h2 class="mx-auto">System Integrators</h2>
            </div>
            <?php if (count($slider) < 5 ): ?>
                <div class="row partners-carousel--static">
                    <?php foreach ($slider as $key => $sliderValues): ?>
                        <div class="col">
                            <a href="<?php echo ( $sliderValues['link'] !== '' ) ? $sliderValues['link'] : 'javascript:void(0)'; ?>">
                                <div class="background-img" style="background-image: url('<?=
                                $sliderValues['client_logo']['url'] ?>')"></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <? else:  ?>                  
                <div class="row">
                    <div class="partners-carousel col">
                        <div class="glide"  style="margin-top: 1.5rem; margin-bottom: 4rem;">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    <?php foreach ($slider as $key => $sliderValues): ?>
                                        <li class="glade__slide">
                                            <a href="<?php echo ( $sliderValues['link'] !== '' ) ? $sliderValues['link'] : 'javascript:void(0)'; ?>">
                                                <div class="background-img" style="background-image: url('<?=
                                                $sliderValues['client_logo']['url'] ?>')"></div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img
                                            src="/wp-content/uploads/sites/8/ico-arrow-right-gray.svg" alt="right arrow">
                                </button>
                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <img
                                            src="/wp-content/uploads/sites/8/ico-arrow-right-gray.svg" alt="left arrow">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

