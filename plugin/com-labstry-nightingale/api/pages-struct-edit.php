<?php

global $connection;

if(!isset($_SESSION)) session_start();
use com\labstry\lms_core;

$apitools = new lms_core\APITools();

$apitools->checkIdentification('admin');

$data = json_decode(file_get_contents('php://input'), true);

if(empty($data)){
    $odata['error']['data'] = 'The change array is empty';
    $apitools->output($odata);
}

rsort($data);
$operations = $apitools->multidimensionArrUnique($data, 'slug');

$pages = new lms_core\Pages($connection);

foreach($operations as $key => $operation){
    $pages->changePageParent($operation['slug'], $operation['parent_dir']);
}

$odata['success'] = true;

$apitools->output($odata);