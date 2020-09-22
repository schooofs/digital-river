<?php
namespace DigitalRiver;

use DigitalRiver\Admin\Fields\Fields;
use DigitalRiver\Frontend\Frontend;
use League\Container\Container;
use League\Container\ReflectionContainer;


use DigitalRiver\Admin\Menu\Options;
use DigitalRiver\Services\MaxMindService;
use DigitalRiver\Services\OptionsService;
use DigitalRiver\Services\VisitorIPService;
use DigitalRiver\Services\SalesforceService;
use GeoIp2\WebService\Client;
use DigitalRiver\Gateways\ClientInfoGateway;

$container = new Container();
$container->delegate(
	new ReflectionContainer
);


$container->add('config', function() use ($container){
	$config = require  BASE_PATH . '/src/Config.php';
	return $config;
});

$container->add('db', function() {
	global $wpdb;
	return $wpdb;
});

$container->add('menuOptions', Options::class);
$container->add('menuFields', Fields::class)
    ->withArgument($container->get('menuOptions'));

$container->add('optionsService', OptionsService::class)
	->withArgument($container->get('menuOptions'));

$container->add('geoIp', Client::class)
	->withArgument($container->get('config')['maxMind']['userId'])
	->withArgument($container->get('config')['maxMind']['licenseKey']);

$container->add('maxMindService', MaxMindService::class)
	->withArgument($container->get('geoIp'));

$container->add('visitorIpService', VisitorIPService::class)
	->withArgument('optionsService');

$container->add('clientInfoGateway', ClientInfoGateway::class)
    ->withArguments([
        $container->get('config'),
        $container->get('db')
    ]);

$container->add('guzzle', \GuzzleHttp\Client::class);

$container->add('salesforceService', SalesforceService::class)
	->withArguments([
		$container->get('guzzle'),
		$container->get('config')['salesforce']['instanceUrl'],
		$container->get('config')['salesforce']['version'],
		$container->get('config')['salesforce']['clientId'],
		$container->get('config')['salesforce']['clientSecret'],
		$container->get('config')['salesforce']['username'],
		$container->get('config')['salesforce']['password'],
		$container->get('config')['salesforce']['securityToken'],
		]);

$container->add('frontendController', Frontend::class)
          ->withArguments([
	          $container->get('visitorIpService'),
	          $container->get('clientInfoGateway'),
	          $container->get('maxMindService'),
	          $container->get('salesforceService')
          ]);

function container()
{
    global $container;
    return $container;
}
