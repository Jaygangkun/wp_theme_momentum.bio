<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<link rel="stylesheet" id="ci4-style-css" href="<?= get_template_directory_uri()?>/assets/css/ci4.css" media="all">
</head>

<body class="theme-white">

	<div class="header">
		<div class="container-lg">
			<div class="header-wrap">
				<a href="<?= get_site_url()?>">
					<img class="header-logo-img visible-dark" src="<?= get_template_directory_uri()?>/assets/images/ci4/m-logo-white.png">
					<img class="header-logo-img visible-white" src="<?= get_template_directory_uri()?>/assets/images/ci4/m-logo-black.png">
				</a>
				<span class="nav-hamburger" id="btn_nav_hamburger"></span>
			</div>
		</div>
	</div>
	<div class="menu-container">
		<div class="container-md">
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url()?>/about">about</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url()?>/management">management</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url()?>/services">services</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url()?>/platforms">platforms</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url()?>/publications">publications</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url()?>/news">news</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url()?>/blog">blog</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url()?>/contact">contact</a>
			</div>
		</div>
	</div>
	<div class="page-content-container">