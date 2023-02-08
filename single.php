<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

	<div class="page-content">
		<div class="container-lg">
			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'storefront_single_post_before' );

				get_template_part( 'content', 'single' );

				do_action( 'storefront_single_post_after' );

			endwhile; // End of the loop.
			?>
		</div>
	</div>

<?php
do_action( 'storefront_sidebar' );
get_footer();
