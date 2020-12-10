<?php

//Check identification
global $connection;

if(!isset($_SESSION)) session_start();
use com\labstry\lms_core;

$apitools = new lms_core\APITools();
$users = new lms_core\Users($connection);


if(empty($_SESSION['id'])){
    $data['data']['error']['id'] = 'Please login before continue.';
    $apitools->output($data);
}

if($users->getUserRoles($_SESSION['id']) !== 'admin'){
    $data['data']['error']['id'] = 'You don\'t have sufficient rights';
    $apitools->output($data);
}

$password = isset($_POST['password']) ? $_POST['password'] : '';
$plugin_name = isset($_POST['plugin_namespace']) ? $_POST['plugin_namespace'] : '';

if(empty($password)){
    $data['data']['error']['password'] = 'Password can\'t be empty!';
    $apitools->output($data);
}

if(empty($plugin_name)){
    $data['data']['error']['plugin_namespace'] = 'Please specify a plugin namespace.';
    $apitools->output($data);
}




if(unlink_plugins($password, $plugin_name)){
    $data['data']['success'] = true;
    $apitools->output($data);

}else{
    $data['data']['error']['unlink'] = 'Can\'t remove plugin. Permission denied.';
    $apitools->output($data);
}

die;
