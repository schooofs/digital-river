<?php

class PhoneNumber{

	public static $phone_number_options = array(
										"en" 	=> "English",
										"zh-hans" 	=> "Chinese",
										"ja" 	=> "Japanese",
										"db" 	=> "German"
									);

	public static $phone_numbers = array(
										"en" 	=> "+1 (800) 598-7450",
										"zh-hans" 	=> "+861082652996",
										"ja" 	=> "+81353256224",
										"de" 	=> "+0221 310880"
									);

	public static $find_my_order_lang = array(
										"en" 	=> "en_US",
										"zh-hans" 	=> "zh_CN",
										"ja" 	=> "ja_JP",
										"de" 	=> "de_DE"
									);


	public static $demo_links = array(
									"en" 		=> "/request-a-demo",
									"zh-hans" 	=> "/申请演示",
									"ja" 		=> "/デモの依頼",
									"de" 		=> "/prasentation-anfordern"
								);

	public static $demo_labels = array(
									"en" 		=> "<span>Request A </span>Demo",
									"zh-hans" 	=> "申请演示",
									"ja" 		=> "デモの依頼",
									"de" 		=> "Demo<span>anfordern<span>"
								);

	public static $lang = array(
								"en" 		=> "en",
								"zh-hans" 	=> "zh-Hans",
								"ja" 		=> "ja",
								"de" 		=> "de"
							);

	    // $mobileInfo = array();
    //  if(ICL_LANGUAGE_CODE == "zh-hans"){
    //     $lang = "zh-hans"." translated";
    //     $mobileInfo['phone_number'] = "+861082652996";
    //     $mobileInfo['request_demo_text'] = "申请演示";
    //     $mobileInfo['request_demo_link'] = "/申请演示";
    //  }else if(ICL_LANGUAGE_CODE == "ja"){
    //     $lang = "ja"." translated";
    //     $mobileInfo['phone_number']= "+81353256224";
    //     $mobileInfo['request_demo_text'] = 'デモの依頼';
    //     $mobileInfo['request_demo_link'] = "/デモの依頼";
    //  }else if(ICL_LANGUAGE_CODE == "de"){
    //     $lang = "de"." translated";
    //     $mobileInfo['phone_number']= "+490221310880";
    //     $mobileInfo['request_demo_text'] = 'Demo<span>anfordern<span>';
    //     $mobileInfo['request_demo_link'] = '/prasentation-anfordern';
    //  }else{
    //     $lang = "";
    //     $mobileInfo['phone_number'] = "+1 (800) 598-7450";
    //     $mobileInfo['request_demo_text'] = '<span>Request A </span>Demo';
    //     $mobileInfo['request_demo_link'] = '/request-a-demo';
    // }

	private static $address = '10380 Bren Road West<br>Minnetonka, MN 55343<br><abbr title="Phone">P:</abbr> +1 (952) 253-1234';

	static function get_phone_number()
	{
		return self::$phone_numbers[ICL_LANGUAGE_CODE];
	}

	static function get_find_my_order_lang()
	{
		return self::$find_my_order_lang[ICL_LANGUAGE_CODE];
	}

	static function get_address()
	{
		return self::$address;
	}

	static function get_demo_link()
	{
		return self::$demo_links[ICL_LANGUAGE_CODE];
	}

	static function get_demo_label()
	{
		return self::$demo_labels[ICL_LANGUAGE_CODE];
	}

}

