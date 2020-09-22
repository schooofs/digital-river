<?php

class iconChooser
{
    public function __construct()
  {
    add_filter('acf/load_field/key=field_5968e37188969', [$this, 'populate_icon_options']);
    
    add_filter('acf/load_field/key=field_597f4319d2ab9', [$this, 'case_study_icon']);
 
  }

  public function populate_icon_options($field)
  {
      foreach( array_slice(scandir(get_template_directory() . "/assets/images/svg"), 2) as $file ) {
        $file_name = basename($file, '.svg');
        $field['choices'][ $file_name ] = str_replace("icons_", "", $file_name);
      }

      return $field;
  }

};

?>