<?php

/* Load selected action functions via api manage */
include_once dirname(__FILE__) .'/../functions.php';

use com\labstry\lms_core\APITools;
$apitools = new APITools();

//Define __lms_action via GET or POST so that we know what api to find and what to do
$requested_action = (!empty($_GET['__lms_action'])) ?  $_GET['__lms_action'] : (!empty($_POST['__lms_action']) ? $_POST['__lms_action'] : null);

if($requested_action === null){
    $data['data']['error']['__lms_action'] = 'Nothing defined, thus nothing to do.';
    $apitools->outputJson($data);
}

