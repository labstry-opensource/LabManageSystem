<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}


/* We are finding this php for starting point no matter what application they are.
 * From here, do whatever you want
 */


$core_list = glob(dirname(__FILE__) . '/includes/*');
foreach ($core_list as $list){
    if(file_exists($list)) include $list;
}


$config = include dirname(__FILE__) . '/package.php';

enqueue_admin_tabs(null, 'Pages', 'page', $config['package_dir'] . '/view/page-listing.php');
enqueue_admin_tabs(null, 'Plugins', 'plugin', $config['package_dir'] . '/view/plugin-listing.php');

register_api('remove-plugin', dirname(__FILE__) . '/api/remove-plugin.php');
register_api('activate-plugin', dirname(__FILE__) . '/api/activate-plugin.php');