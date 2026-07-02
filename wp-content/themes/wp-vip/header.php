<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="wp-vip-header">
    <div class="logo-site-title">
        <h1>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
    </div>
    <div class="wp-vip-header-menu-links">
        <div>
        </div>
        <div class="wp-vip-header-menu-links__links">
            <a href="">
                <i class="bi bi-globe2"></i>
                World
            </a>
            <a href="">
                <i class="bi bi-cookie"></i>
                Sports
            </a>
            <a href="">
                <i class="bi bi-briefcase"></i>
                Economy
            </a>
            <a href="">
                <i class="bi bi-globe2"></i>
                Technology
            </a>
            <a href="">
                <i class="bi bi-currency-bitcoin"></i>
                Business
            </a>
            <a href="">
                <i class="bi bi-flask"></i>
                Science
            </a>
            <button>
                <i class="bi bi-chevron-down"></i>
                More
            </button>
        </div>
        <div>
            <button>Subscribe</button>
            <button>Sign In</button>
        </div>
    </div>     
</header>