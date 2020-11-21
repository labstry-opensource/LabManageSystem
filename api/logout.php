<?php

include_once dirname(__FILE__) . '/../functions.php';

use com\labstry\lms_core;

$apitools = new lms_core\APITools();

if(!empty($_SESSION)) session_start();

if(isset($_SESSION)){
    session_destroy();
    $data['data']['success'] = true;
    $apitools->output($data);
}

$data['data']['error'] = 'not_logged_in';
$apitools->output($data);


