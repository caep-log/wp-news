<?php
$category = get_queried_object();
?>
<section class="category-page category-page--economy">
    <div class="header-economy">
        <video
            autoplay
            loop
            muted
            playsinline
        >
            <source src="<?php echo get_template_directory_uri(); ?>/assets/images/economy.mp4" type="video/mp4">
        </video>
    </div>
    <div class="container-block special-card-economy">
        <h1>Economy</h1>
        <?php
            get_template_part('template-parts/news-from-category', null, [
                'title' => '',
                'category_slug' => 'economy',
                'posts_per_page' => 3,
                'exclude_hero'   => true,
                ]);
            ?>
        <?php get_template_part('template-parts/video-carousel'); ?>    
    </div>
        <?php get_template_part('template-parts/ads'); ?>
    <div class="container-block">
        <?php
            get_template_part('template-parts/news-feed', null, [
                'title' => 'Economy',
                'category_slug' => 'economy',
                'posts_per_page' => 5,
                'exclude_hero'   => true,
            ]);
        ?>
        <?php
            get_template_part('template-parts/news-from-category', null, [
                'title' => 'AI',
                'category_slug' => 'ai',
                'posts_per_page' => 3,
                'exclude_hero'   => true,
            ]);
        ?>
    </div>
        <?php get_template_part('template-parts/ads'); ?>
</section>
