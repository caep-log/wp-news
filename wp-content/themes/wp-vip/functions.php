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
add_action('save_post', 'mytheme_update_video_meta', 10, 2);

function mytheme_update_video_meta($post_id, $post)
{
    if ($post->post_type !== 'post') {
        return;
    }

    if (wp_is_post_revision($post_id)) {
        return;
    }

    if (has_block('core/video', $post)) {
        update_post_meta($post_id, '_has_video', 1);
    } else {
        delete_post_meta($post_id, '_has_video');
    }
}

require_once get_template_directory() . '/inc/palettes.php';

function theme_customize_register($wp_customize)
{
    $palettes = theme_get_palettes();

    $choices = [];

    foreach ($palettes as $key => $palette) {
        $choices[$key] = $palette['label'];
    }

    $wp_customize->add_section('theme_colors', [
        'title' => __('Colores del tema', 'wp-vip'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('theme_palette', [
        'default' => 'blue',
        'transport' => 'refresh',
        'sanitize_callback' => function ($value) use ($choices) {
            if (!is_string($value)) {
                return 'blue';
            }

            $value = sanitize_key($value);

            return array_key_exists($value, $choices) ? $value : 'blue';
        },
    ]);

    $wp_customize->add_control('theme_palette', [
        'label' => __('Paleta de colores', 'wp-vip'),
        'section' => 'theme_colors',
        'type' => 'radio',
        'choices' => $choices,
    ]);
}

add_action('customize_register', 'theme_customize_register');

function theme_print_css_variables()
{
    $palettes = theme_get_palettes();

    $current = get_theme_mod('theme_palette', 'blue');

    if (!is_string($current) || !isset($palettes[$current])) {
        $current = 'blue';
    }

    $colors = $palettes[$current];

    $css = sprintf(
        ':root{--primary:%1$s;--secondary:%2$s;--accent:%3$s;}',
        sanitize_hex_color($colors['primary']),
        sanitize_hex_color($colors['secondary']),
        sanitize_hex_color($colors['accent'])
    );

    wp_add_inline_style('wp-vip-style', $css);
}

add_action('wp_enqueue_scripts', 'theme_print_css_variables', 20);

add_action('wp_head', function () {
    echo "<!-- HOME: " . home_url() . " -->";
    echo "<!-- SITE: " . site_url() . " -->";
});