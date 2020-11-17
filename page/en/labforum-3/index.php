<?php

$current_version = '3.0.5-Alpha';

enqueue_style(BASE_PATH . htmlspecialchars('/css/main.css'), 'labforum-3-main');

getHeader();

?>
<div class="forum-wrapper overflow-hidden">
    <section class="container-xxl title-section">
        <!-- Container xxl is to prevent the rotated div from overflowing when the
        screen gets very large -->
        <div class="bg-forum-green color-white  d-flex flex-column justify-content-center
        align-items-center my-5 title-section-content">
            <h1 class="extra-large">Labforum 3.</h1>
            <div class="brief-intro text-center py-4">
                <span class="d-block py-2">A lightweight, opensource PHP Forum Engine for everyone.</span>
                <a role="link" class="btn btn-outline-light cta-button-white-outline px-5 my-2">
                    <i class="fab fa-gitlab pr-3"></i>Fork on Gitlab
                </a>
                <a role="link" class="btn btn-outline-light cta-button-white-outline px-5 my-2"
                   href="forum/index.php">
                    Try it out <i class="fas fa-arrow-right pl-3"></i>
                </a>

            </div>
            <span class="banger">Latest Version: <?php echo $current_version ?></span>
            <a class="position-absolute cta-learn-more text-light py-3" href="#introduction">Learn More</a>
        </div>
    </section>
    <section class="container py-0 py-md-5 loads-faster-section">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2 class="h1 banger">Performance: Loads faster than v2.</h2>
                <p>
                    <span class="py-3 d-block">Labforum 3 loads 2 times faster than v2 on average <sup>#</sup> thanks to our frontend-backend-seperation and our QuantumForum API Engine.</span>
                    <span class="py-3 d-block">The two versions of forum homepage were compared one to another and v3 loaded all DOM contents within 500ms, which is faster than v2 while the DOM contents is loaded in 1 second.</span>
                </p>

            </div>
            <div class="col-12 col-md-6 pb-5 pb-md-0">
                <div class="pl-0 pl-md-4 speed-animate-class">
                    <article class="pt-0 pt-md-5 pb-2 banger color-young-pink">
                        <div class="h1">
                            <span class="speed-counter" data-target="200">0</span>% faster
                        </div>
                        <div class="h5">when compared with v2.</div>
                    </article>
                    <div class="progress-bar"></div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-black custom-made-section py-5">
        <div class="container diy-content my-3">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 color-white">
                    <h2 class="h1 banger">Want your own design? No problem.</h2>
                    <article>
                        <p>You are good to go if you roll your own design and get contents by our api via AJAX. Please follow our documentations.</p>
                    </article>
                </div>
                <div class="col-12 col-md-6 px-5">
                    <img class="img-fluid" src="<?php echo BASE_PATH ?>/assets/custom_made.svg" alt="The picture shows a computer with customizable contents in the window.">
                </div>
            </div>
        </div>
    </section>
    <section class="a-forum-that-keeps-updated bg-young-pink py-5">
        <div class="container text-center color-white">
            <h2 class="banger">It's a LIVE Forum Engine.</h2>
            <article>
                <p>The forum is an app that updates monthly. Don't get the feature you wanted ?</p>
                <p>
                    Go and
                    <a role="button"
                       class="btn btn-outline-light cta-button-white-outline px-5 my-2">Develop in GitLab</a> OR
                    <a class="btn btn-outline-light" href="/forum/">File A Request</a>
                </p>
            </article>
        </div>

    </section>
    <section class="ui-intro-section py-3 ">
        <h2 class="banger">Install it, use it.</h2>
        <article>
            <p>
                No worries. We have completed all the works for you. Install it, use it.
            </p>
        </article>
    </section>

</div>
<footer class="container">
    <div class="tnc">
        <small class="d-block text-secondary">
            * Forum v2 was proprietary while Labforum 3 is opensource
        </small>
        <small class="d-block text-secondary">
            # On a weekday of July, 2020, we installed both v2 and Labforum 3 on same server with same configurations. Results might vary on different servers with different configurations.
        </small>
    </div>

</footer>
</body>

</html>