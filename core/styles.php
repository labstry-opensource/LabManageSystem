<?php

global $_lms_styles, $_lms_scripts;
$_lms_styles = array();
$_lms_scripts = array();

/*
 *  Enqueue Styles to be used in all pages.
 *  We discourage using style and script enqueue as it would affect speed and
 *  reduce flexibility. It works but don't use them.
 *
 *  Define your custom style in header.php instead.
 *
 * */
function enqueue_style($link, $key){
    //Use a key to enqueue version other than default
    global $_lms_styles;
    $_lms_styles[] = $link;
}


function enqueue_script($link){
    global $_lms_scripts;
    $_lms_scripts[] = $link;
}
