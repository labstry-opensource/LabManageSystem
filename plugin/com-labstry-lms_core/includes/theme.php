<?php

function getActiveThemeDir(){
    /* Get internal directory for active theme */
    return ROOT_DIR . '/theme/' . ACTIVE_THEME . '/';
}
function getActiveThemeUrl(){
    /* Get url for active theme */
    return BASE_PATH . '/theme/' . ACTIVE_THEME . '/';
}