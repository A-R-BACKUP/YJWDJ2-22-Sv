<?php
function take(&$var1, $defValue='') {
    return isset($var1) ? $var1 : $defValue;
}

function get($index, $defValue='') {
    return take($_GET[$index], $defValue);
}

function post($index, $defValue=''){
    return take($_POST[$index], $defValue);
}

?>