<?php

global $_api_file_arr;
$_api_file_arr = array();

function register_api($action_key, $file_path){
    global $_api_file_arr;
    $_api_file_arr[$action_key] = $file_path;
}

function load_api($action_key){
    global $_api_file_arr;
    if(file_exists($_api_file_arr[$action_key])) $_api_file_arr[$action_key];
}

function check_has_registered_api($action_key){
    global $_api_file_arr;
    return file_exists($_api_file_arr[$action_key]);
}

