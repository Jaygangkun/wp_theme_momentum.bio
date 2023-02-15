<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

	<div class="page-content page-content-single">
		<div class="container-md">
			<div class="page-single-wrap">
				<div class="page-single-wrap-left">
					<div class="page-single-type">NEWS</div>
				</div>
				<div class="page-single-wrap-right">
					<p class="single-post-date"><?= get_the_date('m/d/Y', get_the_ID())?></p>
					<p class="single-post-title"><?= the_title()?></p>
					<div class="single-post-desc"><?= the_content() ?></div>
					<a class="single-post-back-link" href="<?= get_site_url()?>/news">Back to News</a>
				</div>
			</div>
		</div>
	</div>

<?php
do_action( 'storefront_sidebar' );
get_footer();
