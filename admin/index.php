<?php
//get_header();
include_once dirname(__FILE__) . '/admin-functions.php';

enqueue_style(BASE_PATH . '/css/admin.css', 'admin-style');
enqueue_script(BASE_PATH . '/../js/svg-transformer.js');

include_once dirname(__FILE__) . '/view/admin-nav.php';

include_once dirname(__FILE__) . '/view/page-frame.php';
?>

<?php

include_once dirname(__FILE__) . '/view/admin-footer.php';





