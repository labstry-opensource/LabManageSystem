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
    /* Return the module path that caller function requests.
     * Note: This function don't guarantee that the module exits
     * */
    return getActiveThemeDir() . 'modules/' . $module_name . '.php';
}

function theModule($module_name){
    /* Include the moudule if exists inside modules dir of ACTIVE THEME */
    if(file_exists(getModule($module_name))){
        include getModule($module_name);
    }
}