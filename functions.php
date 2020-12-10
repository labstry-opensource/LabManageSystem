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

/*  Check whether it is on root directory to decide it's base path
 *  !! Always check if you are getting the right thing.
 */

defined('APP_PATH') || define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']));
defined('BASE_PATH') || define('BASE_PATH', str_replace($_SERVER['DOCUMENT_ROOT'], '', APP_PATH));
defined('DEFAULT_LANG') || define('DEFAULT_LANG', 'en');
defined('ACTIVE_THEME') || define('ACTIVE_THEME', 'labstry-mainsite');

$core_list = glob(ROOT_DIR . '/plugin/com-labstry-lms_core/*');

include_once ROOT_DIR . '/error-handle.php';
if(file_exists(ROOT_DIR . '/credentials.php')){
    include_once ROOT_DIR . '/credentials.php';
}else{
    //header('Location:' . BASE_PATH . '/installer/labstry-installer.php');
}

//Load System Plugins
include ROOT_DIR . '/plugin/com-labstry-lms_core/loader.php';
include ROOT_DIR . '/plugin/com-labstry-nightingale/loader.php';
include ROOT_DIR . '/plugin/com-labstry-contact_form/loader.php';

//Start SESSION if it is not started
if(!isset($_SESSION)){
    session_start();
}

//Load userspace functions.php. PLEASE DEFINE THEM IN THEME FOLDER, NOT HERE !!!
if(file_exists(ROOT_DIR . '/theme/' . ACTIVE_THEME . '/functions.php')){
    include ROOT_DIR . '/theme/' . ACTIVE_THEME .'/functions.php';
}
