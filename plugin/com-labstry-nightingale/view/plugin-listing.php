<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

$installed_plugin_dir = array_map('basename',glob(ROOT_DIR . '/plugin/*'));

$plugin_arr = array();

foreach($installed_plugin_dir as $dir){
    $plugin_details = include getPluginDir() . '/' . $dir . '/package.php';
    $plugin_arr[] = array(
        'name' => $plugin_details['package_name'],
        'description' => empty($plugin_details['description']) ? 'No description' : $plugin_details['description'],
        'namespace' => $plugin_details['package_namespace'],
        'version' => $plugin_details['version'],
        'userspace' => $plugin_details['type'],
        'author' => empty($plugin_details['author']) ? 'Unknown developer' : $plugin_details['author'],
        'package_dir' => $plugin_details['package_dir'],
        'size' => getHumanReadableFileSize(getPluginDir() . '/' . $dir),
    );

}
?>
<div class="p-3">
    <h2 class="h3">Plugins</h2>
    <?php echo disk_free_space('/'); ?>
    <ul class="list-unstyled">
        <?php foreach($plugin_arr as $plugin_item){ ?>
            <li class="py-3">
                <div class="font-weight-bold"><?php echo $plugin_item['name']; ?> by <?php echo $plugin_item['author'] ?></div>
                <div class="pt-2 py-4">
                    <?php echo $plugin_item['description']; ?>
                </div>
                <div class="">Version: <?php echo $plugin_item['version'] ?></div>
                <div class="">Namespace: <?php echo $plugin_item['namespace'] ?></div>
                <div class="">Size : <?php echo $plugin_item['size'] ?> </div>
            </li>
        <?php } ?>
    </ul>
</div>
