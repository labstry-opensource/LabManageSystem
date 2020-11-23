<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

$installed_plugin_dir = array_map('basename',glob(ROOT_DIR . '/plugin/*'));
$nightingale_total_size = getFolderSize(ROOT_DIR);

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
        'size' => getHumanReadableFileSize(getPluginDir() . '/' . $dir,
            ROOT_DIR . '/src/' . str_replace('\\', '/',$plugin_details['package_namespace'])),
        'size_raw' => getFolderSize(getPluginDir() . '/'. $dir,
            ROOT_DIR . '/src/' . str_replace('\\', '/',$plugin_details['package_namespace'])),

    );
}

$space_usage_chart_data = getTopThreePluginSpaceUsage($plugin_arr, $nightingale_total_size);
$system_usage = getSystemSpaceInPlugins($space_usage_chart_data);

?>
<div class="p-3">
    <h2 class="h3">Plugins</h2>
    <div class="py-3">
        <div>Space Usage on Plugins</div>
        <div class="progress">
            <?php foreach ($space_usage_chart_data as $item){ ?>
                <div class="progress-bar <?php echo $item['color']?>" role="progressbar"
                     title="<?php echo $item['name'] . ' - ' . $item['percentage']. '%'; ?>"
                     data-toggle="tooltip" data-placement="bottom"
                     style="width: <?php echo $item['percentage']?>%" aria-valuenow="<?php echo $item['percentage']?>" aria-valuemin="0" aria-valuemax="100">
                    <?php echo $item['name']; ?>
                </div>
            <?php } ?>
            <div class="progress-bar bg-secondary"
                 data-toggle="tooltip" data-placement="bottom"
                 title="<?php echo 'System - ' . $system_usage. '%'; ?>"
                 role="progressbar" style="width: <?php echo $system_usage; ?>%" aria-valuenow="<?php echo $system_usage; ?>" aria-valuemin="0" aria-valuemax="100">
                System
            </div>
        </div>
    </div>

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
<script>
    //Enable Tooltip
    $(document).ready(function(){
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });


</script>
