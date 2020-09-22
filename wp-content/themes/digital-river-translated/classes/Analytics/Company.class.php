<?php

class Company {

    static function get_company_by_domain($name = null)
    {
      $company_info = json_decode(file_get_contents('./company.json'));
      $company_info->system = Technologies::get_ecommerce_platform($company_info->technologies);

      return $company_info;
    }
    
}
