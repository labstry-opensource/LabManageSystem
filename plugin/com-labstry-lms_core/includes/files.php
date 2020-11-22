<?php

function getFolderSize($directory){
    $file_size = 0;
    foreach (glob(rtrim($directory, DIRECTORY_SEPARATOR) . '/*', GLOB_NOSORT) as $file){
        $file_size += is_file($file) ? filesize($file) : getFolderSize($file);
    }
    return $file_size;
}

function getHumanReadableFileSize($directory){
    $file_size = max(0, (int) getFolderSize($directory));
    $units = array( 'Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $file_size > 0 ? floor( log ($file_size, 1024)) : 0;
    return number_format($file_size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}