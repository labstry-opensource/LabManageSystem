<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

function getPluginDir(){
    return ROOT_DIR . '/plugin';
}

function hasSuchPlugin($plugin_namespace){
    if(file_exists(ROOT_DIR . str_replace('\\', '-',$plugin_namespace))){

    }
}