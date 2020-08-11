<?php

if(defined('ROOT_DIR') || define('ROOT_DIR', dirname(__FILE__)));
if(defined('BASE_URL') || define('BASE_URL', str_replace($_SERVER['DOCUMENT_ROOT'], '', ROOT_DIR)));

function get_campaign_template($campaign_name = null){
    return dirname(__FILE__ . '/campaign/' . (!empty($campaign_name) ? $campaign_name : ''));
}

$request_uri = $_SERVER['REQUEST_URI'];
echo $_SERVER['DOCUMENT_ROOT'];

if(file_exists(get_campaign_template($page) . '/index.php')){
    include get_campaign_template($page) . '/index.php';
}