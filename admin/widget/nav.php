<div class="bg-pop-mosaic d-flex align-items-center admin-nav admin-nav-holder" style="height: 40px">
    <a href="<?php echo BASE_PATH . '/admin/' ?>" class="d-inline">
        <span class="visually-hidden sr-only">Nightingale</span>
        <img class="svg-inline h-100 py-2 px-3" style="max-height: 40px" src="<?php echo BASE_PATH . '/assets/lms-logo-white.svg'?>" alt="">
    </a>


    <div class="ml-auto text-light">
        <div class="dropdown">
            <button class="btn dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<script>
    $('.dropdown-item.logout-item').on('click', function(e){
        e.preventDefault();
        $.get($(this).attr('href'), function(){
            $('.admin-nav.admin-nav-holder').remove();
        });
    })
</script>