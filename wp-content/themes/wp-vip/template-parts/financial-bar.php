<?php

$financial_items = [
    ['category' => 'Markets',      'title' => 'S&P 500 rises 1.2%',                    'icon' => 'up'],
    ['category' => 'Forex',        'title' => 'Dollar weakens against Euro',           'icon' => 'up'],
    ['category' => 'Crypto',       'title' => 'Bitcoin reaches new monthly high',      'icon' => 'down'],
    ['category' => 'Economy',      'title' => 'Inflation slows for third month',       'icon' => 'up'],
    ['category' => 'Commodities',  'title' => 'Gold climbs as investors seek safety',  'icon' => 'up'],
    ['category' => 'Oil',          'title' => 'Brent crude slips below $70',           'icon' => 'down'],
    ['category' => 'Tech',         'title' => 'AI stocks extend weekly gains',         'icon' => 'up'],
    ['category' => 'Banking',      'title' => 'Major banks beat earnings estimates',   'icon' => 'up'],
    ['category' => 'Bonds',        'title' => 'Treasury yields edge lower',            'icon' => 'down'],
    ['category' => 'Retail',       'title' => 'Consumer spending exceeds forecasts',   'icon' => 'up'],
    ['category' => 'Energy',       'title' => 'Natural gas prices rebound',            'icon' => 'up'],
    ['category' => 'Real Estate',  'title' => 'Home sales decline for second month',   'icon' => 'down'],
    ['category' => 'Automotive',   'title' => 'EV manufacturers report record sales',  'icon' => 'up'],
    ['category' => 'Asia',         'title' => 'Nikkei closes at fresh yearly high',    'icon' => 'up'],
    ['category' => 'Europe',       'title' => 'ECB signals no immediate rate cuts',    'icon' => 'down'],
    ['category' => 'Wall Street',  'title' => 'Dow Jones opens higher on earnings',    'icon' => 'up'],
    ['category' => 'Startups',     'title' => 'Fintech funding rebounds in Q2',        'icon' => 'up'],
    ['category' => 'Trade',        'title' => 'Exports rise despite global slowdown',  'icon' => 'up'],
    ['category' => 'Employment',   'title' => 'Jobless claims fall unexpectedly',      'icon' => 'up'],
    ['category' => 'Housing',      'title' => 'Mortgage rates tick higher this week',  'icon' => 'down'],
];

?>
<div id="financial-bar" class="financial-bar">
    <div class="financial-bar__ticker">
        <p>Financial News</p>
        <?php foreach ($financial_items as $item) : ?>
            <strong><?= esc_html($item['category']); ?></strong>
            <i class="bi bi-caret-<?= esc_html($item['icon']); ?>-fill <?= esc_html($item['icon']); ?>"></i>
            <span><?= esc_html($item['title']); ?></span>
            <span class="financial-bar__dot">•</span>  
        <?php endforeach; ?>
    </div>
</div>