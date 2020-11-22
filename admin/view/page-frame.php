<?php

include_once dirname(__FILE__) . '/../widget/sidenav.php';

if(!empty($_GET['section'])){ ?>
    <div class="admin-dashboard-wrapper" style="margin-left: 250px">
        <?php

        global $_lms_admin_page_tabs;
        foreach ($_lms_admin_page_tabs as $tab_item){
            foreach ($tab_item as $priority => $item){
                if($item['tab_key'] === $_GET['section']){
                    include $item['path'];
                }
            }
        }

        ?>
    </div>
<?php }
?>

