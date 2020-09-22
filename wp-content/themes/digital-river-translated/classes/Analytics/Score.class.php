<?php

class Score {
    static $types = array(
                "default" => 5,
                "view" => 5,
                "email" => 10,
                "adwords" => 10,
                "success" => 30,
            );

    static function get_score_by_type($type)
    {
        return self::$types[$type];
    }
}
