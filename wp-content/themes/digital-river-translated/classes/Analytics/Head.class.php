<?php
class Head{

    function __construct()
    {
        add_action('wp_head', array(&$this, 'open_content'), -1 );
        add_action('wp_head',  array(&$this, 'close_content'), 999 );
    }

    public static function open_content()
    {
        $html = '<!DOCTYPE html>';
        $html .= '<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->';
        $html .= '<!--[if IE 7]>  <html class="no-js ie7 lt-ie9 lt-ie8"> <![endif]-->';
        $html .= '<!--[if gt IE 8]>  <html class="no-js ie"> <![endif]-->';
        $html .= '<!--[if !IE]><!--><html class="no-js" lang=""><!--[endif]-->';

        $html .= '<head>';
            $html .= '<title>';
            $html .= (wp_title('', false)) ?: get_bloginfo('name');
            $html .= '</title>';
            $html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
            $html .= '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
            $html .= '<meta charset="utf-8">';

            $html .= '<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />';

            $html .= '<!--[if lte IE 8]><link rel="stylesheet" href="' . get_template_directory_uri() . '/css/ie.css' . '" type="text/css" media="screen" /><![endif]-->';

        echo $html;
    }

    public static function close_content()
    {
        $html = '<script src="//service.maxymiser.net/api/us/digitalriver.com/410ef6/mmapi.js"></script>';
        $html .= '</head>';
            $html .= '<body>';
            $type = ($_GET['type'])?$_GET['type']:"view";
            $category = (get_field("category") != null)?get_field("category"):"Test";
            $subcategory = (get_field("subcategory") != null)?get_field("subcategory"):"Test Sub";
            $html .= '<script>'." page_info = " . json_encode(PageInfo::tag($type, null, array(
                                                                                            "category" => $category,
                                                                                            "subcategory" => $subcategory
                                                                                        ))) . '; </script>';

        echo $html;
    }
}