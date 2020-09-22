<?php

class Blog{
  public  static function  get_recent(){
    return wp_get_recent_posts(
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'numberposts' => 3
                ),
                OBJECT
        );
    }
}
?>
