<?php
/**
 * Loads Javascript, CSS and Bootstrap etc.
 *
 * Enqueue the required scripts
 *
 * @since 1.0.0
 * @package Bw
 */

namespace BW;

/**
 * Defines Scripts Class.
 *
 * Enqueue and localize the required scripts.
 *
 * @since 1.0.0
 */
class Scripts {


	/**
	 * Defines Class constructor.
	 *
	 * Calls the run method.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Calls and enqueues the required files.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_style(
			'styles',
			plugin_dir_url( __FILE__ ) . '../css/styles.css'
		);

		// CDN is faster than local scripts.
		wp_enqueue_style(
			'bootstrap_css',
			'//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'
		);

		wp_enqueue_style(
			'bootstrap_icons',
			'//cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css'
		);

		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true );
	}
}
