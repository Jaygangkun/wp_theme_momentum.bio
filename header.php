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
<script>
	const adminAjax = '<?php echo admin_url('admin-ajax.php')?>';
</script>

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RQB54SR123"> </script> 
<script>   
  window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-RQB54SR123'); 
</script>

<link rel="stylesheet" id="aos-style-css" href="<?= get_template_directory_uri()?>/assets/css/ci4/aos.css" media="all">
<link rel="stylesheet" id="ci4-style-css" href="<?= get_template_directory_uri()?>/assets/css/ci4/style.css" media="all">
<link rel="stylesheet" id="wp-style-css" href="<?= get_template_directory_uri()?>/assets/css/wp.css" media="all">
<script src="<?= get_template_directory_uri()?>/assets/js/ci4/jquery-3.6.0.min.js"></script>
<script src="<?= get_template_directory_uri()?>/assets/js/ci4/jquery.sticky.js"></script>
<script src="<?= get_template_directory_uri()?>/assets/js/donetyping.js"></script>
<script src="<?= get_template_directory_uri()?>/assets/js/ci4/global.js"></script>
</head>

<body class="theme-white">

	<div class="header" id="header">
		<div class="container-lg">
			<div class="header-wrap">
				<a href="<?= get_site_url_from_root('/')?>">
					<img class="header-logo-img visible-dark" src="<?= get_template_directory_uri()?>/assets/images/ci4/momentum-logo-white.svg">
					<img class="header-logo-img visible-white" src="<?= get_template_directory_uri()?>/assets/images/ci4/momentum-logo-black.svg">
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
				<a class="menu-link" href="<?= get_site_url_from_root('/management') ?>">management</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url_from_root('/services') ?>">services</a>
			</div>
			<div class="menu-link-wrap">
				<a class="menu-link" href="<?= get_site_url_from_root('/laboratory') ?>">laboratory</a>
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
	<div class="page-content-container" id="page_content_wrap">