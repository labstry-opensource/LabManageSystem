<?php

defined('ROOT_DIR') || define('ROOT_DIR', dirname(dirname(__FILE__)));
defined('DIR') || define('DIR', dirname(dirname(__DIR__)));

defined('APP_PATH') || define('APP_PATH', dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
defined('BASE_PATH') || define('BASE_PATH', str_replace($_SERVER['DOCUMENT_ROOT'], '', APP_PATH));

include_once ROOT_DIR . '/error-handle.php';
if(file_exists(ROOT_DIR . '/credentials.php')){
    include_once ROOT_DIR . '/credentials.php';
}else{
    //header('Location:' . BASE_PATH . '/installer/labstry-installer.php');
}

//This package, which consists of essential toolkits, has fixed name.
include ROOT_DIR . '/plugin/com-labstry-lms_core/loader.php';

//Start SESSION if it is not started
if(!isset($_SESSION)){
    session_start();
}

include_once ROOT_DIR . '/admin/include/sidenav-items.php';