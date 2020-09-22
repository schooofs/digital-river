<?php

class PageInfo{

	static function tag($type, $sub_type, $page_attr)
	{
    	$tag = array();

        if($type != null){
            $tag["type"] = $type;
            $tag["sub_type"] = $sub_type;
        }else{
            $tag["type"] = "view";
        }

        if($page_attr != null){
            $tag = array_merge($tag, $page_attr);
        }

		$tag["referer"] = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:null;
        $tag["url"] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        return $tag;
    }

}