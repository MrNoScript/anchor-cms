<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= page_title('Page can’t be found'); ?> - <?= site_name(); ?></title>

		<meta name="description" content="<?= site_description(); ?>">

		<link rel="stylesheet" href="<?= theme_url('/css/reset.css'); ?>">
		<link rel="stylesheet" href="<?= theme_url('/css/style.css'); ?>">
		<link rel="stylesheet" href="<?= theme_url('/css/small.css'); ?>" media="(max-width: 400px)">

		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?= rss_url(); ?>">
		<link rel="shortcut icon" href="<?= theme_url('img/favicon.png'); ?>">

		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script>var base = '<?= theme_url(); ?>';</script>
		<script src="<?= asset_url('/js/zepto.js'); ?>"></script>
		<script src="<?= theme_url('/js/main.js'); ?>"></script>

	    <meta name="viewport" content="width=device-width">
	    <meta name="generator" content="Anchor CMS">

	    <meta property="og:title" content="<?= page_title(); ?>">
	    <meta property="og:type" content="website">
	    <meta property="og:url" content="<?= e(current_url()); ?>">
	    <meta property="og:image" content="<?= theme_url('img/og_image.gif'); ?>">
	    <meta property="og:site_name" content="<?= site_name(); ?>">
	    <meta property="og:description" content="<?= page_description(); ?>">

		<?php if (customised()): ?>
		    <!-- Custom CSS -->
    		<style><?= article_css(); ?></style>

    		<!--  Custom Javascript -->
    		<script><?= article_js(); ?></script>
		<?php endif; ?>
	</head>
	<body class="<?= body_class(); ?>">
		<div class="main-wrap">
			<div class="slidey" id="tray">
				<div class="wrap">
					<form id="search" action="<?= search_url(); ?>" method="post">
						<label for="term">Search my blog:</label>
						<input type="search" id="term" name="term" placeholder="To search, type and hit enter&hellip;" value="<?= search_term(); ?>">
						<input type="hidden" id="whatSearch" name="whatSearch" value="all" />
					</form>

					<aside>
						<b>Categories</b>
						<ul>
						<?php while (categories()):
                                if (category_count() > 0) {
                                    ?>
							<li>
								<a href="<?= category_url();
                                    ?>" title="<?= category_description();
                                    ?>">
									<?= category_title();
                                    ?> <span><?= category_count();
                                    ?></span>
								</a>
							</li>
						<?php 
                                } endwhile; ?>
						</ul>
					</aside>
				</div>
			</div>

			<header id="top">
				<a id="logo" href="<?= base_url(); ?>"><?= site_name(); ?></a>

				<nav id="main" role="navigation">
					<ul>
						<?php if (has_menu_items()):
                            while (menu_items()): ?>
						<li <?php echo(menu_active() ? 'class="active"' : ''); ?>>
							<a href="<?= menu_url(); ?>" title="<?= menu_title(); ?>">
								<?= menu_name(); ?>
							</a>
						</li>
						<?php endwhile;
                            endif; ?>
						<li class="tray">
							<a href="#tray" class="linky"><img src="<?= theme_url('img/categories.png'); ?>" alt="Categories" title="View my posts by category"></a>
						</li>
					</ul>
				</nav>
			</header>
