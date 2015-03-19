<?php

namespace BarryKooijPlugins\WooCommerceInspector;

class Plugin {

	const VERSION = '1.0.0';

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'setup' ) );
	}

	/**
	 * Setup on hook 'init'
	 */
	public function setup() {

		// Only setup if we're at the frontend and the admin bar is showing
		if ( current_user_can( 'manage_options' ) && ! is_admin() && is_admin_bar_showing() ) {

			// Admin Bar
			$adminBar = new AdminBar();
			add_action( 'admin_bar_menu', array( $adminBar, 'addItems' ) );

			// Assets
			$assets = new Assets();
			add_action( 'wp_enqueue_scripts', array( $assets, 'enqueue' ) );

			// Add DOM tags
			$domManager = new DomManager();
			$domManager->addElements();

		}
	}

}