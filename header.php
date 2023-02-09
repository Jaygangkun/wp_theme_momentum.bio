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
<link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri()?>/assets/images/ci4/m-logo-black.png">

<?php wp_head(); ?>
<link rel="stylesheet" id="aos-style-css" href="<?= get_template_directory_uri()?>/assets/css/ci4/aos.css" media="all">
<link rel="stylesheet" id="ci4-style-css" href="<?= get_template_directory_uri()?>/assets/css/ci4/style.css" media="all">
<link rel="stylesheet" id="wp-style-css" href="<?= get_template_directory_uri()?>/assets/css/wp.css" media="all">
<script src="<?= get_template_directory_uri()?>/assets/js/ci4/jquery-3.6.0.min.js"></script>
<script src="<?= get_template_directory_uri()?>/assets/js/ci4/aos.js"></script>
<script src="<?= get_template_directory_uri()?>/assets/js/ci4/global.js"></script>
</head>

<body class="theme-white">

	<div class="header" data-aos="fade-in" data-aos-duration="1500">
		<div class="container-lg">
			<div class="header-wrap">
				<a href="<?= get_site_url_from_root('/')?>">
					<img class="header-logo-img visible-dark" src="<?= get_template_directory_uri()?>/assets/images/ci4/momentum-logo-white.png">
					<img class="header-logo-img visible-white" src="<?= get_template_directory_uri()?>/assets/images/ci4/momentum-logo-black.png">
				</a>
				<span class="nav-hamburger" id="btn_nav_hamburger">
					<span></span>
				</span>
			</div>
		</div>
	</div>
	<div class="menu-container">
		<div class="container-md">
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url_from_root('/about') ?>">about</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url_from_root('/media-kit') ?>">media kit</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url_from_root('/management') ?>">management</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url_from_root('/services') ?>">services</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url_from_root('/platforms') ?>">platforms</a>
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
				<a class="menu-link" href="<?= get_site_url_from_root('/contact') ?>">contact</a>
			</div>
		</div>
	</div>
	<div class="page-content-container" id="page_content_wrap" data-aos="fade-in" data-aos-duration="1500">