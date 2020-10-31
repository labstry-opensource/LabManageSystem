<?php

/* We are finding this php for starting point no matter what application they are.
 * From here, do whatever you want
 */

$core_list = glob(dirname(__FILE__) . '/includes/*');
foreach ($core_list as $list){
    if(file_exists($list)) include $list;
}

