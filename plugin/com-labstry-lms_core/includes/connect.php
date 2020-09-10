<?php

use \com\labstry\lms_core;

/* Get connection by declaring global connection site-wide */
global $connect_class, $connection;


$connect_class = new lms_core\Connection(DB_USERNAME, DB_PASSWORD, DB_NAME, DOMAIN_NAME);

$connection = $connect_class->connect();
