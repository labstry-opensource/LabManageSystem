<?php
use com\labstry\lms_core;
global $connection;

if(!isset($_SESSION)) session_start();

$apitools = new lms_core\APITools();


if(!isset($_SESSION['roles'])){
    $apitools->outputNoRightsToAccess();
}

$lang = empty($_GET['lang']) ? 'en' : $_GET['lang'];


$pages = new lms_core\Pages($connection);


//Get All Parent Pages and subpages via loop
$page_arr = $pages->getRecurseSubPages($lang, '/');

$apitools->output($page_arr);