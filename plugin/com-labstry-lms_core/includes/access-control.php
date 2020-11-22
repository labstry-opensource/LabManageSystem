<?php

function set_restrict_direct_access(){
    if(!defined('BASE_PATH')) {
        die('Direct access not permitted');
    }
}