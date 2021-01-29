<?php
/** 
 * Footer template
 * 
 * @package Basic
 */

// Exit if accessed directly.
defined( 'PATH' ) || exit;

?>
        </main>
        <footer class="mt-auto bg-light">
            <div class="container py-3 d-flex justify-content-between">
            <div>
                &copy; 2015-<?= date('Y') ?> Tim Roberts (Uneed2Cook)
            </div>
            <small>
                <p class="mb-0">Made with <span title="Love">❤</span> and <span title="Coffee">☕</span> by <a target="_blank" href="//tomroberts.uk">Tom Roberts</a>.</p>
            </small>
            </div>
        </footer>
        <script src="<?= theme_url('js/jquery.min.js') ?>"></script>
        <script src="<?= theme_url('js/bootstrap.bundle.min.js') ?>"></script>
    </body>
</html>
        