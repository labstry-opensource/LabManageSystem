<?php

include_once dirname(__FILE__) . '/../functions.php';

use com\labstry\lms_core;

global $connection;
$data = array();

$users = new lms_core\Users($connection);


if(empty($_POST)){
    $data['error']['form-data'] = 'No data inputted';
}

$validator = new lms_core\validator\ValidateLogin($connection, $_POST);

if(!$validator->validateEmptyUsername()){
    $data['error']['username'] = 'Username can\'t be empty.';
}else if(!$validator->validateUsername()){
    $data['error']['username'] = 'The username is invalid';
}

if(!$validator->validateEmptyPassword()){
    $data['error']['password'] = 'The password can\'t be empty';
}else if(1){
//Not complete
}


if(!$users->getUserById($_POST['user'])){}