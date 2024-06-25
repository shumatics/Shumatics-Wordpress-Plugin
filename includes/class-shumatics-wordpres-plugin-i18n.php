<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.google.com
 * @since      1.0.0
 *
 * @package    Shumatics_Wordpres_Plugin
 * @subpackage Shumatics_Wordpres_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Shumatics_Wordpres_Plugin
 * @subpackage Shumatics_Wordpres_Plugin/includes
 * @author     Ashfaaq Damree <ashfaaq.damree@shumatics.com>
 */
class Shumatics_Wordpres_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'shumatics-wordpres-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
