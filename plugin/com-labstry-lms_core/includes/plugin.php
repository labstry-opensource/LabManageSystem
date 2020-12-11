<?php

//Load Nightingale Plugins
include ROOT_DIR . '/plugin/com-labstry-nightingale/loader.php';


//Load Activated Plugins in the database for each users.
global $connection;

use com\labstry\lms_core\Plugin;

$plugin = new Plugin($connection);
$activated_plugins = $plugin->getActivatedPlugins();

foreach($activated_plugins as $plugin){
    $plugin_dir = $plugin['plugin_name'];
    $targeted_loader = getPluginDir(). DIRECTORY_SEPARATOR . $plugin_dir . DIRECTORY_SEPARATOR . '/loader.php';
    if(file_exists($targeted_loader)){
        include $targeted_loader;
    }
}

