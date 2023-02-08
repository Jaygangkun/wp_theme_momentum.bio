<?php
/**
* Template Name: Publications Page
*
* @package WordPress
* @subpackage 
* @since 
*/

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
                ));

                $publicationIndex = 1;
                foreach($publications as $publication) {
                    ?>
                    <div class="publication-wrap">
                        <div class="publication-wrap-left">
                            <span class="publication-num"><?= $publicationIndex ?></span>
                        </div>
                        <div class="publication-wrap-right">
                            <p class="publication-date"></p>
                            <p class="publication-name"><?= get_the_title($publication->ID)?></p>
                            <p class="publication-publisher"><?= get_field('author', $publication->ID)?></p>
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