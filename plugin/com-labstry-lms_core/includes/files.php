<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

function getFolderSize(...$directory){
    $file_size = 0;
    foreach($directory as $directory_item){
        foreach (glob(rtrim($directory_item, DIRECTORY_SEPARATOR) . '/*', GLOB_NOSORT) as $file){
            $file_size += is_file($file) ? filesize($file) : getFolderSize($file);
        }
    }
    return $file_size;
}

function getHumanReadableFileSize(...$directory){
    $total_file_size = 0;
    foreach($directory as $directory_item){
        $total_file_size += max(0, (int) getFolderSize($directory_item));
    }
    $units = array( 'Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $total_file_size > 0 ? floor( log ($total_file_size, 1024)) : 0;
    return number_format($total_file_size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}