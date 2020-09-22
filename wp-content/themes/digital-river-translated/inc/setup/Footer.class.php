<?php
class Footer{

	private static $left_menus = array(
										array(
											"key" => "who-we-are",
											"label" => "Who We Are"
										),
						 				array(
						 					"key" => "what-we-do",
											"label" => "What We Do"
										)
									);

	private static $middle_menus = array(
				 						array(
											"key" => "how-were-different",
											"label" => "How We're Different"
										),
					 					 array(
					 					 	"key" => "resources",
											"label" => "Resources",
											"lang" 	=> array("en","ja")
										)
									);

	private static $right_menus = array(
					 					array(
					 						"key" => "our-sites",
											"label" => "Our Sites"
										)
									);




	static function simple()
	{
		self::display_scripts();
		
		echo '<footer class="bg-white txt-darkGray">';
			echo '<div class="container">';
				echo '<div class="row">';
					echo '<div class="disclaimer col-xs-12 text-right">';
						echo '<a href="/company/corporate-policies/">'.__("Corporate Policies","digital-river").'</a>   <span>©' . date("Y") .  __(" Digital River, Inc., Digital River® is a registered trademark of Digital River, Inc.","digital-river") . '</span>';
					echo '</div>';
				echo '</div>';

				echo '<div class="row clear">';
					echo '<div class="col-xs-12">';
						echo '<div class="head h3 eng">' . __('How To Reach Us','digital-river') . '</div>';
						echo '<ul class="list-unstyled">';
							echo '<li class="phone">'.PhoneNumber::get_phone_number().'</li>';
	    	                echo '<li><a href="' . get_permalink(icl_object_id(27,'page',true)) . '">' . __("Contact Us", "digital-river") . '</a></li>';
	    	                echo '<li><a href="#">' . __('Solutions','digital-river') . '</a></li>';
	    	                echo '<li><a href="#">' . __('Industries','digital-river') . '</a></li>';
	    	                //echo '<li><a href="https://www.findmyorder.com/sstore?Action=DisplayHomePage&SiteID=findmyor&Locale=' . PhoneNumber::get_find_my_order_lang() . '">' . __('Customer Service','digital-river') . '</a></li>';
		                    //echo '<li><a href="' . get_permalink(icl_object_id(27,'page',true)) . '">' . __("Contact Us", "digital-river") . '</a></li>';
						echo '</ul>';
					echo '</div>';

					//echo '<div class="col-xs-6">';
						//echo '<div class="head h3 eng">' . __("Corporate Headquarters", "digital-river") . '</div>';
						//echo '<address>'.PhoneNumber::get_address().'</address>';
					//echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</footer>';
	}

	static function display_footer()
	{

		self::display_scripts();

		echo '<footer id="global_footer" class="bg-lightGray">';
			echo '<div class="container">';
				echo self::menu_section(self::$left_menus);
				echo self::menu_section(self::$middle_menus);
				echo self::menu_section(self::$right_menus);
				echo self::box();
			echo '</div>';
		echo '</footer>';
	}

	static function box()
	{
		$html = '<div class="col-xs-8 col-offset-xs-4 bg-white contact-box">';
			$html .= '<div class="row">';
				$html .= '<div class="col-md-8">';
					$html .= '<div class="row">';
						$html .= '<div class="col-xs-6">';
							$html .= '<div class="dr_logo logo-wrapper">';
		                        $html .= '<!--[if gte IE 9]>';
		                    		$html .= Svg::logo();
		                        $html .= '<![endif]-->';
		                        $html .= '<!--[if !IE]> -->';
		                    		$html .= Svg::logo();
		                        $html .= '<!-- <![endif]-->';
		                        $html .= '<!--[if lte IE 8]>';
		                          	$html .= '<img src="' . get_template_directory_uri() .'/img/dr-logo.jpg" alt="Digital River Logo" />';
		                        $html .= '<![endif]-->';
							$html .= '</div>';
							$html .= '<div class="head h3 eng">' . __('How To Reach Us','digital-river') . '</div>';
							$html .= '<ul class="list-unstyled">';
								$html .= '<li class="phone">'.PhoneNumber::get_phone_number().'</li>';
		    	                $html .= '<li><a href="https://www.findmyorder.com/sstore?Action=DisplayHomePage&SiteID=findmyor&Locale=' . PhoneNumber::get_find_my_order_lang() . '">' . __('Customer Service','digital-river') . '</a></li>';
			                    $html .= '<li><a href="' . get_permalink(icl_object_id(27,'page',true)) . '">' . __("Contact Us", "digital-river") . '</a></li>';
							$html .= '</ul>';
						$html .= '</div>';
						$html .= '<div class="col-xs-6">';
							$html .= '<div class="social-shares">';
		                        $html .= '<a target="_blank" href="https://twitter.com/DigitalRiverInc"><i class="fa-3x fa fa-twitter-square txt-gray"></i></a> ';
		                        $html .= '<a target="_blank" href="http://www.linkedin.com/company/digital-river"><i class="fa-3x fa fa-linkedin-square txt-gray"></i></a> ';
		                        $html .= '<a target="_blank" href="https://youtube.com/channel/UCnoA4bUrt0EIGnAi2lyKAeA"><i class="fa-3x fa fa fa-youtube-square txt-gray"></i></a> ';
							$html .= '</div>';
							$html .= '<div class="head h3 eng">' . __("Corporate Headquarters", "digital-river") . '</div>';
							$html .= '<address>'.PhoneNumber::get_address().'</address>';
						$html .= '</div>';
						$html .= '<div class="disclaimer col-xs-12 pull-left">©' . date("Y") .  __(" Digital River, Inc., Digital River® is a registered trademark of Digital River, Inc.","digital-river") . '</div>';
					$html .= '</div>';
				$html .= '</div>';
				$html .= '<a rel="nofollow"  href="https://www.google.com/maps/place/Digital+River/@44.8996898,-93.4119225,17z/data=!3m1!4b1!4m2!3m1!1s0x87f622178552ce1d:0x91ddc44958b244f3" class="col-md-4 hidden-xs hidden-sm map"></a>';
				$html .= '</div>';
				$html .= '<div class="row">';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	static function display_scripts()
	{
		?>
    <script type="text/javascript">


        (function() {
          var didInit = false;
          function initMunchkin() {
            if(didInit === false) {
              didInit = true;
              Munchkin.init('348-QUY-258');
            }
          }
          var s = document.createElement('script');
          s.type = 'text/javascript';
          s.async = true;
          s.src = document.location.protocol + '//munchkin.marketo.net/munchkin.js';
          s.onreadystatechange = function() {
            if (this.readyState == 'complete' || this.readyState == 'loaded') {
              initMunchkin();
            }
          };
          s.onload = initMunchkin;
          document.getElementsByTagName('head')[0].appendChild(s);
        })();
        (function(a,b,c,d){
            a='//tags.tiqcdn.com/utag/driv/drcorp/prod/utag.js';
            b=document;c='script';d=b.createElement(c);d.src=a;d.type='text/java'+c;d.async=true;
            a=b.getElementsByTagName(c)[0];a.parentNode.insertBefore(d,a);
        })();
        </script>
		<?php
	}


	static function link_section($label, $key)
	{
		$html = '<div class="link-section">';
            $html .= '<div class="head menu-expand h2"><i style="display:none;" class="fa fa-caret-down"></i><i class="fa fa-caret-right"></i> <span class="eng">' . __($label,'digital-river') . '</span></div>';
            $html .= '<div class="menu-wrapper sub-menu">';
           		$html .= wp_nav_menu(
                            array(
                              'theme_location' => $key,
                              'echo' => false
                            )
                        );
            $html .= '</div>';
        $html .= '</div>';

        return $html;
	}

	static function menu_section($menus)
	{
		$html = '<div class="col-sm-4 col-xxs-6 menu-section">';
			foreach ($menus as $menu):
				if( !isset($menu['lang']) || in_array(ICL_LANGUAGE_CODE, $menu['lang'])){
					$html .= self::link_section($menu['label'], $menu['key']);
				}
			endforeach;
		$html .= '</div>';

		return $html;
	}

	static function body_close()
	{
		?>
		</body>
		</html>
		<?php
	}

	
}