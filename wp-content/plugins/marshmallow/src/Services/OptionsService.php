<?php


namespace DigitalRiver\Services;

use DigitalRiver\Admin\Menu\Options as MenuOptions;

class OptionsService
{

	public $options;

	public function __construct(MenuOptions $options) {
		$this->options = $options;
	}


	public function get_page_options($option, $section, $default = '' )
	{
		return $this->options->get_option($option, $section, $default = '' );
	}

	public function get_crm_options($option)
	{
		return $this->get_page_options($option, 'digitalriver_crm');
	}

	public function get_maxmind_option($option)
	{
		return $this->get_page_options($option, 'digitalriver_geo');
	}

    public function get_message_option($option)
    {
        return $this->get_page_options($option, 'digitalriver_message');
    }

	public function getSiteSpecificIPHeader()
	{
		return get_site_option('refer_ip_header');
	}

}
