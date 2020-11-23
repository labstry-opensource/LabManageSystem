<?php

/* Load selected action functions via api manage */
include_once dirname(__FILE__) .'/../functions.php';
use com\labstry\lms_core;

$apitools = new lms_core\APITools();

//Define __lms_action via GET or POST so that we know what api to find and what to do
$requested_action = (!empty($_GET['__lms_action'])) ?  $_GET['__lms_action'] : (!empty($_POST['__lms_action']) ? $_POST['__lms_action'] : null);

if($requested_action === null){
    $data['data']['error']['__lms_action'] = 'Nothing defined, thus nothing to do.';
}
if(!check_has_registered_api($requested_action)){
    $data['data']['error']['__lms_action'] = 'No such API!';
}
if(!empty($data['data']['error'])){
    $apitools->output($data);
}


load_api($requested_action);