<?php
$hero = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 1
]);

if ($hero->have_posts()) :
    while ($hero->have_posts()) :
        $hero->the_post();
?>

<section class="hero">
    <div class="hero__image">
        <a href="<?php the_permalink(); ?>">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail(
                    'large', ['loading' => 'eager']
                );
            } else {
                ?>
                <img
                    src="https://placehold.co/900x600"
                    alt="<?php the_title_attribute(); ?>"
                >
                <?php
            }
            ?>
        </a>
    </div>
    <div class="hero__content">
        <?php
            $categories = get_the_category();
            if (!empty($categories)) :
        ?>
            <span class="hero__category"><?php echo esc_html($categories[0]->name); ?></span>
        <?php endif; ?>
        <h2>
            <a class="hero__title" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <p class="hero__excerpt">
            <?php echo esc_html(get_the_excerpt()); ?>
        </p>
        <a class="hero__button" href="<?php the_permalink(); ?>">
            Read Story
        </a>
    </div>
</section>

<?php
    endwhile;
    wp_reset_postdata();
endif;
?>