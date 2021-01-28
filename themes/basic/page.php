<?php
/** 
 * Page template
 * 
 * @package Basic
 */

// Exit if accessed directly.
defined( 'PATH' ) || exit;

theme_include('header');

?>

        <header class="bg-light mb-4">

            <div class="container py-5">

                <h1><?= page_title(); ?></h1>

			</div>

		</header>

        <article class="container">

            <?= page_content(); ?>

        </article>

<?php theme_include('footer');