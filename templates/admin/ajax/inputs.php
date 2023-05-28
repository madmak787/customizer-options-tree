<?php
$up_html = '&#10005;';
$down_html = '>';
$close_html = 'x';
$s_index = 0;
$c_index = 0;
//Strat of HTML
$html = '<div class="accordion" id="options">';

$customizer = get_option('mmc_fields');

//Section
$section['label'] = 'Global';
ob_start();
include(dirname(__FILE__) . '/default/section.php');
$section_html = ob_get_contents();
ob_end_clean();

//Controls
$control['label'] = 'Text';
$control['type'] = 'text';
$control['description'] = '';
$control['choice'] = '';
ob_start();
include(dirname(__FILE__) . '/default/control.php');
$control_html = ob_get_contents();
ob_end_clean();

if(is_array($customizer) && count($customizer)) {
    foreach($customizer as $k=>$c) {
        $section['label'] = $k;
        //Section
        ob_start();
        include(dirname(__FILE__) . '/default/section.php');
        $sectionHtml = ob_get_contents();
        ob_end_clean();
        $html .= $sectionHtml;
        $c_index = 0;
        foreach($c as $control) {
            //Controls
            ob_start();
            include(dirname(__FILE__) . '/default/control.php');
            $controlHtml = ob_get_contents();
            ob_end_clean();

            $html .= $controlHtml;
            $c_index++;
        }
        $s_index++;
    }
} else {
    $html .= $section_html;
    $html .= $control_html;
} 
//Rest of HTML
$html .= '</div>';
$html .= '<br>
<div class="btn-toolbar">
    <div class="btn-group alignleft">
        <button type="button" class="button button-secondary" onclick="javascript:addSectionHtml();">Add Section</button>
        <button type="button" class="button button-secondary" onclick="javascript:addControlHtml();">Add Control</button>
    </div>
    <div class="input-group alignright">
        <input type="hidden" name="action" value="mmc_save_options_fields" />
        <button type="button" class="button button-primary" onclick="javascript:saveOptionsFields();">Save Changes</button>
    </div>
</div>';
echo $html;