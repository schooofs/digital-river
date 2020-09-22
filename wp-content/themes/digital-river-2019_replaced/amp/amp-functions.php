<?php

//Classes
require_once( 'classes/CustomHeader.class.php' );
require_once( 'classes/MetaChanger.class.php' );
require_once( 'classes/View.class.php' );
require_once( 'classes/CustomFooter.class.php' );


//Controllers
require_once( 'controller/AmpBlogController.php' );

add_action("init", "init_amp_digital_river", 0);
function init_amp_digital_river()
{
    new CustomAmp\CustomHeader();
    new CustomAmp\MetaChanger();
    new CustomAmp\View();
    new CustomAmp\AmpBlogController();
    new CustomAmp\CustomFooter();
}