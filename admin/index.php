<?php
//get_header();
include_once dirname(__FILE__) . '/admin-functions.php';

enqueue_style(BASE_PATH . '/css/admin.css', 'admin-style');

enqueue_script('https://www.unpkg.com/sortablejs@1.10.2/Sortable.min.js');
enqueue_script('https://unpkg.com/jsrender@1.0.7/jsrender.min.js');

include_once dirname(__FILE__) . '/view/admin-nav.php';

getAdminPageFrame();
?>

<?php

include_once dirname(__FILE__) . '/view/admin-footer.php';





