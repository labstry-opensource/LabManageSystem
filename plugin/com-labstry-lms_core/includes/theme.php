<?php

function getActiveThemeDir(){
    /* Get internal directory for active theme */
    return ROOT_DIR . '/theme/' . ACTIVE_THEME . '/';
}
function getActiveThemeUrl(){
    /* Get url for active theme */
    return BASE_PATH . '/theme/' . ACTIVE_THEME . '/';
}

function getModule($module_name){
    return getActiveThemeDir() . 'modules/' . $module_name . '.php';
}

function theModule($module_name){
    if(file_exists(getModule($module_name))){
        include getModule($module_name);
    }
}