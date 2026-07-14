<?php
$category = get_queried_object();
?>

<section class="category-page category-page--world">
		<?php get_template_part('template-parts/ads'); ?>
	<?php
		get_template_part('template-parts/special', null, [
			'title' => 'Special',
			'category_slug' => 'World',
			'posts_per_page' => 1,
			'exclude_hero'   => true,
		]);
	?>
	<?php
		get_template_part('template-parts/category-news-grid', null, [
			'title' => 'World',
			'category_slug' => 'world',
		]);
	?>
	<div class="container-block">
		<?php
			get_template_part('template-parts/lastest-news-by-category', null, [
				'title' => 'World',
				'category_slug' => 'World',
				'posts_per_page' => 8,
				'exclude_hero'   => true,
			]);
		?>
	</div>
	<div class="container-block">
		<?php
			get_template_part('template-parts/news-feed', null, [
				'title' => 'World',
				'category_slug' => 'world',
				'posts_per_page' => 5,
				'exclude_hero'   => true,
			]);
		?>
	</div>
		<?php get_template_part('template-parts/ads'); ?>
	<div class="container-block">
		<?php
			get_template_part('template-parts/news-from-category', null, [
				'title' => 'be interested in',
				'category_slug' => 'economy',
				'posts_per_page' => 3,
				'exclude_hero'   => true,
			]);
		?>
	</div>
</section>