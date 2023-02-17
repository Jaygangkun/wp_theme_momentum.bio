<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */
?>
<?php
$checkLogin = file_get_contents(get_site_url_from_root('/check-lock'));
if(strpos($checkLogin, 'true') == false) {
    wp_redirect(get_site_url_from_root('/lock'));
}
?>
<?php get_header(); ?>
<?php
$categories = get_the_category();
$categoryName = '';
if ( ! empty( $categories ) ) {
	$categoryName = $categories[0]->name;	
}

$backUrl = get_site_url().'/news';

if(strtolower($categoryName) == 'blog') {
	$backUrl = get_site_url().'/blog';
}
?>
	<div class="page-content page-content-single">
		<div class="container-md">
			<div class="page-single-wrap">
				<div class="page-single-wrap-left">
					<div class="page-single-type"><?= $categoryName?></div>
				</div>
				<div class="page-single-wrap-right">
					<p class="single-post-date"><?= get_the_date('m/d/Y', get_the_ID())?></p>
					<p class="single-post-title"><?= the_title()?></p>
					<?php
					if(strtolower($categoryName) == 'blog') {
						$author_id = get_post_field( 'post_author', get_the_ID() );
						$author_name = get_the_author_meta( 'display_name', $author_id );
						?>
						<p class="single-post-author"><?= $author_name?></p>
						<?php
					}
					?>
					<div class="single-post-desc"><?= the_content() ?></div>
					<a class="single-post-back-link" href="<?= $backUrl?>">Back to <?= $categoryName?></a>
				</div>
			</div>
		</div>
	</div>

<?php
do_action( 'storefront_sidebar' );
get_footer();
