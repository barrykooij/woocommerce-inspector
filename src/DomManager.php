<?php

namespace BarryKooijPlugins\WooCommerceInspector;

class DomManager {

	/**
	 * Add elements to DOM
	 */
	public function addElements() {
		if ( Inspector::is_active() ) {
			add_action( 'woocommerce_before_template_part', array( $this, 'start' ), 10, 1 );
			add_action( 'woocommerce_after_template_part', array( $this, 'end' ), 10, 1 );
		}
	}

	/**
	 * Insert start element
	 *
	 * @param $template_name
	 */
	public function start( $template_name ) {
		if ( false !== stristr( $template_name, 'loop-end' ) ) {
			return;
		}
		echo '<div class="wc-inspector-el' . ( Inspector::show_all() ? ' wc-inspector-el-active' : '' ) . '" rel="' . $template_name . '">';
		if ( Inspector::show_all() ) {
			echo '<span class="wc-inspector-template">' . $template_name . '</span>';
		}

	}

	/**
	 * Insert end element
	 *
	 * @param $template_name
	 */
	public function end( $template_name ) {
		if ( false !== stristr( $template_name, 'loop-start' ) ) {
			return;
		}
		echo '</div>';
	}

}