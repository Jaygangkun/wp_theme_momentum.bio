<?php
/**
* Template Name: Publications Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php
$checkLogin = file_get_contents(get_site_url_from_root('/check-lock'));
if(strpos($checkLogin, 'true') == false) {
    wp_redirect(get_site_url_from_root('/lock'));
}
?>
<?php get_header() ?>
    <div class="page-content">
        <div class="container-lg">
            <h1 class="fs-32">Publications</h1>
            <div class="publications-list">
                <?php
                $publications = get_posts(array(
                    'post_type' => 'publication',
                    'numberposts' => -1,
                    'posts_per_page' => -1,
                    'orderby'=> 'post_date', 
                    'order' => 'ASC'
                ));

                $publicationIndex = 1;
                foreach($publications as $publication) {
                    ?>
                    <div class="publication-wrap">
                        <div class="publication-wrap-left">
                            <span class="publication-num"><?= $publicationIndex ?></span>
                        </div>
                        <div class="publication-wrap-right">
                            <p class="publication-date"><?= get_field('date', $publication->ID)?></p>
                            <p class="publication-name"><a href="<?= get_field('url', $publication->ID) ?>"><?= get_the_title($publication->ID)?></a></p>
                            <p class="publication-author"><?= get_field('author', $publication->ID)?></p>
                            <p class="publication-journal"><?= get_field('journal', $publication->ID)?></p>
                            <p class="publication-other"><?= get_field('other', $publication->ID)?></p>
                            <p class="publication-url"><?= get_field('url', $publication->ID)?></p>
                        </div>
                    </div>
                    <?php

                    $publicationIndex ++;
                }
                ?>
            </div>
        </div>
	</div>
<?php get_footer() ?>