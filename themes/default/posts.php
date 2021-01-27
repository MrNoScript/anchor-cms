<?php theme_include('header'); ?>

<section class="content">

	<?php if (has_posts()): ?>
		<ul class="items">
			<?php posts(); ?>
			<li>
				<article class="wrap">
					<h1>
						<a href="<?= article_url(); ?>" title="<?= article_title(); ?>"><?= article_title(); ?></a>
					</h1>

					<div class="content">
						<?= article_html(); ?>
					</div>

					<footer>
						Posted <time datetime="<?= date(DATE_W3C, article_time()); ?>"><?= relative_time(article_time()); ?></time> by <?= article_author('real_name'); ?>.
					</footer>
				</article>
			</li>
			<?php $i = 0; while (posts()): ?>
			<?php $bg = sprintf('background: hsl(215, 28%%, %d%%);', round(((++$i / posts_per_page()) * 20) + 20)); ?>
			<li style="<?= $bg; ?>">
				<article class="wrap">
					<h2>
						<a href="<?= article_url(); ?>" title="<?= article_title(); ?>"><?= article_title(); ?></a>
					</h2>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>

		<?php if (has_pagination()): ?>
		<nav class="pagination">
			<div class="wrap">
				<div class="previous">
					<?= posts_prev(); ?>
				</div>
				<div class="next">
					<?= posts_next(); ?>
				</div>
			</div>
		</nav>
		<?php endif; ?>

	<?php else: ?>
		<div class="wrap">
			<h1>No posts yet!</h1>
			<p>Looks like you have some writing to do!</p>
		</div>
	<?php endif; ?>

</section>

<?php theme_include('footer'); ?>
