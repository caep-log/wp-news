<?php get_header(); ?>

<main class="wp-vip-main">
    <?php get_template_part('template-parts/financial-bar'); ?>
        <?php get_template_part('template-parts/ads'); ?>
    <?php get_template_part('template-parts/hero'); ?>
    <?php get_template_part('template-parts/latest-news'); ?>
        <?php get_template_part('template-parts/ads'); ?>
    <?php
        get_template_part('template-parts/news-feed', null, [
            'title' => 'Science',
            'category_slug' => 'science',
            'posts_per_page' => 5,
            'exclude_hero'   => true,
        ]);
    ?>
    <?php
        get_template_part('template-parts/section-feed', null, [
            'title' => 'Entertainment',
            'category_slug' => 'entertainment',
            'posts_per_page' => 4,
            'exclude_hero'   => true,
        ]);
    ?>
    <?php get_template_part('template-parts/video-carousel'); ?>    
    <?php
        get_template_part('template-parts/news-from-category', null, [
            'title' => 'World',
            'category_slug' => 'world',
            'posts_per_page' => 3,
            'exclude_hero'   => true,
        ]);
    ?>
        <?php get_template_part('template-parts/ads'); ?>
    <?php
        get_template_part('template-parts/news-from-category', null, [
            'title' => 'Sports',
            'category_slug' => 'sports',
            'posts_per_page' => 3,
            'exclude_hero'   => true,
        ]);
    ?>
    <?php
        get_template_part('template-parts/news-feed', null, [
            'title' => 'Economy',
            'category_slug' => 'economy',
            'posts_per_page' => 5,
            'exclude_hero'   => true,
        ]);
    ?>
        <?php get_template_part('template-parts/ads'); ?>
    <?php
        get_template_part('template-parts/news-from-category', null, [
            'title' => 'AI',
            'category_slug' => 'ai',
            'posts_per_page' => 3,
            'exclude_hero'   => true,
        ]);
    ?>
        <?php get_template_part('template-parts/ads'); ?>
    <?php
        get_template_part('template-parts/section-feed', null, [
            'title' => 'Music',
            'category_slug' => 'music',
            'posts_per_page' => 4,
            'exclude_hero'   => true,
        ]);
    ?>
    <?php
        get_template_part('template-parts/news-feed', null, [
            'title' => 'Books',
            'category_slug' => 'books',
            'posts_per_page' => 5,
            'exclude_hero'   => true,
        ]);
    ?>
        <br />

</main>

<?php get_footer(); ?>