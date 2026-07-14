<?php
$category = get_queried_object();
?>
<section class="category-page category-page--sport">
    <div class="container-block center">
        <span class="live-badge">
            <span class="live-dot"></span>
            Live
        </span>
    </div>
	
	<div class="spots-block-info">
		<h1>World Cup 2026</h1>
		<div class="header-sport-view">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mundial2026.jpg' ); ?>" alt="World Cup 2026">
			<div class="banner-matches-today">
				<div>
					España vs Portugal
					<div class="divider-card"></div>
					<small>Today 2:00 PM</small>
				</div>
				<div>
					USA vs Belgica
					<div class="divider-card"></div>
					<small>Today 7:00 PM</small>
				</div>
				<div>
					Argentina vs Egipto
					<div class="divider-card"></div>
					<small>Tomorrow 2:00 PM</small>
				</div>
				<div>
					Colombia vs Suiza
					<div class="divider-card"></div>
					<small>Tomorrow 7:00 PM</small>
				</div>
			</div>
		</div>
		<h2>Tournament statistics</h2>
		<div class="grid-stadistics-sports">
			<div>
				<p>Top goal scorer</p>
				<div>
					<span>Erling Haaland</span>
					<span>7</span>
				</div>
				<div>
					<span>Kylian Mbappé</span>
					<span>7</span>
				</div>
				<div>
					<span>Lionel Messi</span>
					<span>7</span>
				</div>
			</div>
			<div>
				<p>Top assist</p>
				<div>
					<span>Michael Olise</span>
					<span>5</span>
				</div>
				<div>
					<span>Brahim Díaz</span>
					<span>4</span>
				</div>
				<div>
					<span>Bruno Guimaraes</span>
					<span>4</span>
				</div>
			</div>
			<div>
				<p>Top yellow card</p>
				<div>
					<span>Ahmed Fatehi</span>
					<span>2</span>
				</div>
				<div>
					<span>Amir Al-Ammari</span>
					<span>2</span>
				</div>
				<div>
					<span>Caleb Yirenkyi</span>
					<span>2</span>
				</div>
			</div>
			<div>
				<p>Top red card</p>
				<div>
					<span>Agustin Canobbio</span>
					<span>1</span>
				</div>
				<div>
					<span>Assim Madibo</span>
					<span>1</span>
				</div>
				<div>
					<span>César Montes</span>
					<span>1</span>
				</div>
			</div>
		</div>
	</div>
		<?php get_template_part('template-parts/ads'); ?>
	<div class="container-block">
		<?php
			get_template_part('template-parts/category-news-grid', null, [
				'title' => 'Sport',
				'category_slug' => 'sport',
			]);
		?>
	</div>
	<div class="container-block">
		<?php
			get_template_part('template-parts/lastest-news-by-category', null, [
				'title' => '',
				'category_slug' => 'sports',
				'posts_per_page' => 10,
				'exclude_hero'   => true,
			]);
		?>
	</div>
	<div class="container-block">
		<?php
			get_template_part('template-parts/news-from-category', null, [
				'title' => '',
				'category_slug' => 'sports',
				'posts_per_page' => 3,
				'exclude_hero'   => true,
			]);
		?>
	</div>
		<?php get_template_part('template-parts/ads'); ?>
</section>