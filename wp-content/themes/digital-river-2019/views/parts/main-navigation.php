<?php
$menu_args = array(
    'theme_location' => 'main-navigation-2019',
    'container_class' => 'collapse navbar-collapse',
    'container_id' => 'navbarSupportedContent',
    'menu_class' => 'navbar-nav mr-auto',
    'depth' => 2,
    'walker' => new Bootstrap_NavWalker(),
    'fallback_cb' => 'Bootstrap_NavWalker::fallback'
);
?>

<nav class="navbar navbar-dark navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?= get_home_url() ?>">
            <img class="navbar-logo" src="<?= get_stylesheet_directory_uri() . '/assets/images/logo-digitalriver-white.svg'
            ?>" alt="Digital River">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="dr_navbar-toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>

        <?php wp_nav_menu($menu_args);

        switch ( get_current_blog_id() ) {
            case '12': // German
                $search_placeholder = 'Suche';
                echo '<a href="'. get_home_url() .'/demo-anfordern" class="btn btn-large de-btn mx-3 button-demo">DEMO ANFORDERN</a>';
                break;

            case '14': // China
                $search_placeholder = '搜索';
                echo '<a href="'. get_home_url() .'/request-demo" class="btn btn-large mx-3 button-demo">申请演示</a>';
                break;

            case '16': // Japan
                $search_placeholder = '探す';
                echo '<a href="'. get_home_url() .'/お問い合わせ" class="btn btn-large mx-3 button-demo">お問い合わせ</a>';
                break;

            default:
                $search_placeholder = 'Search';
                echo '<a href="'. get_home_url() .'/request-demo" class="btn btn-large mx-3 button-demo">Talk to Sales</a>';
                break;
        }
        ?>

        <form class="form-inline navbar-search" action="/">
            <div class="dr_search-group">
                <input class="form-control" type="search" placeholder="<?php echo $search_placeholder; ?>" aria-label="Search" name="s">
                <button class="button-unstyled submit"><span></span></button>
            </div>
            <button class="button-unstyled search-toggle my-2 my-sm-0" type="button"><?= ContentFormatter::svg("icons_EditionZoomForSearch", ["size" => 24]) ?></button>
        </form>
    </div>
</nav>
