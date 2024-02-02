<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://rahulpranami.co
 * @since             1.0.0
 * @package           Page_Template_Checker
 *
 * @wordpress-plugin
 * Plugin Name:       Page Template Checker
 * Plugin URI:        https://github.com/rahulpranami/page-template-checker
 * Description:       This Plugin Helps you identify Page Templates that are not in use.
 * Version:           1.0.0
 * Author:            Rahul Pranami
 * Author URI:        https://rahulpranami.co/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       page-template-checker
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PAGE_TEMPLATE_CHECKER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-page-template-checker-activator.php
 */
function activate_page_template_checker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-page-template-checker-activator.php';
	Page_Template_Checker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-page-template-checker-deactivator.php
 */
function deactivate_page_template_checker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-page-template-checker-deactivator.php';
	Page_Template_Checker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_page_template_checker' );
register_deactivation_hook( __FILE__, 'deactivate_page_template_checker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-page-template-checker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_page_template_checker() {

	$plugin = new Page_Template_Checker();
	$plugin->run();

}
run_page_template_checker();
