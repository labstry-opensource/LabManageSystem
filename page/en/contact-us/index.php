<?php getHeader(null, null, 'Contact Us'); ?>
<div class="container">
    <?php theModule('page-banner'); ?>
    <div class="bg-warning p-3">
        Due to the situation of COVID-19 and aligning with government regulations, we are temporarily closed and working from home.
        However, you could still contact us using the methods below.
    </div>
    <div class="row py-3">
        <div class="col-12 col-md-6 py-3">
            <div class="mb-5">
                <div class="h4 mb-3">For matters about solutions, please contact us by:</div>
                <div>Phone: <a href="tel:+4407709851963">+4407709851963</a></div>
                <div>Email: <a href="mailto:raynold_chow@hotmail.com">raynold_chow@hotmail.com</a></div>
            </div>
            <div class="px-3 py-5 bg-pop-mosaic text-light">
                <h3>This site was built with LabMS, an opensource CMS for everyone.</h3>
            </div>
        </div>
        <div class="col-12 col-md-6 py-3">
            <div class="h4 mb-3">or fill in this form. We will get back to you as soon as possible.</div>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="form-contact-us-email">Your email</label>
                    <input type="text" id="form-contact-us-email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="form-contact-us-fname">How do we call you? </label>
                    <input type="text" id="form-contact-us-fname" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="form-contact-us-title">Title</label>
                    <input type="text"  id="form-contact-us-title" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="form-contact-us-details">Details</label>
                    <textarea class="form-control"  id="form-contact-us-details" name="content" style="min-height: 300px"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>

    </div>
</div>

