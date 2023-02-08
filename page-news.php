<?php
/**
* Template Name: News Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
    <div class="page-content page-content-news">
        <div class="bg-gray page-news-top">
            <div class="container-lg">
                <div class="news-tab-navs">
                    <div class="news-tab-nav-wrap active">
                        <h1 class="fs-32">News</h1>
                    </div>
                    <div class="news-tab-nav-wrap">
                        <h1 class="fs-32">Upcoming Events</h1>
                    </div>
                    <div class="news-tab-nav-wrap">
                        <h1 class="fs-32">Past Events</h1>
                    </div>
                </div>
                <div class="news-search-wrap">
                    <div class="news-search-input-wrap">
                        <label>KEYWORD SEARCH</label>
                        <input type="text">
                    </div>
                    <div class="news-search-input-wrap">
                        <label>FILTER BY</label>
                        <select>
                            <option value="">Select</option>
                            <?php
                            $tags = get_tags(array(
                                'hide_empty' => false
                            ));
                            foreach($tags as $tag) {
                                ?>
                                <option value="<?= $tag->slug ?>"><?= $tag->name?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-lg">
            <div class="news-list" id="news_list">
                <?php
                $arrNews = get_posts(array(
                    'post_type' => 'post',
                    'numberposts' => -1,
                    'posts_per_page' => -1,
                    'tax_query'             => array(
                        array(
                            'taxonomy'      => 'category',
                            'field'         => 'slug',
                            'terms'         => array('currentevents'),
                            'operator'      => 'IN'
                        ),
                    )
                ));

                foreach($arrNews as $news) {
                    $tags = get_the_tags($news->ID);
                    $arrTagTexts = [];
                    foreach($tags as $tag) {
                        $arrTagTexts[] = $tag->name;
                    }
                    ?>
                    <div class="news-wrap">
                        <div class="news-wrap-left">
                            <div class="news-date"><?= get_the_date('m/d/Y', $news->ID) ?></div>
                            <div class="news-title"><?= get_the_title($news->ID) ?></div>
                            <div class="news-desc"><?= $news->post_content ?></div>
                        </div>
                        <div class="news-wrap-right">
                            <p class="news-tags"><?= implode(',', $arrTagTexts)?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
	</div>
<?php get_footer() ?>