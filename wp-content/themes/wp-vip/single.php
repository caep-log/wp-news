<?php get_header(); ?>

<main class="wp-vip-main single-post-main">
    <?php get_template_part('template-parts/financial-bar'); ?>

    <?php while (have_posts()) : the_post(); ?>
        <?php
        $post_id = get_the_ID();
        $categories = get_the_category($post_id);
        $primary_category = !empty($categories) ? $categories[0] : null;
        $category_ids = wp_list_pluck($categories, 'term_id');

        $related_args = [
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => 3,
            'post__not_in'        => [$post_id],
            'ignore_sticky_posts' => true,
        ];

        if (!empty($category_ids)) {
            $related_args['category__in'] = $category_ids;
        }

        $related_posts = new WP_Query($related_args);
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>
            <header class="single-post-hero">
                <?php if ($primary_category instanceof WP_Term) : ?>
                    <a class="wp_category single-post-category" href="<?php echo esc_url(get_category_link($primary_category)); ?>">
                        <?php echo esc_html($primary_category->name); ?>
                    </a>
                <?php endif; ?>

                <h1 class="single-post-title"><?php the_title(); ?></h1>

                <?php if (has_excerpt()) : ?>
                    <p class="single-post-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                <?php endif; ?>

                <div class="single-post-meta">
                    <span>By: <?php echo esc_html(get_the_author()); ?></span>
                    <span><?php echo esc_html(get_the_date()); ?></span>
                    <?php if (get_the_modified_time('U') !== get_the_time('U')) : ?>
                        <span>Updated: <?php echo esc_html(get_the_modified_date()); ?></span>
                    <?php endif; ?>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <figure class="single-post-featured">
                        <?php the_post_thumbnail('large'); ?>

                        <?php if (get_the_post_thumbnail_caption()) : ?>
                            <figcaption><?php echo esc_html(get_the_post_thumbnail_caption()); ?></figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endif; ?>
            </header>

            <div class="single-post-layout">
                <div class="single-post-content">
                    <?php the_content(); ?>

                    <?php
                    wp_link_pages([
                        'before' => '<nav class="single-post-pages">',
                        'after'  => '</nav>',
                    ]);
                    ?>

                    <?php if (has_tag()) : ?>
                        <div class="single-post-tags">
                            <?php the_tags('', ''); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <aside class="single-post-sidebar" aria-label="More stories">
                    <?php get_template_part('template-parts/ads'); ?>

                    <?php if ($related_posts->have_posts()) : ?>
                        <section class="single-related-section">
                            <h3>Related Notes</h3>

                            <div class="single-related-list">
                                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                    <article class="single-related-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a class="single-related-image" href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', ['loading' => 'lazy']); ?>
                                            </a>
                                        <?php endif; ?>

                                        <div class="single-related-content">
                                            <h4>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>

                                            <div class="container-meta">
                                                <small>
                                                    By: <?php echo esc_html(get_the_author()); ?>
                                                </small>
                                                <small>
                                                    <?php echo esc_html(get_the_date()); ?>
                                                </small>
                                            </div>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </aside>
            </div>
        </article>
    <?php endwhile; ?>

    <div class="container-block">
		<?php
			get_template_part('template-parts/news-from-category', null, [
				'title' => 'be interested in',
				'category_slug' => 'books',
				'posts_per_page' => 3,
				'exclude_hero'   => true,
			]);
		?>
	</div>

    <?php get_template_part('template-parts/video-carousel'); ?>
</main>

<?php get_footer(); ?>
