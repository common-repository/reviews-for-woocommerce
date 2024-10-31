<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ibsofts.com
 * @since             1.0.1
 * @package           Reviews_For_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Reviews for WooCommerce
 * Plugin URI:        https://www.ibsofts.com/plugins/reviews-for-woocommerce
 * Description:       This plugin provides different templates to show WooCommerce reviews of any product.
 * Version:           1.0.1
 * Author:            iB Softs
 * Author URI:        https://www.ibsofts.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       reviews-for-woocommerce
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'REVFWOO_VERSION', '1.0.1' );
define( 'REVFWOO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Inclusion of definitions.php
 */
require_once plugin_dir_path( __FILE__ ) . 'definitions.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-reviews-for-woocommerce-activator.php
 */
if ( ! function_exists( 'revfwoo_activate' ) ) {
	function revfwoo_activate() {
		require_once REVFWOO_PATH . 'includes/class-reviews-for-woocommerce-activator.php';
		REVFWOO_Activator::activate();
	}
	register_activation_hook( __FILE__, 'revfwoo_activate' );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-reviews-for-woocommerce-deactivator.php
 */
if ( ! function_exists( 'revfwoo_deactivate' ) ) {
	function revfwoo_deactivate() {
		require_once REVFWOO_PATH . 'includes/class-reviews-for-woocommerce-deactivator.php';
		REVFWOO_Deactivator::deactivate();
	}

	register_deactivation_hook( __FILE__, 'revfwoo_deactivate' );
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require REVFWOO_PATH . 'includes/class-reviews-for-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.1
 */
if ( ! function_exists( 'revfwoo_run' ) ) {
	function revfwoo_run() {

		$plugin = new REVFWOO();
		$plugin->run();

	}
	revfwoo_run();
}
