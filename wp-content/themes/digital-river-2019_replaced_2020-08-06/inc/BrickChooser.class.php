<?php

class BrickChooser {
  
  function __construct()	
  {
    add_action("bricks", array(&$this, 'get_bricks'));
  }

  function get_bricks($option = false)
  {
    $bricks = array_column( get_field("bricks", ($option === true)?"option":null), "brick" );
    foreach($bricks as $brick_id){
      self::display($brick_id);	
    }
  }

  static function display($brick_id)
  {
    $brick = get_post_meta( $brick_id, BricksPostType::$post_type_key, true );
    $fields = get_fields($brick_id);
    $fields = is_array($fields) ? $fields : [$fields];
    BrickController::$brick($brick_id, $fields);
  }

}

