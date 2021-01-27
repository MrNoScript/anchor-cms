<?php theme_include('header'); ?>
		<section class="content wrap" id="article-<?= article_id(); ?>">
			<h1><?= article_title(); ?></h1>

			<article>
				<?= article_html(); ?>
			</article>

			<section class="footnote">
				<!-- Unfortunately, CSS means everything's got to be inline. -->
				<p>This article is my <?= numeral(article_number(article_id()), true); ?> oldest. It is <?= count_words(article_markdown()); ?> words long<?php if (comments_open()): ?>, and it’s got <?= total_comments() . pluralise(total_comments(), ' comment'); ?> for now.<?php endif; ?> <?= article_custom_field('attribution'); ?></p>
			</section>
		</section>

		<?php if (comments_open()): ?>
		<section class="comments">
			<?php if (has_comments()): ?>
			<ul class="commentlist">
				<?php $i = 0; while (comments()): $i++; ?>
				<li class="comment" id="comment-<?= comment_id(); ?>">
					<div class="wrap">
						<h2><?= comment_name(); ?></h2>
						<time><?= relative_time(comment_time()); ?></time>

						<div class="content">
							<?= comment_text(); ?>
						</div>

						<span class="counter"><?= $i; ?></span>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>

			<form id="comment" class="commentform wrap" method="post" action="<?= comment_form_url(); ?>#comment">
				<?= comment_form_notifications(); ?>

				<p class="name">
					<label for="name">Your name:</label>
					<?= comment_form_input_name('placeholder="Your name"'); ?>
				</p>

				<p class="email">
					<label for="email">Your email address:</label>
					<?= comment_form_input_email('placeholder="Your email (won’t be published)"'); ?>
				</p>

				<p class="textarea">
					<label for="text">Your comment:</label>
					<?= comment_form_input_text('placeholder="Your comment"'); ?>
				</p>

				<p class="submit">
					<?= comment_form_button(); ?>
				</p>
			</form>

		</section>
		<?php endif; ?>

<?php theme_include('footer'); ?>
