<?php
if ( ! class_exists( 'MAKCustomizer_Admin' ) && defined( 'ABSPATH' ) ) {

/**
 * mmc loader class.
 */
class MAKCustomizer_Admin {

    function __construct() {
        self::set_filters();
    }

    function set_filters() {
        add_action('admin_menu', array($this, 'mmc_admin'), 13);
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts_admin'));
    }
    function enqueue_scripts_admin(){
        if(isset($_GET['page']) && $_GET['page']=='mmc-theme-helper') {
            wp_enqueue_style( 'mmc-style', MMC_PLUGIN_URL . 'assets/admin/css/mmc-custom.css',false,'1.1','all');

            wp_enqueue_script('jquery');
            wp_enqueue_script( 'jquery-ui-sortable' );
            wp_enqueue_script( 'mmc-scripts', MMC_PLUGIN_URL . 'assets/admin/js/mmc-scripts.min.js', array ( 'jquery' ), 1.1, true);
        }         
    }


    function mmc_admin() {
        $mmc_admin = add_menu_page( __('Customizer Options', 'mmc'), __('Custom Options', 'mmc'), 'manage_options', 'mmc-theme-helper', array($this, 'mmc_theme_helper'), 'dashicons-layout', 60 );
    }

    function mmc_theme_helper() {
        include_once(dirname(__FILE__) . '/' . '../templates/admin/options.php');
    }

    

}

/**
 * Instantiate loader class.
 *
 * @since 2.0
 */
new MAKCustomizer_Admin();
}
?>