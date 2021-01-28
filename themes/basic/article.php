<?php
/** 
 * Article template
 * 
 * @package Basic
 */

// Exit if accessed directly.
defined( 'PATH' ) || exit;

theme_include('header');

?>
        <section id="article-<?= article_id(); ?>">

            <header class="bg-light mb-4">

                <div class="container py-5 d-flex justify-content-between">

                    <div>
                        <h1><?= article_title(); ?></h1>
                    </div>

                    <?php if(article_custom_field('youtube_id')): ?>
                        <a href="https://youtube.com/watch?v=<?= article_custom_field('youtube_id') ?>" target="_blank" class="btn btn-outline-dark align-self-baseline">View on YouTube</a>
                    <?php endif; ?>
                </div>

            </header>

            <article class="container">

                <?= render_article(); ?>

            </article>

        </section>

<?php theme_include('footer');