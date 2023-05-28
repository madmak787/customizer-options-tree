<?php
/**
 * @package madmak
 * @version 1.0.0
 */
/**
 * Plugin Name:       Customizer Options Tree
 * Plugin URI:        https://wordpress.org/plugins/
 * Description:       Its a plugin to add section and control into WP-Customizer, adding controls in WP-Customizer is complex and requires code dependent on each other to display a single option. But this plugin provides you easy UI to add section and controls, it will be saved in options table of wordpress, so you can simply call them by using get_option(`SLUG`); function.
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      5.6
 * Author:            madmak787
 * Author URI:        https://khanamir.me/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       madmak
 * Domain Path:       /languages
 */

//Load Everything
require 'classes/load-classes.php';

define( 'MMC_VERSION', '1.0.0' );
define( 'MMC_NAME', 'Customizer Options Tree' );
define( 'MMC_PLUGIN_NAME', 'customizer-options-tree' );
define( 'MMC_PLUGIN_FILE', plugin_basename( __FILE__ ) ); 
define( 'MMC_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'MMC_PLUGIN_URL', trailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );