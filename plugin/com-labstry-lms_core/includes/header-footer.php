<?php

global $_lms_page_title;
global $_lms_header_items;

$_lms_header_items = array();

function setPageTitle($title_name){
    global $_lms_page_title;
    $_lms_page_title = $title_name;
}

function setMenu($menu_name, $menu_items){
    /* Add items to the menu array using key */
    global $_lms_header_items;
    $_lms_header_items[$menu_name] = $menu_items;
}

function getMenu($menu_name){
    global $_lms_header_items;
    return $_lms_header_items[$menu_name];
}

function getHeader($language = 'en', $theme_name = null, $page_title = null){
    global $_lms_page_title;
    $_lms_page_title = $page_title;
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

function getUrl($language= 'en', $path = null){
    return BASE_PATH . (!empty($language) ? ( '/' . $language ) : '') .(!empty($path) ? '/' . $path : '/');
}

function getHome($language = 'en'){
    return getUrl($language);
}

