<?php

namespace BarryKooijPlugins\WooCommerceInspector;

class Assets {

	/**
	 * Enqueue plugin assets
	 */
	public function enqueue() {
		wp_enqueue_style( 'wc-inspector-css', plugins_url( '/assets/css/woocommerce-inspector.min.css', WOOCOMMERCE_INSPECTOR_FILE ), array(), Plugin::VERSION, 'screen' );

		if ( Inspector::is_active() && ! Inspector::show_all() ) {
//			wp_enqueue_script( 'wc-inspector-js', plugins_url( '/assets/js/woocommerce-inspector.js', WOOCOMMERCE_INSPECTOR_FILE ), array( 'jquery' ), Plugin::VERSION );
			wp_enqueue_script( 'wc-inspector-js', plugins_url( '/assets/js/Inspector.js', WOOCOMMERCE_INSPECTOR_FILE ), array( 'jquery' ), Plugin::VERSION );
		}
	}
}