<?php

function getHeader($language = 'en', $theme_name = null, $page_name = null){
    if(!empty($theme_name) && file_exists(ROOT_DIR . '/theme/' . $theme_name . '/header.php')){
        include_once ROOT_DIR . '/theme/' . $theme_name . '/header.php';
    }
    if(file_exists(ROOT_DIR . '/theme/' . ACTIVE_THEME . '/header.php')){
        include_once ROOT_DIR . '/theme/' . ACTIVE_THEME . '/header.php';
    }
}

function getFooter($theme_name = null, $page_name = null){
    if(!empty($theme_name) && file_exists(ROOT_DIR . '/theme/' . $theme_name . '/footer.php')){
        include_once ROOT_DIR . '/theme/' . $theme_name . '/footer.php';
    }
    if(file_exists(ROOT_DIR . '/theme/' . ACTIVE_THEME . '/footer.php')){
        include_once ROOT_DIR . '/theme/' . ACTIVE_THEME . '/footer.php';
    }
}