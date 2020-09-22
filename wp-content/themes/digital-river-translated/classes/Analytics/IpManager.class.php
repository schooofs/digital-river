<?php

class IpManager{

    public static function get()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

	public static function check_ip($ips, $new_ip)
    {

        if($new_ip != null){
            if($ips == "null"){
                $ips = array($new_ip);
            }else{
                if(!in_array($new_ip, $ips)){
                    $ips[] = $new_ip;
                }
            }
        }

        return $ips;
	}

}