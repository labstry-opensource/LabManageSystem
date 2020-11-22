<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

global $_lms_admin_page_tabs;

?>

<div class="bg-pop-mosaic position-fixed" style="width: 250px; bottom: 0; left: 0; top: 40px; border-top: 1px solid #fff">
    <ul class="list-unstyled">
        <?php foreach($_lms_admin_page_tabs as $tab_item){ ?>
            <?php foreach ($tab_item as $priority => $item){ ?>
                <li class="py-1 text-light d-flex align-items-center">
                    <a class="btn w-100 text-left text-light text-decoration-none" href="<?php echo getHome('') . 'admin/?section=' . $item['tab_key'] ?>">
                        <img class="pr-3"
                             src="<?php echo (file_exists($item['tab_icon'])) ? $item['tab_icon']: getHome('/') . 'assets/admin/cross-white.svg'?>" alt="">
                        <?php echo $item['tab_name']; ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>
