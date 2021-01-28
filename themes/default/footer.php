		<div class="wrap">
	            <footer id="bottom">
	                <small>&copy; <?= date('Y'); ?> <?= site_name(); ?>. All rights reserved.</small>

	                <ul role="navigation">
	                    <li><a href="<?= rss_url(); ?>">RSS</a></li>
	                    <?php if (twitter_account()): ?>
	                    	<li><a href="<?= twitter_url(); ?>">@<?= twitter_account(); ?></a></li>
	                    <?php endif; ?>

	                    <li><a href="<?= base_url('admin'); ?>" title="Administer your site!">Admin area</a></li>

	                    <li><a href="<?= base_url(); ?>" title="Return to my website.">Home</a></li>
	                </ul>
	            </footer>

	        </div>
        </div>
    </body>
</html>
