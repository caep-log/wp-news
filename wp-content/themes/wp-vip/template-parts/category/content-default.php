<?php
$category = get_queried_object();
$category_slug = $category->slug ?? '';
$category_name = single_cat_title('', false);
?>

<section class="category-page">
	<div class="container-block">
		<header class="category-page__header">
			<h1><?php echo esc_html($category_name); ?></h1>
			<?php if ( ! empty( $category->description ) ) : ?>
				<p><?php echo esc_html( $category->description ); ?></p>
			<?php endif; ?>
		</header>
	</div>

	<?php get_template_part('template-parts/ads'); ?>

	<div class="container-block">
		<?php
			get_template_part('template-parts/news-feed', null, [
				'title' => $category_name,
				'category_slug' => $category_slug,
				'posts_per_page' => 5,
				'exclude_hero'   => true,
			]);
		?>
	</div>

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

	<div class="container-block">
		<?php
			get_template_part('template-parts/section-feed', null, [
				'title' => $category_name,
				'category_slug' => $category_slug,
				'posts_per_page' => 4,
				'exclude_hero'   => true,
			]);
		?>
	</div>

	<?php get_template_part('template-parts/video-carousel'); ?>

	<div class="container-block">
		<?php
			get_template_part('template-parts/news-from-category', null, [
				'title' => $category_name,
				'category_slug' => $category_slug,
				'posts_per_page' => 3,
				'exclude_hero'   => true,
			]);
		?>
	</div>
		<?php get_template_part('template-parts/ads'); ?>
</section>
