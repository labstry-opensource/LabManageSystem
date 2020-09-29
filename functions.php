<?php

defined('ROOT_DIR') || define('ROOT_DIR', dirname(__FILE__));
defined('DIR') || define('DIR', dirname(__DIR__));
defined('BASE_PATH') || define('BASE_PATH', str_replace(DIR, '', ROOT_DIR));
defined('APP_PATH') || define('APP_PATH', $_SERVER['REQUEST_URI']);

$core_list = glob(ROOT_DIR . '/core/*');

if(file_exists(ROOT_DIR . '/credentials.php')){
    include_once ROOT_DIR . '/credentials.php';
}else{
    //header('Location:' . BASE_PATH . '/installer/labstry-installer.php');
}

foreach ($core_list as $list_item) {
    include $list_item;
}
