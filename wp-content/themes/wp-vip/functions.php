<?php

if (!defined('ABSPATH')) {
    exit;
}

function mi_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => 'Menú Principal',
    ]);
}

add_action('after_setup_theme', 'mi_theme_setup');

function mi_theme_assets(): void
{
    wp_enqueue_style(
        'mi-theme-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'mi_theme_assets');

function mytheme_enqueue_assets() {
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css',
        [],
        '1.13.1'
    );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');

function wp_vip_enqueue_assets() {
    wp_enqueue_style(
        'wp-vip-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script(
        'wp-vip-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        wp_get_theme()->get('Version'),
        true // Antes de </body>
    );
}

add_action('wp_enqueue_scripts', 'wp_vip_enqueue_assets');