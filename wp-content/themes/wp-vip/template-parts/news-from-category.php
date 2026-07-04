<?php
$template_args = $args ?? get_query_var('feed_news_args', []);

$wall_args = wp_parse_args(
    is_array($template_args) ? $template_args : [],
    [
        'title'          => '',
        'category_slug'  => '',
        'posts_per_page' => 3,
        'exclude_hero'   => true,
    ]
);

$hero_post = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => 1,
    'fields'         => 'ids'
]);

$query_args = [
    'post_type'      => 'post',
    'posts_per_page' => 3,
];

if ($wall_args['exclude_hero']) {
    $query_args['post__not_in'] = $hero_post;
}

$selected_category = null;

if (!empty($wall_args['category_slug'])) {
    $selected_category = get_category_by_slug(sanitize_title($wall_args['category_slug']));

    if ($selected_category instanceof WP_Term) {
        $query_args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => [$selected_category->term_id],
            ],
        ];
    }
}

$section_title = $wall_args['title'];

if (empty($section_title) && $selected_category instanceof WP_Term) {
    $section_title = $selected_category->name;
}

if (empty($section_title)) {
    $section_title = 'Latest Stories';
}

$wall_news = new WP_Query($query_args);

if ($wall_news->have_posts()) :
    $posts = $wall_news->posts;
?>

<section class="news-category-section">
    <div class="news-category-header">
        <h3><?php echo esc_html($section_title); ?></h3>
    </div>

    <div class="news-category__layout">
        <?php if (!empty($posts)) : ?>
            <div class="news-category__stack">
                <?php foreach (array_slice($posts, 0, 3) as $stack_post) : ?>
                    <article class="news-category__item">
                        <h4>
                            <a href="<?php echo esc_url(get_permalink($stack_post)); ?>">    
                                <?php echo esc_html(get_the_title($stack_post)); ?>
                            </a>
                        </h4>

                        <p class="hero__excerpt">
                            <?php echo esc_html(get_the_excerpt($stack_post)); ?>
                        </p>

                        <div class="container-meta">
                            <small>
                                By: <?php echo esc_html(get_the_author_meta('display_name', $stack_post->post_author)); ?>
                            </small>
                            <small>
                                <?php echo esc_html(get_the_date('', $stack_post)); ?>
                            </small>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
wp_reset_postdata();
set_query_var('feed_news_args', null);
endif;
?>
