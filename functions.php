<?php
/*
 *  Functions for SYSTEM USE only.
 *
 *  This file will be overridden when upgrading the lms_core.
 *
 *  In order to guarantee the updatability, for user defined functions, please define them in
 *  theme/<theme-name>/functions.php
 *
 * */

defined('ROOT_DIR') || define('ROOT_DIR', dirname(__FILE__));
defined('DIR') || define('DIR', dirname(__DIR__));
defined('BASE_PATH') || define('BASE_PATH', str_replace(DIR, '', ROOT_DIR));
defined('APP_PATH') || define('APP_PATH', $_SERVER['REQUEST_URI']);
defined('ACTIVE_THEME') || define('ACTIVE_THEME', 'lms-default');

$core_list = glob(ROOT_DIR . '/plugin/com-labstry-lms_core/*');

include_once ROOT_DIR . '/error-handle.php';

if(file_exists(ROOT_DIR . '/credentials.php')){
    include_once ROOT_DIR . '/credentials.php';
}

//This package, which consists of essential toolkits,  has fixed name.
include ROOT_DIR . '/plugin/com-labstry-lms_core/loader.php';


//Load userspace functions.php. PLEASE DEFINE THEM IN THEME FOLDER, NOT HERE !!!
include ROOT_DIR . '/theme/' . ACTIVE_THEME .'/functions.php';