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
        <button class="wp-vip-header-menu-toggle" aria-label="Toggle menu">
            <i class="bi bi-list"></i>
        </button>
        <h1>
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
            ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <?php bloginfo('name'); ?>
                </a>
            <?php
            }
            ?>
        </h1>
        <button>
            <i class="bi bi-search"></i>
        </button>
    </div>
    <div class="wp-vip-header-menu-links">
        <div>
            <h2 class="small-logo-site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    WP NEWS
                </a>
            </h2>
        </div>
        <div class="wp-vip-header-menu-links__links">
            <a href="/world">
                <i class="bi bi-globe2"></i>
                World
            </a>
            <a href="/sports">
                <i class="bi bi-cookie"></i>
                Sports
            </a>
            <a href="/economy">
                <i class="bi bi-briefcase"></i>
                Economy
            </a>
            <a href="/technology">
                <i class="bi bi-globe2"></i>
                Technology
            </a>
            <a href="/science">
                <i class="bi bi-flask"></i>
                Science
            </a>
            <div class="dropdown">
                <button>
                    <i class="bi bi-chevron-down"></i>
                    More
                </button>
                <div class="wp-vip-header-menu-links__links__more">
                    <a href="/business">
                        <i class="bi bi-currency-bitcoin"></i>
                        Business
                    </a>
                    <a href="/health">
                        <i class="bi bi-people"></i>
                        Health
                    </a>
                    <a href="/entertainment">
                        <i class="bi bi-camera"></i>
                        Entertainment
                    </a>
                    <a href="/music">
                        <i class="bi bi-music-note-beamed"></i>
                        Music
                    </a>
                    <a href="/book">
                        <i class="bi bi-book"></i>
                        Books
                    </a>
                </div>
            </div>
        </div>
        <div>
            <a class="btn-subscribe" href="/sign-up">Subscribe</a>
            <a class="btn-sign-in" href="/sign-in">Sign In</a>
        </div>
    </div>
</header>