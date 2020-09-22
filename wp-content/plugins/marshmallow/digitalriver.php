<?php
/**
 * Plugin Name:     Digital River
 * Plugin URI:      digitalriver.com
 * Description:     Digital River Plugin
 * Author:          Digital River
 * Author URI:      digitalriver.com
 * Text Domain:     digitalriver
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Digitalriver
 */

const BASE_PATH = __DIR__;
$baseUrl = plugin_dir_url(__FILE__);

require_once 'vendor/autoload.php';

require_once BASE_PATH . '/src/init.php';

register_activation_hook(__FILE__, function () {
    global $wpdb;
    $tablename = $wpdb->prefix . 'digitalriver_client_info';
    $sql = "CREATE TABLE IF NOT EXISTS {$tablename}(
              `id` int(10) NOT NULL AUTO_INCREMENT,
              `ip_address` varchar(40) DEFAULT NULL,
              `mm_organization` varchar(255) DEFAULT NULL,
              `mm_domain` varchar(255) DEFAULT NULL,
              `salesforce_id` varchar(255) NOT NULL,
              `salesforce_account_name` varchar(255) DEFAULT NULL,
              `show_custom_message` int(1) DEFAULT '0',
              `created_at` datetime DEFAULT NULL,
              `updated_at` datetime DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $wpdb->query($sql);
});
