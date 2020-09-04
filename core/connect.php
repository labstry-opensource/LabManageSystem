<?php

use \com\labstry\lms_core as core;


$connect_class = new core\Connection(DB_USERNAME, DB_PASSWORD, DB_NAME, DOMAIN_NAME);

$connect_class->connect();
