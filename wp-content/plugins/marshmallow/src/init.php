<?php


namespace DigitalRiver;

//custom message ip
$_SERVER['REMOTE_ADDR'] = '91.228.167.128';
//default message ip  (google.com ip address)
//$_SERVER['REMOTE_ADDR'] = '216.58.216.206';

require_once BASE_PATH . '/src/Container.php';


if (is_admin()) {
    require_once BASE_PATH . '/src/Admin/Admin.php';
}
if (!is_admin()) {
    add_action('wp_enqueue_scripts', 'DigitalRiver\dr_scripts');
    if (!checkConfigSetup()) {
        return;
    }
    try {
        $frontEnd = $container->get('frontendController');
        $ip = $container->get('visitorIpService')->getUserIdAddress();
        $client = $frontEnd->getClient($ip);
        if (empty($client)) {
            $frontEnd->setupNewProspect($ip);
            $client = $frontEnd->getClient($ip);
        }

        $currentUrl = $_SERVER['REQUEST_URI'];
        $excludeUrls = array(
            "/careers/",
            "/privacy-policy/",
            "/legal-notice/",
        );

        if (!empty($client->salesforce_id) && (in_array($currentUrl, $excludeUrls) !== true)) {
            $frontEnd->createNewPageVisit($client->salesforce_id);
        }
        require_once BASE_PATH . '/src/Message/message.php';
    } catch (\Exception $e) {
        error_log($e->getMessage());
    }
}

function checkConfigSetup()
{
    $config = container()->get('config');
    if (
        empty($config['maxMind']['userId']) ||
        empty($config['maxMind']['licenseKey']) ||
        empty($config['salesforce']['version']) ||
        empty($config['salesforce']['username']) ||
        empty($config['salesforce']['password']) ||
        empty($config['salesforce']['securityToken']) ||
        empty($config['salesforce']['clientId']) ||
        empty($config['salesforce']['clientSecret'])) {
        return false;
    }
    return true;
}

// Enqueue scripts
function dr_scripts()
{
    $baseUrl = container()->get('config')['baseUrl'];

    // Front end
    wp_enqueue_style('dr_style', $baseUrl . 'src/Message/assets/css/main.css');

    if (!wp_script_is('jquery', 'enqueued')) {
        wp_enqueue_script('jquery');
    }

    if (!wp_script_is('jquery.cookie.js', 'enqueued')) {
        wp_enqueue_script('dr_cookie', $baseUrl . 'src/Message/assets/js/vendor/jquery.cookie.js', true);
    }

    wp_enqueue_script(
        'dr_script',
        $baseUrl . 'src/Message/assets/js/main.js',
        array(
            'jquery',
        ),
        '1.0',
        true
    );
}


;