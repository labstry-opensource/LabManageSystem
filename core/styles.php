<?php

global $_lms_styles;
$_lms_styles = array();

/*  Stylesheets, scripts all have priority.
 *
 * */
function enqueue_style($link){
    $_lms_styles[] = $link;
}