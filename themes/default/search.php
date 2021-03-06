<?php theme_include('header'); ?>

<h1 class="wrap">You searched for &ldquo;<?= search_term(); ?>&rdquo;.</h1>

<?php if (has_search_results()): ?>
	<ul class="items">
		<?php $i = 0; while (search_results()): $i++; ?>
		<li style="background: hsl(215,28%,<?= round((($i / posts_per_page()) * 20) + 20); ?>%);">
			<article class="wrap">
				<h2>
					<a href="<?= search_item_url(); ?>" title="<?= search_item_title(); ?>"><?= search_item_title(); ?></a>
				</h2>
			</article>
		</li>
		<?php endwhile; ?>
	</ul>

	<?php if (has_search_pagination()): ?>
	<nav class="pagination">
		<div class="wrap">
			<?= search_prev(); ?>
			<?= search_next(); ?>
		</div>
	</nav>
	<?php endif; ?>

<?php else: ?>
	<p class="wrap">Unfortunately, there's no results for &ldquo;<?= search_term(); ?>&rdquo;. Did you spell everything correctly?</p>
<?php endif; ?>

<?php theme_include('footer'); ?>