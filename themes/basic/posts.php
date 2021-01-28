<?php
/** 
 * Header template
 * 
 * @package Basic
 */

// Exit if accessed directly.
defined( 'PATH' ) || exit;

theme_include('header');

?>

<header>
    <div class="container jumbotron mt-3">
        <h1 class="display-1"><?= page_title(); ?></h1>
    </div>
</header>

<section class="container">
    <?= page_content(); ?>
</section>

<section class="container mt-3">

	<?php if (has_posts()): ?>
        <div class="row">

            <?php while (posts()): ?>

                <div class="col-12 col-md-6 col-lg-4 d-flex pb-3">

                    <article class="card w-100" id="post-<?php article_id(); ?>">
                        
                        <a href="<?= article_url() ?>">

                            <?php if(!empty(article_custom_field('thumbnail'))): ?>

                                <img class="card-img-top" src="<?= article_custom_field('thumbnail') ?>">

                            <?php else: ?>

                                <div class="card-img-top bg-light" style="min-height: 200px"></div>

                            <?php endif; ?>

                        </a>
                        
                        <div class="card-body">
                        
                            <h5 class="card-title">

                                <a href="<?= article_url() ?>" class="text-dark"><?= article_title() ?></a>

                            </h5>

                            <p class="card-text"><?= article_excerpt(); ?></p>

                        </div>

                    </article>

                </div>

			<?php endwhile; ?>

        </div>

		<?php if ( has_pagination() ): ?>

            <nav>
                <ul class="pagination justify-content-center">
					<li class="page-item"><?= posts_prev('Previous', '', ['class' => 'page-link']); ?></li>
					<li class="page-item"><?= posts_next('Next', '', ['class' => 'page-link']); ?></li>
                </ul>
            </nav>

		<?php endif; ?>

	<?php else: ?>
		<div class="wrap">
			<h1>No posts yet!</h1>
			<p>Looks like you have some writing to do!</p>
		</div>
	<?php endif; ?>

</section>

<?php theme_include('footer');