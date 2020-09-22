<?php

class View{

    function create($id, $url, $category, $type, $sub_type, $new_ip, $browser, $device)
    {
        $client = Client::get();

        date_default_timezone_set('UTC');


        try {
            $response = $client->get([
                          'index' => 'leads',
                          'type' => 'lead',
                          'id' => $id
                        ]);

        } catch (Exception $e) {
            return "false";
        }


        $views = $response['_source']['view'];

        if($category == "Marketing"):
            $score_key = "marketing_score";
        elseif($category == "Payments"):
            $score_key = "payments_score";
        else:
            $score_key = "commerce_score";
        endif;

        if(isset($response['_source'][$score_key])){
            $score = $this->update_score($type, $response['_source'][$score_key]);
        }else{
            $score = $this->update_score($type);
        }
        $views[] = [
            'url' => $url,
            'category' => $category,
            'type' => $type,
            'sub_type' => $sub_type,
            'referer' => $_SERVER['HTTP_REFERER'],
            'time' => date("Y/m/j H:i:s"),
            'ip' => $new_ip,
            'browser' => $browser,
            'device' => $device
        ];

        $num_of_ips_before = count($response['_source']["ip"]);

        $ip = IpManager::check_ip($response['_source']["ip"], $new_ip);

        if(count($ip) > $num_of_ips_before){
            $new_ip = true;
        }else{
            $new_ip = false;
        }

        $params = [
            'index' => 'leads',
            'type' => 'lead',
            'id' => $id,
            'body' => [
                "doc_as_upsert" => true,
                'doc' => [
                    "view" => $views,
                    "last_updated" => date("Y/m/j H:i:s"),
                    $score_key => $score,
                    "ip" => $ip
                ]
            ]
        ];

        $response = $client->update($params);

        echo CookieGenerator::display(Lead::get_by_id($id), $new_ip);
    }


    function update_score($type, $score = 0)
    {
        return $score + Score::get_score_by_type($type);
    }


}
