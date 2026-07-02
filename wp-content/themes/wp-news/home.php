<?php
/**
 * wp-news WordPress Theme, ordasvit.com
 * wp-news is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */

get_header();

?>

<div id="main" class="site-main">



	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-whats-new-posts">
				<h3 class="my_widget_title_custom">
					<?php _e('What’s new', 'wp-news'); ?>
				</h3>

				<?php
				function display_latest_posts_with_details($atts)
				{
					$atts = shortcode_atts(
						array(
							'posts_per_page' => 10,
						),
						$atts,
						'latest_posts'
					);

					$args = array(
						'posts_per_page' => intval($atts['posts_per_page']),
						'post_status' => 'publish',
					);

					$query = new WP_Query($args);

					// Starting output buffering
					ob_start();

					if ($query->have_posts()): ?>
						<div class="post-list">
							<?php while ($query->have_posts()):
								$query->the_post(); ?>
								<div class="single-whats-new-post">
									<div class="wrapper-img-whats-new-post">
										<?php if (has_post_thumbnail()): ?>
											<a href="<?php the_permalink(); ?>" class="post-thumbnail">
												<?php the_post_thumbnail('big'); ?>
											</a>
										<?php endif; ?>
									</div>

									<div class="wrapper-desc-whats-new-post">

										<div class="post-categories">
											<?php the_category(', '); ?>
										</div>

										<h2 class="post-title">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>

										<div class="post-meta">
											<span class="author">
												<i class="fas fa-user"></i>
												<?php the_author_posts_link(); ?>
											</span>
											<span class="separator">/</span>
											<span class="date">
												<i class="fas fa-calendar"></i>
												<?php echo get_the_date(); ?>
											</span>
										</div>

										<div class="post-tags">
											<?php the_tags('', ''); ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<?php
					else:
						echo '<p>not found</p>';
					endif;

					wp_reset_postdata();

					return ob_get_clean();
				}

				?>

				<?php echo display_latest_posts_with_details(array('posts_per_page' => 10)); ?>

			</div>


			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
				function display_posts_by_category_or_all($atts)
				{

					$atts = shortcode_atts(
						array(
							'category' => '',
							'posts_per_page' => 4,
						),
						$atts,
						'posts_by_category'
					);

					// Check if the specified category exists
					$category = get_category_by_slug($atts['category']);

					// If the category exists, output the specified number of posts
					if ($category) {
						$args = array(
							'posts_per_page' => intval($atts['posts_per_page']),
							'post_status' => 'publish',
							'category_name' => $atts['category'],
						);
					} else {
						// If the category does not exist, output 4 posts
						$args = array(
							'posts_per_page' => 4,
							'post_status' => 'publish',
						);
					}

					$query = new WP_Query($args);

					ob_start();

					if ($query->have_posts()): ?>
						<div class="wrapper-category-posts">
							<?php while ($query->have_posts()):
								$query->the_post(); ?>
								<div class="wrapper-post-category">
									<div class="wrapper-img-post-category">
										<?php if (has_post_thumbnail()): ?>
											<a href="<?php the_permalink(); ?>" class="post-thumbnail">
												<?php the_post_thumbnail('big'); ?>
											</a>
										<?php endif; ?>
									</div>

									<div class="post-categories">
										<?php the_category(); ?>
									</div>

									<h2 class="post-title">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h2>

									<div class="post-meta">
										<span class="author">
											<i class="fas fa-user"></i>
											<?php the_author_posts_link(); ?>
										</span>
										<span class="separator">/</span>
										<span class="date">
											<i class="fas fa-calendar"></i>
											<?php echo get_the_date(); ?>
										</span>
									</div>

								</div>
							<?php endwhile; ?>
						</div>
						<?php
					else:
						echo '<p>not found</p>';
					endif;

					wp_reset_postdata();

					return ob_get_clean();
				}

				?>


				<h3 class="my_widget_title_custom">
					<?php _e('politics', 'wp-news'); ?>
				</h3>
				<?php
				echo display_posts_by_category_or_all(array(
					'category' => 'politics',
					'posts_per_page' => 4,
				)); ?>

				<h3 class="my_widget_title_custom">
					<?php _e('technology', 'wp-news'); ?>
				</h3>
				<?php
				echo display_posts_by_category_or_all(array(
					'category' => 'technology',
					'posts_per_page' => 4,
				)); ?>

				<h3 class="my_widget_title_custom">
					<?php _e('sports', 'wp-news'); ?>
				</h3>
				<?php
				echo display_posts_by_category_or_all(array(
					'category' => 'sports',
					'posts_per_page' => 4,
				)); ?>

				<h3 class="my_widget_title_custom">
					<?php _e('health', 'wp-news'); ?>
				</h3>
				<?php
				echo display_posts_by_category_or_all(array(
					'category' => 'health',
					'posts_per_page' => 4,
				)); ?>

				<h3 class="my_widget_title_custom">
					<?php _e('other', 'wp-news'); ?>
				</h3>
				<?php
				echo display_posts_by_category_or_all(array(
					'category' => 'other',
					'posts_per_page' => 4,
				)); ?>

			</div>
		</div>
	</div>



	<?php get_template_part('templates/positions-before-content'); ?>

	<div class="<?php if (wp_news_is_active_sidebar("sidebar_right") && wp_news_is_active_sidebar("sidebar_left")) {
		echo ('col-lg-6 col-md-12 col-sm-12 col-xs-12');
	} else if (wp_news_is_active_sidebar("sidebar_right") || wp_news_is_active_sidebar("sidebar_left")) {
		echo ('col-lg-9 col-md-12 col-sm-12 col-xs-12');
	} else {
		echo ('col-lg-12 col-md-12 col-sm-12 col-xs-12');
	} ?>  main_page">

		<?php wp_news_show_position_preview("main_content"); ?>

		<h2 class="entry-title">
			<?php the_title(); ?>
		</h2>
		<?php while (have_posts()):
			the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if (has_post_thumbnail()): ?>
					<div class="entry-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
				<?php endif; ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post -->

		<?php endwhile; ?>
	</div>

	<?php get_template_part('templates/positions-after-content'); ?>

</div><!-- #main -->

<?php
get_footer();
?>