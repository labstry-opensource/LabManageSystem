<?php
//get_header();
include_once dirname(__FILE__) . '/admin-functions.php';

enqueue_style(BASE_PATH . '/css/admin.css', 'admin-style');

include_once dirname(__FILE__) . '/view/admin-nav.php';

getAdminPageFrame();
?>

<?php

include_once dirname(__FILE__) . '/view/admin-footer.php';





