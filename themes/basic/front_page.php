<?php
/** 
 * Front Page template
 * 
 * @package Basic
 */

// Exit if accessed directly.
defined( 'PATH' ) || exit;

theme_include('header'); 

?>
        <article class="container">

            <?= page_content(); ?>

        </article>

<?php theme_include('footer');