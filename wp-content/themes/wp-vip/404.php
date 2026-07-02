<?php

get_header();
?>

<main class="site-main">

    <h1>404</h1>

    <p>La página que buscas no existe.</p>

    <p>
        <a href="<?php echo esc_url(home_url('/')); ?>">
            Volver al inicio
        </a>
    </p>

</main>

<?php

get_footer();