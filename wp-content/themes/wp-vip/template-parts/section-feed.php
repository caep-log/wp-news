<?php
$template_args = $args ?? get_query_var('feed_news_args', []);

$wall_args = wp_parse_args(
    is_array($template_args) ? $template_args : [],
    [
        'title'          => '',
        'category_slug'  => '',
        'posts_per_page' => 4,
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
    'posts_per_page' => max(4, (int) $wall_args['posts_per_page']),
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

<section class="section-feed-section">
    <div class="section-feed-header">
        <h3><?php echo esc_html($section_title); ?></h3>
    </div>

    <div class="section-feed__layout">
        <?php if ($primary_post instanceof WP_Post) : setup_postdata($primary_post); ?>
            <article class="section-feed__lead">
                <a href="<?php echo esc_url(get_permalink($primary_post)); ?>">
                    <div class="section-feed__lead-content">
                        <h2 class="section-feed__lead-title">
                            <?php echo esc_html(get_the_title($primary_post)); ?>
                        </h2>
                        <div class="container-meta">
                            <small>
                                By: <?php echo esc_html(get_the_author_meta('display_name', $primary_post->post_author)); ?>
                            </small>
                            <small>
                                <?php echo esc_html(get_the_date('', $primary_post)); ?>
                            </small>
                        </div>
                    </div>
                    <div class="section-feed__lead-media">
                        <?php if (has_post_thumbnail($primary_post)) : ?>
                            <?php echo get_the_post_thumbnail($primary_post, 'large'); ?>
                        <?php else : ?>
                            <img
                                src="https://placehold.co/630x439"
                                alt="<?php echo esc_attr(get_the_title($primary_post)); ?>"
                            >
                        <?php endif; ?>
                    </div>
                </a>
            </article>
        <?php endif; ?>

        <?php if (!empty($posts)) : ?>
            <div class="section-feed__stack">
                <?php foreach (array_slice($posts, 0, 4) as $stack_post) : ?>
                    <article class="section-feed__item">
                        <h4>
                            <a href="<?php echo esc_url(get_permalink($stack_post)); ?>">    
                                <?php echo esc_html(get_the_title($stack_post)); ?>
                            </a>
                        </h4>
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
