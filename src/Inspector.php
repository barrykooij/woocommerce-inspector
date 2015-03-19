<?php
namespace BarryKooijPlugins\WooCommerceInspector;

class Inspector {

	/**
	 * Returns if inspector is active
	 *
	 * @return bool
	 */
	public static function is_active() {
		if ( isset( $_GET['wc-inspector'] ) && '1' === $_GET['wc-inspector'] ) {
			return true;
		}
		return false;
	}

	/**
	 * Returns if inspector is active
	 *
	 * @return bool
	 */
	public static function show_all() {
		if ( isset( $_GET['wc-inspector-all'] ) && '1' === $_GET['wc-inspector-all'] ) {
			return true;
		}
		return false;
	}


}