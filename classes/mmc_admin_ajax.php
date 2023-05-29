<?php
if ( ! class_exists( 'MAKCustomizer_Adminajax' ) && defined( 'ABSPATH' ) ) {

/**
 * mmc loader class.
 */
class MAKCustomizer_Adminajax {

    function __construct() {
        self::set_filters();
    }

    function set_filters() {
        add_action( 'wp_ajax_mmc_load_input_settings', array($this, 'mmc_load_input_settings') );
        add_action( 'wp_ajax_mmc_add_section_html', array($this, 'mmc_add_section_html') );
        add_action( 'wp_ajax_mmc_add_control_html', array($this, 'mmc_add_control_html') );
        add_action( 'wp_ajax_mmc_save_options_fields', array($this, 'mmc_save_options_fields') );
    }

    function mmc_load_input_settings() {
        ob_start();
        include_once(dirname(__FILE__) . '/' . '../templates/admin/ajax/inputs.php');
        $html = ob_get_contents();
        ob_end_clean();
        $return = array(
            'success'   => true,
            'message'   => '',
            'result'    => $html,
            'class'     => ''
        );
        echo json_encode($return);
        exit;
    }

    function mmc_add_section_html() {
        $section['name'] = '';
        $close_html = 'x';
        $down_html = '>';
        $s_index = 1;
        $c_index = 2;
        ob_start();
        include_once(dirname(__FILE__) . '/' . '../templates/admin/ajax/default/section.php');
        $html = ob_get_contents();
        ob_end_clean();
        $return = array(
            'success'   => true,
            'message'   => '',
            'result'    => $html,
            'class'     => ''
        );
        echo json_encode($return);
        exit;
    }

    function mmc_add_control_html() {
        $control['label'] = 'Name';
        $control['name'] = '';
        $control['type'] = 'text';
        $control['description'] = '';
        $control['choices'] = '';
        $close_html = 'x';
        $down_html = '>';
        $s_index = 1;
        $c_index = 3;
        ob_start();
        include_once(dirname(__FILE__) . '/' . '../templates/admin/ajax/default/control.php');
        $html = ob_get_contents();
        ob_end_clean();
        $return = array(
            'success'   => true,
            'message'   => '',
            'result'    => $html,
            'class'     => ''
        );
        echo json_encode($return);
        exit;
    }

    function mmc_save_options_fields() {
        unset($_POST['action']);
        $fields = array();
        foreach($_POST['section'] as $i=>$sectionName) {
            if(isset($_POST['control'][$i])) {
                foreach($_POST['control'][$i] as $j=>$control) {
                    $fields[$sectionName][$j] = $control;
                }
            }
        }
        update_option('mmc_fields',$fields);
        $return = array(
            'success'   => true,
            'message'   => 'Fields Updated.',
            'result'    => '',
            'class'     => ''
        );
        echo json_encode($return);
        exit;
    }
    

}

/**
 * Instantiate loader class.
 *
 * @since 2.0
 */
new MAKCustomizer_Adminajax();
}
?>