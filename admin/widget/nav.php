<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}
$is_in_dashboard = isset($is_in_dashboard) ? $is_in_dashboard : true;
?>

<div class="bg-pop-mosaic d-flex align-items-center admin-nav admin-nav-holder position-fixed w-100" style="height: 40px; top: 0">
    <a href="<?php echo BASE_PATH . '/admin/' ?>" class="d-inline">
        <span class="visually-hidden sr-only">Nightingale</span>
        <img class="h-100 py-2 px-3" style="max-height: 40px" src="<?php echo BASE_PATH . '/assets/lms-logo-white.svg'?>" alt="">
    </a>
    <?php if($is_in_dashboard){ ?>
    <a href="<?php echo getHome() ?>" class="btn text-light">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
        </svg>
        Preview
    </a>
    <?php } ?>

    <div class="ml-auto ms-auto text-light">
        <div class="dropdown">
            <button class="btn dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                <?php echo $user_arr['username'] ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item logout-item" href="<?php echo BASE_PATH . '/api/logout.php'?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<div class="" style="height:40px">
    <!--Placeholder -->
</div>

<script>
    $('.dash-preview .dropdown-item.logout-item').on('click', function(e){
        e.preventDefault();
        $.get($(this).attr('href'), function(){
            $('.admin-nav.admin-nav-holder').animate({height: '0px'}, 1000, function(){
                $(this).remove();
            });
        });
    })
</script>