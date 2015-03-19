<?php

namespace BarryKooijPlugins\WooCommerceInspector;

class AdminBar {

	/**
	 * Add items to WP_Admin_Bar object
	 *
	 * @param \WP_Admin_Bar $wp_admin_bar
	 */
	public function addItems( \WP_Admin_Bar $wp_admin_bar ) {

		// Status class
		$status_class = Inspector::is_active() ? 'active' : 'inactive';

		// Link
		$link = Inspector::is_active() ? remove_query_arg( array(
			'wc-inspector',
			'wc-inspector-all'
		) ) : add_query_arg( array(
			'wc-inspector' => 1
		) );

		// Add menu
		$wp_admin_bar->add_menu( array(
			'id'     => 'wc-inspector',
			'parent' => 'top-secondary',
			'title'  => 'WC Inspector <span class="wc-inspector-toggle ' . $status_class . '"></span>',
			'href'   => $link
		) );

		if ( Inspector::is_active() ) {
			// Link all
			$link_all = Inspector::show_all() ? remove_query_arg( 'wc-inspector-all' ) : add_query_arg( array( 'wc-inspector-all' => '1' ) );

			// Add submenu
			$wp_admin_bar->add_menu( array(
				'id'     => 'wc-inspector-all',
				'parent' => 'wc-inspector',
				'title'  => 'Show All Templates',
				'href'   => $link_all
			) );
		}


	}

}