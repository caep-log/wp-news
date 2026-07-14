<?php
$latestNews = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 10,
    'offset'         => 5,
]);

$latest_news_posts = $latestNews->posts;

if (!empty($latest_news_posts)) :
?>

<section class="all-news-section">
    <h1>Trending</h1>
    <?php foreach ($latest_news_posts as $latest_post) : ?>
        <article>
            <div class="all-news__content">
                <h2>
                    <a href="<?php echo esc_url(get_permalink($latest_post)); ?>">    
                        <?php echo esc_html(get_the_title($latest_post)); ?>
                    </a>
                </h2>
                <p class="latest-news__excerpt">
                    <?php echo esc_html(get_the_excerpt($latest_post)); ?>
                </p>
                <div class="container-meta">
                    <small>
                        By: <?php echo esc_html(get_the_author_meta('display_name', $latest_post->post_author)); ?>
                    </small>
                    <small>
                        <?php echo esc_html(get_the_date('', $latest_post)); ?>
                    </small>
                </div>   
            </div>
            <div class="all-news__image">
                <a href="<?php echo esc_url(get_permalink($latest_post)); ?>">
                    <?php
                    if (has_post_thumbnail($latest_post)) {
                        echo get_the_post_thumbnail(
                            $latest_post,
                            'large',
                            ['loading' => 'eager']
                        );
                    } else {
                        ?>
                        <img
                            src="https://placehold.co/400x266"
                            alt="<?php echo esc_attr(get_the_title($latest_post)); ?>"
                        >
                        <?php
                    }
                    ?>
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</section>

<?php
    wp_reset_postdata();
endif;
?>
