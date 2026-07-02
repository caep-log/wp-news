<?php

get_header();
?>

<main class="site-main">

    <h1>
        Resultados para: "<?php echo get_search_query(); ?>"
    </h1>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <article>

                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php the_excerpt(); ?>

            </article>

        <?php endwhile; ?>

    <?php else : ?>

        <p>No se encontraron resultados.</p>

    <?php endif; ?>

</main>

<?php

get_footer();