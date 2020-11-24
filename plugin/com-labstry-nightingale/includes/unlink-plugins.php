<?php

/*
 * Don't attempt to unlink system plugins UNLESS YOU KNOW HOW TO UNDO !!
 * OTHERWISE YOU WILL END UP WITH A UNWORKABLE SYSTEM !!!
 *
 */


function unlink_plugins($password, ...$plugin_package){
    global $connection;
    if(!isset($_SESSION)) session_start();

    $users = new com\labstry\lms_core\Users($connection);
    $user_arr = $users->getUserById($_SESSION['id']);
    if(!password_verify($password, $user_arr['password'])){
        return false;
    }
    foreach ($plugin_package as $package){
        $package_path = ROOT_DIR . '/plugin/' . $package . '/';
        $package_arr = include ROOT_DIR . '/plugin/' . $package . '/package.php';
        $estimated_src_path = ROOT_DIR . '/src/' . str_replace('\\', '/',  $package_arr['package_namespace']);
        if(file_exists($estimated_src_path)){
            recurse_unlink($estimated_src_path);
        }
        recurse_unlink($package_path);
    }
    return true;
}

