<?php

function get_all_pages(){
    global $connection;
    $pages = new com\labstry\lms_core\Pages($connection);
    $page_arr = $pages->getPages();

}