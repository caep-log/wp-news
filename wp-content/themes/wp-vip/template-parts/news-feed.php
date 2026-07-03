<?php

$template_args = $args ?? get_query_var('wall_news_args', []);

$wall_args = wp_parse_args(
    is_array($template_args) ? $template_args : [],
    [
        'title'          => '',
        'category_slug'  => '',
        'posts_per_page' => 5,
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
    'posts_per_page' => max(5, (int) $wall_args['posts_per_page']),
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
    $primary_post = array_shift($posts);
?>

<section class="wall-news">
    <div class="container">
        <div class="section-header">
            <h2><?php echo esc_html($section_title); ?></h2>
        </div>

        <div class="wall-news__layout">
            <?php if ($primary_post instanceof WP_Post) : setup_postdata($primary_post); ?>
                <article class="wall-news__lead">
                    <a href="<?php echo esc_url(get_permalink($primary_post)); ?>">
                        <div class="wall-news__lead-media">
                            <?php if (has_post_thumbnail($primary_post)) : ?>
                                <?php echo get_the_post_thumbnail($primary_post, 'large'); ?>
                            <?php else : ?>
                                <img
                                    src="https://placehold.co/900x620"
                                    alt="<?php echo esc_attr(get_the_title($primary_post)); ?>"
                                >
                            <?php endif; ?>
                        </div>

                        <div class="wall-news__lead-content">
                            <h3 class="wall-news__lead-title">
                                <?php echo esc_html(get_the_title($primary_post)); ?>
                            </h3>
                        </div>
                    </a>
                </article>
            <?php endif; ?>

            <?php if (!empty($posts)) : ?>
                <div class="wall-news__stack">
                    <?php foreach (array_slice($posts, 0, 4) as $stack_post) : ?>
                        <article class="wall-news__item">
                            <a href="<?php echo esc_url(get_permalink($stack_post)); ?>">
                                <?php if (has_post_thumbnail($stack_post)) : ?>
                                    <div class="wall-news__item-media">
                                        <?php echo get_the_post_thumbnail($stack_post, 'medium'); ?>
                                    </div>
                                <?php endif; ?>

                                <h3 class="wall-news__item-title">
                                    <?php echo esc_html(get_the_title($stack_post)); ?>
                                </h3>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
wp_reset_postdata();
set_query_var('wall_news_args', null);
endif;

?>