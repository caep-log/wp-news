<?php
$template_args = $args ?? get_query_var('feed_news_args', []);

$wall_args = wp_parse_args(
    is_array($template_args) ? $template_args : [],
    [
        'title'          => '',
        'category_slug'  => '',
        'posts_per_page' => 1,
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
    'posts_per_page' => 1,
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

<section class="special-section">
    <div class="special__layout">
        <?php if (!empty($posts)) : ?>
            <div class="special__stack">
                <?php foreach (array_slice($posts, 0, 1) as $stack_post) : ?>
                    <article class="special__item">
                        <a class="special__media" href="<?php echo esc_url(get_permalink($stack_post)); ?>">
                            <?php if (has_post_thumbnail($stack_post)) : ?>
                                <?php
                                echo get_the_post_thumbnail(
                                    $stack_post,
                                    'large',
                                    [
                                        'loading' => 'eager',
                                        'alt'     => esc_attr(get_the_title($stack_post)),
                                    ]
                                );
                                ?>
                            <?php else : ?>
                                <img
                                    src="https://placehold.co/1200x640"
                                    alt="<?php echo esc_attr(get_the_title($stack_post)); ?>"
                                >
                            <?php endif; ?>
                        </a>

                        <div class="special__content">
                            <span class="special__eyebrow"><?php echo esc_html($section_title); ?></span>

                            <h4>
                                <a href="<?php echo esc_url(get_permalink($stack_post)); ?>">
                                    <?php echo esc_html(get_the_title($stack_post)); ?>
                                </a>
                            </h4>

                            <p class="special__excerpt">
                                <?php echo esc_html(get_the_excerpt($stack_post)); ?>
                            </p>

                            <div class="special__meta">
                                <small>
                                    By: <?php echo esc_html(get_the_author_meta('display_name', $stack_post->post_author)); ?>
                                </small>
                                <small>
                                    <?php echo esc_html(get_the_date('', $stack_post)); ?>
                                </small>
                            </div>

                            <a class="special__cta" href="<?php echo esc_url(get_permalink($stack_post)); ?>">
                                Read the special
                            </a>
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
