<?php

global $_api_file_arr;
$_api_file_arr = array();

function register_api($action_key, $file_path = null){
    global $_api_file_arr;
    $default_search_path = ROOT_DIR . '/theme/' . ACTIVE_THEME . '/api/' . $action_key . '.php';

    if($file_path === null && file_exists($default_search_path)){
        $_api_file_arr[$action_key] = $default_search_path;
    }
    else if(file_exists($file_path)){
        $_api_file_arr[$action_key] = $file_path;
    }
}

function load_api($action_key){
    global $_api_file_arr;
    $default_search_path = ROOT_DIR . '/theme/' . ACTIVE_THEME . '/api/' . $action_key . '.php';

    if(file_exists($default_search_path)){
        include $default_search_path;
    }else if(isset($_api_file_arr[$action_key]) && file_exists($_api_file_arr[$action_key])){
        include $_api_file_arr[$action_key];
    }

}

function check_has_registered_api($action_key){
    global $_api_file_arr;
    $default_search_path = ROOT_DIR . '/theme/' . ACTIVE_THEME . '/api/' . $action_key . '.php';
    if(file_exists($default_search_path)) return true;
    return isset($_api_file_arr[$action_key]) && file_exists($_api_file_arr[$action_key]);
}

