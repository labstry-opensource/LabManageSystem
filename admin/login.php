<?php

//get_header();
include_once dirname(__FILE__) . '/../functions.php';

enqueue_style(BASE_PATH . '/css/admin.css');

include_once dirname(__FILE__) . '/admin-header.php';
?>

<div class="h-100 d-flex flex-column bg-pop-mosaic">
    <div class="d-flex flex-fill justify-content-center align-items-center">
        <div class="login-wrapper d-flex flex-column text-light">
            <img class="svg-inline m-auto login-logo" src="<?php echo BASE_PATH . '/assets/lms-logo.svg'?>" alt="">
            <form action="">
                <div class="p-2 my-3 bg-light text-pop-mosaic">
                    You must login before continue.
                </div>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="form-group mb-3">
                            <!-- BS Compatible -->
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" name="username">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
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
    <span class="d-block text-center pb-3 text-grey"><i><small>Let's create! Powered by LMS.</small></i></span>
</div>
    <script>
        $(document).ready(function() {

            $('.svg-inline').each(function() {

                var $img = $(this),
                    imgURL = $img.attr('src'),
                    imgID  = $img.attr('id'),
                    imgclass = $img.attr('class');

                $.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = $(data).find('svg');
                    // Add replaced image's ID to the new SVG
                    if(typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    if(typeof imgclass !== 'undefined') {
                        $svg = $svg.attr('class', imgclass);
                    }

                    $svg = $svg.removeAttr('xmlns:a');
                    $img.replaceWith($svg);
                }, 'xml');
            });
        });
    </script>

<?php

include_once dirname(__FILE__) . '/admin-footer.php';