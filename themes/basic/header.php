<?php
/** 
 * Header template
 * 
 * @package Basic
 */

// Exit if accessed directly.
defined( 'PATH' ) || exit;

?>
<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Tom Roberts <tom@tomroberts.uk>" />
		<meta name="description" content="<?= site_description(); ?>">

		<title><?= page_title('Page can’t be found'); ?> - <?= site_name(); ?></title>

	    <meta property="og:title" content="<?= page_title(); ?>">
	    <meta property="og:type" content="website">
	    <meta property="og:url" content="<?= e(current_url()); ?>">
	    <meta property="og:image" content="<?= theme_url('img/og_image.gif'); ?>">
	    <meta property="og:site_name" content="<?= site_name(); ?>">
	    <meta property="og:description" content="<?= page_description(); ?>">
        

		<link rel="stylesheet" href="<?= theme_url('/css/theme.min.css'); ?>">

    </head>
    <body class="<?= body_class('d-flex flex-column h-100') ?>">
        <main class="flex-shrink-0">

<?php theme_include('navbar'); ?>