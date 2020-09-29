<?php

use \com\labstry\lms_core as core;


$connect_class = new core\Connection(DB_USERNAME, DB_PASSWORD, DB_NAME, DOMAIN_NAME);

global $_lms_connection;
$_lms_connection = $connect_class->connect();
