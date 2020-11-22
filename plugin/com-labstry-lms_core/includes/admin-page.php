<?php

global $_lms_admin_page_tabs;

$_lms_admin_page_tabs = array();

function enqueue_admin_tabs($tab_icon, $tab_tag_name, $tab_key, $tab_load_path, $priority = 0){
    global $_lms_admin_page_tabs;

    //Create an array if not exists
    if(empty($_lms_admin_page_tabs[$priority]))
        $_lms_admin_page_tabs[$priority] = array();

    array_push($_lms_admin_page_tabs[$priority], array(
            'tab_icon' => empty($tab_icon) ? getHome() . 'assets/admin/cross.svg' : $tab_icon,
            'tab_name' => empty($tab_tag_name) ? 'Untitled' : $tab_tag_name,
            'tab_key' => $tab_key,
            'path' => $tab_load_path,
        )
    );
}

function change_admin_tabs_priority($tab_key, $old_priority, $new_priority)
{
    global $_lms_admin_page_tabs;


}

function remove_admin_tabs(){}
