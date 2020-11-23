<?php

function getTopThreePluginSpaceUsage($plugin_arr, $total_cms_size){
    usort($plugin_arr, function ($item1, $item2) {
        if ($item1['size_raw'] == $item2['size_raw']) return 0;
        return $item1['size_raw'] > $item2['size_raw'] ? -1 : 1;
    });

    $color_representation = array('bg-success', 'bg-danger', 'bg-warning', 'bg-info');
    $top_three_plugins = array_slice($plugin_arr, 0, 3);

    $plugin_sizes = array();

    foreach ($top_three_plugins as $index => $item){
        array_push($plugin_sizes, array(
            'name' => $item['name'],
            'color' => $color_representation[$index],
            'size' => $item['size'],
            'size_raw' => $item['size_raw'],
            'percentage' => round(((float)$item['size_raw'] / $total_cms_size) * 100, 1),
        ));
    }
    return $plugin_sizes;
}

function getSystemSpaceInPlugins($plugin_size){
    $other_size_percentage = 100;
    foreach ($plugin_size as $item) {
        $other_size_percentage -= (float) $item['percentage'];
    }
    return $other_size_percentage;
}