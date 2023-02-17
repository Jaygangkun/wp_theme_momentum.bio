<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

 function get_site_url_from_root($subpath) {
	$pu = parse_url(get_site_url());
    return $pu["scheme"] . "://" . $pu["host"].$subpath;
 }

 function news_search() {
	$args = [
		'post_type' => 'post',
		'numberposts' => -1,
		'posts_per_page' => -1,
	];

	if(!empty($_POST['keyword'])) {
		$args['s'] = $_POST['keyword'];
	}

	if(!empty($_POST['type'])) {
		if($_POST['type'] == 'news') {
			$args['post_type'] = 'post';
		}

		if($_POST['type'] == 'upcoming_events') {
			$args['post_type'] = 'event';
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'event_type',
					'field' => 'slug',
					'terms' => array('upcoming'),
					'operator' => 'IN'
				)
			);
		}

		if($_POST['type'] == 'past_events') {
			$args['post_type'] = 'event';
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'event_type',
					'field' => 'slug',
					'terms' => array('past'),
					'operator' => 'IN'
				)
			);
		}

		if($_POST['type'] == 'blogs') {
			$args['post_type'] = 'post';
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => array('blogs'),
					'operator' => 'IN'
				)
			);
		}
	}

	if(!empty($_POST['filter'])) {
		if(empty($args['tax_query'])) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'post_tag',
					'field' => 'slug',
					'terms' => sanitize_title($_POST['filter'])
				)
			);
		}
		else {
			$args['tax_query'] = array_merge(array(
				array(
					'taxonomy' => 'post_tag',
					'field' => 'slug',
					'terms' => sanitize_title($_POST['filter'])
				)
			), $args['tax_query']);
		}
	}

	ob_start();
    $posts = get_posts($args);

	foreach($posts as $post) {
		if($args['post_type'] == 'post') {
			$news = $post;
			$tags = get_the_tags($news->ID);
			$arrTagTexts = [];
			foreach($tags as $tag) {
				$arrTagTexts[] = $tag->name;
			}
			?>
			<div class="news-wrap">
				<div class="news-wrap-left">
					<div class="news-date"><?= get_the_date('m/d/Y', $news->ID) ?></div>
					<div class="news-title">
						<a href="<?= get_permalink($news->ID)?>"><?= get_the_title($news->ID) ?></a>
					</div>
					<?php
					if($_POST['type'] == 'blogs') {
						$author_id = get_post_field( 'post_author', $news->ID );
						$author_name = get_the_author_meta( 'display_name', $author_id );
						?>
						<div class="news-author"><?= $author_name ?></div>
						<?php
					}
					?>
					<div class="news-desc"><?= get_the_excerpt($news->ID) ?></div>
				</div>
				<div class="news-wrap-right">
					<p class="news-tags"><?= implode(',', $arrTagTexts)?></p>
				</div>
			</div>
			<?php
		}
		else if($args['post_type'] == 'event') {
			$event = $post;
			$tags = get_the_tags($event->ID);
			$arrTagTexts = [];
			foreach($tags as $tag) {
				$arrTagTexts[] = $tag->name;
			}
			?>
			<div class="event-wrap">
				<div class="event-wrap-left">
					<div class="event-title">
						<?= get_the_title($event->ID) ?>
					</div>
					<div class="event-date"><?= get_field('date', $event->ID) ?></div>
					<div class="event-desc"><?= get_field('description', $event->ID) ?></div>
					<div class="event-location"><?= get_field('location', $event->ID) ?></div>
				</div>
				<div class="event-wrap-right">
					<p class="event-tags"><?= implode(',', $arrTagTexts)?></p>
				</div>
			</div>
			<?php
		}
	}

	if(count($posts) == 0) {
		?>
		<div>No Result</div>
		<?php
	}
	
	$html = ob_get_contents();
	ob_end_clean();

	echo json_encode([
		'html' => $html
	]);
	die();
}

add_action("wp_ajax_news_search", "news_search");
add_action("wp_ajax_nopriv_news_search", "news_search");