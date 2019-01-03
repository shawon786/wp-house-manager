<?php

/**
 * The plugin bootstrap file
 *
 * @link              shawon.co
 * @since             1.0.0
 * @package           House_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       House Manager
 * Plugin URI:        https://voidcoders.com/promo-products/
 * Description:       Manage your Property and Renter easily!
 * Version:           1.0.4
 * Author:            Shawon
 * Author URI:        shawon.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       house-manager
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Use SemVer - https://semver.org
 */
define( 'HOUSE_MANAGER_VERSION', '1.0.4' );

define( 'HM_DB_VERSION', '1.0.0' );
define( 'HM_FILE', __FILE__ );
define( 'HM_PATH', dirname( HM_FILE ) );
define( 'HM_INCLUDES', HM_PATH . '/includes' );
define( 'HM_URL', plugins_url( '', HM_FILE ) );
define( 'HM_PUBLIC_DIR', HM_URL . '/public' );
define( 'HM_VIEW_DIR', HM_PATH . '/public/templates' );

function activate_house_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hm-activator.php';
	House_Manager_Activator::activate();
}

function deactivate_house_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hm-deactivator.php';
	House_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_house_manager' );
register_deactivation_hook( __FILE__, 'deactivate_house_manager' );

require plugin_dir_path( __FILE__ ) . 'includes/class-house-manager.php';

function run_house_manager() {
	$plugin = new House_Manager();
	$plugin->run();
}
run_house_manager();
