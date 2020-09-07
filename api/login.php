<?php

include_once dirname(__FILE__) . '/../functions.php';
use com\labstry\lms_core;

global $connection;
$data = array();

$apitools = new lms_core\APITools();

//$apitools->userDefinedAPISwitcher(ACTIVE_THEME, );

if(empty($_POST)){
    $data['error']['form-data'] = 'No data inputted';
    $apitools->outputJson($data);
}

$validator = new lms_core\validator\ValidateLogin($connection, $_POST);

if(!$validator->validateEmptyUsername()){
    $data['error']['username'] = 'Username can\'t be empty.';
}else if(!$validator->validateUsername()){
    $data['error']['username'] = 'The username is invalid or no such username.';
}

if(!$validator->validateEmptyPassword()){
    $data['error']['password'] = 'The password can\'t be empty';
}else if(!$validator->validatePassword()){
    $data['error']['password'] = 'The password is invalid';
}

perform_action('additional_credibility_challenge');

if($data['error']){
    $apitools->outputJson($data);
}
