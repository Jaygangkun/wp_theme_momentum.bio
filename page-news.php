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
                    <div class="news-tab-nav-wrap">
                        <span class="news-tab-link active" data-type="news">News</span>
                    </div>
                    <div class="news-tab-nav-wrap">
                        <span class="news-tab-link" data-type="upcoming_events">Upcoming Events</span>
                    </div>
                    <div class="news-tab-nav-wrap">
                        <span class="news-tab-link" data-type="past_events">Past Events</span>
                    </div>
                </div>
                <div class="news-search-wrap">
                    <div class="news-search-input-wrap">
                        <label>KEYWORD SEARCH</label>
                        <input type="text" id="search_keyword">
                    </div>
                    <div class="news-search-input-wrap">
                        <label>FILTER BY</label>
                        <select id="search_filter">
                            <option value="">Tag</option>
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
            <div class="tab-content" data-type="news">
                <div class="news-list" id="news_list">
                    <?php
                    $arrNews = get_posts(array(
                        'post_type' => 'post',
                        'numberposts' => -1,
                        'posts_per_page' => -1,
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
                                <div class="news-title">
                                    <a href="<?= get_permalink($news->ID)?>"><?= get_the_title($news->ID) ?></a>
                                </div>
                                <div class="news-desc"><?= get_the_excerpt($news->ID) ?></div>
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
            <div class="tab-content" data-type="upcoming_events" style="display: none">
                <div class="events-list" id="upcoming_events_list">
                    <?php
                    $arrEvents = get_posts(array(
                        'post_type' => 'event',
                        'numberposts' => -1,
                        'posts_per_page' => -1,
                        'tax_query'             => array(
                            array(
                                'taxonomy'      => 'event_type',
                                'field'         => 'slug',
                                'terms'         => array('upcoming'),
                                'operator'      => 'IN'
                            ),
                        )
                    ));

                    foreach($arrEvents as $event) {
                        $tags = get_the_tags($event->ID);
                        $arrTagTexts = [];
                        foreach($tags as $tag) {
                            $arrTagTexts[] = $tag->name;
                        }
                        ?>
                        <div class="event-wrap">
                            <div class="event-wrap-left">
                                <div class="event-title">
                                    <a href="<?= get_permalink($event->ID)?>"><?= get_the_title($event->ID) ?></a>
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
                    ?>
                </div>
            </div>
            <div class="tab-content" data-type="past_events" style="display: none">
                <div class="events-list" id="past_events_list">
                    <?php
                    $arrEvents = get_posts(array(
                        'post_type' => 'event',
                        'numberposts' => -1,
                        'posts_per_page' => -1,
                        'tax_query'             => array(
                            array(
                                'taxonomy'      => 'event_type',
                                'field'         => 'slug',
                                'terms'         => array('past'),
                                'operator'      => 'IN'
                            ),
                        )
                    ));

                    foreach($arrEvents as $event) {
                        $tags = get_the_tags($event->ID);
                        $arrTagTexts = [];
                        foreach($tags as $tag) {
                            $arrTagTexts[] = $tag->name;
                        }
                        ?>
                        <div class="event-wrap">
                            <div class="event-wrap-left">
                                <div class="event-title">
                                    <a href="<?= get_permalink($event->ID)?>"><?= get_the_title($event->ID) ?></a>
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
                    ?>
                </div>
            </div>
        </div>
	</div>
    <script src="<?= get_template_directory_uri()?>/assets/js/wp-page/news.js"></script>
<?php get_footer() ?>