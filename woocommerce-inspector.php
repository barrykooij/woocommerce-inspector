<?php
/*
    Plugin Name: WooCommerce Inspector
    Plugin URI: http://www.barrykooij.com
    Description: The easiest way to find out what WooCommerce templates are used for which elements.
    Version: 1.0.0
    Author: Bary Kooij
    Author URI: http://www.barrykooij.com
    License: GPL v3

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Autoload
require 'vendor/autoload.php';

// Check PHP version
$updatePhp = new WPUpdatePhp( '5.3.0' );
if ( $updatePhp->does_it_meet_required_php_version( PHP_VERSION ) ) {

	define( 'WOOCOMMERCE_INSPECTOR_FILE', __FILE__ );

	// Create plugin object
	new BarryKooijPlugins\WooCommerceInspector\Plugin();
}