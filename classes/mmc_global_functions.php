<?php
function MAKCustomizer_slug($str) {
    $str = strtolower($str);
    $str = str_replace('  ','_',$str);
    $str = str_replace(' ','_',$str);
    $str = str_replace('&','_',$str);
    return $str;
}

function MAKCustomizer_unslug($str) {
    $str = ucfirst($str);
    $str = str_replace('_',' ',$str);
    return $str;
}
?>