<?php

namespace DigitalRiver\Frontend;

use DigitalRiver\Gateways\ClientInfoGateway;
use DigitalRiver\Services\MaxMindService;
use DigitalRiver\Services\SalesforceService;
use DigitalRiver\Services\VisitorIPService;

class Frontend {
    /**
     * @var VisitorIPService
     */
    private $visitorIpService;
    /**
     * @var ClientInfoGateway
     */
    private $clientInfoGateway;
    /**
     * @var MaxMindService
     */
    private $maxMindService;

    /**
     * @var SalesforceService
     */
    private $salesforceService;

    public function __construct(
        VisitorIPService $visitorIpService,
        ClientInfoGateway $clientInfoGateway,
        MaxMindService $maxMindService,
        SalesforceService $salesforceService
    ) {
        $this->visitorIpService  = $visitorIpService;
        $this->clientInfoGateway = $clientInfoGateway;
        $this->maxMindService    = $maxMindService;
        $this->salesforceService = $salesforceService;
    }

    public function getClient($ip){

        return $this->clientInfoGateway->getClientByIp($ip);
    }

    public function setupNewProspect( $ip ) {
        //get required info from maxmind
        $companyInfo = $this->getCompanyInfo( $ip );
        $salesforceInfo = $this->getInfoFromSalesforce( $companyInfo['domain'] );


        $salesForceId = (isset($salesforceInfo->records[0]->Id)) ? $salesforceInfo->records[0]->Id : '';
        $salesForceName = (isset($salesforceInfo->records[0]->Name)) ? $salesforceInfo->records[0]->Name : '';

        if( isset($salesforceInfo->records[0]->Sam_Account__c ) &&
            $salesforceInfo->records[0]->Sam_Account__c == 'Enterprise SAM'){
            $showCustom = true;
        }else{
            $showCustom = false;
        }


        $this->clientInfoGateway->create(
            $ip,
            $companyInfo['organization'],
            $companyInfo['domain'],
            $salesForceId,
            $salesForceName,
            $showCustom
        );
    }

    private function getCompanyInfo( $ip ) {
        $info                 = [];
        $companyInfo          = $this->maxMindService->getCompanyInfoFromIp( $ip );
        $info['domain']       = $this->maxMindService->getDomain( $companyInfo );

        $domainInfo = $info['domain'];
        if (empty($domainInfo)) {
            $info['domain']   = 'no_domain';
        }

        $info['organization'] = $this->maxMindService->getOrganization( $companyInfo );

        return $info;
    }

    private function getInfoFromSalesforce( $domain ) {
        $hosts = $this->parseHost( $domain );
        $queryString = "SELECT id, name, website, SAM_Account__c from Account where website = '{$hosts['httpsHost']}' or website = '{$hosts['httpHost']}'";
        $response    = $this->salesforceService->searchSOQL( $queryString );
        return json_decode( $response->getBody() );
    }

    public function createNewPageVisit($account)
    {
        $params = [
            'Account__c'=> $account,
            'Page_Viewed__c' => $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
        ];
        $this->salesforceService->create('DR_Com_Site_Visits__c', $params);
    }

    private function parseHost( $domain ) {
        $urlArray = parse_url( $domain );
        if ( ! empty( $urlArray['host'] ) ) {
            $host = $urlArray['host'];
        } else {
            $host = $urlArray['path'];
        }

        return [
            'httpHost'  => "http://{$host}",
            'httpsHost' => "https://{$host}"
        ];
    }
}
