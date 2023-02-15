<?php
/**
* Template Name: Blog Page
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
                        <span class="news-tab-link active" data-type="blog">Blog</span>
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
                <div class="news-list" id="blogs_list">
                    <?php
                    $arrNews = get_posts(array(
                        'post_type' => 'post',
                        'numberposts' => -1,
                        'posts_per_page' => -1,
                        'tax_query'             => array(
                            array(
                                'taxonomy'      => 'category',
                                'field'         => 'slug',
                                'terms'         => array('blogs'),
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
        </div>
	</div>
    <script src="<?= get_template_directory_uri()?>/assets/js/wp-page/blogs.js"></script>
<?php get_footer() ?>