<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package director
 */

?>
<!doctype html>
<html class="h-100" <?php language_attributes(); ?>>

<head>
	<!--=== META TAGS ===-->
	<meta charset="<?php bloginfo('charset');?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="author" content="Name">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="ahrefs-site-verification" content="">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<!--=== Favicons ===-->
	<!--[if IE]><link rel="shortcut icon" href="favicon.ico" /><![endif]-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
	<link rel="manifest" crossorigin="use-credentials" href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json">
	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class('h-100 '); ?>>
	<?php wp_body_open(); ?>
	<div  class="site d-flex flex-column h-100 ">

		<?php get_template_part( 'inc/template-parts/menu', 'top' ); ?>

		<!--[if lt IE 8]>
		<p class="browserupgrade">
		You are using an <strong>outdated</strong> browser.
		Please <a href="http://browsehappy.com/">upgrade your browser</a>
		to improve your experience.</p>
		<![endif]-->
