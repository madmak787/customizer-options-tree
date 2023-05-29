<?php
/**
 * @package madmak
 * @version 1.1.0
 */
/**
 * Plugin Name:       Customizer Options Tree
 * Plugin URI:        https://wordpress.org/plugins/
 * Description:       Its a plugin to add section and control into WP-Customizer, adding controls in WP-Customizer is complex and requires code dependent on each other to display a single option. But this plugin provides you easy UI to add section and controls, it will be saved in options table of wordpress, so you can simply call them by using get_option(`SLUG`); function.
 * Version:           1.1.0
 * Requires at least: 5.3
 * Requires PHP:      7.4
 * Author:            madmak787
 * Author URI:        https://khanamir.me/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       madmak
 * Domain Path:       /languages
 */

//Load Everything
require 'classes/load-classes.php';

define( 'MMC_VERSION', '1.1.0' );
define( 'MMC_NAME', 'Customizer Options Tree' );
define( 'MMC_PLUGIN_NAME', 'customizer-options-tree' );
define( 'MMC_PLUGIN_FILE', plugin_basename( __FILE__ ) ); 
define( 'MMC_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'MMC_PLUGIN_URL', trailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );

function mmc_plugin_activate() {
    if(empty(get_option('mmc_fields'))) {
        $defaults = array(); // Contains default fields to be added.
        // Global Section
        $defaults['section'][0] = 'Global';

        // Header logo
        $defaults['control'][0][0]['label'] = 'Logo';
        $defaults['control'][0][0]['slug'] = 'logo';
        $defaults['control'][0][0]['type'] = 'image';
        $defaults['control'][0][0]['description'] = "Default logo of the website. Use function <strong>get_option('logo');</strong> to fetch the value.";
        $defaults['control'][0][0]['choices'] = '';
        // Footer logo
        $defaults['control'][0][1]['label'] = 'Footer Logo';
        $defaults['control'][0][1]['slug'] = 'footer_logo';
        $defaults['control'][0][1]['type'] = 'image';
        $defaults['control'][0][1]['description'] = "Logo to be used in Footer or any other section(if needed). Use function <strong>get_option('footer_logo');<strong> to fetch the value.";
        $defaults['control'][0][1]['choices'] = '';
        // Footer Text
        $defaults['control'][0][2]['label'] = 'Footer Text';
        $defaults['control'][0][2]['slug'] = 'footer_text';
        $defaults['control'][0][2]['type'] = 'textarea';
        $defaults['control'][0][2]['description'] = "Text to be used in Footer section like Developed By or Credits. Use <strong>get_option('footer_text');<strong>";
        $defaults['control'][0][2]['choices'] = '';
        // Copyright Text
        $defaults['control'][0][3]['label'] = 'Copyright Text';
        $defaults['control'][0][3]['slug'] = 'copyright_text';
        $defaults['control'][0][3]['type'] = 'textarea';
        $defaults['control'][0][3]['description'] = "Text to be used to show copyright. Use <strong>get_option('copyright_text');<strong>";
        $defaults['control'][0][3]['choices'] = '';
        // Header Scripts
        $defaults['control'][0][4]['label'] = 'Header Scripts';
        $defaults['control'][0][4]['slug'] = 'header_scripts';
        $defaults['control'][0][4]['type'] = 'textarea';
        $defaults['control'][0][4]['description'] = "Header Scripts Like Google Tag Script, Google Analytics Script. Use <strong>get_option('header_scripts');<strong>";
        $defaults['control'][0][4]['choices'] = '';
        // Footer Scripts
        $defaults['control'][0][5]['label'] = 'Footer Scripts';
        $defaults['control'][0][5]['slug'] = 'footer_scripts';
        $defaults['control'][0][5]['type'] = 'textarea';
        $defaults['control'][0][5]['description'] = "Script to add into footer like Embed Chat or Popup Scripts. Use <strong>get_option('footer_scripts');<strong>";
        $defaults['control'][0][5]['choices'] = '';

        // Global Section
        $defaults['section'][1] = 'Social';
        // Facebook
        $defaults['control'][1][0]['label'] = 'Facebook';
        $defaults['control'][1][0]['slug'] = 'facebook';
        $defaults['control'][1][0]['type'] = 'url';
        $defaults['control'][1][0]['description'] = "URL of your Facebook Page. Use <strong>get_option('facebook');<strong>";
        $defaults['control'][1][0]['choices'] = '';
        // Twitter
        $defaults['control'][1][1]['label'] = 'Twitter';
        $defaults['control'][1][1]['slug'] = 'twitter';
        $defaults['control'][1][1]['type'] = 'url';
        $defaults['control'][1][1]['description'] = "URL of your Twitter Handle. Use <strong>get_option('twitter');<strong>";
        $defaults['control'][1][1]['choices'] = '';
        // Instagram
        $defaults['control'][1][2]['label'] = 'Instagram';
        $defaults['control'][1][2]['slug'] = 'instagram';
        $defaults['control'][1][2]['type'] = 'url';
        $defaults['control'][1][2]['description'] = "URL of your Instagram Page. Use <strong>get_option('instagram');<strong>";
        $defaults['control'][1][2]['choices'] = '';
        // Linkedin
        $defaults['control'][1][3]['label'] = 'Linkedin';
        $defaults['control'][1][3]['slug'] = 'linkedin';
        $defaults['control'][1][3]['type'] = 'url';
        $defaults['control'][1][3]['description'] = "URL of your Linkedin Profile. Use <strong>get_option('linkedin');<strong>";
        $defaults['control'][1][3]['choices'] = '';
        // Youtube
        $defaults['control'][1][4]['label'] = 'Youtube';
        $defaults['control'][1][4]['slug'] = 'youtube';
        $defaults['control'][1][4]['type'] = 'url';
        $defaults['control'][1][4]['description'] = "URL of your Youtube Channel. Use <strong>get_option('youtube');<strong>";
        $defaults['control'][1][4]['choices'] = '';
        // Google
        $defaults['control'][1][5]['label'] = 'Google';
        $defaults['control'][1][5]['slug'] = 'google';
        $defaults['control'][1][5]['type'] = 'url';
        $defaults['control'][1][5]['description'] = "URL of your Google Page/Profile. Use <strong>get_option('google');<strong>";
        $defaults['control'][1][5]['choices'] = '';
        // Dribble
        $defaults['control'][1][6]['label'] = 'Dribble';
        $defaults['control'][1][6]['slug'] = 'dribble';
        $defaults['control'][1][6]['type'] = 'url';
        $defaults['control'][1][6]['description'] = "URL of your Dribble. Use <strong>get_option('dribble');<strong>";
        $defaults['control'][1][6]['choices'] = '';
        // Pinterest
        $defaults['control'][1][7]['label'] = 'Pinterest';
        $defaults['control'][1][7]['slug'] = 'pinterest';
        $defaults['control'][1][7]['type'] = 'url';
        $defaults['control'][1][7]['description'] = "URL of your Pinterest Page. Use <strong>get_option('pinterest');<strong>";
        $defaults['control'][1][7]['choices'] = '';

        $fields = array();
        foreach($defaults['section'] as $i=>$sectionName) {
            if(isset($defaults['control'][$i])) {
                foreach($defaults['control'][$i] as $j=>$control) {
                    $fields[$sectionName][$j] = $control;
                }
            }
        }
        update_option('mmc_fields',$fields);
    }
}
register_activation_hook( __FILE__, 'mmc_plugin_activate' );

add_filter("plugin_action_links_customizer-options-tree/customizer-options-tree.php", 'mmc_plugin_settings_link' );
function mmc_plugin_settings_link($links) { 
    $settings_link = '<a href="admin.php?page=mmc-theme-helper">Settings</a>'; 
    array_unshift($links, $settings_link); 
    return $links; 
}

add_filter( 'plugin_row_meta', 'mmc_plugin_row_meta', 10, 2 );
function mmc_plugin_row_meta( $links, $file ) {
    if ( 'customizer-options-tree/customizer-options-tree.php' !== $file ) {
        return $links;
    }
    $customizer = admin_url('customize.php?return=%2Fmy-plugin%2Fwp-admin%2Fplugins.php%3Fplugin_status%3Dall%26paged%3D1%26s');

    $row_meta = array(
        'customizer'    => '<a href="' . esc_url( $customizer ) . '" aria-label="' . esc_attr__( 'Customizer', 'idf' ) . '">' . esc_html__( 'Customizer', 'idf' ) . '</a>',
    );

    array_splice( $links, 2, 0, $row_meta );
    return $links;
}