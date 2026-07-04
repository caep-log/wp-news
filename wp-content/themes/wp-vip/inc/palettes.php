<?php

if (!defined('ABSPATH')) {
    exit;
}

function theme_get_palettes(): array
{
    return [
        'blue' => [
            'label' => 'Blue',
            'primary' => '#2563eb',
            'secondary' => '#1e40af',
            'accent' => '#60a5fa',
        ],

        'green' => [
            'label' => 'Green',
            'primary' => '#16a34a',
            'secondary' => '#166534',
            'accent' => '#4ade80',
        ],

        'purple' => [
            'label' => 'Purple',
            'primary' => '#7c3aed',
            'secondary' => '#5b21b6',
            'accent' => '#a78bfa',
        ],

        'red' => [
            'label' => 'Red',
            'primary' => '#dc2626',
            'secondary' => '#991b1b',
            'accent' => '#f87171',
        ],
    ];
}