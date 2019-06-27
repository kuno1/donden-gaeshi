<?php
/**
 * Plugin Name: Donden Gaeshi
 * Plugin URI: https://kunoichiwp.com/product/plugin/kagebunshin
 * Description: Swap first name and last name in Japanese.
 * Version: nightly
 * Author: Kunoichi INC.
 * Author URI: https://kunoichiwp.com
 * License: GPL 3.0 or later
 * Text Domain: donden-gaeshi
 * Domain Path: /languages
 * @package donden
 */

defined( 'ABSPATH' ) || die();

/**
 * Plugin init.
 */
function donden_init() {
	// Register text domain.
	load_plugin_textdomain( 'donden-gaeshi', false, basename( __DIR__ ) . '/languages' );
	// Include composer.
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require __DIR__ . '/vendor/autoload.php';
	}
}
add_action( 'plugins_loaded', 'donden_init' );

/**
 * Get plugin version.
 *
 * @return string
 */
function donden_version() {
	static $info = null;
	if ( is_null( $info ) ) {
		$info = get_file_data( __FILE__, [
			'version' => 'Version',
		] );
	}
	return $info['version'];
}
