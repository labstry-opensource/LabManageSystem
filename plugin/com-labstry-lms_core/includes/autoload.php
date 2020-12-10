<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

spl_autoload_register(function ($class_name) {
    $file_name =  ROOT_DIR . '/src/' . str_replace('\\', DIRECTORY_SEPARATOR , $class_name) . '.php';
    if(file_exists($file_name)){
        include $file_name;
    }
});