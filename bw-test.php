<?php
/**
 * @package Bw
 * Plugin Name: BW Plugin
 * Description: Submit form data to a third-party API (Hubspot).
 * Version: 1.0.0
 * Author: Lucas Bacciotti Moreira
 * Author URI: https://profiles.wordpress.org/baciotti/
 * License: GPLv2 or later
 */

namespace BW;

/**
 * Security purposes.
 *
 * Aborts if this file is called directly.
 *
 * @since 1.0.0
 * @package: Bw
 */
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Defines Constants.
 *
 * BW_PLUGIN_DIR    Stores the plugin's main path.
 *
 * @since 1.0.0
 */
define( 'FAVORITES_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Requires classes
 *
 * @since 1.0.0
 */

require_once FAVORITES_PLUGIN_DIR . '/src/class-scripts.php';
require_once FAVORITES_PLUGIN_DIR . '/src/class-shortcode.php';

/**
 * Class Bw Plugin.
 *
 * This is the main plugin class which:
 *      - initiates the plugin;
 *
 * @since   1.0.0
 */
class Bw_Plugin {

	/**
	 * Class constructor.
	 *
	 * Calls the init function.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'plugin_init' ) );
	}

	/**
	 * Plugin initialization.
	 *
	 * Instantiates new objects for Scripts and Shortcode.
	 *
	 * @since 1.0.0
	 */
	public function plugin_init() {
		$scripts   = new Scripts();
		$shortcode = new Shortcode();
	}
}

// New object's creation and plugin's start.
$bw_plugin = new Bw_Plugin();
