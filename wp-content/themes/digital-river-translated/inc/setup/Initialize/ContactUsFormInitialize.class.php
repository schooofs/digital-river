<?php

/**
 * For displaying custom bricks
 *
 */
class ContactUsFormInit implements Initialize
{

	function __construct()
	{
		// add_action( 'init', array(&$this, 'process_contact_us_form') );
		add_action( 'wp_ajax_add_foobar', array(&$this, 'ajax_process_form') );
		add_action( 'wp_ajax_nopriv_add_foobar', array(&$this, 'ajax_process_form') );
		add_action( 'wp_ajax_add_uno', array(&$this, 'ajax_process_uno') );
		add_action( 'wp_ajax_nopriv_add_uno', array(&$this, 'ajax_process_uno') );
	}

	function ajax_process_uno()
	{
		$lead_id = $this->send_unofficial_lead();
		if($lead_id != false){
			echo json_encode(array(
					"lead" => $lead_id
				));
		}else{
			echo "false";
		}

		wp_die();
	}

	function send_unofficial_lead()
	{
		$new_lead = new stdClass();
		$new_lead->leadSource = "DR Website";
		$new_lead->churnCalcNoFormFill = true;
		$date = new DateTime();
		$new_lead->ajaxForm = $date->getTimestamp();

		if(isset($_POST['churnCalcSubRevenue'])){
			$new_lead->churnCalcSubRevenue = $_POST['churnCalcSubRevenue'];
		}
		if(isset($_POST['churnCalcPercentAutorenew'])){
			$new_lead->churnCalcPercentAutorenew = $_POST['churnCalcPercentAutorenew'];
		}
		if(isset($_POST['churnCalcSubRevenuebyRegion'])){
			$new_lead->churnCalcSubRevenuebyRegion = $_POST['churnCalcSubRevenuebyRegion'];
		}
		if(isset($_POST['churnCalcSubRevenueBoost'])){
			$new_lead->churnCalcSubRevenueBoost = $_POST['churnCalcSubRevenueBoost'];
		}

		$upsert = new UpsertLeads();
		$upsert->input = array($new_lead);

		$lead_array = json_decode($upsert->postData(), true);


		if($lead_array['result'][0]['status'] == "created" || $lead_array['result'][0]['status'] == "updated"){

			if ( isset($_POST['cookie']) === true ) {
				$associate = new AssociateLead();
				$associate->getData($lead_array['result'][0]['id'],  urlencode($_POST['cookie']));
			}

			return $lead_array['result'][0]['id'];

		}else{
			// error_log($lead_array, 3, "/errors/contact_error.log");
			error_log($lead_array['result'][0]['reasons'][0]['message'] .'. ' . str_replace(PHP_EOL, '',  print_r($new_lead, TRUE)), 0);
			// echo getcwd() . "\n";
			return false;
		}
	}


	function ajax_process_form()
	{
		$lead_id = $this->process_contact_us_form();
		if($lead_id != false){
			echo json_encode(array(
					"lead" => $lead_id
				));
		}else{
			echo "false";
		}

		wp_die();
	}

	function process_contact_us_form()
	{
		if ( isset($_POST['contact_submit']) && '1' == $_POST['contact_submit'] ) {
			$new_lead = new stdClass();

			if($_POST['firstName'] != "" && $_POST['lastName'] != "" && $_POST['email'] != "" && $_POST['company'] != "" && $_POST['Business_Unit__c'] != ""){
				$new_lead->firstName = filter_var($_POST['firstName']);
				$new_lead->lastName = filter_var($_POST['lastName']);
				$new_lead->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
				$new_lead->phone = filter_var($_POST['phone']);
				$new_lead->company = filter_var($_POST['company']);
				$new_lead->Country = filter_var($_POST['Country']);
				$new_lead->Business_Unit__c = filter_var($_POST['Business_Unit__c']);
				$new_lead->Tell_Us_More__c = filter_var($_POST['Tell_Us_More__c']);
			}else{
				echo "false 1";

				return false;
			}

			$new_lead->leadSource = "DR Website";

			if(isset($_POST['Opted_In__c'])){
				$new_lead->Opted_In__c = $_POST['Opted_In__c'];
			}

			if(isset($_POST['Campaign_Medium']) && $_POST['Campaign_Medium'] != null){
				$new_lead->Campaign_Medium = $_POST['Campaign_Medium'];
			}

			if(isset($_POST['Campaign_Source']) && $_POST['Campaign_Source'] != null){
				$new_lead->Campaign_Source = $_POST['Campaign_Source'];
			}

			if(isset($_POST['Campaign_Term']) && $_POST['Campaign_Term'] != null){
				$new_lead->Campaign_Term = $_POST['Campaign_Term'];
			}

			if(isset($_POST['campaignContent']) && $_POST['campaignContent'] != null){
				$new_lead->campaignContent = $_POST['campaignContent'];
			}

			if(isset($_POST['calculatorData']) && $_POST['calculatorData'] != null){
				$new_lead->calculatorData = filter_var($_POST['calculatorData']);
			}
			

			if(isset($_POST['Campaign_ID']) && $_POST['Campaign_ID'] != null){
				$new_lead->Campaign_ID = $_POST['Campaign_ID'];

				$new_lead->BHLeadSourceDescription__c = "PAID SEARCH - ".$new_lead->Campaign_ID;
			}

			if(isset($_POST['BHLeadSourceDescription__c']) && $_POST['BHLeadSourceDescription__c'] != null){
				$new_lead->BHLeadSourceDescription__c = $_POST['BHLeadSourceDescription__c'];
			}

			if(isset($_POST['TCO_AOV']) && $_POST['TCO_AOV'] != null){
				$new_lead->TCO_AOV = $_POST['TCO_AOV'];
			}

			if(isset($_POST['TCO_GSV']) && $_POST['TCO_GSV'] != null){
				$new_lead->TCO_GSV = $_POST['TCO_GSV'];
			}

			if(isset($_POST['TCO_TransactionsPerYear']) && $_POST['TCO_TransactionsPerYear'] != null){
				$new_lead->TCO_TransactionsPerYear = $_POST['TCO_TransactionsPerYear'];
			}


			if(isset($_POST['churnCalcSubRevenue'])){
				$new_lead->churnCalcSubRevenue = $_POST['churnCalcSubRevenue'];
			}
			if(isset($_POST['churnCalcPercentAutorenew'])){
				$new_lead->churnCalcPercentAutorenew = $_POST['churnCalcPercentAutorenew'];
			}
			if(isset($_POST['churnCalcSubRevenuebyRegion'])){
				$new_lead->churnCalcSubRevenuebyRegion = $_POST['churnCalcSubRevenuebyRegion'];
			}
			if(isset($_POST['churnCalcSubRevenueBoost'])){
				$new_lead->churnCalcSubRevenueBoost = $_POST['churnCalcSubRevenueBoost'];
			}


			$new_lead->churnCalcNoFormFill = false;

			$date = new DateTime();
			$new_lead->ajaxForm = $date->getTimestamp();

			$upsert = new UpsertLeads();
			$upsert->input = array($new_lead);

			$lead_array = json_decode($upsert->postData(), true);


			if($lead_array['result'][0]['status'] == "created" || $lead_array['result'][0]['status'] == "updated"){

				if ( isset($_POST['cookie']) === true ) {
					$associate = new AssociateLead();
					$associate->getData($lead_array['result'][0]['id'],  urlencode($_POST['cookie']));
				}
					
				return $lead_array['result'][0]['id'];
			}else{
				// error_log($lead_array, 3, "/errors/contact_error.log");
				error_log($lead_array['result'][0]['reasons'][0]['message'] .'. ' . str_replace(PHP_EOL, '',  print_r($new_lead, TRUE)), 0);
				// echo getcwd() . "\n";
				return $lead_array['result'][0]['reasons'][0]['message'];
			}
		}else{
			return false;
		}
	}
}


class LandingPageInit extends ContactUsFormInit
{


	public static $assets = array(
		 	"risky_business" => array(
				"asset_url" => "/wp-content/uploads/2016/06/Risky_business_white_paper.pdf",
				"asset_name" => "Risky business:<br>The hazards of retail dependency",
				"cta_description" => '<p>Learn how Digital River\'s robust subscription capabilities can increase your revenue potential and evolve your business&nbsp;model.</p>',
				"cta_label" => "Visit our website",
				"cta_link" => "/clients/industries/branded-manufacturers/"

			),
	 		"pmi_success_story" => array(
				"asset_url" => "/marketing_material/pmi-client-success-story/",
				"asset_name" => "Pacific Market International (PMI) Success Story",
				"cta_description" => '<h4 class="eng">Digital River Full-Service Ecommerce Solutions
  </h4><p>Everything you need. One powerful partner.</p>',
				"cta_label" => "Start the conversation",
				"cta_link" => "/contact-us/"
			),
			"subscriptions_whitepaper" => array(
				"asset_url" => "/wp-content/uploads/2016/08/Digital_River_Subscriptions_White_Paper.pdf",
				"asset_name" => "The Subscriptions Generation: How smart businesses are adjusting for the post-ownership era",
				"cta_description" => '<h4 class="eng">Digital River Full-Service Ecommerce Solutions
  </h4><p>Everything you need. One powerful partner.</p>',
				"cta_label" => "Start the conversation",
				"cta_link" => "/contact-us/"
			),
			"virtual_organization" => array(
				"asset_url" => "/wp-content/uploads/2016/09/Digital-River_Virtual-Organization-White-Paper.pdf",
				"asset_name" => "Digital River's Virtual Organization white paper",
				"cta_description" => '<h4 class="eng">Digital River Full-Service Ecommerce Solutions
  </h4><p>Everything you need. One powerful partner.</p>',
				"cta_label" => "Start the conversation",
				"cta_link" => "/contact-us/"
			),
			"churn_calculator" => array(
				"asset_url" => "/wp-content/uploads/2017/06/Digital-River-Subscriptions-Churn-Reduction-eBook_March-2017-2.pdf",
				"asset_name" => "Subscriptions Churn Reduction"
			),
		);


	function __construct()
	{
		add_action( 'wp_ajax_risky_business', array(&$this, "risky_business"));
		add_action( 'wp_ajax_nopriv_risky_business', array(&$this, "risky_business"));
		add_action( 'wp_ajax_pmi_success_story', array(&$this, "pmi_success_story"));
		add_action( 'wp_ajax_nopriv_pmi_success_story', array(&$this, "pmi_success_story"));
		add_action( 'wp_ajax_subscriptions_whitepaper', array(&$this, "subscriptions_whitepaper"));
		add_action( 'wp_ajax_nopriv_subscriptions_whitepaper', array(&$this, "subscriptions_whitepaper"));
		add_action( 'wp_ajax_virtual_organization', array(&$this, "virtual_organization"));
		add_action( 'wp_ajax_nopriv_virtual_organization', array(&$this, "virtual_organization"));
		add_action( 'wp_ajax_churn_calculator', array(&$this, "churn_calculator"));
		add_action( 'wp_ajax_nopriv_churn_calculator', array(&$this, "churn_calculator"));
	}

	function get_success($asset, $simple)
	{

		$html = '<div class="subscriptions-wrapper text-center " >';
			$html .= '<div style="display:table; width:100%;" class="download-wrapper">';
				$html .= '<div style="display:table-cell; vertical-align:middle;">';
					$html .= '<h4 class="light text-center option no-margin">'.__("Thank you for downloading","digital-river").'</h4>';
		        	$html .= '<div style="padding:10px 10px 30px;">';
		        		$html .= '<h3 class="eng text-center option no-margin">'.$asset['asset_name'].'</h3>';
		        		$html .= (isset($asset['asset_description']) === true)?$asset['asset_description']:null;
		        	$html .= '</div>';
		            $html .= '<p>';
		            	$html .= '<img height="125" width="100" class="download-icon" src="/wp-content/themes/digital-river-translated/img/svg/icon.svg" alt="'.__("Download Icon", "digital-river").'" />';
		        	$html .= '</p>';
		        	$html .= '<a target="_blank" href="'.$asset['asset_url'].'" class="btn btn-opposite option margin-top">'.__("Download Now","digital-river").'</a>';
				$html .= '</div>';
			$html .= '</div>';

			if($simple == false) {

				$html .= '<div class="subscription-cta" style="width: 100%; position: absolute; bottom: 0px; left: 0px; padding: 60px 0px 40px; border-top: 1px solid rgb(255, 255, 255);">';
					$html .= $asset['cta_description'];
					$html .= '<p>';
						$html .= ' <strong><a target="_blank" class="arrow strong" href="'.$asset['cta_link'].'">'.$asset['cta_label'].'</a></strong>';
					$html .= '</p>';
				$html .= '</div>';

			}

		$html .= '</div>';



		return $html;
	}

	function risky_business(){
		$this->ajax_process_form("risky_business");
	}

	function pmi_success_story(){
		$this->ajax_process_form("pmi_success_story");
	}

	function subscriptions_whitepaper(){
		$this->ajax_process_form("subscriptions_whitepaper");
	}

	function virtual_organization(){
		$this->ajax_process_form("virtual_organization");
	}

	function churn_calculator(){
		$this->ajax_process_form("churn_calculator", true);
	}

	function ajax_process_form($asset, $simple = false)
	{
		$lead_id = $this->process_contact_us_form();
		if($lead_id != false){
			echo json_encode(array(
					"lead" => $lead_id,
					"success" => $this->get_success(self::$assets[$asset], $simple)
				));
		}else{
			echo "false";
		}

		wp_die();
	}



}
