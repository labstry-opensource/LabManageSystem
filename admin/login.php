<?php

//get_header();
include_once dirname(__FILE__) . '/../functions.php';

enqueue_style(BASE_PATH . '/css/admin.css');

include_once dirname(__FILE__) . '/admin-header.php';
?>

<div class="h-100 d-flex flex-column bg-pop-mosaic">
    <div class="d-flex flex-fill justify-content-center align-items-center">
        <div class="login-wrapper">
            <img class="svg-inline m-auto login-logo" src="<?php echo BASE_PATH . '/assets/lms-logo.svg'?>" alt="">
            <form action="">
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