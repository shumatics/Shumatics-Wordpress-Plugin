<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.google.com
 * @since             1.0.0
 * @package           Shumatics_Wordpres_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Shumatics Wordpress Plugin
 * Plugin URI:        https://www.google.com
 * Description:       Shumatics
 * Version:           1.0.0
 * Author:            Ashfaaq Damree
 * Author URI:        https://www.google.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       shumatics-wordpres-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('SHUMATICS_WORDPRES_PLUGIN_VERSION', '1.0.0');
define('SHUMATICS_WP_HEADLESS_VERSION', '1.0.0');
define('SHUMATICS_DB_HEADLESS_VERSION', '1.0.0');
define('SHUMATICS_FOLDER', plugin_dir_path(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-shumatics-wordpres-plugin-activator.php
 */
function activate_shumatics_wordpres_plugin()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-shumatics-wordpres-plugin-activator.php';
	Shumatics_Wordpres_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-shumatics-wordpres-plugin-deactivator.php
 */
function deactivate_shumatics_wordpres_plugin()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-shumatics-wordpres-plugin-deactivator.php';
	Shumatics_Wordpres_Plugin_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_shumatics_wordpres_plugin');
register_deactivation_hook(__FILE__, 'deactivate_shumatics_wordpres_plugin');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-shumatics-wordpres-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_shumatics_wordpres_plugin()
{

	$plugin = new Shumatics_Wordpres_Plugin();
	$plugin->run();
}
run_shumatics_wordpres_plugin();
