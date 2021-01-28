<?php theme_include('header'); ?>

<section class="container">
    <div class="jumbotron mt-3">
        <div class="container">
            <h1 class="display-1">Not found</h1>
            <p class="lead">
                Unfortunately, the page <code>/<?= htmlspecialchars(current_url()); ?></code> could not be found. <br>
                Your best bet is either to try the <a href="<?= base_url(); ?>">homepage</a>, try <a href="#search">searching</a>, or go and cry in a corner (although I don’t recommend the latter).
            </p>
        </div>
    </div>
</section>

<?php theme_include('footer');
