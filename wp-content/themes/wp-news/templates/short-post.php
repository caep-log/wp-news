<?php
/**
 * wp-news WordPress Theme, ordasvit.com
 * wp-news is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */
?>
<?php wp_news_show_position_preview("main_content"); ?>

<div class="row">
    <?php

    if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <div class=" col-lg-3 col-md-6 col-sm-12 col-xs-12 wrapper-short-post">
                <div class="wrapper-inner-short-post">
                    <div class="wrapper-short-post-img">
                        <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail(array(400, 400)); ?>
                        </a>
                    </div>
                    <div class="wrapper-short-post-info">
                        <?php the_category(); ?>
                        <h3 class="wrapper-short-post-title"><a href="<?php the_permalink() ?>">
                                <?php the_title(); ?>
                            </a></h3>
                        <div class="wrapper-short-post-author-with-date">
                            <div class="wrapper-short-post-author">
                                <i class="fas fa-user"></i>
                                <?php the_author(); ?>
                            </div>
                            <span class="wrapper-short-post-separator">/</span>
                            <div class="wrapper-short-post-date">
                                <i class="fas fa-calendar"></i>
                                <?php echo get_the_date(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }

        ?>
        <div class="wrapper-pagination">
            <?php
            wp_news_the_posts_navigation();
            ?>
        </div>
        <?php
    } else { ?>
        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-not-found">
            <h2>
                <?php _e('NOT FOUND', 'wp-news'); ?>
            </h2>
        </div>
        <?php
    }

    ?>

</div>