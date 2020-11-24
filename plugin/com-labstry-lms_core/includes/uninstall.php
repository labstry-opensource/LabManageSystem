<?php

function recurse_unlink($directory){
    if(is_dir($directory)){
        $obj = scandir($directory);
        foreach ($obj as $folder_item){
            if(!in_array($folder_item, array('.', '..'))){
                if(is_dir($directory . '/' . $folder_item) && !is_link($directory . '/' . $folder_item)){
                    recurse_unlink($folder_item);
                }else{
                    unlink($directory . '/' . $folder_item);
                }
            }
        }
        rmdir($directory);
    }
}