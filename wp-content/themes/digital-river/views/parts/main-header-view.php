<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCV324G"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- Maxymizer Tag-->
<script async src="//service.maxymiser.net/api/us/digitalriver.com/410ef6/mmapi.js"></script>


<div class="body-inner-wrapper navbar-fixed-top">
    <a href="#content" class="sr-only sr-only-focusable">
        <div class="container"><span class="skiplink-text">Skip to main content</span></div>
    </a>
    <header class="navbar bg-white navbar-default main-nav">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 pad-r-sm-4 pad-r-md-0">
                <nav class="collapse navbar-collapse">
                    <div class="top-buttons">
                        <span class="search btn btn-secondary btn-sm pull-right" style="line-height: .8; margin-left: 4px; width: 50px; padding-left: 9px; padding-right: 9px;"><?= ContentFormatter::svg("icons_EditionZoomForSearch",["color"=>"#B6E8FB", "size" => 24]) ?></span>
                        <?php wp_nav_menu(['theme_location' => 'top-navigation', 'menu_class'=>'list-unstyled list-inline', 'container_class' => 'pull-right']); ?>
                        <a class="pull-right txt-blue d-none d-md-block" style="padding-top: 7px;
    padding-right: 15px;" href="https://www.mycommerce.com/?utm_source=digitalriver&utm_medium=header-link" target="_blank" rel="nofollow">GO TO <u>MYCOMMERCE.COM</u></a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 pad-r-sm-4 pad-r-md-2">
                <div class="navbar-header">
                    <button aria-controls=bs-navbar aria-expanded=false class="collapsed navbar-toggle" data-target="#main-navbar" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" style="display:inline-block;">
                        <div class="logo" style="margin-top: 10px;">
                            <img alt="Ecommerce & Global Payments" src="/wp-content/themes/digital-river/assets/images/digital-river-logo.svg" />
                        </div>
                    </a>
                </div>
                <nav class="collapse navbar-collapse text-right" id="main-navbar">
                    <ul class="nav navbar-nav pull-right main-nav-items">
                        <?php wp_nav_menu(['theme_location' => 'main-navigation', 'menu_class'=>'nav navbar-nav pull-right main-nav-items']); ?>
                    </ul>
                    <div class="pull-right search_field-outer-wrapper">
                        <?= get_search_form() ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</div>
<?php do_action("abm_bar"); ?>
<div class="body-inner-wrapper main-body">
