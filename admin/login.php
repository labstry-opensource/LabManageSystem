<?php
/*
 * Login page for frontend user input
 *
 *
 * */
//get_header();
include_once dirname(__FILE__) . '/admin-functions.php';
enqueue_style(BASE_PATH . '/../css/admin.css', 'Admin Style');
enqueue_script(BASE_PATH . '/js/svg-transformer.js');

$show_header = false;
$is_log_in_page = true;
include_once dirname(__FILE__) . '/view/login-header.php';

?>
    <div class="h-100 d-flex flex-column bg-pop-mosaic">
        <div class="d-flex flex-fill justify-content-center align-items-center">
            <div class="login-wrapper d-flex flex-column text-light">
                <img class="svg-inline m-auto login-logo w-100" src="<?php echo BASE_PATH . '/assets/lms-logo-white.svg'?>" alt="">
                <form class="login-form" action="<?php echo BASE_PATH . '/api/login.php'?>" method="POST">
                    <div class="p-2 my-3 bg-light text-pop-mosaic">
                        You must login before continue.
                    </div>
                    <input type="hidden" name="login_role" value="admin">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="form-group mb-3">
                                <!-- BS Compatible -->
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" name="username">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-light w-100">
                                Login
                                <img class="svg-inline" src="<?php echo BASE_PATH . '/assets/admin/arrow-login.svg'?>" alt="">
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <span class="d-block text-center pb-3 text-grey"><i><small>Powered by Nightingale, product by Labstry.</small></i></span>
    </div>
    <script>
        var base_path = <?php echo json_encode(BASE_PATH); ?>;
        $('.login-form').on('submit', function(e){
            e.preventDefault();
            $.post($(this).attr('action'), $(this).serialize(), function(data){
                if(data.success){
                    window.location = base_path + '/admin/index.php';
                }else{
                    $.each(data.error, function(key, val){
                        $('.form-control[name="'+ key +'"]').addClass('is-invalid');
                        $('.form-control[name="'+ key +'"]').siblings('.invalid-feedback').html(val);
                    });
                }
            });
        });
    </script>

<?php

include_once dirname(__FILE__) . '/view/admin-footer.php';