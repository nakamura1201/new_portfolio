<?php

// Cache Busting

$css_varsion = '1.00';
if (isset($css_varsion) && $css_varsion != '') {
    $css_varsion = '?v=' . $css_varsion;
}

$js_varsion = '1.00';
if (isset($js_varsion) && $js_varsion != '') {
    $js_varsion = '?v=' . $js_varsion;
}
